<template>
<div class="card">
    <div class="card-header">
        Card Presentación
    </div>
    <div class="card-body" v-for="item in dataPerfil" :key="item.id" >
        <div class="form-group">
            Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
            <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png" @change="processFile($event)"/>
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
        <hr>
        <button  id="btn-save-card" class="btn btn-success" type="submit" 
            @click="editarFormulario(item)">Guardar <font-awesome-icon :icon="['fas', 'save']" /></button>
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
        API_IMG: API_BACKEND_IMG,
        perfil: {
            Title_card: '',
            Nombre: '',
            Apellido: '',
            Cargo: '',
            Empresa: '',
            Imagen: ''
        }
      }
    },
     mounted() {
        this.dataPerfil = this.data.perfil
     },
      methods:{
           editarFormulario(item){
                this.perfil.Title_card = item.Title_card
                this.perfil.Nombre = item.Nombre
                this.perfil.Apellido = item.Apellido
                this.perfil.Cargo = item.Cargo
                this.perfil.Empresa = item.Empresa
                this.Editar(this.perfil)            
           },
           processFile(event) {
                this.perfil.Imagen = event.target.files[0].name
                //console.log(event.target.files[0]);
            },
            Editar(perfil){
                const params = {
                    Title_card: perfil.Title_card, 
                    Nombre: perfil.Nombre,
                    Apellido: perfil.Apellido,
                    Cargo: perfil.Cargo,
                    Empresa: perfil.Empresa,
                    Imagen: perfil.Imagen,
                    };
                    
                axios.post('/web/update_presentation', params)
                .then(function (response) {
                    // handle success
                    // console.log(response);
                    var msg ='';
                    if(response.data == '200'){
                        msg ="Actulización exitosa, codigo: [ "+response.data+" ]";
                        Alerts.windows('alert-success','success',msg);
                    }else{
                        msg ="Proceso parcialmente Exitoso, Problemas en la consulta, codigo: [ "+response.data+" ]";
                        Alerts.windows('alert-warning','warning',msg);
                    }
                    
                })
                .catch(function (error) {
                    // handle error
                    // console.log(error);
                    var msg ='';
                    msg ="Ocurrio algo, Error: [ "+error+" ]";
                    Alerts.windows('alert-danger','danger',msg);
                })
                .then(function () {
                    // always executed
                });
                
            }//::END
      },
  }
</script>
<style lang="stylus">
#btn-save-card{
    float: right;
}
</style>