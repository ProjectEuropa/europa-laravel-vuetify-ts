import _Vue from 'vue';
import axios from 'axios';

export default {
  install(Vue: typeof _Vue): void {
    const http = axios.create();
    Vue.prototype.$http = http;
  },
};
