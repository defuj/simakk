<template>
    <div class="d-flex flex-column flex-root" v-if="getUser != null && getLogin != null">
        <div class="d-flex flex-row flex-column-fluid page">
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <header-component v-if="this.$route.name != 'view_kuesioner' && this.$route.name != 'preview_kuesioner'"></header-component>
                <div class="d-flex flex-column-fluid">
                    <div class=" container " style="padding-top:0px !important;">
                        <router-view></router-view>
                    </div>
                </div>
                <!-- <footer-component></footer-component> -->
            </div>
        </div>

        <!-- Modal-->
        <div v-if="(this.$route.name == 'edit_kuesioner' || this.$route.name == 'responses_kuesioner') && modal != null" class="modal fade" id="modalSettings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 620px!important;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="">Pengaturan</h3>
                    </div>
                    <div class="modal-body">
                        <h5>Perlu Masuk:</h5>
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-lg">
                                <input type="checkbox" v-model="modal.setting_campus_response" name="Settings_1"/>
                                <span></span>
                                Batasi untuk pengguna di STMIK Sumedang dan organisasi tepercayanya
                            </label>
                        </div>

                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-lg">
                                <input type="checkbox" v-model="modal.setting_single_response" name="Settings_2"/>
                                <span></span>
                                Batasi hanya untuk 1 tanggapan
                            </label>
                        </div>
                        

                        <h5 class="mt-5">Lainnya:</h5>
                        <div class="checkbox-inline">
                            <label class="checkbox checkbox-lg">
                                <input type="checkbox" v-model="isTemplate" name="Settings_3"/>
                                <span></span>
                                Jadikan dokumen sebagai template
                            </label>
                        </div>
                        <div class="form-group" style="margin-bottom: 0px;">
                            <select class="custom-select form-control" v-model="categorySelected" :disabled="isTemplate === false">
                                <option v-for="category in categories" :key="category.id" :value="category.id" :selected="category.id === categorySelected">{{category.category}}</option>
                            </select>
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link-secondary font-weight-bold mx-3" style="color:#5f6368;" data-dismiss="modal">Batal</a>
                        <a href="#" class="btn btn-link-primary font-weight-bold mx-3" @click="SaveSettings()">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <login-component v-else-if="getUser == null && getLogin == null"></login-component>
</template>

<script>
    export default {
        name : 'app',
        data() {
            return {
                categorySelected : null,
                categories:[],
                modal : null,
                isTemplate : false,
                login : null,
                error : null,
                logo : 'http://127.0.0.1:8000/media/logos/logo-letter-9.png',
            }
        },
        watch:{

        },
        computed:{
            getUser(){
                return this.$store.getters.getUser
            },
            getLogin(){
                return this.$store.getters.getLogin
            },
            GetID(){
                return this.$route.params.id
            },
        },
        methods: {  
            SaveSettings(){
                var campus = null
                if(this.modal.setting_campus_response === true){
                    campus = 1
                }else if(this.modal.setting_campus_response === false){
                    campus = 0
                }else{
                    campus = this.modal.setting_campus_response
                }

                var single = null
                if(this.modal.setting_single_response === true){
                    single = 1
                }else if(this.modal.setting_single_response === false){
                    single = 0
                }else{
                    single = this.modal.setting_single_response
                }

                if(this.isTemplate == true){
                    if(this.categorySelected === null){
                        this.ShowToast('Harap pilih satu kategori untuk template','error')
                        return false
                    }
                }

                axios.post('/api/updateSettings',{
                    setting_campus_response : campus,
                    setting_single_response : single,
                    questionnaire_id : this.$route.params.id
                }).then(res=>{
                    if(this.isTemplate == true){
                        //add to template first
                        axios.post('/api/addToTemplate',{
                            id : this.categorySelected,
                            questionnaire_id : this.$route.params.id
                        }).then(res=>{
                            this.ShowToast('Perubahan telah disimpan','success')
                            this.GetTemplates()
                        }).catch(err=>{
                            this.ShowToast('Gagal menyimpan perubahan','error')
                        })
                    }else{
                        if(this.categorySelected != null){
                            //delete this from template
                            axios.post('/api/deleteFromTemplate',{
                                id : this.$route.params.id
                            }).then(res=>{
                                this.ShowToast('Perubahan telah disimpan','success')
                                this.GetTemplates()
                            }).catch(err=>{
                                console.log(err);
                                this.ShowToast('Gagal menyimpan perubahan','error')
                            })
                        }else{
                            this.ShowToast('Perubahan telah disimpan','success')
                            this.GetTemplates()
                        }
                    }
                }).catch(err=>{
                    this.ShowToast('Gagal menyimpan perubahan','error')
                })
            },
            GetLogo(){
                return this.logo
            },
            GetLoginStatus(){
                return this.login
            },
            GetErrorMessage(){
                return this.error
            },
            AuthProvider(provider) {
                var bb = this
                this.$auth.authenticate(provider).then(response =>{
                    this.SocialLogin(provider,response)
                }).catch(err => {
                    console.log({err:err})
                })
            },
            SocialLogin(provider,response){
                this.$http.post('/sociallogin/'+provider,response).then(response => {
                    //console.log(response.data)
                    //console.log(response.data.user)
                    const data = {
                        name      : response.data.name,
                        email     : response.data.email,
                        token     : response.data.token,
                        access    : 'default',
                        google_id : response.data.id,
                        avatar    : response.data.avatar,
                        created_at: new Date().getTime(),
                        updated_at: new Date().getTime(),
                    };

                    if(this.$route.name != 'view_kuesioner'){
                        if(response.data.user.email.includes('stmik-sumedang.ac.id')){
                            axios.post('/api/registerUser',data)
                            .then(result =>{
                                if(result.data == 'admin'){
                                    this.$store.dispatch('saveLogin',response.data)
                                    this.$store.dispatch('saveUser',response.data.user)

                                    localStorage.setItem('user',JSON.stringify(response.data.user))
                                    localStorage.setItem('login',JSON.stringify(response.data))
                                }else{
                                    this.login = 'failed'
                                    this.error = "Email yang Anda gunakan tidak memiliki akses admin."

                                    var login = JSON.parse(localStorage.getItem('login'))
                                    if(login != null){
                                        localStorage.removeItem('user')
                                        localStorage.removeItem('login')

                                        location.reload()
                                    }
                                }
                            }).catch(err => {
                                console.log({err:err})
                            })

                        }else{
                            this.login = 'failed'
                            this.error = "Email yang Anda gunakan tidak didukung."

                            var login = JSON.parse(localStorage.getItem('login'))
                            if(login != null){
                                localStorage.removeItem('user')
                                localStorage.removeItem('login')

                                location.reload()
                            }
                            
                        }
                    }else{
                        axios.post('/api/registerUser',data)
                        .then(result =>{
                            this.$store.dispatch('saveLogin',response.data)
                            this.$store.dispatch('saveUser',response.data.user)

                            localStorage.setItem('user',JSON.stringify(response.data.user))
                            localStorage.setItem('login',JSON.stringify(response.data))
                        }).catch(err => {
                            console.log({err:err})
                        })
                    }

                    
                }).catch(err => {
                    console.log({err:err})
                })
            },
            ShowLoginFailed(){
                this.$swal({
                    title: 'Oops',
                    text: 'Harap untuk menggunakan email kampus',
                    icon: 'warning',
                    timer:5000,
                });
            },
            GetKuesioner(){
                axios.post('/api/getKuesioner',{kode : this.$route.params.id}).then(result =>{
                    if(result.data.questionnaire_type == undefined){
                        this.$router.push({ name: 'not_found' })
                    }else{
                        this.modal = result.data
                    }
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
            GetTemplates(){
                axios.post('/api/getTemplates',{id : 0}).then(result=>{
                    var data = result.data
                    for(var i = 0;i<data.length;i++){
                        if(data[i].questionnaire_id === this.$route.params.id){
                            this.isTemplate = true
                            this.categorySelected = data[i].category_id
                        }
                    }
                })
            },
            GetCategories(){
                axios.get('/api/getCategories').then(result=>{
                    this.categories = result.data
                })
            },
        },
        mounted() {
            try{
                var user = JSON.parse(localStorage.getItem('user'))
                var login = JSON.parse(localStorage.getItem('login'))

                this.$store.dispatch('saveLogin',login)
                this.$store.dispatch('saveUser',user)
            }catch (error) {}
            

            if(this.getUser == null || this.getLogin == null){
                window.document.title = 'Login - Sistem Manajemen Kuesioner Kampus'
                this.AuthProvider('google')
            }else{
                if(this.$route.name != 'view_kuesioner'){
                    const data = {
                        name      : this.getUser.name,
                        email     : this.getUser.email,
                        token     : this.getUser.token,
                        access    : 'default',
                        google_id : this.getUser.id,
                        avatar    : this.getUser.avatar,
                        created_at: new Date().getTime(),
                        updated_at: new Date().getTime(),
                    };
                    if(this.getUser.email.includes('stmik-sumedang.ac.id')){
                        axios.post('/api/registerUser',data)
                        .then(result =>{
                            if(result.data != 'admin'){
                                window.document.title = 'Login - Sistem Manajemen Kuesioner Kampus'
                                this.login = 'failed'
                                this.error = "Email yang Anda gunakan tidak memiliki akses admin."

                                var login = JSON.parse(localStorage.getItem('login'))
                                if(login != null){
                                    localStorage.removeItem('user')
                                    localStorage.removeItem('login')

                                    location.reload()
                                }
                            }
                        }).catch(err => {
                            console.log({err:err})
                        })
                    }else{
                        window.document.title = 'Login - Sistem Manajemen Kuesioner Kampus'
                        this.login = 'failed'
                        this.error = "Email yang Anda gunakan tidak didukung."

                        var login = JSON.parse(localStorage.getItem('login'))
                        if(login != null){
                            localStorage.removeItem('user')
                            localStorage.removeItem('login')

                            location.reload()
                        }
                    }
                }
            }

            if(this.$route.name === 'edit_kuesioner' || this.$route.name === 'responses_kuesioner'){
                this.GetKuesioner()
                this.GetTemplates()
                this.GetCategories()
            }
        },
        created(){
            
        }
    }
</script>