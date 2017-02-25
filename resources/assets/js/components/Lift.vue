<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11 col-lg-offset-1">
                <br>
                <button type="button" @mousedown="up" @mouseup="stop" class="btn btn-success btn-lg"><i class="fa fa-arrow-up fa-5x"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11">
                <br>
                <button type="button" class="btn btn-danger btn-lg"><i class="fa fa-arrow-down fa-5x"></i></button>
            </div>
        </div>

        <div class="row">
            {{motion}}
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                error: false,
                motion: false,
            }
        },

        methods: {
            up: function() {
                this.motion = true;
                /*
                this.$http.get('/api/sync')
                    .then(function (response) {
                        this.motion = false;
                    }, function (response) {
                        this.motion = false
                    }
                );
                */
            },

            stop: function() {
                this.motion = false;
            },
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
