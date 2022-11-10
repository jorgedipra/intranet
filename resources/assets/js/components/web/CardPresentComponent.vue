<template>
<div class="card">
    <div class="card-header">
        Card Presentación
    </div>
    <div class="card-body" v-for="item in dataPerfil" :key="item.id" >
        <form @submit.prevent="addProduct" enctype="multipart/form-data">
            <div class="form-group">
                Selecciona una imagen en formato [PNG, JPG, jpeg] de tamaño inferior a 1MB.<br/>
                <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png" @change="processFile($event)"/>
            </div>
            <img  v-bind:src="imagen" alt="Card image cap" class="img-thumbnail"> 
            <small class="form-text text-muted">*Tamaño de <b>350 X 170</b></small>
            <hr>
            <small id="emailHelp" class="form-text text-muted"> *Nombre de la pagina <strong>Title_card</strong>.</small>
            <input type="text" class="form-control mb-2" placeholder="Titulo de la card" v-model="item.Title_card" >
            <input type="text" class="form-control mb-2" placeholder="Nombre" v-model="item.Nombre">
            <input type="text" class="form-control mb-2" placeholder="Apellido" v-model="item.Apellido">
            <hr>
            <input type="text" class="form-control mb-2" placeholder="Cargo" v-model="item.Cargo">
            <input type="text" class="form-control mb-2" placeholder="Empresa" v-model="item.Empresa">
            <hr>
            <button  id="btn-save-card" class="btn btn-success" type="submit" 
                @click="editarFormulario(item)">Guardar <font-awesome-icon :icon="['fas', 'save']" /></button>
        </form>
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
        imagenMiniatura: '',
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
        this.dataPerfil = this.data.perfil;
        this.imagenMiniatura=this.API_IMG +'/'+ this.dataPerfil[0].Imagen;
     },
      methods:{
           editarFormulario(item){
                this.perfil.Title_card = item.Title_card
                this.perfil.Nombre = item.Nombre
                this.perfil.Apellido = item.Apellido
                this.perfil.Cargo = item.Cargo
                this.perfil.Empresa = item.Empresa
                // this.Editar(this.perfil)            
           },
           processFile(event) {
                let file = event.target.files[0];
                this.perfil.Imagen = file;
                // console.log(file);
                this.cargaImagen(file);
            },
            cargaImagen(file){
                let reader = new FileReader();
                reader.onload = (e)=>{
                    this.imagenMiniatura = e.target.result;
                }
                reader.readAsDataURL(file);
            },
            addProduct(formData){
                var formData = new FormData();
                formData.append('Title_card',this.perfil.Title_card);
                formData.append('Nombre',this.perfil.Nombre);
                formData.append('Apellido',this.perfil.Apellido);
                formData.append('Cargo',this.perfil.Cargo);
                formData.append('Empresa',this.perfil.Empresa);
                formData.append('Imagen',this.perfil.Imagen);
                formData.append('originalname',this.perfil.Imagen.name);
                this.Editar(formData)
            },
            Editar(formData){
                 
                axios.post('/web/update_presentation', formData)
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
      computed:{
            imagen(){                
                return this.imagenMiniatura;
            }
      }
  }
</script>
<style lang="stylus">
#btn-save-card{
    float: right;
}
#alerts{
    position: fixed;
    bottom: 0;
    right: 0;
}
</style>