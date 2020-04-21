<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <strong>Jorgedipra</strong> 
                    </div>

                    <div class="panel-body text-center">
                        <img src="/image/home/img2.png" class="imgHome" alt="jorgedipra">
                        <br><br>  
                        <div class="btn-group text-center" role="group" aria-label="Basic">
                            <a href="https://jorgedipra.com/" target="_black">
                            <button type="button" class="btn btn-dark">Home</button>
                            </a>
                            <a href="https://jorgedipra.blogspot.com/" target="_black">
                                <button type="button" class="btn btn-dark">Blog</button>
                            </a>
                            <a href="https://jorgedipra.com/Portafolio" target="_black">
                                <button type="button" class="btn btn-dark">Portafolio</button>
                            </a>
                            <a href="https://drive.google.com/drive/folders/0ByWJai73PqMpeE1MTGZqZnJVbnc" target="_black">
                                <button type="button" class="btn btn-dark">Certificados</button>
                            </a>
                            <a href="https://jorgedipra.com/Contacto" target="_black">
                                <button type="button" class="btn btn-dark">Contactame</button>
                            </a>
                        </div>
                    </div>
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
<style >

</style>
<style lang="stylus">
.imgHome{
    width: 100%;
}
.btn-dark{
    color:#fff;
    background: #333;
}
</style>