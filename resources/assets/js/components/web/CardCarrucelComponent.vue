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
                    <section class="row">
                        <div class="col-12"> &nbsp; </div>
                        <div class="col-6">
                            <img src="http://localhost:8001/storage/public/home/img1.png" width="90%" alt="Card image cap" class="img-thumbnail"> 
                            <small class="form-text text-muted"> &nbsp;&nbsp;*Tamaño <strong>700 X 350</strong></small>
                        </div>
                        <div class="form-group col-6">
                            Selecciona una imagen en formato PNG de tamaño inferior a 1MB.<br/>
                            <input type="file" name="fimagen" accept="image/gif, image/jpeg, image/png"/>
                        </div>
                    </section>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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
</style>