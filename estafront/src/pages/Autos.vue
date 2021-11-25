<template>
    <q-page class="q-pa-lg">
        <form action="" @submit.prevent="registrarlog">
            <input type="text" placeholder="Placa" v-model="log.placa">
            <input type="text" placeholder="Marca" v-model="log.marca">
            <select name="" id="" v-model="log.cliente_id">
                <option v-for="cliente in clientes" :key="cliente.id" :value="cleinte.id">{{cliente.nombre}}</option>
            </select>
            <input type="submit">
        </form>
        <hr>
  <table border="1" style="width: 100%">
    <tr>
      <th>#</th>
      <th>Placa</th>
      <th>Marca</th>
      <th>Cliente</th>
    </tr>
    <tr v-for="l in logs" :key="l.id">
      <td>{{l.id}}</td>
      <td>{{l.placa}}</td>
      <td>{{l.marca}}</td>
      <td>{{l.cliente.name}}</td>
    </tr>
  </table>
    </q-page>
</template>

<script>
export default{
    data(){
        return{
            autos:[],
            clientes:[],
            log:{}
        }
    },
    created(){
    //console.log(localStorage.getItem('token'))
    this.$axios.get(process.env.API+'/auto').then(res=>{
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
