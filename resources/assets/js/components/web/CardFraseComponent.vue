<template>
<div class="card">
    <div class="card-header">
        Card cita favorita [ Frase ]
    </div>
    <div class="card-body" v-for="item in dataPerfil" :key="item.id">
        <div class="row">
            <div class="col-4">
                <img v-bind:src="API_IMG + '/storage/web/landing/estiveJ.png'" width="80px" alt="Card image cap" class="img-circle img-center"> 
                <div class="form-group">
                    Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
                <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
            </div>
        </div>
        <div class="col-8">
            <input type="text" class="form-control mb-2" placeholder="Titulo de la Frase" v-model="item.Titulo_frase" >
            <textarea class="form-control  mb-2" placeholder="Descripción de la Frase" rows="7" v-model="item.Frase"></textarea>
        </div>
        </div>
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
<style lang="stylus">
.img-center{
    display:block;
    margin:auto;
}
</style>