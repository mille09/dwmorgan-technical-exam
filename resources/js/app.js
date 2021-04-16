require('./bootstrap');

import Vue from 'vue';
import App from './views/app.vue';
import vuetify from './vuetify'
import router from './router';

new Vue({
    el: '#app',
    router,
    vuetify,
    render: h => h(App)
})
