<template>
<div class="card">
    <div class="card-header">
        Card Presentación
    </div>
    <div class="card-body" v-for="item in dataPerfil" :key="item.id" >
        <div class="form-group">
            Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
            <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
        </div>
        <img  v-bind:src="API_IMG + item.Imagen" alt="Card image cap" class="img-thumbnail"> 
        <hr>
        <input type="text" class="form-control mb-2" placeholder="Titulo de la card" v-model="item.Title_card" >
        <small id="emailHelp" class="form-text text-muted"> *Nombre de la pagina <strong>Title_card</strong>.</small>
        <input type="text" class="form-control mb-2" placeholder="Nombre" v-model="item.Nombre">
        <input type="text" class="form-control mb-2" placeholder="Apellido" v-model="item.Apellido">
        <hr>
        <input type="text" class="form-control mb-2" placeholder="Cargo" v-model="item.Cargo">
        <input type="text" class="form-control mb-2" placeholder="Empresa" v-model="item.Empresa">
    </div>    
</div>
</template>
<script>
    export default {
     props: {
          data: {},
        },
    data() {
      return {
        dataPerfil: [],
        API_IMG: API_BACKEND_IMG
      }
    },
     mounted() {
         
		this.dataPerfil = this.data.perfil
     }
  }
</script>