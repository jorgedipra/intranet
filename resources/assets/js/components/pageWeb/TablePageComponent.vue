<template>
    <div>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Url Del Proyecto</th>
              <th scope="col">Private/ Public</th>
              <th scope="col" class="td-center">Actualización</th>
              <th scope="col" class="td-center">Estado</th>
              <th scope="col" class="td-center">Editar</th>
            </tr>
          </thead>
          <tbody>
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
                <a class="tg-editlink"  v-on:click="modal('1')">
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
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"  v-on:click="cerrar()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <article class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label tg-right">Nombre</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre de la pagina">
                    </div>
                    <label for="inputEmail3" class="col-sm-1 col-form-label tg-right">	Roll</label>
                    <div class="col-sm-3">
                      <select class="custom-select form-control" id="inputGroupSelect01">
                        <option selected>Roll...</option>
                        <option value="1">Desarrollo</option>
                        <option value="2">Analista Master</option>
                        <option value="3">Consultor</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-check">
                        <input class="form-check-input col-sm-1 tg-success" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                        <label class="form-check-label col-sm-6 tg-success" for="gridRadios1">
                          Activo
                        </label>
                        <div class="col-sm-4"></div><br>
                        <input class="form-check-input col-sm-1 tg-error" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label col-sm-6 tg-error" for="gridRadios2">
                          Offline
                        </label>
                      </div>
                    </div>
                  </article>
                  <article class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label tg-right">Url</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Url de la pagina">
                    </div>
                    <label for="inputEmail3" class="col-sm-1 col-form-label tg-right">Url2</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Url alternativo">
                    </div>
                    <div class="col-sm-3">
                      <div class="form-check">
                        <input class="form-check-input col-sm-1 tg-edit" type="radio" name="gridRadios2" id="gridRadios3" value="option1" checked>
                        <label class="form-check-label col-sm-7 tg-edit" for="gridRadios3">
                          privado
                        </label>
                        <div class="col-sm-3"></div><br>
                        <input class="form-check-input col-sm-1 tg-success" type="radio" name="gridRadios2" id="gridRadios4" value="option2">
                        <label class="form-check-label col-sm-6 tg-success" for="gridRadios4">
                          publico
                        </label>
                      </div>
                    </div>
                  </article>
                  <article class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label tg-right">Color</label>
                    <div class="col-sm-2">
                      <input type="color" class="form-control" id="inputEmail3" placeholder="Url de la pagina">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label tg-right">Fondo</label>
                    <div class="col-sm-2">
                      <input type="color" class="form-control" id="inputEmail3" placeholder="Url alternativo">
                    </div>
                    <div class="col-sm-4"></div>
                  </article>
                  <article class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label tg-right">Logo</label>
                      <input type="file" class="form-control col-sm-6" id="inputEmail3" placeholder="Url de la pagina">
                      <div class="col-sm-4"></div>
                      <div class="col-sm-4 td-center">
                        <img src="https://www.dosprofesenapuros.com/wp-content/uploads/2015/09/hoja-rota1-854x1024.png" width="100" alt="">
                      </div>
                  </article>
                  <article class="form-group row">
                      <div class="col-sm-1"></div>
                      <label class="form-check-input col-sm-11"  for="exampleFormControlTextarea1">Nota</label>
                       <div class="col-sm-1"></div>
                      <textarea class="form-control col-sm-10" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </article>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success">Save changes</button>
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
        dataPag_Tec: []
      }
    },
 methods: {
      modal:function(Fecha){
          $(".modal").show();
      },
      cerrar:function(){
          $(".modal").hide();
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
</style>