<template>
    <div class="container-fluid">
        <div class="row no-gutter text-center">
            <div class="col-xs-6">
                <button type="button" @click="toggleDoor" class="btn btn-info btn-large-text">
                    <i class="fa fa-car"></i><br>
                    Garage Door
                </button>

                <button type="button" @click="toggleLight" class="btn btn-warning btn-medium-text">
                    <i class="fa fa-lightbulb-o"></i> Light
                </button>
                <button type="button" @click="toggleVacation" class="btn btn-danger btn-medium-text">
                    <i class="fa fa-plane"></i> Vacation
                </button>
            </div>

            <div class="col-xs-6">
                <div class="panel" :class="[codeError ? 'panel-danger' : 'panel-primary']">
                    <div class="panel-heading">
                        <h1 class="panel-title">{{ codeError ? 'Try Again' : 'Unlock Lift' }}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row no-gutter">
                            <div class="col-xs-4">
                                <button type="button" class="btn btn-number" :class="[codeError ? 'btn-danger' : 'btn-default']" disabled="disabled"><i class="fa fa-circle" v-if="digit_1 != ''"></i></button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" class="btn btn-number" :class="[codeError ? 'btn-danger' : 'btn-default']" disabled="disabled"><i class="fa fa-circle" v-if="digit_2 != ''"></i></button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" class="btn btn-number" :class="[codeError ? 'btn-danger' : 'btn-default']" disabled="disabled"><i class="fa fa-circle" v-if="digit_3 != ''"></i></button>
                            </div>
                        </div>

                        <div class="row no-gutter">
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('1')" class="btn btn-primary btn-number">1</button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('2')" class="btn btn-primary btn-number">2</button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('3')" class="btn btn-primary btn-number">3</button>
                            </div>
                        </div>
                        <div class="row no-gutter">
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('4')" class="btn btn-primary btn-number">4</button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('5')" class="btn btn-primary btn-number">5</button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('6')" class="btn btn-primary btn-number">6</button>
                            </div>
                        </div>
                        <div class="row no-gutter">
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('7')" class="btn btn-primary btn-number">7</button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('8')" class="btn btn-primary btn-number">8</button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('9')" class="btn btn-primary btn-number">9</button>
                            </div>
                        </div>
                        <div class="row no-gutter">
                            <div class="col-xs-4">
                                <button type="button" @click="clearEnteredCode" class="btn btn-danger btn-number"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="appendNumber('0')" class="btn btn-primary btn-number">0</button>
                            </div>
                            <div class="col-xs-4">
                                <button type="button" @click="unlock" class="btn btn-success btn-number"><i class="fa fa-unlock"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                code: '519',
                digit_1: '',
                digit_2: '',
                digit_3: '',
                codeError: false,
            }
        },

        computed: {
            enteredCode: function() {
                return this.digit_1 + '' + this.digit_2 + '' + this.digit_3;
            }
        },

        methods: {
            appendNumber: function(number) {
                this.codeError = false;
                if (this.digit_1 == '') {
                    this.digit_1 = number;
                } else if (this.digit_2 == '') {
                    this.digit_2 = number;
                } else if (this.digit_3 == '') {
                    this.digit_3 = number;
                }
            },

            clearEnteredCode: function() {
                this.digit_1 = '';
                this.digit_2 = '';
                this.digit_3 = '';
                this.codeError = false;
            },

            unlock: function() {
                if (this.enteredCode == this.code) {
                    window.location = '/lift';
                } else {
                    this.clearEnteredCode();
                    this.codeError = true;
                }
            },

            toggleDoor: function() {
                axios.get('/api/door')
                    .then(function (response) {

                    }.bind(this))
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            toggleLight: function() {
                axios.get('/api/light')
                    .then(function (response) {

                    }.bind(this))
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            toggleVacation: function() {
                axios.get('/api/vacation')
                    .then(function (response) {

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
