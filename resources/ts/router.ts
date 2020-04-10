import Vue from 'vue'
import Router from 'vue-router'
import Top from './components/pages/Top.vue'
import Upload from './components/pages/Upload.vue'
import SimpleUpload from './components/pages/SimpleUpload.vue'
import Search from './components/pages/Search.vue'
import SumDL from './components/pages/SumDL.vue'
import Login from './components/pages/Login.vue'
import Register from './components/pages/Register.vue'
import Information from './components/pages/Information.vue'
import EventNotice from './components/pages/EventNotice.vue'
import Mypage from './components/pages/Mypage.vue'

Vue.use(Router)

const router = new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Top',
      component: Top,
    },
    {
      path: '/upload',
      name: 'Upload',
      component: Upload,
    },
    {
      path: '/simpleupload',
      name: 'SimpleUpload',
      component: SimpleUpload,
    },
    {
      path: '/search/:searchType',
      name: 'Search',
      component: Search,
    },
    {
      path: '/sumdownload/:searchType',
      name: 'SumDL',
      component: SumDL,
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
    },
    {
      path: '/register',
      name: 'Register',
      component: Register,
    },
    {
      path: '/information',
      name: 'Information',
      component: Information,
    },
    {
      path: '/eventnotice',
      name: 'EventNotice',
      component: EventNotice,
    },
    {
      path: '/mypage',
      name: 'Mypage',
      component: Mypage,
    },
  ]
});

export default router
