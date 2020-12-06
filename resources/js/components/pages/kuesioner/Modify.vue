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
		<div class="col-lg-12" v-for="(data, index) in question" :item="data" :index="index" :key="data.question_id">
			<div class="card card-custom gutter-b example example-compact">
				<div class="card-body">
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<textarea-autosize :min-height="46" :max-height="500" @input="UpdateQuestionContent(index)" class="form-control autosize" v-model="question[index].question_content" placeholder="Pertanyaan" style="font-size:16px;height: 44px;">{{question[index].question_content}}</textarea-autosize>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<div></div>
								<select class="custom-select form-control" v-model="question[index].question_type" @change="UpdateQuestionType(index)">
									<option v-for="type in questionType" :key="type.id" :value="type.type" :selected="type.type === data.question_type">{{type.type}}</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row my-3" v-if="data.question_type === 'Skala Linier'">
						<div class="col-md-2 col-sm-6">
							<div class="form-group">
								<select class="custom-select form-control" v-model="data.minimum" @change="UpdateSkalaMinimum(index)">
									<option v-for="n in 2" :key="n" :value="n-1" :selected="n-data.minimum === data.minimum">{{n-1}}</option>
								</select>
							</div>
						</div>
						<div class="col-md-1 col-sm-6 mr-3">
							<div class="form-group">
								<label for="example-month-input" class="col-form-label">Sampai</label>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="form-group">
								<select class="custom-select form-control" v-model="data.maximum" @change="UpdateSkalaMaximum(index)">
									<option v-for="n in 9" :key="n" :value="n+data.minimum" :selected="n+data.minimum === data.maximum">{{n+data.minimum}}</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row" v-if="question[index].question_type === 'Skala Linier'">
						<div class="col-md-1 col-sm-6">
							<div class="form-group">
								<label for="example-month-input" class="col-form-label">{{data.minimum}}</label>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<input v-model="data.label_minimum" @input="UpdateLabelMinumum(index)" type="text" class="form-control" placeholder="Label (opsional)">
							</div>
						</div>
					</div>
					<div class="row" v-if="data.question_type === 'Skala Linier'">
						<div class="col-md-1 col-sm-6">
							<div class="form-group">
								<label for="example-month-input" class="col-form-label">{{data.maximum}}</label>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<input type="text" v-model="data.label_maximum" @input="UpdateLabelMaximum(index)" class="form-control" placeholder="Label (opsional)">
							</div>
						</div>
					</div>
					<div class="row" v-if="data.question_type === ''">
						
					</div>
				</div>
				<div class="card-footer bg-gray-100 border-top-0" v-if="data.question_type === 'Pilihan Ganda'">
					<div class="row align-items-center mb-3">
						<div class="col text-left">Opsi jawaban : </div>
					</div>
					<div class="row">
						<div class="col-md-11 col-sm-11">
							<textarea-autosize :min-height="24" :max-height="500" type="text" class="form-control" placeholder="Opsi"></textarea-autosize>
						</div>
						<div class="col-md-1 col-sm-1">
							<a href="#" class="btn btn-icon btn-light-secondary btn-circle">
								<i class="flaticon2-cross" style="color: #969698 !important;"></i>
							</a>
						</div>
						
					</div>
				</div>
				<div class="card-header" style="min-height: 60px;border-top: 1px solid #EBEDF3;">
					<h3 class="card-title">
						<button v-if="data.question_type === 'Pilihan Ganda'" type="button" class="btn btn-sm font-weight-normal btn-primary mr-2">Tambahkan opsi</button>
					</h3>
					<div class="card-toolbar">
						<div class="example-tools justify-content-center">
							<i @click="DeleteQuestion(index)" class="la la-trash icon-2x mx-3" style="cursor:pointer;color: #5f6368 !important;"></i>
							<label class="col-form-label mx-3">Wajib diisi</label>
							<span class="switch switch-icon switch-sm">
								<label>
									<input type="checkbox" name="select" v-model="question[index].question_require" @change="UpdateRequired(index)"/>
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
			questionType : [],
			isUpdating : false,
			skala_linier : []
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
		},
		getQuestions(){
			if(this.$store.getters.getQuestions.length > this.question.length){
				this.question = this.$store.getters.getQuestions
			}
		},
		question(){
			if(this.question.length > 0){
				for(var i =0;i<this.question.length;i++){
					var data = this.question[i]
				}
			}
		}
	},
    methods :{
		UpdateSkalaMinimum(index){
			if(this.question[index].maximum <= this.question[index].minimum){
				this.question[index].maximum +=1 
				this.UpdateSkalaMaximumCustom(index,this.question[index].maximum)
			}
			
			axios.post('/api/updateSkalaMinimum',{
				id : this.question[index].question_id,
				minimum : this.question[index].minimum
			}).then(result=>{
				console.log(result.data == 1 ? 'success updated minimum' : 'failed updated minimum');
			})
		},
		UpdateSkalaMaximumCustom(index,max){
			axios.post('/api/updateSkalaMaximum',{
				id : this.question[index].question_id,
				maximum : max
			}).then(result=>{
				console.log(result.data == 1 ? 'success updated maximum' : 'failed updated maximum');
			})
		},
		UpdateSkalaMaximum(index){
			axios.post('/api/updateSkalaMaximum',{
				id : this.question[index].question_id,
				maximum : this.question[index].maximum
			}).then(result=>{
				console.log(result.data == 1 ? 'success updated maximum' : 'failed updated maximum');
			})
		},
		UpdateLabelMinumum(index){
			console.log(this.question[index].label_minimum);
			axios.post('/api/updateLabelMinimum',{
					id : this.question[index].question_id,
					label : this.question[index].label_minimum
			}).then(result=>{
				
			})
		},
		UpdateLabelMaximum(index){
			console.log(this.question[index].label_maximum);
			axios.post('/api/updateLabelMaximum',{
					id : this.question[index].question_id,
					label : this.question[index].label_maximum
				}).then(result=>{
				
			})
		},
        GetID() {
            return this.$route.params.id
		},
		GetQuestionType(){
			axios.get('/api/getQuestionType').then(result =>{
				if(result.data.length > 0){
					this.questionType = result.data
				}
			});
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
		GetQuestion(){
			axios.post('/api/getQuestion',{id : this.GetID()}).then(result=>{
				this.question = result.data
			});
		},
		UpdateQuestionType(index){
			this.isUpdating = true
			axios.post('/api/updateQuestionType',{
				question_id : this.question[index].question_id,
				question_type : this.question[index].question_type
			}).then(result=>{
				this.isUpdating = false
				var type = this.question[index].question_type
				//console.log((result.data == 0) ? 'type still same : '+type : 'type has been changed to : '+type)

				if(this.question[index].question_type === 'Skala Linier'){

				}
			});
		},
		UpdateRequired(index){
			this.isUpdating = true
			axios.post('/api/updateQuestionRequire',{
				question_id : this.question[index].question_id,
				question_require : this.question[index].question_require,
				questionnaire_id : this.GetID()
			}).then(result=>{
				this.isUpdating = false
				console.log((result.data == 0) ? 'require still same' : 'require has been changed')
			});
		},
		UpdateQuestionContent(index){
			this.isUpdating = true
			console.log(this.question[index].question_content);
			axios.post('/api/updateQuestionContent',{
				question_id : this.question[index].question_id,
				question_content : this.question[index].question_content
			}).then(result=>{
				this.isUpdating = false
				console.log((result.data == 0) ? 'content still same' : 'content has been changed')
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
		DeleteQuestion(index){
			this.$swal({
				title : 'Perhatian',
				text : 'Apakah Anda ingin menghapus pertanyaan ini?',
				icon : 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya, lanjutkan',
				cancelButtonText: 'Tidak'
			}).then((result)=>{
				if(result.isConfirmed){
					axios.post('/api/deleteQuestion',{
						id : this.question[index].question_id
					}).then(result=>{
						if(result.data){
							this.question.splice(index,1)
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
		AddQuestions(){
			this.isUpdating = true
			axios.post('/api/updateTitleKuesioner',{id : this.GetID()}).then(result=>{
				this.isUpdating = false
			});
		},
	},
    mounted(){
		this.GetKuesioner(this.GetID())
		this.GetQuestion()
		this.GetQuestionType()
	},
	computed:{
		getQuestions(){
            return this.$store.getters.getQuestions
        },
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