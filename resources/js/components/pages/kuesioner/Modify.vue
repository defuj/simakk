<template>
<section>
	<div class="card card-custom card-sticky" id="kt_page_sticky_card" style="margin-top: 50px;margin-bottom: 50px;">
		<div class="card-header">
			<div class="card-title">
				<a href="#" class="btn btn-light-primary font-weight-bolder mr-2" style="display:none;">
					<i class="ki ki-long-arrow-back icon-sm"></i>
					Back
				</a>
				<section style="margin-left:10px;">
					<input :value="this.type" v-model="type" v-on:change="UpdateType()" data-switch="true" type="checkbox" data-on-text="Publish" data-handle-width="55" data-off-text="Draf" data-on-color="primary"/>
				</section>

				<section style="margin-left:10px;">
					<input :value="this.status" v-model="status" v-on:change="UpdateStatus()" data-switch="true" type="checkbox" data-on-text="Enable" data-handle-width="55" data-off-text="Disable" data-on-color="primary"/>
				</section>
			
			</div>
			<div class="card-toolbar">
				<a href="#" class="btn btn-icon" style="margin-right:10px;" @click="DeleteKuesioner()">
					<i class="flaticon2-trash"></i>
				</a>
				<a href="#" class="btn btn-icon" style="margin-right:10px;">
					<i class="flaticon2-plus-1"></i>
				</a>
				<div class="btn-group" style="display:none;">
					<button type="button" class="btn btn-light-primary font-weight-bolder">
					<i class="ki ki-plus icon-sm"></i>Tambah Pertanyaan</button>
				</div>			
			</div>
		</div>
	</div>

	
</section>
</template>

<script>
export default {
    data(){
        return{
			status : null,
			type : null,
			title : '',
			desc : ''
        }
	},
	watch:{
		status(){
			this.UpdateStatus(this.status)
		},
		type(){
			this.UpdateType(this.type)
		}
	},
    methods :{
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
		GetKuesioner(ID){
			axios.post('/api/getKuesioner',{kode : ID}).then(result =>{
				if(result.data.questionnaire_type == undefined){
					this.$router.push({ name: 'not_found' })
				}else{
					var data = result.data
					this.status = data.questionnaire_status == 'enable' ? true : false;
					this.type = data.questionnaire_type == 'publish' ? true : false;
					this.title = data.questionnaire_title
					this.desc = data.questionnaire_description
				}
				
			});
		},
		UpdateType(){
			axios.post('/api/updateTypeKuesioner',{ 
				type : this.type ,
				id : this.GetID()
			}).then(result =>{
				console.log((result.data == 0) ? 'type still same' : 'type has been changed')
			});
		},
		UpdateStatus(){
			axios.post('/api/updateStatusKuesioner',{ 
				status : this.status,
				id : this.GetID() 
			}).then(result =>{
				console.log((result.data == 0) ? 'status still same' : 'status has been changed')
			});
		}
	},
    mounted(){
        this.GetKuesioner(this.GetID())
    }
}
</script>

<style scoped>
	.card-sticky-on .card.card-custom.card-sticky > .card-header{
		margin-top: -96px !important;
		width: 100%;
    	margin-left: -10%;
	}
</style>