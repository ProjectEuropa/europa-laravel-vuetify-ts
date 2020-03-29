import Vue from 'vue'
import Router from 'vue-router'
import Top from './components/pages/Top.vue'

Vue.use(Router)

const router = new Router({
  mode: 'hash',
  routes: [
    {
      path: '/',
      name: 'Top',
      component: Top,
    }
  ],
});

export default router
