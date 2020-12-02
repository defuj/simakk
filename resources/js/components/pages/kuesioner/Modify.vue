<template>
  <div class="title">
      {{this.GetID()}}
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
    }
}
</script>

<style>

</style>