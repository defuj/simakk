<template>
<section class="container-kuesioner">
	<div class="card card-custom gutter-b example example-compact" style="margin-left:auto;margin-right:auto;">
		<div class="card-body">
			<div class="form-group" style="margin-bottom:0px !important;">
				<textarea maxlength="255" v-model="title" class="form-control form-control-lg" id="kt_autosize_1" placeholder="Judul kuesioner" style="font-size:32px;height: 70px;"></textarea>
				<textarea v-model="desc" class="form-control my-3" id="kt_autosize_2" placeholder="Deskripsi kuesioner"></textarea>
				
			</div>
		</div>
	</div>

	<div class="row mb-12">
		<div class="col-lg-12">
			<!--begin::Card-->
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<span class="card-icon">
							<i class="flaticon2-chat-1 text-primary"></i>
						</span>
						<h3 class="card-label">Card Footer 
						<small>sub title</small></h3>
					</div>
					<div class="card-toolbar">
						<a href="#" class="btn btn-sm btn-success font-weight-bold">
						<i class="flaticon2-cube"></i>Reports</a>
					</div>
				</div>
				<div class="card-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</div>
				<div class="card-footer d-flex justify-content-between">
					<a href="#" class="btn btn-light-primary font-weight-bold">Manage</a>
					<a href="#" class="btn btn-outline-secondary font-weight-bold">Learn more</a>
				</div>
			</div>
			<!--end::Card-->
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
			desc : '',
			question : [],
			isUpdating : false,
        }
	},
	watch:{
		status(){
			if(!this.isUpdating){
				this.UpdateStatus(this.status)
			}
		},
		type(){
			if(!this.isUpdating){
				this.UpdateType(this.type)
			}
		},
		title(){
			if(!this.isUpdating){
				this.UpdateTitle()
			}
			
		},
		desc(){
			if(!this.isUpdating){
				this.UpdateDescription()
			}
		}
	},
    methods :{
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
			this.isUpdating = true
			axios.post('/api/updateTypeKuesioner',{ 
				type : this.type ,
				id : this.GetID()
			}).then(result =>{
				this.isUpdating = false
				console.log((result.data == 0) ? 'type still same' : 'type has been changed')
			});
		},
		UpdateStatus(){
			this.isUpdating = true
			axios.post('/api/updateStatusKuesioner',{ 
				status : this.status,
				id : this.GetID() 
			}).then(result =>{
				this.isUpdating = false
				console.log((result.data == 0) ? 'status still same' : 'status has been changed')
			});
		},
		UpdateTitle(){
			this.isUpdating = true
			axios.post('/api/updateTitleKuesioner',{id : this.GetID(),title : this.title}).then(result=>{
				this.isUpdating = false
				console.log((result.data == 0) ? 'title not update' : 'title has been updated');
			});
		},
		UpdateDescription(){
			this.isUpdating = true
			axios.post('/api/updateDescriptionKuesioner',{id : this.GetID(),desc : this.desc}).then(result=>{
				this.isUpdating = false
				console.log((result.data == 0) ? 'desc not update' : 'desc has been updated');
			});
		},
		AddQuestions(){
			this.isUpdating = true
			axios.post('/api/updateTitleKuesioner',{id : this.GetID()}).then(result=>{
				this.isUpdating = false
			});
		},
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
	@media (min-width: 992px){
		.container-kuesioner{
			max-width: 780px;
			margin-left: auto;
			margin-right: auto;
		}
	}
	
</style>