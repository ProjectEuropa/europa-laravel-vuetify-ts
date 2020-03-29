import Vue from "vue";
import Vuetify from "vuetify";
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import "vuetify/dist/vuetify.min.css";
import App from "./components/Main.vue";
import router from './router'

Vue.use(Vuetify);
new Vuetify({
  icons: {
    iconfont: 'mdi',
  }
});
new Vue({
  router: router,
  render: h => h(App),
  vuetify: new Vuetify()
}).$mount('#app')
