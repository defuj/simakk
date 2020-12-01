<template>
  
</template>

<script>
    export default {
        data() {
            return {
                country : 'Indonesia',
                total : 0,
                sembuh : 0,
                meninggal : 0,
                dirawat : 0
            }
        },
        methods:{
            
        },
        mounted() {
            this.$http.post('https://api.kawalcorona.com/indonesia').then(result =>{
                console.log(result)
            }).catch(err => {
                console.log({err:err})
            })
        },
    }
</script>

<style>

</style>