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

                        <div v-if="data.question_type == 'Jawaban Singkat'"  class="row overflow-auto" style="max-height:350px;">
                            <div class="col-12" v-for="el in simple_answers" :key="el.id">
                                <div v-if="el.question_id == data.question_id" class="d-flex align-items-center bg-light-info rounded p-3 mb-3">
                                    <div class="d-flex flex-column flex-grow-1">
                                        <a class="font-weight-bold text-dark-75 font-size-md">{{el.answer}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <GChart v-if="data.question_type == 'Skala Linier' && skala_linier.length > 0" 
                                type="PieChart" :data="chartDatas(data.question_id,data.question_type,data.questionnaire_id)" :options="chartOptions"></GChart>

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
            question2 : [],
            answers : [],
            answers_content : [],
            responden : 0,
            multiple_choice : [],
            simple_answers : [],
            skala_linier : [],

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
                        this.answers.push(res.data)
                    })

                    axios.post('/api/getMultipleChoiceResult',{
                        question_id : e.question_id
                    }).then(res=>{
                        for (let i = 0; i < res.data.length; i++) {
                            this.multiple_choice.push(res.data[i])
                        }
                    })
                    
                }else if(e.question_type == 'Skala Linier'){
                    axios.post('/api/getSkalaLiniers',{
                        question_id : e.question_id
                    }).then(res=>{
                        for (let i = 0; i < res.data.length; i++) {
                            const element = res.data[i];
                            this.skala_linier.push(element)
                        }
                    })
                }else if(e.question_type == 'Jawaban Singkat'){
                    axios.post('/api/getSimpleAnswers',{
                        question_id : e.question_id
                    }).then(res=>{
                        for (let i = 0; i < res.data.length; i++) {
                            const element = res.data[i];
                            this.simple_answers.push(element)
                        }
                    })
                }
            }
        },
    },
    methods:{
        chartDatas(question_id,question_type,questionnaire_id){
            if(question_type == 'Pilihan Ganda'){
                //array filter
                var dat = this.multiple_choice.filter(el => el.question_id == question_id)

                var data = [
                    ['Opsi','Jumlah']
                ]
                var column = []
                for (let i = 0; i < dat.length; i++) {
                    const e = dat[i]
                    data.push([e.choice+' : '+e.total,e.total])
                }
                
                return data
            }else{
                var dat = this.question2.filter(el => el.question_id == question_id)
                var skala = this.skala_linier
                var data = [
                    ['Opsi','Jumlah']
                ]

                for (let i = 0; i < dat[0].maximum; i++) {
                    var pilihan = 'Pilihan '+(i+1)
                    data.push([pilihan,0])

                    for (let a = 0; a < skala.length; a++) {
                        const element = skala[a]

                        if(element.answer2 == (i+1) && element.quest_id == question_id){
                            let total = element.total
                            let current = [pilihan+' : '+total,total]
                            data[i+1] = current
                        }
                    }
                }
                
                return data
            }
        },
        GetAnswerContent(){
            axios.post('/api/getAnswerContent',{
                questionnaire_id : this.GetID()
            }).then(res=>{
                this.answers_content = res.data
            })
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
            
            axios.post('/api/getQuestion',{id : this.GetID()}).then(result=>{
				this.question2 = result.data
			});
		},
    },
    mounted(){
        this.CountResponden()
        this.GetKuesioner(this.GetID())
        this.GetAnswerContent()
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