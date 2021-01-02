<template>
    <section class="container-kuesioner" style="margin-top:-20px;">
        <div class="card card-custom gutter-b example example-compact" style="margin-left:auto;margin-right:auto;">
		    <div class="card-body">
                <p class="display5 display4-lg">
                    <strong>
                        {{title}}
                    </strong>
                </p>
                <p class="font-size-lg">
                    {{desc}}
                </p>
                <p class="text-danger">* Wajib</p>
		    </div>
	    </div>

        <div v-for="(data, index) in question" :item="data" :index="index" :key="data.question_id" class="card card-custom gutter-b example example-compact" style="margin-left:auto;margin-right:auto;">
		    <div class="card-body">
                <p class="font-size-h4 font-size-lg-h2">
                    {{data.question_content}}
                    <strong class="text-danger" v-if="data.question_require === 1">*</strong>
                </p>
                <section v-if="data.question_type === 'Jawaban Singkat'">
                    <textarea-autosize v-model="data.question_content" class="form-control my-3 my-form" rows="1" placeholder="Jawaban Anda"></textarea-autosize>
                </section>
                <section v-else-if="data.question_type === 'Skala Linier'"></section>
                <section v-else-if="data.question_type === 'Pilihan Ganda'"></section>
            </div>
        </div>
  </section>
</template>

<script>
export default {
    data(){
        return{
			title : "",
			desc : "",
			question : [],
			options : [],
        }
    },
    methods:{
        GetID() {
            return this.$route.params.id
        },
        GetKuesioner(ID){
			axios.post('/api/getKuesioner',{kode : ID}).then(result =>{
				if(result.data.questionnaire_type == undefined){
					this.$router.push({ name: 'not_found' })
				}else{
                    var data = result.data
                    if(data.questionnaire_type != 'publish'){
                        this.$router.push({ name: 'not_found' })
                    }else{
                        this.title = data.questionnaire_title
                        this.desc = data.questionnaire_description

                        if(data.questionnaire_title === ''){
                            window.document.title = 'Belum memiliki judul - SIMAKK'
                        }else{
                            window.document.title = data.questionnaire_title+' - SIMAKK'
                        }

                        this.GetQuestion()
                        this.GetAllOptions()
                    }
				}
			})
        },
        GetQuestion(){
			axios.post('/api/getQuestion',{id : this.GetID()}).then(result=>{
                this.question = result.data
                console.log(result.data)
			})
		},
		GetAllOptions(){
			axios.post('/api/getOptions',{questionnaire_id : this.GetID()}).then(result=>{
                this.options = result.data
                console.log(result.data)
			})
		},
    },
    computed:{

    },
    mounted(){
        this.GetKuesioner(this.GetID())
    }
}
</script>

<style scoped>
    .my-options{
		font-size: 14px;;	
	}
    @media (min-width: 992px){
		.container-kuesioner{
			max-width: 780px;
			margin-left: auto;
			margin-right: auto;
		}
	}
</style>