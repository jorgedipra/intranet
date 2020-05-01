<template>
<div class="card">
    <div class="card-header">
        carrusel
    </div>
    <div class="card-body ">
        <ul class="nav nav-tabs tab" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">carrusel 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">carrusel 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">carrusel 3</a>
            </li>
        </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form @submit.prevent="addProduct1" enctype="multipart/form-data">
                    <section class="row">
                        <div class="col-12"> &nbsp; </div>
                        <div class="col-12 row">
                            <div class="col-6">
                                <input type="text" class="form-control mb-2" placeholder="Titulo de la card" v-model='data.carrusel[0].Title' >
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control mb-2" placeholder="SubTitulo de la card" v-model='data.carrusel[0].SubTitle'>
                            </div>
                        </div>
                        <div class="col-12"> <hr> </div>
                        <div class="col-6">
                            <img v-bind:src="imagen1" width="90%" alt="Card image cap" class="img-thumbnail img-center"> 
                            <small class="form-text text-muted"> &nbsp;&nbsp;*Tamaño <strong>700 X 350</strong></small>
                        </div>
                        <div class="form-group col-6">
                            Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
                            <input @change="processFile1($event)" type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
                        </div>
                     <div class="col-12">
                            <hr>
                            <button  id="btn-save-card01" class="btn btn-success" type="submit" 
                                @click="editarFormulario1()">Guardar <font-awesome-icon :icon="['fas', 'save']" /></button>
                        </div>
                    </section>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form @submit.prevent="addProduct2" enctype="multipart/form-data">
                   <section class="row">
                        <div class="col-12"> &nbsp; </div>
                        <div class="col-12 row">
                            <div class="col-6">
                                <input type="text" class="form-control mb-2" placeholder="Titulo de la card" v-model='data.carrusel[1].Title' >
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control mb-2" placeholder="SubTitulo de la card" v-model='data.carrusel[1].SubTitle'>
                            </div>
                        </div>
                        <div class="col-12"> <hr> </div>
                        <div class="col-6">
                            <img v-bind:src="imagen2" width="90%" alt="Card image cap" class="img-thumbnail img-center"> 
                            <small class="form-text text-muted"> &nbsp;&nbsp;*Tamaño <strong>700 X 350</strong></small>
                        </div>
                        <div class="form-group col-6">
                            Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
                            <input @change="processFile2($event)" type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
                        </div>
                        <div class="col-12">
                            <hr>
                            <button  id="btn-save-card02" class="btn btn-success" type="submit" 
                                @click="editarFormulario2()">Guardar <font-awesome-icon :icon="['fas', 'save']" /></button>
                        </div>
                    </section>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form @submit.prevent="addProduct3" enctype="multipart/form-data">
                    <section class="row">
                        <div class="col-12"> &nbsp; </div>
                        <div class="col-12 row">
                            <div class="col-6">
                                <input type="text" class="form-control mb-2" placeholder="Titulo de la card" v-model='data.carrusel[2].Title' >
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control mb-2" placeholder="SubTitulo de la card" v-model='data.carrusel[2].SubTitle'>
                            </div>
                        </div>
                        <div class="col-12"> <hr> </div>
                        <div class="col-6">
                            <img v-bind:src="imagen3" width="90%" alt="Card image cap" class="img-thumbnail img-center"> 
                            <small class="form-text text-muted"> &nbsp;&nbsp;*Tamaño <strong>700 X 350</strong></small>
                        </div>
                        <div class="form-group col-6">
                            Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
                            <input @change="processFile3($event)" type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
                        </div>
                        <div class="col-12">
                            <hr>
                            <button  id="btn-save-card03" class="btn btn-success" type="submit" 
                                @click="editarFormulario3()">Guardar <font-awesome-icon :icon="['fas', 'save']" /></button>
                        </div>
                    </section>
                    </form>
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
        dataCarrusel: [],
        API_IMG: API_BACKEND_IMG,
        imagenMiniatura1: '',
        imagenMiniatura2: '',
        imagenMiniatura3: '',
        carrusel: {
            Title1: '',
            SubTitle1: '',
            Imagen1: '',
            Title2: '',
            SubTitle2: '',
            Imagen2: '',
            Title3: '',
            SubTitle3: '',
            Imagen3: ''
        }

      }
    },
     mounted() {
        this.dataCarrusel = this.data.carrusel
        // console.log(">>"+this.dataCarrusel[0].Url);
        this.imagenMiniatura1=this.API_IMG +'/'+ this.dataCarrusel[0].Url;
        this.imagenMiniatura2=this.API_IMG +'/'+ this.dataCarrusel[1].Url;
        this.imagenMiniatura3=this.API_IMG +'/'+ this.dataCarrusel[2].Url;
     },
     methods:{
         processFile1(event) {
                let file = event.target.files[0];
                this.carrusel.Imagen1 = file;
                // console.log(file);
                this.cargaImagen(file,1);
        },
        processFile2(event) {
                let file = event.target.files[0];
                this.carrusel.Imagen2 = file;
                // console.log(file);
                this.cargaImagen(file,2);
        },
        processFile3(event) {
                let file = event.target.files[0];
                this.carrusel.Imagen3 = file;
                // console.log(file);
                this.cargaImagen(file,3);
        },
        cargaImagen(file,i){
                let reader = new FileReader();
                reader.onload = (e)=>{
                    // console.log(e.target.result)
                    switch (i) {
                        case 1:
                            this.imagenMiniatura1 = e.target.result;
                            break;
                        case 2:
                            this.imagenMiniatura2 = e.target.result;
                            break;
                        case 3:
                            this.imagenMiniatura3 = e.target.result;
                            break;
                    }
                }
                reader.readAsDataURL(file);
        },
        editarFormulario1(){
                this.carrusel.Title1 = this.data.carrusel[0].Title
                this.carrusel.SubTitle1 =  this.data.carrusel[0].SubTitle
        },
        addProduct1(formData){
            var formData = new FormData();
                formData.append('id',1);
                formData.append('Title',this.carrusel.Title1);
                formData.append('SubTitle',this.carrusel.SubTitle1);
                formData.append('Url',this.carrusel.Imagen1);
                this.Editar(formData)
        },
        editarFormulario2(){
                this.carrusel.Title2 = this.data.carrusel[1].Title
                this.carrusel.SubTitle2 =  this.data.carrusel[1].SubTitle
        },
        addProduct2(formData){
            var formData = new FormData();
                formData.append('id',2);
                formData.append('Title',this.carrusel.Title2);
                formData.append('SubTitle',this.carrusel.SubTitle2);
                formData.append('Url',this.carrusel.Imagen2);
                this.Editar(formData)
        },
        editarFormulario3(){
                this.carrusel.Title3 = this.data.carrusel[2].Title
                this.carrusel.SubTitle3 =  this.data.carrusel[2].SubTitle
        },
        addProduct3(formData){
            var formData = new FormData();
                formData.append('id',3);
                formData.append('Title',this.carrusel.Title3);
                formData.append('SubTitle',this.carrusel.SubTitle3);
                formData.append('Url',this.carrusel.Imagen3);
                this.Editar(formData)
        },
        Editar(formData){
                axios.post('/web/update_carrusel', formData)
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
            imagen1(){                
                return this.imagenMiniatura1;
            },
            imagen2(){                
                return this.imagenMiniatura2;
            },
            imagen3(){                
                return this.imagenMiniatura3;
            }
      }
}
</script>
<style lang="stylus">
colorborde = #e2e2e2;
.tab{
    .nav-item{
        .nav-link{
            border: solid 1px colorborde;
            color: #333
        }
    }
}
#btn-save-card01,
#btn-save-card02,
#btn-save-card03{
     float: right;
}
</style>