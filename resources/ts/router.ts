import Vue from 'vue'
import Router from 'vue-router'
import Top from './components/pages/Top.vue'
import Upload from './components/pages/Upload.vue'
import SimpleUpload from './components/pages/SimpleUpload.vue'
import SearchTeam from './components/pages/SearchTeam.vue'
import SearchMatch from './components/pages/SearchMatch.vue'
import SumDLTeamData from './components/pages/SumDLTeamData.vue'
import SumDLMatchData from './components/pages/SumDLMatchData.vue'
import Login from './components/pages/Login.vue'
import Register from './components/pages/Register.vue'
import Information from './components/pages/Information.vue'
import EventNotice from './components/pages/EventNotice.vue'

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
      path: '/search/team',
      name: 'SearchTeam',
      component: SearchTeam,
    },
    {
      path: '/search/match',
      name: 'SearchMatch',
      component: SearchMatch,
    },
    {
      path: '/sumdownload/team',
      name: 'SumDLTeamData',
      component: SumDLTeamData,
    },
    {
      path: '/sumdownload/match',
      name: 'SumDLMatchData',
      component: SumDLMatchData,
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
  ]
});

export default router
