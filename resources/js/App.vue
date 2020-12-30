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
    </div>
    <login-component v-else-if="getUser == null && getLogin == null"></login-component>
</template>

<script>
    export default {
        name : 'app',
        data() {
            return {
                login : null,
                error : null,
                logo : 'http://127.0.0.1:8000/media/logos/logo-letter-9.png',
            }
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

                    if(response.data.user.email.includes('stmik-sumedang.ac.id')){
                        axios.post('/api/registerUser',data)
                        .then(result =>{
                            console.log(result.data)
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
            }
        },
        mounted() {
            try{
                var user = JSON.parse(localStorage.getItem('user'))
                var login = JSON.parse(localStorage.getItem('login'))

                this.$store.dispatch('saveLogin',login)
                this.$store.dispatch('saveUser',user)
            }catch (error) {}
            

            if(this.getUser == null || this.getLogin == null){
                this.AuthProvider('google')
            }
        },
        created(){
            
        }
    }
</script>