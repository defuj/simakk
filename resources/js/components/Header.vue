<template>
    <!--begin::Header-->
    <div id="kt_header" class="header flex-column  header-fixed " style="z-index:200">
        <!--begin::Top-->
        <div class="header-top">
            <!--begin::Container-->
            <div class=" container " style="max-width:100%;height: 65px;">
                <!--begin::Left-->
                <div class="d-none d-lg-flex align-items-center">
                    <section v-if="this.$route.name != 'kuesioner'">
                        <router-link to="/forms">
                            <span class="svg-icon svg-icon-3x svg-icon-primary" >
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                            </span>
                        </router-link>
                        

                        <a class="mr-20" >
                            <span class="kuesioner">
                                SIMAKK
                            </span>
                        </a>
                    </section>

                    <section v-if="this.$route.name == 'edit_kesioner'">
                        <router-link to="/">
                            <span class="svg-icon svg-icon-3x svg-icon-primary" >
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                        <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg>
                            </span>
                        </router-link>
                        
                        <a class="mr-20">
                            <span class="kuesioner">
                                Kuesioner
                            </span>
                        </a>
                    </section>
                    
                    
                </div>
                <!--end::Left-->

                <div class="my-search-bar" v-if="this.$route.name == 'home'">
                    <div class="input-group input-group-lg input-group-solid my-search-box">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon svg-icon-dark-50 svg-icon-2x">
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
                <div class="topbar bg-primaryyy">

                    <section v-if="this.$route.name == 'edit_kesioner'" class="d-lg-flex align-items-center">
                        <i class="la la-link icon-2x mx-3" style="cursor:pointer;color: #5f6368 !important;" data-container="body" data-toggle="tooltip" data-theme="dark" data-placement="bottom" title="Salin URL"></i>
                        <i class="la la-eye icon-2x mx-3" style="cursor:pointer;color: #5f6368 !important;" data-container="body" data-toggle="tooltip" data-theme="dark" data-placement="bottom" title="Pertinjau"></i>
                        <i @click="DeleteKuesioner()" class="la la-trash icon-2x mx-3" style="cursor:pointer;color: #5f6368 !important;" data-container="body" data-toggle="tooltip" data-theme="dark" data-placement="bottom" title="Hapus"></i>
                        <i @click="AddQuestion()" class="la la-plus-circle icon-2x mx-3" style="cursor:pointer;color: #5f6368 !important;" data-container="body" data-toggle="tooltip" data-theme="dark" data-placement="bottom" title="Tambah Pertanyaan"></i>
                        <button type="button" class="btn btn-primary font-weight-bolder mx-3" style="width:80px;" data-container="body" data-toggle="tooltip" data-theme="dark" data-placement="bottom" title="Publikasikan Kuesioner">
                            Kirim
                        </button>	
                    </section>
                    
                    <!--begin::User-->
                    <div class="topbar-item">
                        <div class="btn btn-icon btn-hover-transparent-dark w-lg-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle" @click="Relog()">
                            <div class="d-flex flex-column text-right pr-lg-3" v-if="this.$route.name != 'kuesioner'">
                                <span class="text-dark opacity-50 font-weight-bold font-size-sm d-none d-md-inline">
                                    {{getUser.name}}
                                </span>
                                <span class="text-dark font-weight-bolder font-size-sm d-none d-md-inline">
                                    STMIK SUMEDANG
                                </span>
                            </div>
                            <span class="symbol symbol-35 symbol-circle">
                                <img v-bind:src="getUser.picture" alt="image"/>
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
            getSearch(){
                this.search = this.getSearch
            }
        },
        methods :{
            Relog(){
                this.$parent.AuthProvider('google')
            },
            DeleteKuesioner(){
                this.$swal({
                    title : 'Perhatian',
                    text : 'Apakah Anda ingin menghapus kuesioner ini?',
                    icon : 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, lanjutkan',
                    cancelButtonText: 'Tidak'
                }).then((result)=>{
                    if(result.isConfirmed){
                        axios.post('/api/deleteKuesioner',{
                            id : this.GetID()
                        }).then(result=>{
                            if(result.data){
                                this.$swal({
                                    title : 'Berhasil',
                                    text : 'Kuesioner telah berhasil dihapus',
                                    icon : 'success'
                                });
                                this.$router.push({ name: 'home' })
                            }else{
                                this.$swal({
                                    title : 'Oops',
                                    text : 'Gagal menghapus, terjadi kesalahan.',
                                    icon : 'error'
                                });
                            }
                        });
                    }
                });
            },
            GetID() {
                return this.$route.params.id
            },
            AddQuestion(){
                axios.post('/api/addQuestion',{id : this.GetID()}).then(result=>{
                    if(result.data.length > 0){
                        console.log('a question has been added');
                        this.$store.dispatch('addQuestions',result.data)
                    }else{
                        console.log('failed to add a question');
                    }
                });
            },
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
        color: #5f6368;
        margin-left: 16px;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
        vertical-align: middle;

        font-family: 'Google Sans',Roboto,Arial,sans-serif;
        font-size: 18px;
        font-weight: 400;
        line-height: 24px;
    }

    @media (min-width: 992px){
        .header .header-top {
            -webkit-box-shadow: 0 10px 30px 0 rgba(82,63,105,.08);
            box-shadow: 0 10px 30px 0 rgba(82,63,105,.08);
            background: #FFF;
        }
        .my-search-bar{
            position: relative;
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 0px;
            min-width:50%;
        }

        .my-search-box{
            background: #f1f3f4;
            border: 1px solid transparent;
            -webkit-border-radius: 8px;
            border-radius: 8px;
            max-width: 720px;
            position: relative;
            -webkit-transition: background 100ms ease-in,width 100ms ease-out;
            transition: background 100ms ease-in,width 100ms ease-out;
        }

        .my-search-input{
            color : #5f6368;
            padding-left: 0px;
            font-size: 16px;
        }
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color:  #a7a8aa;
            opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color:  #a7a8aa;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
            color:  #a7a8aa;
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
