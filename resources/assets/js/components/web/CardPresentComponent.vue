<template>
<div class="card">
    <div class="card-header">
        Card Presentación
    </div>
    <div class="card-body">
        <div class="form-group">
            Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
            <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
        </div>
        <img src="http://localhost:8001/storage/public/home/user.jpg" alt="Card image cap" class="img-thumbnail"> 
        <hr>
        <input type="text" class="form-control mb-2" placeholder="Titulo de la card" >
        <small id="emailHelp" class="form-text text-muted"> *Nombre de la pagina <strong>Title_card</strong>.</small>
        <input type="text" class="form-control mb-2" placeholder="Nombre" >
        <input type="text" class="form-control mb-2" placeholder="Apellido" >
        <hr>
        <input type="text" class="form-control mb-2" placeholder="Cargo" >
        <input type="text" class="form-control mb-2" placeholder="Empresa" >
    </div>    
</div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>