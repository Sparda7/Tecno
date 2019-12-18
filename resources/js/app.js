/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
/*aqui invocas todas las vistas */
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Vue.component('orden_alimenticio-component', require('./components/OrdenAlimenticio.vue').default);



Vue.component('alimentos-component', require('./components/Alimento.vue').default);

Vue.component('categorias-component', require('./components/CategoriaAlimento.vue').default);

Vue.component('orden_alimento-component', require('./components/OrdenAlimento.vue').default);

Vue.component('actividad_fisicas-component', require('./components/ActividadFisica.vue').default);

Vue.component('filas-component', require('./components/utilitarios/Filas.vue').default);

Vue.component('modal-component', require('./components/utilitarios/Modal.vue').default);

Vue.component('tipo-actividad-component', require('./components/TipoActividad.vue').default);

Vue.component('dieta-component', require('./components/Dieta.vue').default);
Vue.component('principal-component', require('./components/Principal.vue').default);
Vue.component('menu-component', require('./components/Menu.vue').default);
Vue.component('perfil-component', require('./components/Perfil.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data :{
        menu : 0
    }
});
