const Vue = require('vue');

require('./php.component');
require('./component.service');

window.Vue = Vue;

new Vue({ el: '#vue' });
