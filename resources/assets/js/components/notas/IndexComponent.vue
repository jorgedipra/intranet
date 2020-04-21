<template>
<div class="container">
    <div class="row">
      <div class="col-12"> &nbsp; </div>
      <section class="col-12">
        <div class="row">
          <div class="col-7">
              <div class="card">
                <div class="card-header">
                   :: NOTAS ::  <font-awesome-icon :icon="['fas', 'clipboard']" />
                </div>
                <div class="card-body">
                    <h3>Lista de notas:</h3>
                    <ul class="list-group">
                        <li class="list-group-item borderTopBl" 
                            v-for="(item, index) in notas" :key="index" >
                          <span class="badge badge-primary float-right">
                            {{item.updated_at}}
                          </span>
                          <h4>{{item.nombre}}</h4>
                          <p>{{item.descripcion}}</p>
                          <hr>  
                          <p>
                            <button class="btn btn-warning btn-sm" 
                                @click="editarFormulario(item)">Editar <font-awesome-icon :icon="['fas', 'edit']" /></button>
                            <button class="btn btn-danger btn-sm" 
                                @click="eliminarNota(item, index)">Eliminar <font-awesome-icon :icon="['fas', 'times']" /></button>
                          </p>
                        </li>
                    </ul>
                </div>
              </div>
          </div>
          <div class="col-4">
             <div class="card">
                <div class="card-header">
                  :: GESTION DE NOTAS ::
                </div>
                <div class="card-body">
                  <form @submit.prevent="editarNota(nota)" v-if="modoEditar">
                    <div class="form-group">
                      <h3>Editar nota</h3>
                      <input type="text" class="form-control mb-2"
                      placeholder="Nombre de la nota" v-model="nota.nombre">
                      <small id="emailHelp" class="form-text text-muted"> * Editar el titulo de la <strong>nota</strong>.</small>
                      <textarea class="form-control  mb-2" placeholder="Descripción de la nota" v-model="nota.descripcion"  rows="7"></textarea>
                      <hr><br>   
                      <button class="btn btn-success" type="submit">Guardar <font-awesome-icon :icon="['fas', 'save']" /></button>
                      <button class="btn btn-danger" type="submit" 
                        @click="cancelarEdicion">Cancelar <font-awesome-icon :icon="['fas', 'times']" /></button>
                    </div>
                  </form>
                  <form @submit.prevent="agregar" v-else>
                    <div class="form-group">
                      <h3>Agregar nota</h3>
                      <input type="text" class="form-control mb-2" 
                        placeholder="Nombre de la nota" v-model="nota.nombre">
                        <small id="emailHelp" class="form-text text-muted"> * Agrega el titulo de la <strong>nota</strong>.</small>
                        <textarea class="form-control  mb-2" placeholder="Descripción de la nota" v-model="nota.descripcion"  rows="7"></textarea>
                        <hr><br> 
                        <button class="btn btn-primary" type="submit">Agregar  <font-awesome-icon :icon="['fas', 'plus-circle']" /></button>
                    </div>
                  </form>
                </div>
              </div>
          </div>
        </div>
      </section>
    </div>
</div>
</template>

<script>
export default {
  data() {
    return {
      notas: [],
      modoEditar: false,
      nota: {nombre: '', descripcion: ''}
    }
  },
  created(){
    axios.get('/intranet').then(res=>{
      this.notas = res.data;
    })
  },
  methods:{
    agregar(){
      if(this.nota.nombre.trim() === '' || this.nota.descripcion.trim() === ''){
        alert('Debes completar todos los campos antes de guardar');
        return;
      }
      const notaNueva = this.nota;
      this.nota = {nombre: '', descripcion: ''};    
      axios.post('/intranet', notaNueva)
        .then((res) =>{
          const notaServidor = res.data;
          this.notas.push(notaServidor);
        })
    },
    editarFormulario(item){
      this.nota.nombre = item.nombre;
      this.nota.descripcion = item.descripcion;
      this.nota.id = item.id;
      this.modoEditar = true;
    },
    editarNota(nota){
      const params = {nombre: nota.nombre, descripcion: nota.descripcion};
      axios.put(`/intranet/${nota.id}`, params)
        .then(res=>{
          this.modoEditar = false;
          const index = this.notas.findIndex(item => item.id === nota.id);
          this.notas[index] = res.data;
          this.nota.nombre= '';
          this.nota.descripcion= ''; 
        })
    },
    eliminarNota(nota, index){
      const confirmacion = confirm(`Eliminar nota ${nota.nombre}`);
      if(confirmacion){
        axios.delete(`/intranet/${nota.id}`)
          .then(()=>{
            this.notas.splice(index, 1);
          })
      }
    },
    cancelarEdicion(){
      this.modoEditar = false;
      this.nota = {nombre: '', descripcion: ''};
    }
  }
}
</script>
<style lang="stylus">
.borderTopBl{
  border-top: solid 1px #212121 !important;
}
</style>