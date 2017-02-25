<template>
    <div class="container-fluid">
        <div class="row no-gutter text-center">
            <div class="col-xs-6">
                <button type="button" @mousedown="up" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-large">
                    <i class="fa fa-arrow-up"></i>
                </button>

                <button type="button" @mousedown="down" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-large">
                    <i class="fa fa-arrow-down"></i>
                </button>
            </div>

            <div class="col-xs-6" >
                <a type="button" href="/" class="btn btn-warning btn-large">
                    <i class="fa fa-lock"></i>
                </a>

                <button type="button" @click="reload" class="btn btn-primary btn-large">
                    <i class="fa fa-gear"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                error: false,
                motion: 'stopped',
            }
        },

        methods: {
            reload: function() {
                window.location = window.location;
            },

            up: function() {
                axios.get('/api/up')
                    .then(function (response) {
                        this.motion = 'going up';
                    }.bind(this))
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            down: function() {
                axios.get('/api/down')
                    .then(function (response) {
                        this.motion = 'going down';
                    }.bind(this))
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            stop: function() {
                if (this.motion != 'stopped') {
                    axios.get('/api/stop')
                        .then(function (response) {
                            this.motion = 'stopped';
                        }.bind(this))
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
        }
    }
</script>
