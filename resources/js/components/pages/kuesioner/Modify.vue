<template>
  
</template>

<script>
export default {
    props : ['id'],
    data(){
        return{
            id : '',
        }
    },
    methods :{
        GetData() {
            $route.params.id
        },
    }
}
</script>

<style>

</style>