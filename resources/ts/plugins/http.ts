import _Vue from 'vue';
import axios from 'axios';

export default {
  install(Vue: typeof _Vue): void {
    const http = axios.create({
      responseType: "json"
    });
    Vue.prototype.$http = http;
  },
};
