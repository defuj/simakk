<template>
<div class="card card-custom card-sticky" id="kt_page_sticky_card" style="margin-top: 50px;margin-bottom: 50px;">
	<div class="card-header">
		<div class="card-title">
			<a href="#" class="btn btn-light-primary font-weight-bolder mr-2">
			<i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
			<section style="margin-left:10px;">
				<input data-switch="true" type="checkbox" data-on-text="Publish" data-handle-width="55" data-off-text="Draf" data-on-color="primary"/>
			</section>

			<section style="margin-left:10px;">
				<input data-switch="true" type="checkbox" data-on-text="Enabled" data-handle-width="55" data-off-text="Disabled" data-on-color="primary"/>
			</section>
		
		</div>
		<div class="card-toolbar">
			<div class="btn-group">
				
				<button type="button" class="btn btn-primary font-weight-bolder">
				<i class="ki ki-check icon-sm"></i>Save Form</button>
				<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
				<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
					<ul class="nav nav-hover flex-column">
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon flaticon2-reload"></i>
								<span class="nav-text">Save &amp; continue</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon flaticon2-add-1"></i>
								<span class="nav-text">Save &amp; add new</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon flaticon2-power"></i>
								<span class="nav-text">Save &amp; exit</span>
							</a>
						</li>
					</ul>
				</div>
			</div>			
		</div>
	</div>
	<div class="card-body">
		<!--begin::Form-->
		<form class="form" id="kt_form">
			<div class="row">
				<div class="col-xl-2"></div>
				<div class="col-xl-8">
					<div class="my-5">
						<h3 class="text-dark font-weight-bold mb-10">Customer Info:</h3>
						<div class="form-group row">
							<label class="col-3">First Name</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="Nick" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Last Name</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="Watson" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Company Name</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="Loop Inc." />
								<span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Contact Phone</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-phone"></i>
										</span>
									</div>
									<input type="text" class="form-control form-control-solid" value="+45678967456" placeholder="Phone" />
								</div>
								<span class="form-text text-muted">We'll never share your email with anyone else.</span>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Email Address</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="la la-at"></i>
										</span>
									</div>
									<input type="text" class="form-control form-control-solid" value="nick.watson@loop.com" placeholder="Email" />
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Company Site</label>
							<div class="col-9">
								<div class="input-group input-group-solid">
									<input type="text" class="form-control form-control-solid" placeholder="Username" value="loop" />
									<div class="input-group-append">
										<span class="input-group-text">.com</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="separator separator-dashed my-10"></div>
					<div class="my-5">
						<h3 class="text-dark font-weight-bold mb-10">Address Details:</h3>
						
						<div class="form-group row">
							<label class="col-3">Address Line 1</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="District 6 1352 W. Olive Ave" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Address Line 2</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="Fresno 559-488-4020" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">City</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="Polo Alto" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">State / Province / Region</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="Los Angeles" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Zip / Postal Code</label>
							<div class="col-9">
								<input class="form-control form-control-solid" type="text" value="780456" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3"></label>
							<div class="col-9">
								<div class="checkbox-inline">
									<label class="checkbox">
									<input type="checkbox" />
									<span></span>Use as shipping address</label>
								</div>
							</div>
						</div>
					</div>
					<div class="separator separator-dashed my-10"></div>
					<div class="my-52">
						<h3 class="text-dark font-weight-bold mb-10">Security:</h3>
						<div class="form-group row">
							<label class="col-3">Login verification</label>
							<div class="col-9">
								<button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Setup login verification</button>
								<div class="form-text text-muted mt-3">After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised. 
								<a href="#">Learn more</a>.</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Password reset verification</label>
							<div class="col-9">
								<div class="checkbox-inline">
									<label class="checkbox mb-2">
									<input type="checkbox" />
									<span></span>Require personal information to reset your password</label>
								</div>
								<div class="form-text text-muted">For extra security, this requires you to confirm your email or phone number when you reset your password. 
								<a href="#" class="font-weight-bold">Learn more</a>.</div>
							</div>
						</div>
						<div class="form-group row mt-10">
							<label class="col-3"></label>
							<div class="col-9">
								<button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-2"></div>
			</div>
		</form>
		<!--end::Form-->
	</div>
</div>


</template>

<script>
export default {
    data(){
        return{
            
        }
    },
    methods :{
        GetID() {
            return this.$route.params.id
        },
    },
    mounted(){
        
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