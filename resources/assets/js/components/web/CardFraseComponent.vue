<template>
<div class="card">
    <div class="card-header">
        Card cita favorita [ Frase ]
    </div>
    <div class="card-body" v-for="item in dataPerfil" :key="item.id">
         <form @submit.prevent="addProduct" enctype="multipart/form-data">
        <div class="row">
            <div class="col-4">
                 <img  v-bind:src="imagen" alt="Card image frase" class="img-circle img-center" width="80px"> 
                <div class="form-group">
                    Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
                    <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png" @change="processFile($event)"/>
                </div>
            </div>
            <div class="col-8">
                <input type="text" class="form-control mb-2" placeholder="Titulo de la Frase" v-model="item.Titulo_frase" >
                <textarea class="form-control  mb-2" placeholder="Descripción de la Frase" rows="7" v-model="item.Frase"></textarea>
            </div>
            <div class="col-12">
                <hr>
                <button  id="btn-save-card2" class="btn btn-success" type="submit" 
                    @click="editarFormulario(item)">Guardar <font-awesome-icon :icon="['fas', 'save']" /></button>
            </div>
        </div>
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
            Titulo_frase: '',
            Frase: '',
            Imagen2: ''
        }
      }
    },
    mounted() {
        this.dataPerfil = this.data.perfil;
        //console.log(">>"+this.dataPerfil[0].Imagen2);
        
        this.imagenMiniatura=this.API_IMG +'/'+ this.dataPerfil[0].Imagen2;
     },
     methods:{
         editarFormulario(item){
                this.perfil.Titulo_frase = item.Titulo_frase
                this.perfil.Frase = item.Frase
        },
        processFile(event) {
                let file = event.target.files[0];
                this.perfil.Imagen2 = file;
                // console.log(file);
                this.cargaImagen(file);
        },
        cargaImagen(file){
                let reader = new FileReader();
                reader.onload = (e)=>{
                    // console.log(e.target.result)
                    this.imagenMiniatura = e.target.result;
                }
                reader.readAsDataURL(file);
        },
        addProduct(formData){
                var formData = new FormData();
                formData.append('Titulo_frase',this.perfil.Titulo_frase);
                formData.append('Frase',this.perfil.Frase);
                formData.append('Imagen2',this.perfil.Imagen2);
                formData.append('originalname',this.perfil.Imagen2.name);
                this.Editar(formData)
        },
        Editar(formData){
                 
                axios.post('/web/update_frase', formData)
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
.img-center{
    display:block;
    margin:auto;
}
#btn-save-card2{
    float: right;
}
</style>