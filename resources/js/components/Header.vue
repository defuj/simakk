<template>
    <!--begin::Header-->
    <div id="kt_header" class="header flex-column  header-fixed ">
        <!--begin::Top-->
        <div class="header-top">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Left-->
                <div class="d-none d-lg-flex align-items-center mr-3">
                    <!--begin::Tab Navs(for desktop mode)-->
                    <ul class="header-tabs nav font-size-lg" role="tablist">
                        <!--begin::Item-->
                        <li class="nav-item">
                            <router-link to="/" class="nav-link px-6" data-toggle="tab" data-target="#kt_header_tab_1" role="tab">
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
            }
        },
        methods :{
            Relog(){
                this.$parent.AuthProvider('google')
            }
        },
        computed:{
            getUser(){
                return this.$store.getters.getUser
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
