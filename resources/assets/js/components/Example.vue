<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <br>
                <button type="button" class="btn btn-success btn-lg"><i class="fa fa-arrow-up fa-5x"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <br>
                <button type="button" class="btn btn-danger btn-lg"><i class="fa fa-arrow-down fa-5x"></i></button>
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
