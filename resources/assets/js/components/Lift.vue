<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5">
                <br>
                <button type="button"
                    @mousedown="up"
                    @mouseup="stop"
                    @mouseleave="stop"
                    class="btn btn-success"
                >
                    <i class="fa fa-arrow-up" style="font-size: 196px;"></i>
                </button>

                <br><br>

                <button type="button"
                    @mousedown="down"
                    @mouseup="stop"
                    @mouseleave="stop"
                    class="btn btn-danger"
                >
                    <i class="fa fa-arrow-up" style="font-size: 196px;"></i>
                </button>
            </div>

            <div class="col-sm-2">
                <table>
                    <tr>
                        <td style="vertical-align: middle">
                            <button type="button" class="btn btn-default">
                                &nbsp;<i class="fa fa-lock" style="font-size: 180px;"></i>&nbsp;
                            </button>
                        </td>
                    </tr>
                </table>
                <br><br>
                {{motion}}
                {{touchme}}
            </div>

            <div class="col-sm-5 text-right">
                <button type="button" @click="reload" class="btn btn-default btn-lg">Reload</button>
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
