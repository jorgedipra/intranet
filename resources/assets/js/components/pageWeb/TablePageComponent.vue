<template>
    <div>
      <button type="button"  id="newPage" class="btn btn-info" v-on:click="modal(0,'new')">Nueva Pagina</button>
        <table class="table">
          <thead class="thead-dark border-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Url Del Proyecto</th>
              <th scope="col">Tipo</th>
              <th scope="col" class="td-center">Actualización</th>
              <th scope="col" class="td-center">Estado</th>
              <th scope="col" class="td-center">Editar</th>
            </tr>
          </thead>
          <tbody class="border-dark">
            <tr v-for="(item, index) in dataPaginas" :key="item.id" >
              <th scope="row">{{ index+1 }}</th>
              <td>
                <b>{{ item.Name }}</b>
              </td>
              <td>
                <span v-if="item.Estado =='1'">
                  <a class="tg-link" target="_blank" :href="item.Url">{{ item.Url }}</a> 
                </span>
                <span v-else>
                  <a class="tg-link" target="_blank" :href="item.Home">{{ item.Url }}</a> 
                </span>
                
              </td>
              <td> 
                <span v-if="item.Private_Public =='1'">
                  <font-awesome-icon :icon="['fas', 'user-lock']" /> - Private
                </span>
                <span v-else>
                  <font-awesome-icon :icon="['fab', 'cloudversify']" /> - Public
                </span>
              </td>
              <td class="td-center"> {{ formatdate(item.Actualization) }}</td>
              <td class="td-center">
                <span v-if="item.Estado =='1'" class="tg-success">
                  <font-awesome-icon :icon="['fas', 'check']" />
                </span>
                <span v-else class="tg-error">
                  <font-awesome-icon :icon="['fas', 'server']" />
                </span>
                
              </td>
              <td class="td-center tg-edit">
                <a class="tg-editlink"  v-on:click="modal(item.id,'Edit')">
                  <font-awesome-icon :icon="['fas', 'edit']" />
                </a>
                </td>
            </tr>
                                  
          </tbody>
        </table>
        <div class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Pagina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"  v-on:click="cerrar()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link tg-edit active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tg-edit" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Diseño</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tg-edit" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Descripción</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <section class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                      <br>
                      <form>
                        <article class="form-group row">
                          <label for="td-inputName" class="col-sm-2 col-form-label tg-right">Nombre:</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control tg-input font-15px" id="td-inputName" name="td-inputName" title="Nombre" placeholder="Nombre de la pagina" v-model="dataPag_edit.Name">
                          </div>
                              
                          <label for="td-inputRoll" class="col-sm-1 col-form-label tg-right">	Roll: </label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control tg-input font-15px" id="td-inputRoll" name="td-inputRoll" title="Nombre" placeholder="Nombre del Roll" v-model="dataPag_edit.Roll">
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <input v-if="dataPag_edit.Private_Public=='1'" class="form-check-input col-sm-1 tg-edit" type="radio" name="gridRadios2" id="gridRadios3" value="1" :checked="dataPag_edit.Private_Public">
                              <input  v-else class="form-check-input col-sm-1 tg-edit" type="radio" name="gridRadios2" id="gridRadios3" value="1"  v-model="dataPag_edit.Private_Public">
                              <label class="form-check-label col-sm-7 tg-edit" for="gridRadios3">
                                privado
                              </label>
                              <div class="col-sm-3"></div><br>
                              <input v-if="dataPag_edit.Private_Public=='0'" class="form-check-input col-sm-1 tg-success" type="radio" name="gridRadios2" id="gridRadios4" value="0" :checked="dataPag_edit.Private_Public">
                              <input  v-else class="form-check-input col-sm-1 tg-success" type="radio" name="gridRadios2" id="gridRadios4" value="0" v-model="dataPag_edit.Private_Public">
                              <label class="form-check-label col-sm-7 tg-success" for="gridRadios4">
                                publico
                              </label>
                            </div>
                          </div>
                        </article>
                        <hr>  
                        <article class="form-group row">
                          <label for="td-inputUrl" class="col-sm-2 col-form-label tg-right">Url Pagina:</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control font-15px" id="td-inputUrl" placeholder="Url de la pagina" v-model="dataPag_edit.Url">
                          </div>
                          <label for="td-inputUrl2" class="col-sm-1 col-form-label tg-right">Url2:</label>
                          <div class="col-sm-3">
                            <input type="text" class="form-control font-15px" id="td-inputUrl2" placeholder="Url alternativo" v-model="dataPag_edit.Url2">
                            <small>si no es la misma usar : <b>web.archive.org</b></small>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <input  v-if="dataPag_edit.Estado=='1'" class="form-check-input col-sm-1 tg-success" type="radio" name="gridRadios" id="gridRadios1" value="1"  :checked="dataPag_edit.Estado">
                              <input  v-else class="form-check-input col-sm-1 tg-success" type="radio" name="gridRadios" id="gridRadios1" value="1" v-model="dataPag_edit.Estado">
                              <label class="form-check-label col-sm-7 tg-success" for="gridRadios1">
                                Activo
                              </label>
                              <div class="col-sm-4"></div><br>
                              <input v-if="dataPag_edit.Estado=='0'" class="form-check-input col-sm-1 tg-error" type="radio" name="gridRadios" id="gridRadios2" value="0"  :checked="dataPag_edit.Estado" >
                              <input v-else class="form-check-input col-sm-1 tg-error" type="radio" name="gridRadios" id="gridRadios2" value="0" v-model="dataPag_edit.Estado">
                              <label class="form-check-label col-sm-7 tg-error" for="gridRadios2">
                                Offline
                              </label>
                            </div>
                          </div>
                        </article>
                      </form>
                      <br>
                    </section>
                    <section class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <br>  
                      <form>
                          <article class="form-group row justify-content-center">
                            <div class="col-sm-3">
                              <span v-if="dataPag_edit.Color">
                                <select name="Color" id="inputStyle" class="form-control font-15px" 
                                onchange="
                                $('#ColorFont').attr('class','');
                                $('#ColorFont').addClass('color_'+$('#inputStyle').val());
                                " v-model="dataPag_edit.Color">
                                  <option class="color_1" value="1" v-if="dataPag_edit.Color=='1'" selected>Diseño 1</option>
                                  <option class="color_1" value="1" v-else>Diseño 1</option>
                                  <option class="color_2" value="2" v-if="dataPag_edit.Color=='2'" selected>Diseño 2</option>
                                  <option class="color_2" value="2" v-else>Diseño 2</option>
                                  <option class="color_3" value="3" v-if="dataPag_edit.Color=='3'" selected>Diseño 3</option>
                                  <option class="color_3" value="3" v-else>Diseño 3</option>
                                  <option class="color_4" value="4" v-if="dataPag_edit.Color=='4'" selected>Diseño 4</option>
                                  <option class="color_4" value="4" v-else>Diseño 4</option>
                                  <option class="color_5" value="5" v-if="dataPag_edit.Color=='5'" selected>Diseño 5</option>
                                  <option class="color_5" value="5" v-else>Diseño 5</option>
                                  <option class="color_6" value="6" v-if="dataPag_edit.Color=='6'" selected>Diseño 6</option>
                                  <option class="color_6" value="6" v-else>Diseño 6</option>
                                  <option class="color_7" value="7" v-if="dataPag_edit.Color=='7'" selected>Diseño 7</option>
                                  <option class="color_7" value="7" v-else>Diseño 7</option>
                                  <option class="color_8" value="8" v-if="dataPag_edit.Color=='8'" selected>Diseño 8</option>
                                  <option class="color_8" value="8" v-else>Diseño 8</option>
                                  <option class="color_9" value="9" v-if="dataPag_edit.Color=='9'" selected>Diseño 9</option>
                                  <option class="color_9" value="9" v-else>Diseño 9</option>
                                  <option class="color_10" value="10" v-if="dataPag_edit.Color=='10'" selected>Diseño 10</option>
                                  <option class="color_10" value="10" v-else>Diseño 10</option>
                                </select>
                              </span>
                              <span v-else>
                                  <select name="Color" id="inputStyle" class="form-control font-15px"  
                                  onchange="
                                  $('#ColorFont').attr('class','');
                                  $('#ColorFont').addClass('color_'+$('#inputStyle').val());
                                  " v-model="dataPag_edit.Color">
                                  <option disabled value="" selected>Seleciones Diseño</option>
                                  <option class="color_1" value="1">Diseño 1</option>
                                  <option class="color_2" value="2">Diseño 2</option>
                                  <option class="color_3" value="3">Diseño 3</option>
                                  <option class="color_4" value="4">Diseño 4</option>
                                  <option class="color_5" value="5">Diseño 5</option>
                                  <option class="color_6" value="6">Diseño 6</option>
                                  <option class="color_7" value="7">Diseño 7</option>
                                  <option class="color_8" value="8">Diseño 8</option>
                                  <option class="color_9" value="9">Diseño 9</option>
                                  <option class="color_10" value="10">Diseño 10</option>
                                </select>
                              </span>
                            </div>
                            <div class="col-sm-7 row">
                              <label for="inputColor" class="col-sm-10 col-form-label tg-right">
                                  <span id="ColorFont" class="">
                                    <div class="img">
                                      <img   v-if="dataPag_edit.Logo !=''"  :src="dataPag_edit.Logo" id="imgColor" width="30" height="30" alt="Imagen de la pagina">
                                      <img   v-else :src="`/image/hoja-rota1-854x1024.png`" id="imgColor" width="30" height="30" alt="Imagen de la pagina">
                                  </div> 
                                    <span>Titulo</span>
                                  </span>
                              </label>
                            </div>
                          </article>
                          <hr>  
                          <article class="form-group row justify-content-center">
                            <label for="inputFondo" class="col-sm-3 col-form-label tg-right">Imagen de fondo:</label>
                              <input type="file" class="form-control col-sm-4 font-15px" @change="processFile1($event)"  name="fimagen" accept="image/gif, image/jpeg, image/png" id="inputFondo" placeholder="Imagen de la pagina"/>
                              <div class="col-sm-4 td-center">
                                <img   v-if="dataPag_edit.background !=''"  :src="dataPag_edit.background" id="background" width="150" alt="Imagen de la pagina">
                                <img   v-else :src="`/image/hoja-rota1-854x1024.png`" id="background" width="150" alt="Imagen de la pagina">
                              </div>
                            <div class="col-sm-12"><hr></div>
                            <label for="inputLogo" class="col-sm-3 col-form-label tg-right">Logo de pagina:</label>
                              <input type="file" class="form-control col-sm-4 font-15px" @change="processFile2($event)"  id="inputLogo" placeholder="Logo de la pagina">
                              <div class="col-sm-4 td-center">
                                <img   v-if="dataPag_edit.Logo !=''"  :src="dataPag_edit.Logo" id="Logo" width="50" alt="Logo de la pagina">
                                <img   v-else :src="`/image/hoja-rota1-854x1024.png`" id="Logo" width="50" alt="Logo de la pagina">
                              </div>
                          </article>
                      </form>
                    </section>
                    <section class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <br>
                      <form>
                          <article class="form-group row justify-content-center">
                              <div class="col-sm-1"></div>
                              <label class="form-check-input col-sm-10"  for="Description">Nota</label>
                              <textarea class="form-control col-sm-9" id="Description" name="Description" rows="10" v-model="dataPag_edit.Description"></textarea>
                          </article>
                      </form>
                    </section>
                  </div>
              </div>

              <div class="modal-footer">
                <button type="button" id="savePage" class="btn btn-success" v-on:click="page(dataPag_edit)">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="cerrar()">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</template>

<script>
  const $ = require('jquery')
  window.$ = $
  export default {
     props: {
          data: {},
        },
    data() {
      return {
        dataPaginas: [],
        dataTecnologias: [],
        dataPag_Tec: [],
        dataPag_edit:{
          id:"",
          Name:"",
          Roll:"",
          Private_Public:"",
          Url:"",
          Url2:"",
          Estado:"",
          Color:"",
          background:"",
          Logo:"",
          ImgLogo:"",
          Description:"",
        }
      }
    },
 methods: {
      page:function(dataPag){
        // console.log(dataPag);
        var formData = new FormData();

        formData.append('id',dataPag.id);
        //General
        formData.append('Name',dataPag.Name);
        formData.append('Roll',dataPag.Roll);
        formData.append('Estado',dataPag.Estado);
        formData.append('Url',dataPag.Url);
        formData.append('Url2',dataPag.Url2);
        formData.append('Private_Public',dataPag.Private_Public);
        //Diseño
        formData.append('Color',dataPag.Color);
        if($("#inputFondo").val()!='')
            formData.append('Background',dataPag.background);
        else
            formData.append('Background',null);

        if($("#inputLogo").val()!="")
          formData.append('ImgLogo',true);
            
        
        formData.append('Logo',dataPag.Logo);
        //Descripción
        formData.append('Description',dataPag.Description);

            axios.post('/PageWeb/update_pageWeb', formData)
                .then(function (response) {
                    // handle success
                    // console.log(response);
                    var msg ='';
                    if(response.data == '200'){
                        msg ="Actulización exitosa, codigo: [ "+response.data+" ]";
                        Alerts.windows('alert-success','success',msg);
                        location.reload();
                    }else{
                        msg ="Proceso parcialmente Exitoso, Problemas en la consulta, codigo: <br>[ "+response.data+" ]";
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

      },
      modal:function(id,type){
          $(".modal").show();
          $("#home-tab").click();
          this.dataPag_edit.id=id;
          if(type=='new'){
              $("#savePage").text("Crear");
              $(".tg-input").val("");
              //General
              this.dataPag_edit.Roll='';
              this.dataPag_edit.Name='';
              this.dataPag_edit.Url='';
              this.dataPag_edit.Url2='';
              this.dataPag_edit.Estado='';
              this.dataPag_edit.Private_Public='';
              //Diseño
              this.dataPag_edit.Color='';
              this.dataPag_edit.background='';
              this.dataPag_edit.Logo='';
              //Descripcion
              this.dataPag_edit.Description='';
          }else{
              $("#savePage").text("Guardar Cambios");
          }         
          
          for(var i in this.dataPaginas){
              if(this.dataPaginas[i].id==id){
                  //General
                  this.dataPag_edit.Name=this.dataPaginas[i].Name;
                  this.dataPag_edit.Roll=this.dataPaginas[i].Roll;
                  this.dataPag_edit.Url=this.dataPaginas[i].Url;
                  this.dataPag_edit.Url2=this.dataPaginas[i].Home;
                  this.dataPag_edit.Estado=this.dataPaginas[i].Estado;
                  this.dataPag_edit.Private_Public=this.dataPaginas[i].Private_Public;
                  //Diseño
                  this.dataPag_edit.Color=this.dataPaginas[i].Color;
                  this.dataPag_edit.background=this.dataPaginas[i].background;
                  this.dataPag_edit.Logo=this.dataPaginas[i].Logo;
                  //Descripcion
                  this.dataPag_edit.Description=this.dataPaginas[i].Description;
              }
          }
           //stylo de diseño
          $('#ColorFont').attr('class','');
          $('#ColorFont').addClass('color_'+this.dataPag_edit.Color);
          $("#ColorFont>span").text(this.dataPag_edit.Name?this.dataPag_edit.Name:'Titulo');
      },
      cerrar:function(){
          $(".modal").hide();
          $(".nav-link").attr({"aria-selected":"false","aria-expanded":"false"}).removeClass("active");
          $(".tab-pane").removeClass("active show in");
          $("#home-tab").attr({"aria-selected":"true","aria-expanded":"true"}).addClass("active");
          $("#home").addClass("active show in");

      },
      formatdate: function(Fecha){
        var info = Fecha.split('-');
        switch (info[1]) {
          case "01":
              info[1]="Jun";
            break;
          case "02":
              info[1]="Feb";
            break;
          case "03":
              info[1]="Mar";
            break;
          case "04":
              info[1]="Apr";
            break;
          case "05":
              info[1]="May";
            break;
          case "06":
              info[1]="Jun";
            break;
          case "07":
              info[1]="Jul";
            break;
            case "08":
              info[1]="Aug";
            break;
            case "09":
              info[1]="Sep";
            break;
            case "10":
              info[1]="Oct";
            break;
            case "11":
              info[1]="Nov";
            break;
          default:
            info[1]= "Dec";
            break;
        }
        Fecha = info[2] + ' ' + info[1] + ' ' + info[0];
        return Fecha;
      },
      tec: function(Url){
        window.open(Url, '_blank')
      },
      processFile1(event) {
                let file = event.target.files[0];
                this.dataPag_edit.background = file;
                this.cargaImagen(file,1);
      },
      processFile2(event) {
                let file = event.target.files[0];
                this.dataPag_edit.Logo = file;
                this.cargaImagen(file,2);
      },
      cargaImagen(file,i){
                let reader = new FileReader();
                reader.onload = (e)=>{
                    // console.log(e.target.result)
                    switch (i) {
                        case 1:
                            this.dataPag_edit.background = e.target.result;
                            break;
                        case 2:
                        this.dataPag_edit.Logo = e.target.result;
                            break;
                    }
                }
                reader.readAsDataURL(file);
        },
      moreinfo: function (num,titulo,fondo,logo,Desc,page,home,priv) {       
        const id="#obj"+num;
        const tec = $(id+">.bordeCj>.lengPlc>.lengPlcaja").html();
        
        $("#popUp").show();
        
        $("#title").html(titulo);
        $("#img").attr('src',fondo);
        $("#logo").attr('src',logo);
        $("#text").html(Desc);
        
        if(priv=="1"){
          $("#pro").hide();
        }else{
          $("#pro").show();
          $("#pro").attr('href',home);
        }
        
        $("#tecn").html(tec);
      }
    },
    mounted() {
        this.dataPaginas = this.data.paginas;
        this.dataTecnologias = this.data.tecnologias;
        this.dataPag_Tec = this.data.pagina_tecnologias;
          
          for(var i in this.dataPag_Tec){
              for(var j in this.dataTecnologias){
                if(this.dataTecnologias[j].Id==this.dataPag_Tec[i].Id_tecnologia){
                      this.dataPag_Tec[i].TecName = this.dataTecnologias[j].Name;
                      this.dataPag_Tec[i].TecLogo = this.dataTecnologias[j].Logo;
                      this.dataPag_Tec[i].TecUrl = this.dataTecnologias[j].Url;
                }
              }
          }
        
        // console.log(this.data);
        $("#cerrar").click(function(){
          $("#popUp").hide();
          $("#title").html("");
          $("#tecn").html("");
          $("#logo").attr('src',"");
          $("#img").attr('src',"");
          $("#pro").attr('href',"");
      });   
      
    }
  }
</script>
<style lang="stylus">
#newPage{
  position:absolute;
  right: 0;
  margin-top: -80px;
}
#alerts{
  position: fixed;
  bottom: 0;
  right: 0;
  z-index: 1050;
}
span#ColorFont{
  border: solid 1px #ced4da;
  border-radius: 3px;
  display: block;
  width: 100%;
  height: 45px;
  top: 0;
  margin-top: -10px;
  text-align: center;
  font-size: 25px;
  font-family: monospace;
  clip-path: polygon(10% 0,100% 0,100% 0,100% 100%,100% 100%,0 100%,0 100%,0 30%);
}
#ColorFont>span{
    left: 80px;
    position: absolute;
}
#imgColor{
  border: 2px solid #343a40;
  border-radius: 100%;
  height: 30px;
  left: 0px;
  top: 0;
  position: absolute;
  width: 30px;
}
.img {
  border: 2px solid #fff;
  border-radius: 100%;
  height: 34px;
  left: 35px;
  top: 3px;
  position: absolute;
  width: 34px;
}
.border-dark{
  border:solid 1px;
}
  .tg-inp-tx{
    width: 119%;
    text-align: center;
    border: 0;
    border-top: solid 0.5px #343a40;
    border-left: solid 0.5px #343a40;
  }
  .td-center{
    text-align:center;
  }
  .tg-success{
    color: #28a745;
  }
  .tg-error{
    color: #dc3545;
  }
  .tg-edit{
    color:#007bff;
  }
  .tg-link{
    color: #343a40;
    text-decoration: underline;
  }
  .tg-editlink{
    cursor:pointer;
  }
  .modal{
    background:#0000006b;
  }
  .tg-right{
    text-align:right;
  }
  .modal-dialog.modal-lg{
    margin-top: 50px;
  }
  //
  .color_1{
    background-color: #7db40a !important;
    color:#fff !important;
  }
  .color_2{
    background-color: #343a40 !important;
    color:#fff !important;  
  }
  .color_3{
    background-color: #67c7ed !important;
    color:#3e3b3d !important;  
  }
  .color_4{
    background-color: #312885 !important;
    color:#fff !important;  
  }
  .color_5{
    background-color: #014a7e !important;
    color:#fff !important;  
  }
  .color_6{
    background-color: #d50000 !important;
    color:#fff !important;  
  }
  .color_7{
    background-color: #008680 !important;
    color:#fff !important;  
  }
  .color_8{
    background-color: #00c853 !important;
    color:#fff !important;  
  }
  .color_9{
    background-color: #fc8c1e !important;
    color:#071119 !important;  
  }
  .color_10{
    background-color: #ec670a !important;
    color:#fff !important;  
  }
</style>