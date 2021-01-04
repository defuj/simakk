<template>
     <section class="container-kuesioner" >
        <div class="card card-custom gutter-b example example-compact" style="margin-left:auto;margin-right:auto;">
		    <div class="card-body">
                <p class="display5 display4-lg">
                    {{responden}} tanggapan
                </p>
                <p class="font-size-lg">
                    
                </p>
		    </div>
	    </div>

        <div class="row mb-12" v-if="question.length > 0">
            <div class="col-lg-12" v-for="(data, index) in question" :item="data" :index="index" :key="data.question_id" style="margin-top: -12px;">
                <div class="card card-custom gutter-b example example-compact btn-shadow">
                    <div class="card-body">
                        <p class="font-size-h4 font-size-lg-h2 font-weight-bold" style="margin-bottom: 0rem;">
                            {{data.question_content}}
                        </p>
                        <p class="font-weight-normal">
                            {{data.total_responden}} tanggapan
                        </p>

                        <GChart v-if="data.question_type == 'Jawaban Singkat'" 
                                type="ColumnChart" :data="chartData" :options="chartOptions"></GChart>

                        <GChart v-if="data.question_type == 'Skala Linier'" 
                                type="ColumnChart" :data="chartData" :options="chartOptions"></GChart>

                        <GChart v-if="data.question_type == 'Pilihan Ganda'" 
                                type="PieChart" :data="chartDatas(data.question_id,data.question_type,data.questionnaire_id)" :options="chartOptions"></GChart>
                    </div>
                </div>
            </div>
        </div>
  </section>

  
</template>

<script>
export default {
    data() {
        return {
            title : '',
			desc : '',
			question : [],
            answers : [],
            answers_content : [],
            responden : 0,
            multiple : [],

            chartOptions: {
                chart: {
                    title: '',
                    subtitle: '',
                }
            },
            chartData: [
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ],
        }
    },
    watch:{
        question(){
            for (let index = 0; index < this.question.length; index++) {
                const e = this.question[index]
                if(e.question_type == 'Pilihan Ganda'){
                    axios.post('/api/getQuestionOptions',{
                        question_id : e.question_id
                    }).then(res=>{
                        console.log(res.data)
                        this.answers.push(res.data)
                    })
                }else if(e.question_type == 'Skala Linier'){

                }
            }
        },
    },
    methods:{
        chartDatas(question_id,question_type,questionnaire_id){
            console.log(this.chartData);
            if(question_type == 'Pilihan Ganda'){
                var data = []
                var column = []
                var row = []
                for (let i = 0; i < this.answers.length; i++) {
                    const e = this.answers[i];
                    if(e.question_id == question_id){
                        column.push(e.choice)
                    }
                }
                data.push(column)
                
                return data
            }else{
                return this.chartData
            }
        },
        CountResponden(){
            axios.post('/api/countResponden',{
                questionnaire_id : this.GetID()
            }).then(res=>{
                this.responden = res.data
            })
            
        },
        GetID(){
            return this.$route.params.id
        },
        GetKuesioner(ID){
			axios.post('/api/getKuesioner',{kode : ID}).then(result =>{
				if(result.data.questionnaire_type == undefined){
					this.$router.push({ name: 'not_found' })
				}else{
                    var data = result.data
                    this.title = data.questionnaire_title
                    this.desc = data.questionnaire_description

                    if(data.questionnaire_title === ''){
                        window.document.title = 'Belum memiliki judul - SIMAKK'
                    }else{
                        window.document.title = data.questionnaire_title+' - SIMAKK'
                    }

                    this.GetQuestion()
				}
			})
        },
        GetQuestion(){
            axios.post('/api/getQuestionResponses',{id : this.GetID()})
            .then(result=>{
                this.question = result.data
			})
		},
    },
    mounted(){
        this.CountResponden()
        this.GetKuesioner(this.GetID())
    }
}
</script>

<style scoped>
    .my-options{
		font-size: 14px;;	
	}
	.option-input, .input-question{
		min-height: 1em;
	}
	.my-form{
		border: none !important;	
		min-height: 1em;
	}
	.my-form:focus, .my-form:active, .my-form:hover{
		border: 1px solid #E4E6EF !important;
		min-height: 1em;
	}
	.card-sticky-on .card.card-custom.card-sticky > .card-header{
		margin-top: -96px !important;
		width: 100%;
    	margin-left: -10%;
	}
	@media (min-width: 992px){
		.container-kuesioner{
			max-width: 780px;
			margin-left: auto;
			margin-right: auto;
            margin-top: 30px;
		}
	}
</style>