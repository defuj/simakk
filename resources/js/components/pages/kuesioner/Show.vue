<template>
    <section class="container-kuesioner" style="margin-top:-20px;" v-if="status != null && status == false">
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
                    <textarea-autosize v-model="data.answers" class="form-control my-3 my-form" rows="1" placeholder="Jawaban Anda"></textarea-autosize>
                </section>
                <section v-else-if="data.question_type === 'Skala Linier'" class="">
                    <p class="d-flex justify-content-start">{{data.label_minimum}}</p>
                    <div class="radio-inline d-flex justify-content-center" v-if="data.minimum === 0">
                        <label v-for="n in data.maximum+1" :item="n" :key="n" class="radio radio-lg radio-outline radio-outline-2x radio-primary">
                            <input type="radio" :name="'radio'+data.question_id" v-model="data.answers" :value="n-1"/>
                            <span></span>
                            {{n-1}}
                        </label>
                    </div>

                    <div class="radio-inline d-flex justify-content-center" v-else-if="data.minimum === 1">
                        <label v-for="n in data.maximum" :item="n" :key="n" class="radio radio-lg radio-outline radio-outline-2x radio-primary">
                            <input type="radio" :name="'radio'+data.question_id" v-model="data.answers" :value="n"/>
                            <span></span>
                            {{n}}
                        </label>
                    </div>
                    <p class="d-flex justify-content-end">{{data.label_maximum}}</p>
                </section>
                <section v-else-if="data.question_type === 'Pilihan Ganda'">
                    <div class="radio-list">
                        <label v-for="opsi in options" :item="opsi" :key="opsi.id" v-show="opsi.question_id === data.question_id" class="radio radio-lg radio-outline radio-outline-2x radio-primary">
                            <input type="radio" :name="'radio'+opsi.id" v-model="data.answers" :value="opsi.choice"/>
                            <span></span>
                            {{opsi.choice}}
                        </label>
                    </div>
                </section>
            </div>
        </div>
  </section>
  <section class="container-kuesioner" style="margin-top:-20px;" v-else-if="status != null && status == true">
      <div class="card card-custom gutter-b example example-compact" style="margin-left:auto;margin-right:auto;">
		    <div class="card-body">
                <p class="display5 display4-lg">
                    <strong v-if="response ===  'closed'">
                        Anda sudah menanggapi
                    </strong>
                    <strong v-else-if="response ===  'sent'">
                        {{title}}
                    </strong>
                </p>
                <p class="font-size-lg" v-if="response ===  'closed'">
                    Anda hanya dapat mengisi formulir ini sekali.<br>
                    Coba hubungi pemilik formulir ini jika menurut Anda hal ini adalah kesalahan.
                </p>
                <p class="font-size-lg" v-else-if="response ===  'sent'">
                    Tanggapan Anda telah kami simpan.
                </p>
		    </div>
	    </div>
  </section>
</template>

<script>
export default {
    data(){
        return{
            status : null,
            response : null, //sent : anda baru saja mengirimkan tanggapan, closed : anda sudah mengirim tanggapan dan mencoba membuka kembali halaman
			title : "",
			desc : "",
			question : [],
			options : [],
        }
    },
    watch:{

    },
    methods:{
        CheckAnswers(){
            axios.post('/api/checkMyAnswers',{
                email : this.GetUser().email,
                questionnaire_id : this.GetID()
            }).then(res =>{
                if(res.data.length > 0){
                    this.status = true
                    this.response = 'closed'
                }else{
                    this.status = false
                    this.response = ''
                }
                this.GetKuesioner(this.GetID())
            })
        },
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

                        if(this.status == false){
                            this.GetQuestion()
                            this.GetAllOptions()
                        }
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
        GetUser(){
            return JSON.parse(localStorage.getItem('login'))
        }
    },
    computed:{
        
    },
    mounted(){
        this.CheckAnswers()
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