require('bootstrap-sass/assets/javascripts/bootstrap.min.js');

var Vue = require('vue');
var axios = require('axios');

window.Vue = Vue;
window.axios = axios;

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

new Vue({ el: '#vue-container' });
