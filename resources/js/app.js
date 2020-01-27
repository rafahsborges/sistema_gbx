require('./bootstrap');

// Global
import VueTheMask from 'vue-the-mask';
import money from 'v-money';

Vue.use(VueTheMask);
Vue.use(money, {precision: 4});
