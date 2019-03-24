require('./bootstrap');

import Vue from 'vue'

Vue.component('beranda', require('./components/kecamatan/beranda.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('daftar-pelayanan', require('./components/kecamatan/PelayananDaftar').default);


const app = new Vue({
    el: '#app'
});
