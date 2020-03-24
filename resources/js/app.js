import Vue from "vue";
import Vuetify from "vuetify";
import App from "./components/ExampleComponent";
Vue.use(Vuetify);

new Vue({
  el: "#app",
  components: App,
  vuetify: new Vuetify()
});
