<template>
<!--begin::Login-->
<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login" style="min-height:100%">
    <!--begin::Aside-->
    <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(media/bg/bg-4.jpg);">
        <!--begin: Aside Container-->
        <div class="d-flex flex-row-fluid flex-column justify-content-between">
            <!--begin: Aside header-->
            <a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
				<img src="" class="max-h-100px" alt=""/>
			</a>
            <!--end: Aside header-->

            <!--begin: Aside content-->
            <div class="flex-column-fluid d-flex flex-column justify-content-center">
                <h3 class="font-size-h1 mb-5 text-white">Welcome to SIMAKK</h3>
                <p class="font-weight-lighter text-white opacity-80">
                    Sistem Manajemen Kuesioner Kampus, Sekolah Tinggi Manajemen Informatika & Komputer Sumedang 
                </p>
            </div>
            <!--end: Aside content-->

            <!--begin: Aside footer for desktop-->
            <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                <div class="opacity-70 font-weight-bold	text-white">
                    &copy; 2020 STMIK Sumedang
                </div>
                <div class="d-flex">
                    <a href="https://stmik-sumedang.ac.id/" target="_blank" class="text-white">
                        Kunjungi Kampus
                    </a>
                </div>
            </div>
            <!--end: Aside footer for desktop-->
        </div>
        <!--end: Aside Container-->
    </div>
    <!--begin::Aside-->

    <!--begin::Content-->
    <div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
        <!--begin::Content body-->
        <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
            <!--begin::Signin-->
            <div class="login-form login-signin">
                <div class="text-center mb-10 mb-lg-20">
                    <h3 class="font-size-h1">Sign In</h3>
                    <p class="text-muted font-weight-bold">Harap menggunakan email stmik-sumedang.ac.id</p>
                    <button type="button" class="btn btn-light-primary font-weight-bolder px-8 py-4 my-3 font-size-lg" @click="Login()">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/social-icons/google.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z" fill="#4285F4"></path>
                                <path d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z" fill="#34A853"></path>
                                <path d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z" fill="#FBBC05"></path>
                                <path d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z" fill="#EB4335"></path>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>Sign in with Google
                    </button>

                    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert" v-if="getStatusLogin() == 'failed'">
                        <div class="alert-icon">
                            <i class="flaticon-warning"></i>
                        </div>
                        <div class="alert-text">Email yang digunakan tidak didukung!</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                    <i class="ki ki-close"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!--end::Signin-->
        </div>
        <!--end::Content body-->

		<!--begin::Content footer for mobile-->
		<div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
			<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
				&copy; 2020 Metronic
			</div>
			<div class="d-flex order-1 order-sm-2 my-2">
				<a href="#" class="text-dark-75 text-hover-primary">Privacy</a>
				<a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>
				<a href="#" class="text-dark-75 text-hover-primary ml-4">Contact</a>
			</div>
		</div>
		<!--end::Content footer for mobile-->
    </div>
    <!--end::Content-->
</div>
<!--end::Login-->
</template>

<style scoped>
    @import '../../../../public/css/pages/login/classic/login-1.css';
</style>

<style>
#app{
        min-height: 100% !important;
    }
</style>

<script>
    export default {
        methods :{
            Login(){
                this.$parent.AuthProvider('google')
            },
            getStatusLogin(){
                return this.$parent.GetLoginStatus()
            }
        },
    }
</script>