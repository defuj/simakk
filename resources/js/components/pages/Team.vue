<template>
  <div class="row">
    <!--begin::Col-->
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6" v-for="team in teams" :key="team.team_id">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::User-->
                <div class="d-flex align-items-end mb-7">
                    <!--begin::Pic-->
                    <div class="d-flex align-items-center">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                            <div class="symbol symbol-circle symbol-lg-75">
                                <img v-if="team.team_picture != ''" v-bind:src="'media/users/'+team.team_picture" alt="image"/>
                                <img v-else v-bind:src="'media/users/blank.png'" alt="image"/>
                            </div>
                            <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                <span class="font-size-h3 font-weight-boldest">JM</span>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">
                                {{team.team_name}}
                            </a>
                            <span class="text-muted font-weight-bold">{{team.team_job}}</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::User-->
                <!--begin::Desc-->
                <p class="mb-7">
                    {{team.team_bio}}
                </p>
                <!--end::Desc-->
                
                
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
  </div>
  
</template>

<script>
export default {
    //props: ["teams"],
    data() {
        return{
            teams : [],
            title : "SIMAKK - Teams"
        }
    },
    mounted(){
        axios.get('/api/teams').then((result) => {
            this.teams = result.data
        })
    }
}
</script>
