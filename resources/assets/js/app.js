
require('./bootstrap');

Vue.component('index', require('./components/Index.vue'));

const app = new Vue({
    el: '#app'
});

var CancelToken = axios.CancelToken;
var source = CancelToken.source();
