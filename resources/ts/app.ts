import Vue from "vue";
import Vuetify from "vuetify";
import '@mdi/font/css/materialdesignicons.css' // Ensure you are using css-loader
import "vuetify/dist/vuetify.min.css";
import App from "./components/Main.vue";
import router from './router'
import { required, email, max } from 'vee-validate/dist/rules'
import { extend, ValidationProvider } from 'vee-validate'
import http from './plugins/http';
Vue.use(http);

Vue.use(Vuetify);
Vue.component('ValidationProvider', ValidationProvider);

extend('required', {
  ...required,
  message: '{_field_} は必須です',
})
extend('max', {
  ...max,
  message: '{_field_} が {length} 文字数を超えています。',
})
extend('email', {
  ...email,
  message: 'メールアドレスの形式が不正です',
})

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
