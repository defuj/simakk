<template>
<section class="container-kuesioner" style="margin-top:30px;">
	<div class="card card-custom gutter-b example example-compact" style="margin-left:auto;margin-right:auto;">
		<div class="card-body">
			<div class="form-group" style="margin-bottom:0px !important;">
				<textarea-autosize :min-height="40" :max-height="500" v-model="title" maxlength="255" class="form-control form-control-lg my-form" rows="1" placeholder="Judul kuesioner" style="font-size:32px;"></textarea-autosize>
				<textarea-autosize v-model="desc" class="form-control my-3 my-form" rows="1" placeholder="Deskripsi kuesioner"></textarea-autosize>
			</div>
		</div>
	</div>

	<div class="row mb-12">
		<div class="col-lg-12" v-for="(data, index) in question" :item="data" :index="index" :key="data.question_id">
			<div class="card card-custom gutter-b example example-compact btn-shadow">
				<div class="card-body">
					<div class="row">
						<div class="col-md-9 col-sm-12">
							<textarea-autosize :min-height="40" :max-height="500" @input="UpdateQuestionContent(index)" class="form-control input-question my-form" v-model="question[index].question_content" placeholder="Pertanyaan atau Pernyataan" rows="1" style="font-size:16px;">{{question[index].question_content}}</textarea-autosize>
						</div>
						<div class="col-md-3 col-sm-12">
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
					<div class="row my-2" v-for="(option,i) in options" :key="option.id" :index="i" v-show="option.question_id === data.question_id && data.question_type === 'Pilihan Ganda'">
						
						<div class="col-md-11 col-sm-11" v-if="option.question_id === data.question_id">
							<textarea-autosize v-model="option.choice" @input="UpdateOptions(i)" :min-height="24" :max-height="500" type="text" class="form-control option-input my-form my-options" rows="1" :placeholder="'Opsi pertanyaan'">{{option.choice}}</textarea-autosize>
						</div>
						<div class="col-md-1 col-sm-1" v-if="option.question_id == data.question_id">
							<a href="#" class="btn btn-text-dark btn-hover-text-dark" @click="DeleteOptions(option.id,i)" style="pointer:cursor;">
								<i class="flaticon2-cross icon-nm" style="color:#969698 !important;"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="card-header" style="min-height: 60px;border-top: 1px solid #EBEDF3;">
					<h3 class="card-title">
						<button @click="AddOptions(index)" v-if="data.question_type === 'Pilihan Ganda'" type="button" class="btn btn-sm font-weight-normal btn-primary mr-2">Tambahkan opsi</button>
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
			options : [],
			timer : '',
			timerInterval : 3000
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
			var tm
			if(!this.isUpdating){
				clearTimeout(tm)
				tm = setTimeout(() => {
					if(this.title.length > 0){
						this.UpdateTitle()
					}
				}, this.timerInterval);
			}
		},
		desc(){
			if(!this.isUpdating){
				if(this.desc.length > 0){
					clearTimeout(this.timer)
					this.timer = setTimeout(() => {
						this.UpdateDescription()
					}, this.timerInterval);
				}
			}
		},
		getQuestions(){
			if(this.$store.getters.getQuestions.length > this.question.length){
				var data = this.$store.getters.getQuestions
				this.question.push(data[data.length-1])
				//this.GetAllOptions()
			}
		},
		question(){
			if(this.question.length > 0){
				for(var i =0;i<this.question.length;i++){
					var data = this.question[i]
				}
				this.GetAllOptions()
			}
			
		}
	},
    methods :{
		AddOptions(index){
			axios.post('/api/addOptions',{id : this.question[index].question_id}).then(result=>{
				if(result.data === 1){
					this.GetAllOptions()
				}else{
					this.ShowToast('Gagal menambahkan opsi','error')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menambahkan opsi','error')
			})
		},
		UpdateOptions(index){
			clearTimeout(this.timer)
			this.timer = setTimeout(() => {
				axios.post('/api/updateOptions',{
					id : this.options[index].id,
					choice : this.options[index].choice
				}).then(result=>{
					//console.log(result.data == 1 ? 'option has been updated' : '');
					if(result.data === 1){
						this.ShowToast('Perubahan telah disimpan','success')
					}
				}).catch(err=>{
					this.ShowToast('Gagal menyimpan perubahan','error')
				})
			}, this.timerInterval);

			
		},
		DeleteOptions(ID,index){
			axios.post('/api/deleteOptions',{id : ID}).then(result=>{
				if(result.data === 1){
					this.options.splice(index,1)
				}else{
					this.ShowToast('Gagal menghapus opsi','error')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menghapus opsi','error')
			})
		},
		UpdateSkalaMinimum(index){
			if(this.question[index].maximum <= this.question[index].minimum){
				this.question[index].maximum +=1 
				this.UpdateSkalaMaximumCustom(index,this.question[index].maximum)
			}
			
			axios.post('/api/updateSkalaMinimum',{
				id : this.question[index].question_id,
				minimum : this.question[index].minimum
			}).then(result=>{
				//console.log(result.data == 1 ? 'success updated minimum' : 'failed updated minimum');
				if(result.data === 1){
					this.ShowToast('Perubahan telah disimpan','success')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateSkalaMaximumCustom(index,max){
			axios.post('/api/updateSkalaMaximum',{
				id : this.question[index].question_id,
				maximum : max
			}).then(result=>{
				//console.log(result.data == 1 ? 'success updated maximum' : 'failed updated maximum');
				if(result.data === 1){
					this.ShowToast('Perubahan telah disimpan','success')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateSkalaMaximum(index){
			axios.post('/api/updateSkalaMaximum',{
				id : this.question[index].question_id,
				maximum : this.question[index].maximum
			}).then(result=>{
				//console.log(result.data == 1 ? 'success updated maximum' : 'failed updated maximum');
				if(result.data === 1){
					this.ShowToast('Perubahan telah disimpan','success')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateLabelMinumum(index){
			clearTimeout(this.timer)
			this.timer = setTimeout(() => {
				axios.post('/api/updateLabelMinimum',{
						id : this.question[index].question_id,
						label : this.question[index].label_minimum
				}).then(result=>{
					if(result.data === 1){
						this.ShowToast('Perubahan telah disimpan','success')
					}
				}).catch(err=>{
					this.ShowToast('Gagal menyimpan perubahan','error')
				})
			}, this.timerInterval);
			
		},
		UpdateLabelMaximum(index){
			clearTimeout(this.timer)
			this.timer = setTimeout(() => {
				axios.post('/api/updateLabelMaximum',{
						id : this.question[index].question_id,
						label : this.question[index].label_maximum
				}).then(result=>{
					if(result.data === 1){
						this.ShowToast('Perubahan telah disimpan','success')
					}
				}).catch(err=>{
					this.ShowToast('Gagal menyimpan perubahan','error')
				})
			}, this.timerInterval);

			
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
		GetAllOptions(){
			axios.post('/api/getOptions',{questionnaire_id : this.GetID()}).then(result=>{
				this.options = result.data
			})
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
				if(result.data === 1){
					this.ShowToast('Perubahan telah disimpan','success')
					setTimeout(() => console.log('Mengambil perubahan'), 500);
					this.GetQuestion()
				}
			}).catch(err=>{
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateRequired(index){
			this.isUpdating = true
			axios.post('/api/updateQuestionRequire',{
				question_id : this.question[index].question_id,
				question_require : this.question[index].question_require,
				questionnaire_id : this.GetID()
			}).then(result=>{
				this.isUpdating = false
				//console.log((result.data == 0) ? 'require still same' : 'require has been changed')
				if(result.data === 1){
					this.ShowToast('Perubahan telah disimpan','success')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateQuestionContent(index){
			clearTimeout(this.timer)
			this.timer = setTimeout(() => {
				this.isUpdating = true
				//console.log(this.question[index].question_content);
				axios.post('/api/updateQuestionContent',{
					question_id : this.question[index].question_id,
					question_content : this.question[index].question_content
				}).then(result=>{
					this.isUpdating = false
					//console.log((result.data == 0) ? 'content still same' : 'content has been changed')
					if(result.data === 1){
						this.ShowToast('Perubahan telah disimpan','success')
					}
				}).catch(err=>{
					this.ShowToast('Gagal menyimpan perubahan','error')
				})
			}, this.timerInterval);

			
		},
		UpdateType(){
			this.isUpdating = true
			axios.post('/api/updateTypeKuesioner',{ 
				type : this.type ,
				id : this.GetID()
			}).then(result =>{
				this.isUpdating = false
				//console.log((result.data == 0) ? 'type still same' : 'type has been changed')
				if(result.data === 1){
					this.ShowToast('Perubahan telah disimpan','success')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateStatus(){
			this.isUpdating = true
			axios.post('/api/updateStatusKuesioner',{ 
				status : this.status,
				id : this.GetID() 
			}).then(result =>{
				this.isUpdating = false
				//console.log((result.data == 0) ? 'status still same' : 'status has been changed')
				if(result.data === 1){
					this.ShowToast('Perubahan telah disimpan','success')
				}
			}).catch(err=>{
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateTitle(){
			this.isUpdating = true
			axios.post('/api/updateTitleKuesioner',{id : this.GetID(),title : this.title}).then(result=>{
				//console.log((result.data == 0) ? 'title not update' : 'title has been updated');
				if(result.data === 1){
					this.isUpdating = false
					this.ShowToast('Perubahan telah disimpan','success')
				}else{
					this.isUpdating = false
				}
			}).catch(err=>{
				this.isUpdating = false
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		UpdateDescription(){
			this.isUpdating = true
			axios.post('/api/updateDescriptionKuesioner',{id : this.GetID(),desc : this.desc}).then(result=>{
				//console.log((result.data == 0) ? 'desc not update' : 'desc has been updated');
				if(result.data === 1){
					this.isUpdating = false
					this.ShowToast('Perubahan telah disimpan','success')
				}else{
					this.isUpdating = false
				}
			}).catch(err=>{
				this.isUpdating = false
				this.ShowToast('Gagal menyimpan perubahan','error')
			})
		},
		DeleteQuestion(index){
			this.$swal({
				title : 'Perhatian',
				text : 'Apakah Anda ingin menghapus pertanyaan ini?',
				icon : 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya, lanjutkan',
				cancelButtonText: 'Tidak'
			}).then(result=>{
				if(result.isConfirmed){
					axios.post('/api/deleteQuestion',{
						id : this.question[index].question_id
					}).then(result=>{
						if(result.data === 1){
							this.question.splice(index,1)
							/*
							this.$toast.open({
								message: 'Something went wrong!',
								type: 'error',
							});
							*/
							this.ShowToast('Pertanyaan telah dihapus','success')
						}else{
							/*
							this.$swal({
								title : 'Oops',
								text : 'Gagal menghapus, terjadi kesalahan.',
								icon : 'error'
							}); 
							*/
							this.ShowToast('Gagal menghapus pertanyaan.','error')
						}
					}).catch(err=>{
						this.ShowToast('Terjadi kesalahan','error')
					})
				}
			});
		},
		ShowToast(messages,types){
			this.$toast.open({
				message: messages,
				type: types,
				position: 'bottom-right',
				duration : 2000
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
	.my-options{
		font-size: 14px;;	
	}
	.option-input, .input-question{
		min-height: 1em;
	}
	.my-form{
		border: none !important;	
		min-height: 1em;
	}
	.my-form:focus, .my-form:active, .my-form:hover{
		border: 1px solid #E4E6EF !important;
		min-height: 1em;
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