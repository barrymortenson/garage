<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11 col-lg-offset-1">
                <br>
                <button type="button" @mousedown="up" @touchstart="touch" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-lg"><i class="fa fa-arrow-up fa-5x"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11">
                <br>
                <button type="button" @mousedown="down" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-lg"><i class="fa fa-arrow-down fa-5x"></i></button>
            </div>
        </div>

        <div class="row">
            <br><br>
            {{motion}}
            {{touchme}}
        </div>

        <div class="row">
            <br>
            <button type="button" @click="reload" class="btn btn-default btn-lg">Reload</button>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                error: false,
                motion: 'stopped',
                touchme: false,
            }
        },

        methods: {
            reload: function() {
                window.location = window.location;
            },

            touch: function() {
                this.touchme = true
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
