<template>
<section class="container-kuesioner">
	<div class="card card-custom gutter-b example example-compact" style="margin-left:auto;margin-right:auto;">
		<div class="card-body">
			<div class="form-group" style="margin-bottom:0px !important;">
				<textarea v-model="title" maxlength="255" class="form-control form-control-lg my-form" id="kt_autosize_1" placeholder="Judul kuesioner" style="font-size:32px;height: 70px;"></textarea>
				<textarea v-model="desc" class="form-control my-3 my-form" id="kt_autosize_2" placeholder="Deskripsi kuesioner"></textarea>
			</div>
		</div>
	</div>

	<div class="row mb-12">
		<div class="col-lg-12">
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-body">
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<textarea class="form-control autosize" placeholder="Pertanyaan" style="font-size:16px;height: 44px;"></textarea>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<div></div>
								<select class="custom-select form-control">
									<option selected="selected">Multiple Choice</option>
									<option value="1">Essay</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="card-header" style="min-height: 60px;border-top: 1px solid #EBEDF3;">
					<h3 class="card-title"></h3>
					<div class="card-toolbar">
						<div class="example-tools justify-content-center">
							<i class="la la-trash icon-2x mx-3" style="cursor:pointer;color: #5f6368 !important;"></i>
							<label class="col-form-label mx-3">Wajib diisi</label>
							<span class="switch switch-icon switch-sm">
								<label>
									<input type="checkbox" checked="checked" name="select" />
									<span></span>
								</label>
							</span>
						</div>
					</div>
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
			title : "",
			desc : "",
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
	.my-form{
		border: none !important;	
	}
	.my-form:focus, .my-form:active{
		border: 1px solid #E4E6EF !important;
	}
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