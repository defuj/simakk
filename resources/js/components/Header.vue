<template>
    <!--begin::Header-->
    <div id="kt_header" class="header flex-column  header-fixed ">
        <!--begin::Top-->
        <div class="header-top">
            <!--begin::Container-->
            <div class=" container " style="max-width:100%;height: 65px;">
                <!--begin::Left-->
                <div class="d-none d-lg-flex align-items-center">
                    <router-link to="/" exact class="mr-20">
                        <img alt="Logo" :src="this.$parent.GetLogo()" class="max-h-35px">
                        <span class="kuesioner">SIMAKK</span>
                    </router-link>
                    <!--begin::Tab Navs(for desktop mode)-->
                    <ul class="header-tabs nav font-size-lg" role="tablist" style="display:none;">
                        <!--begin::Item-->
                        <li class="nav-item">
                            <router-link to="/" exact class="nav-link px-6" data-toggle="tab" data-target="#kt_header_tab_1" role="tab">
                                Home
                            </router-link>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <router-link to="/team" class="nav-link px-6" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">
                                Team
                            </router-link>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="nav-item mr-3">
                            <router-link to="/about" class="nav-link px-6" data-toggle="tab" data-target="#kt_header_tab_2" role="tab">
                                About
                            </router-link>
                        </li>
                        <!--end::Item-->
                    </ul>
                    <!--begin::Tab Navs-->
                </div>
                <!--end::Left-->

                <div class="my-search-bar" v-if="this.$route.name == 'home'">
                    <div class="input-group input-group-lg input-group-solid my-search-box">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon svg-icon-white svg-icon-2x">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="1"></path>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                            </span>
                        </div>
                        <input :v-value="this.search" v-model="search" type="text" class="form-control my-search-input" id="kt_subheader_search_form" :placeholder="'Cari kuesioner'">
                        
                    </div>
                </div>

                <!--begin::Topbar-->
                <div class="topbar bg-primary">
                    
                    <!--begin::User-->
                    <div class="topbar-item">
                        <div class="btn btn-icon btn-hover-transparent-white w-lg-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle" @click="Relog()">
                            <div class="d-flex flex-column text-right pr-lg-3">
                                <span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-md-inline">
                                    {{getUser.name}}
                                </span>
                                <span class="text-white font-weight-bolder font-size-sm d-none d-md-inline">
                                    STMIK SUMEDANG
                                </span>
                            </div>
                            <span class="symbol symbol-35">
                                <span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30">
                                    <img v-bind:src="getUser.picture" style="width:24px;"/>
                                </span>
                            </span>
                        </div>
                    </div>
                    <!--end::User-->
                 </div>
                <!--end::Topbar-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Top-->
    </div>
    <!--end::Header-->
</template>

<script>
    import App from '../App.vue';
    export default {
        data() {
            return {
                logged : false,
                search : null,
            }
        },
        watch:{
            search(){
                this.$store.dispatch('updateSearch',this.search)
                //console.log(this.getSearch)
            },
        },
        methods :{
            Relog(){
                this.$parent.AuthProvider('google')
            }
        },
        computed:{
            getUser(){
                return this.$store.getters.getUser
            },
            getSearch(){
                return this.$store.getters.getSearch
            }
        }
    }
</script>

<style>
@media (min-width: 992px){
    .header-tabs .nav-item .nav-link {
        border-bottom-left-radius: 0.42rem;
        border-bottom-right-radius: 0.42rem;
    }

    .header-fixed .header {
        height: 0px !important;
    }

    .header-fixed .wrapper {
        padding-top: 80px;
    }
}

@media (max-width: 991.98px){
    .header-mobile-fixed .wrapper {
        padding-top: 40px;
    }
}
</style>

<style scoped>
    .kuesioner {
        color: #FFFFFF;
        margin-left: 16px;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
        font-family: 'Product Sans',Arial,sans-serif;
        font-size: 30px;
        vertical-align: middle;
        font-weight: 500;
    }

    @media (min-width: 992px){
        .my-search-bar{
            position: relative;
            margin-top: auto;
            margin-bottom: auto;
            margin-left: -80px;
            min-width:50%;
        }

        .my-search-box{
            background: #108ac7;
            border: 1px solid transparent;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            max-width: 720px;
            position: relative;
            -webkit-transition: background 100ms ease-in,width 100ms ease-out;
            transition: background 100ms ease-in,width 100ms ease-out;
        }

        .my-search-input{
            color : #FFFFFF;
            padding-left: 0px;
            font-size: 16px;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color:  #ffffffc0;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color:  #ffffffc0;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            color:  #ffffffc0;
        }
    }

    @media (max-width: 991.98px){
        .my-search-bar{
            display: none;
        }
        .my-search-box{
            display: none;
        }
    }

    
</style>
