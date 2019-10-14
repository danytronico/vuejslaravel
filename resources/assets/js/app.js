
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './App.vue';
import Vuetify from 'vuetify';

Vue.use(Vuetify);

import home from './components/home.vue';
import contacto from './components/contactos'
import login from './components/login'
import principal from './components/principal'
import notification10 from './components/notifications10'
import ofrendar from './components/ofrendar'
import verofrenda from './components/verofrendas'
import vereventos from './components/vereventos'
import verpredica from './components/verpredica'
import verdevocional from './components/verdevocional'
import eventos from './components/eventos'
import predicas from './components/predicas'
import devocionales from './components/devocionales'
import minishombres from './components/minishombre'
import minismujeres from './components/minismujer'
import minismatrimonio from './components/minismatrimonio'
import minisninios from './components/minisninios'
import minisjovenes from './components/minisjovenes'
import nosotros from './components/nosotros'
import verminisgalery from './components/verminisgalery'

import AOS from 'aos'
import 'aos/dist/aos.css'




const routes = [
    {
        name: 'home',
        path: '/',
        component: home
    },

    {
        name: 'contacto',
        path: '/contacto',
        component: contacto
    },

    {
        name: 'login',
        path: '/login',
        component: login
    },

    {
        name: 'principal',
        path: '/principal',
        component: principal
    },

    {
        name: 'notification10',
        path: '/notification10',
        component: notification10
    },

    {
        name: 'ofrendar',
        path: '/ofrendar',
        component: ofrendar
    },

    {
        name: 'verofrenda',
        path: '/verofrenda',
        component: verofrenda
    },

    {
        name: 'vereventos',
        path: '/vereventos',
        component: vereventos
    },

    {
        name: 'verpredica',
        path: '/verpredica',
        component: verpredica
    },

    {
        name: 'verdevocional',
        path: '/verdevocional',
        component: verdevocional
    },

    {
        name: 'eventos',
        path: '/eventos',
        component: eventos
    },

    {
        name: 'predicas',
        path: '/predicas',
        component: predicas
    },

    {
        name: 'devocionales',
        path: '/devocionales',
        component: devocionales
    },

    {
        name: 'minishombres',
        path: '/minishombres',
        component: minishombres
    },

    {
        name: 'minismujeres',
        path: '/minismujeres',
        component: minismujeres
    },

    {
        name: 'minismatrimonio',
        path: '/minismatrimonio',
        component: minismatrimonio
    },


    {
        name: 'minisninios',
        path: '/minisninios',
        component: minisninios
    },

    {
        name: 'minisjovenes',
        path: '/minisjovenes',
        component: minisjovenes
    },

    {
        name: 'nosotros',
        path: '/nosotros',
        component: nosotros
    },

    {
        name: 'verminisgalery',
        path: '/verminisgalery',
        component: verminisgalery
    },




];


const router = new VueRouter({scrollBehavior() {
        return { x: 0, y: 0 };
    }, mode: 'history', routes: routes});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
    components: { App },
    created () {
        AOS.init()
    },

});
