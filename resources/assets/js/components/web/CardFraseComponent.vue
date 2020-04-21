<template>
<div class="card">
    <div class="card-header">
        Card cita favorita [ Frase ]
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <img src="http://localhost:8001/storage/web/landing/estiveJ.png" width="80px" alt="Card image cap" class="img-circle"> 
                <div class="form-group">
                    Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
                <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
            </div>
        </div>
        <div class="col-8">
            <input type="text" class="form-control mb-2" placeholder="Titulo de la Frase" >
            <textarea class="form-control  mb-2" placeholder="Descripción de la Frase" rows="7"></textarea>
        </div>
        </div>
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