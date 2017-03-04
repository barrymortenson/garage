<template>
    <div class="container-fluid">
        <div class="row no-gutter text-center">
            <div class="col-xs-6" >
                <button type="button" @click="lock" class="btn btn-warning btn-large">
                    <i class="fa fa-lock"></i>
                </button>

                <button type="button" @click="reload" class="btn btn-info btn-large">
                    <i class="fa fa-gear"></i>
                </button>
            </div>

            <div class="col-xs-6">
                <button type="button" @mousedown="move('up')" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-large">
                    <i class="fa fa-arrow-up"></i>
                </button>

                <button type="button" @mousedown="move('down')" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-large">
                    <i class="fa fa-arrow-down"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data: function() {
            return {
                motion: 'stopped',
                source: '',
                moving: false,
            }
        },

        methods: {
            reload: function() {
                window.location = window.location;
            },

            move: function(direction) {
                this.sendRequest(direction);
                this.moving = direction;
            },

            stop: function() {
                if (this.moving) {
                    this.sendRequest('stop');
                    this.moving = false;
                }
            },

            sendRequest: function(endpoint) {
                try {
                    this.source.cancel();
                } catch(err) {}
                var CancelToken = axios.CancelToken;
                this.source = CancelToken.source();
                axios.get('/api/motors/' + endpoint, { cancelToken: this.source.token })
                    .catch(function(thrown) {
                        if (axios.isCancel(thrown)) {
                            //console.log('Request canceled', thrown.message);
                        } else {
                            //console.log('other error');
                        }
                    });
            },

            lock: function() {
                window.location = '/';
            },
        }
    }
</script>
