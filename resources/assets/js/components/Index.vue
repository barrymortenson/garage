<template>
    <div class="container-fluid">
        <div v-show="!motor_adjust" class="row no-gutter text-center">
            <div class="col-xs-6">
                <button type="button" @mousedown="toggleGarageDoor" class="btn btn-primary btn-large-text" :class="[garage_open ? 'btn-warning' : 'btn-primary']">
                    <i class="fa fa-car"></i><br>
                    <span v-if="!garage_open">Open</span><span v-else>Close</span> Garage
                </button>

                <button type="button" @mousedown="toggleOpenerLight" class="btn btn-small-text" :class="[light_on ? 'btn-warning' : 'btn-info']">
                    <i class="fa fa-lightbulb-o"></i> Opener Light
                </button>
                <button type="button" @mousedown="toggleVacationLock" class="btn btn-small-text" :class="[vacation_on ? 'btn-danger' : 'btn-info']">
                    <i class="fa fa-plane"></i> Vacation Lock
                </button>
            </div>

            <div class="col-xs-6">
                <div v-show="!authorized" class="panel" :class="[codeError ? 'panel-danger' : 'panel-primary']">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            <span v-if="!codeError">Lift Controls</span>
                            <span v-else>
                                Try Again <a href="#" @click.prevent="clearEnteredCode" class="text-danger"><i class="fa fa-times-circle"></i></a>
                            </span>
                        </h1>
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
                            <div class="col-xs-4 col-xs-offset-4">
                                <button type="button" @click="appendNumber('0')" class="btn btn-primary btn-number">0</button>
                            </div>

                        </div>
                    </div>
                </div>

                <div v-show="authorized">
                    <button type="button" @mousedown="move('up')" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-medium-text">
                        <i class="fa fa-arrow-up"></i><br>
                        Raise Lift
                    </button>

                    <button type="button" @mousedown="move('down')" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-medium-text">
                        <i class="fa fa-arrow-down"></i><br>
                        Lower Lift
                    </button>

                    <button type="button" @click="toggleMotorAdjust" class="btn btn-secondary btn-two-up" style="margin-right: 5px;">
                        <i class="fa fa-sliders"></i>
                    </button>

                    <button type="button" @mousedown="lock" class="btn btn-secondary btn-two-up" style="margin-left: 5px;">
                        <i class="fa fa-lock"></i>
                    </button>
                </div>
            </div>
        </div>

        <div v-show="motor_adjust" class="row no-gutter text-center">
            <div class="col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Motor 1
                        </h1>
                    </div>
                    <div class="panel-body no-gutter">
                        <button type="button" @mousedown="move('1-up')" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-two-up narrow">
                            <i class="fa fa-arrow-up"></i>
                        </button>

                        <button type="button" @mousedown="move('1-down')" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-two-up narrow">
                            <i class="fa fa-arrow-down"></i>
                        </button>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Motor 2
                        </h1>
                    </div>
                    <div class="panel-body no-gutter">
                        <button type="button" @mousedown="move('3-up')" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-two-up narrow">
                            <i class="fa fa-arrow-up"></i>
                        </button>

                        <button type="button" @mousedown="move('3-down')" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-two-up narrow">
                            <i class="fa fa-arrow-down"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Motor 2
                        </h1>
                    </div>
                    <div class="panel-body no-gutter">
                        <button type="button" @mousedown="move('2-up')" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-two-up narrow">
                            <i class="fa fa-arrow-up"></i>
                        </button>

                        <button type="button" @mousedown="move('2-down')" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-two-up narrow">
                            <i class="fa fa-arrow-down"></i>
                        </button>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h1 class="panel-title">
                            Motor 4
                        </h1>
                    </div>
                    <div class="panel-body no-gutter">
                        <button type="button" @mousedown="move('4-up')" @mouseup="stop" @mouseleave="stop" class="btn btn-success btn-two-up narrow">
                            <i class="fa fa-arrow-up"></i>
                        </button>

                        <button type="button" @mousedown="move('4-down')" @mouseup="stop" @mouseleave="stop" class="btn btn-danger btn-two-up narrow">
                            <i class="fa fa-arrow-down"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <button type="button" @click="toggleMotorAdjust" class="btn btn-secondary btn-small-text" style="font-size: 20px; height: 50px; ">
                    <i class="fa fa-arrow-left"></i> Back
                </button>
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
                garage_open: false,
                light_on: false,
                vacation_on: false,
                motor_adjust: false,
            }
        },

        computed: {
            enteredCode: function() {
                return this.digit_1 + '' + this.digit_2 + '' + this.digit_3;
            },
            authorized: function() {
                return this.enteredCode == this.code;
            },
            codeError: function() {
                return this.digit_3 != '' && !this.authorized;
            }
        },

        methods: {
            appendNumber: function(number) {
                if (this.codeError) {
                    this.clearEnteredCode();
                }

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

            toggleGarageDoor: function() {
                axios.get('/api/door')
                    .then((response) => {
                        this.garage_open = this.garage_open ? false: true;
                    })
                    .catch(function (error) {
                        alert(error);
                    });
            },

            toggleOpenerLight: function() {
                axios.get('/api/light')
                    .then((response) => {
                        this.light_on = this.light_on ? false: true;
                    })
                    .catch(function (error) {
                        alert(error);
                    });
            },

            toggleVacationLock: function() {
                axios.get('/api/vacation')
                    .then((response) => {
                        this.vacation_on = this.vacation_on ? false: true;
                    })
                    .catch(function (error) {
                        alert(error);
                    });
            },

            toggleMotorAdjust: function() {
                this.motor_adjust = this.motor_adjust ? false: true;
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
                    .catch((thrown) => {
                        if (axios.isCancel(thrown)) {
                            //console.log('Request canceled', thrown.message);
                        } else {
                            alert(thrown.message);
                        }
                    });
            },

            lock: function() {
                this.clearEnteredCode();
            },
        }
    }
</script>
