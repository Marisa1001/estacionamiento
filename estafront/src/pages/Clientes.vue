<template>
    <q-page class="q-pa-lg">
        <form action="" @submit.prevent="registrarlog">
            <input type="text" placeholder="ci" v-model="log.ci">
            <input type="text" placeholder="nombre" v-model="log.nombre">
            <input type="submit">
        </form>
         <hr>
  <table border="1" style="width: 100%">
    <tr>
      <th>#</th>
      <th>Ci</th>
      <th>Nombre</th>
    </tr>
    <tr v-for="l in logs" :key="l.id">
      <td>{{l.id}}</td>
      <td>{{l.ci}}</td>
      <td>{{l.nombre}}</td>
    </tr>
  </table>
    </q-page>
</template>

<script>
export default{
    data(){
        return{
            clientes:[],
            log:{}
        }
    },
    created(){
    //console.log(localStorage.getItem('token'))
    this.$axios.get(process.env.API+'/cliente').then(res=>{
      // console.log(res.data)
      this.autos=res.data
    })
    this.mislogs()
  },
  methods:{
    registrarlog(){
      this.$axios.post(process.env.API+'/log',this.log).then(res=>{
        this.mislogs()
      })
    },
    mislogs(){
      this.$axios.get(process.env.API+'/log').then(res=>{
        console.log(res.data)
        this.logs=res.data
      })
    }
  },
}
</script>

<style scoped>

</style>
