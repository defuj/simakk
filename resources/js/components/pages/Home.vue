<template>
<section>
    <div class="row">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap" style="padding:15px !important;">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Mulai kuesioner baru</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <div class="form-group" style="margin-bottom: 0px;">
                    <select class="custom-select form-control" v-model="categorySelected">
                        <option value="0" selected>Semua Kategori</option>
                        <option v-for="category in categories" :key="category.id" :value="category.id" :selected="category.id === categorySelected">{{category.category}}</option>
                    </select>
                </div>
                <!--begin::Button-->
                <button class="btn btn-primary font-weight-bold ml-2" @click="ShowAll()">Semua</button>
                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3">
            <!--begin::Stats Widget 16-->
            <a class="card card-custom card-stretch gutter-b" @click="CreateNew()" style="cursor:pointer;">
                <!--begin::Body-->
                <div class="card-body bg-menu bgi-no-repeat">
                    <span class="svg-icon svg-icon-info svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Shopping/Cart3.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/>
                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">Buat baru</div>
                    <div class="font-weight-bold text-inverse-white font-size-sm">Buat kesioner manual</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 16-->
        </div>
        <div class="col-xl-3" v-for="kuesioner in templates" :key="kuesioner.questionnaire_id">
            <!--begin::Stats Widget 16-->
            <a class="card card-custom card-stretch gutter-b" style="cursor:pointer;" @click="DuplicateKuesioner(kuesioner.questionnaire_id)">
                <!--begin::Body-->
                <div class="card-body bg-menu bgi-no-repeat">
                    <span class="svg-icon svg-icon-info svg-icon-3x ml-n1">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Shopping/Cart3.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <div class="text-inverse-white font-weight-bolder font-size-h5 mb-2 mt-5">{{kuesioner.category}}</div>
                    <div class="font-weight-bold text-inverse-white font-size-sm">Template Kuesioner</div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Stats Widget 16-->
        </div>
    </div>

    <div class="row">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap" style="padding:15px !important;">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Kuesioner terbaru</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{total}} Total</span>

                    <div class="input-group input-group-sm input-group-solid" style="width:300px;margin-left:24px;display:none;">
                        <input type="text" :v-value="this.search" class="form-control" id="kt_subheader_search_form" :placeholder="'Cari...'" v-model="search">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <span class="svg-icon">
                                    <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/General/Search.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <button class="btn btn-primary font-weight-bold ml-2" @click="ShowAll()">Lihat Semua</button>
                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3" v-for="kuesioner in kuesioners" :key="kuesioner.questionnaire_id">
            <!--begin::Card-->
            <div class="card card-custom gutter-b card-stretch">
                <a style="min-height: 120px;cursor:pointer;" @click="OpenKuesioner(kuesioner.questionnaire_id)">
                    <!--begin::Body-->
                    <div class="card-body" style="padding: 1.2rem !important;">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center">
                            <!--begin::Info-->
                            <div class="d-flex flex-column mr-auto">
                                <!--begin: Title-->
                                <div class="d-flex flex-column text-dark font-size-h5 font-weight-bolder" v-if="kuesioner.questionnaire_title != ''">
                                    {{kuesioner.questionnaire_title.length > 27 ? kuesioner.questionnaire_title.substring(0, 27 - 3) + "..." : kuesioner.questionnaire_title}}
                                </div>
                                <div class="d-flex flex-column text-dark font-size-h5 font-weight-bolder" v-else>
                                    Belum diberikan judul
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Description-->
                        <div class="font-size-sm text-dark" v-if="kuesioner.questionnaire_description != ''">
                            {{kuesioner.questionnaire_description.length > 100 ? kuesioner.questionnaire_description.substring(0, 100 - 3) + "..." : kuesioner.questionnaire_description}}
                        </div>
                        <div class="font-size-sm text-dark" v-else>
                            {{'Belum memiliki deskripsi'}}
                        </div>
                        <!--end::Description-->
                        
                    </div>
                    <!--end::Body-->
                </a>
                

                <!--begin::Footer-->
                <div class="card-footer d-flex align-items-center" style="padding: 1rem !important;">
                    <div class="d-flex"  style="width:100%;">
                        <div class="d-flex align-items-center mr-7" style="width:100%;">
                            <span class="svg-icon svg-icon-gray-500">
                                <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Text/Bullet-list.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                        <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" fill="#000000"/>
                                        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <a class="font-size-sm ml-2 text-dark"> 
                                {{kuesioner.questionnaire_type.toUpperCase()}}
                            </a>
                        </div>
                        <i class="icon-me far fa-trash-alt" style="cursor:pointer;margin-top: 2px;" @click="DeleteKuesioner(kuesioner.questionnaire_id)"></i>
                    </div>
                </div>
                <!--end::Footer-->
            </div>
            <!--end:: Card-->
        </div>
    </div>

</section>
</template>

<style scoped>
    .bg-menu{
        background-position: right top;
        background-size: 30% auto;
        background-image: url(/media/svg/shapes/abstract-4.svg);
    }
</style>

<script>
export default {
    props : ['home'],
    data(){
        return {
            limit : 8,
            total : 0,
            kuesioners : [],
            kuesionersAll : [],
            search : this.getSearch,
            categories : [],
            categorySelected : 0,
            templates : [],
        }
    },
    watch : {
        search(){
            if(this.search.length > 0){
                this.SearchKuesioner(this.search)
            }else{
                this.GetKuesioner()
            }
        },
        getSearch(){
            if(this.getSearch.length > 0){
                this.SearchKuesioner(this.getSearch)
            }else{
                this.GetKuesioner()
            }
        },
        categorySelected(){
            this.GetTemplates()
        }
    },
    methods:{
        GetTemplates(){
            axios.post('/api/getTemplates',{id : this.categorySelected}).then(result=>{
                this.templates = result.data
                //console.log(this.categorySelected);
                //console.log(result.data);
            })
        },
        GetCategories(){
            axios.get('/api/getCategories').then(result=>{
                this.categories = result.data
            })
        },
        OpenKuesioner(id){
            window.location.href = '/q/'+id
        },
        SearchKuesioner(keyword){
            if(this.kuesionersAll.length > 0){
                this.kuesioners = []
                this.total = 0

                /*
                for(var i =0;i<this.kuesionersAll.length;i++){
                    if(this.kuesionersAll[i].questionnaire_title.includes(keyword)){
                        this.kuesioners.push(this.kuesionersAll[i])
                        this.total +=1
                    }
                }
                */
                for(var result in this.kuesionersAll){
                    if(this.kuesionersAll[result].questionnaire_title.toLowerCase().includes(keyword.toLowerCase())){
                        this.kuesioners.push(this.kuesionersAll[result])
                        this.total +=1
                    }
                }
            }
        },
        ShowAll(){
            this.limit = 0
            this.search = ''
            this.GetKuesioner()
            this.$store.dispatch('updateSearch','')
        },
        GetKuesioner(){
            axios.get('/api/kuesioner').then((result) => {
                this.total = result.data.length
                this.kuesionersAll = result.data

                console.log(this.total)
                if(this.limit == 8){
                    if(result.data.length > 8){
                        this.kuesioners = []
                        for(var i =0;i<8;i++){
                            this.kuesioners.push(result.data[i])
                        }
                    }else{
                        this.kuesioners = result.data
                    }
                }else{
                    this.kuesioners = this.kuesionersAll
                }
            })
        },
        CreateNew(){
            this.$swal({
                title : 'Sedang membuat kuesioner ....',
                timerProgressBar: true,
                showConfirmButton: false,
                allowOutsideClick : false,
                willOpen: () => {
                    this.$swal.showLoading()
                },
                willClose:() => {

                },
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    this.$swal({
                        title : 'Selesai',
                        text : 'Kuesioner telah berhasil dibuat',
                        icon : 'success'
                    });
                }
            });

            axios.get('/api/createKuesioner').then(result =>{
                this.$swal.close();
                if(result.data.result){
                    this.$router.push('q/'+result.data.id);
                }else{
                    this.$swal({
                        title: 'Oops',
                        text: 'Untuk saat ini fitur tidak dapat digunakan',
                        icon: 'warning',
                        timer:3000,
                        confirmButtonText: 'Oke, saya mengerti',
                    });
                }
            }).catch(err => {
                this.$swal.close();
                this.$swal({
                    title: 'Oops',
                    text: 'Telah terjadi kesalahan',
                    icon: 'error',
                    timer:3000,
                    confirmButtonText : 'Oke, saya mengerti'
                });
            });
            
        },
        DeleteKuesioner(kuesioner_id){
            this.$swal({
                title : 'Perhatian',
                text : 'Apakah Anda ingin menghapus kuesioner ini?',
                icon : 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan',
                cancelButtonText: 'Tidak'
            }).then((result)=>{
                if(result.isConfirmed){
                    console.log(kuesioner_id)
                    axios.post('/api/deleteKuesioner',{
                        id : kuesioner_id
                    }).then(result=>{
                        console.log(result.data)
                        if(result.data){
                            this.GetKuesioner()
                            this.$router.push('/');
                            this.$swal({
                                title : 'Berhasil',
                                text : 'Kuesioner telah berhasil dihapus',
                                icon : 'success'
                            });
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
        DuplicateKuesioner(kuesioner_id){
            this.$swal({
                title : 'Perhatian',
                text : 'Apakah Anda ingin membuat kuesioner dari template ini?',
                icon : 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, lanjutkan',
                cancelButtonText: 'Tidak'
            }).then((result)=>{
                if(result.isConfirmed){
                    this.$swal({
                        title : 'Sedang menyiapkan ....',
                        timerProgressBar: true,
                        allowOutsideClick : false,
                        showConfirmButton: false,
                        willOpen: () => {
                            this.$swal.showLoading()
                        },
                    })

                    axios.post('/api/duplicateKuesioner',{id : kuesioner_id}).then(result=>{
                        if(result.data.result){
                            this.$swal.close();
                            this.$router.push('q/'+result.data.id);
                        }else{
                            this.$swal.close();
                            this.$swal({
                                title: 'Oops',
                                text: 'Gagal membuat kesioner baru',
                                icon: 'error',
                                timer:3000,
                                confirmButtonText: 'Oke, saya mengerti',
                            });
                        }
                    }).catch(err=>{
                        this.$swal.close();
                        this.$swal({
                            title: 'Oops',
                            text: 'Gagal membuat kesioner baru',
                            icon: 'error',
                            timer:3000,
                            confirmButtonText: 'Oke, saya mengerti',
                        });
                    })
                }
            });
        }
    },
    computed:{
        getSearch(){
            return this.$store.getters.getSearch
        },
    },
    mounted(){
        this.GetKuesioner()
        this.GetCategories()
        this.GetTemplates()
    }
}
</script>