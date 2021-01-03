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
                <div v-else-if="data.question_type === 'Skala Linier'" class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <p class="d-flex justify-content-end"><strong>{{data.label_minimum}}</strong></p>
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <div class="row d-flex justify-content-center">
                            <div class="radio-inline d-flex justify-content-center" v-if="data.minimum === 0">
                                <label v-for="n in data.maximum+1" :item="n" :key="n" style="min-width:50px;" class="d-flex justify-content-center">
                                    {{n-1}}
                                </label>
                            </div>

                            <div class="d-flex justify-content-center" v-else-if="data.minimum === 1">
                                <label v-for="n in data.maximum" :item="n" :key="n" style="width:50px;" class="d-flex justify-content-center">
                                    {{n}}
                                </label>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="radio-inline d-flex justify-content-center" v-if="data.minimum === 0">
                                <label v-for="n in data.maximum+1" :item="n" :key="n" class="radio radio-lg radio-outline radio-outline-2x radio-primary d-flex justify-content-center" style="margin-right: 0rem;width:50px;">
                                    <input type="radio" :name="'radio'+data.question_id" v-model="data.answers" :value="n-1"/>
                                    <span style="margin-right: 0rem;"></span>
                                </label>
                            </div>

                            <div class="radio-inline d-flex justify-content-center" v-else-if="data.minimum === 1">
                                <label v-for="n in data.maximum" :item="n" :key="n" class="radio radio-lg radio-outline radio-outline-2x radio-primary d-flex justify-content-center" style="margin-right: 0rem;width:50px;">
                                    <input type="radio" :name="'radio'+data.question_id" v-model="data.answers" :value="n"/>
                                    <span style="margin-right: 0rem;"></span>
                                </label>
                            </div>
                        </div>

                            
                    </div>
                    

                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <p class="d-flex justify-content-start"><strong>{{data.label_maximum}}</strong></p>
                    </div>
                    
                </div>
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
        <button v-if="question.length > 0" @click="SendResponse()" type="button" class="btn btn-primary mb-6" style="min-width:80px;margin-top:-10px;"><strong>Kirim</strong></button>
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
                    <strong v-else-if="response ===  'email'">
                        Anda memerlukan izin
                    </strong>
                </p>
                <p class="font-size-lg" v-if="response ===  'closed'">
                    Anda hanya dapat mengisi formulir ini sekali.<br>
                    Coba hubungi pemilik formulir ini jika menurut Anda hal ini adalah kesalahan.
                </p>
                <p class="font-size-lg" v-else-if="response ===  'sent'">
                    Tanggapan Anda telah kami simpan.
                </p>
                <p class="font-size-lg" v-else-if="response ===  'email'">
                    Formulir ini hanya bisa dilihat oleh pengguna di organisasi pemilik.<br>
                    Coba hubungi pemilik formulir ini jika menurut Anda hal ini adalah kesalahan.
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
            response : null, 
            //sent : anda baru saja mengirimkan tanggapan, 
            //closed : anda sudah mengirim tanggapan dan mencoba membuka kembali halaman
            //email : ketika harus menggunakan email STMIk, dan responden tidak menggunakan email STMIk
			title : "",
			desc : "",
			question : [],
            options : [],
            answers_id : null,
            last_index_send_result : 0,
            setting_single_response : null,
            setting_campus_response : null
        }
    },
    watch:{

    },
    methods:{
        SendResponse(){
            if(this.question.length > 0){
                var required = 0
                var input_required = 0
                for (let i = 0; i < this.question.length; i++) {
                    const e = this.question[i]
                    if(e.question_require == 1){
                        required +=1
                        if(e.answers != null && e.answers != '' && e.answers != undefined){
                            input_required +=1
                        }
                    }

                    if(i == this.question.length-1){
                        if(required == input_required){
                            if(this.answers_id != null && this.answers_id != ''){
                                //send all answers
                                this.SaveResponse(last_index_send_result,this.answers_id)
                            }else{
                                //create new answers
                                axios.post('/api/saveAnswers',{
                                    email : this.GetUser().email,
                                    questionnaire_id : this.GetID()
                                }).then(res=>{
                                    if(res.data.result == true){
                                        //send all answers
                                        this.answers_id = res.data.id
                                        this.SaveResponse(0,res.data.id)
                                    }else{
                                        this.ShowToast('Gagal mengirim jawaban','error')
                                    }
                                }).catch(err=>{
                                    this.ShowToast('Gagal mengirim jawaban','error')
                                })
                            }
                        }else{
                            this.ShowToast('Harap isi bagian wajib','error')
                        }
                    }
                }
            }
        },
        SaveResponse(index,answers_id){
            if(index == 0){
                this.$swal({
					title : 'Mengirim jawaban ...',
					timerProgressBar: true,
					showConfirmButton: false,
					allowOutsideClick : false,
					willOpen: () => {
						this.$swal.showLoading()
					},
				})
            }else{
                if(index == this.last_index_send_result){
                    this.$swal({
                        title : 'Mengirim jawaban ...',
                        timerProgressBar: true,
                        showConfirmButton: false,
                        allowOutsideClick : false,
                        willOpen: () => {
                            this.$swal.showLoading()
                        },
                    })
                }
            }
            this.last_index_send_result = index

            axios.post('/api/addAnswers',{
                answers_id : answers_id,
                questionnaire_id : this.GetID(),
                question_id : this.question[index].question_id,
                question_type : this.question[index].question_type,
                answers : this.question[index].answers,
            }).then(res=>{
                if(res.data.result === true){
                    if(index == this.question.length-1){
                        this.$swal.close()
                        this.status = true
                        this.response = 'sent'
                    }else{
                        this.SaveResponse(index+1,answers_id)
                    }
                }else{
                    this.$swal.close()
                    this.ShowToast('Gagal mengirim jawaban','error')
                }
            }).catch(err=>{
                this.$swal.close()
                this.ShowToast('Gagal mengirim jawaban','error')
            })
        },
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
        ShowToast(messages,types){
			this.$toast.open({
				message: messages,
				type: types,
				position: 'bottom-right',
				duration : 2000
			});
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
                        this.setting_single_response = data.setting_single_response
                        this.setting_campus_response = data.setting_campus_response

                        if(data.questionnaire_title === ''){
                            window.document.title = 'Belum memiliki judul - SIMAKK'
                        }else{
                            window.document.title = data.questionnaire_title+' - SIMAKK'
                        }

                        if(data.setting_campus_response === 1){
                            if(this.GetUser().email.includes('stmik-sumedang.ac.id')){
                                if(data.setting_single_response === 1){
                                    if(this.status == true){
                                        this.status = true
                                        this.response = 'closed'
                                    }
                                }else{
                                    if(this.status == true){
                                        this.status = false
                                        this.response = ''
                                    }
                                }
                            }else{
                                this.status = true
                                this.response = 'email'
                            }
                        }else{
                            if(this.setting_single_response === 1){
                                if(this.status == true){
                                    this.status = true
                                    this.response = 'closed'
                                }
                            }else{
                                if(this.status == true){
                                    this.status = false
                                    this.response = ''
                                }
                            }
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