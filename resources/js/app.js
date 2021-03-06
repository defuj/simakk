import './bootstrap'
import Vue from 'vue'
import router from './router.js'
import store from './store/index.js'
import VueSweetalert2 from 'vue-sweetalert2'
import { setHeaderToken } from './utils/auth.js'
axios.defaults.baseURL = 'http://127.0.0.1:8000/'
const baseURL = 'http://127.0.0.1:8000/'

const options = {
  confirmButtonColor: '#41b882',
  cancelButtonColor: '#ff7674',
};
//Vue.use(VueSweetalert2, options);
Vue.use(VueSweetalert2)

import VueToast from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-sugar.css'
Vue.use(VueToast)

import TextareaAutosize from 'vue-textarea-autosize'
Vue.use(TextareaAutosize)

import VueGoogleCharts from 'vue-google-charts' 
Vue.use(VueGoogleCharts)

Vue.config.productionTip = false
Vue.component('app-component',require('./App.vue').default)
Vue.component('header-component',require('./components/Header.vue').default)
Vue.component('footer-component',require('./components/Footer.vue').default)
Vue.component('login-component',require('./components/pages/Login.vue').default)
Vue.component('item-kuesioner',require('./components/items/Kuesioner.vue').default)

const token = localStorage.getItem('token')
if (token) { 
  setHeaderToken(token) 
} 

const app = new Vue({
    el : '#app',
    router,
    store,
});