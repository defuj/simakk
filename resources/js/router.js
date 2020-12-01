import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import VueAxios from 'vue-axios'
import axios from 'axios'

import VueSocialauth from 'vue-social-auth'
Vue.use(VueSocialauth, {
    providers: {
      google: {
        clientId: '790843590829-n7d62ke9blphmlrb2mhgqtdin4mmsmjn.apps.googleusercontent.com',
        client_secret: '8ZMMIKbv3TT6Hbntk6zZR2yE',
        redirectUri: 'http://127.0.0.1:8000/auth/google/callback'
      }
    }
})

Vue.use(VueAxios, axios)
import Home from './components/pages/Home.vue'
import About from './components/pages/About.vue'
import Team from './components/pages/Team.vue'
import NotFound from './components/pages/NotFound.vue'
import KuesionerEdit from './components/pages/kuesioner/Modify.vue'
import KuesionerList from './components/pages/kuesioner/List.vue'

const routes = [
    {
        name: 'home',
        path:'/',
        redirect: '/home'
    },
    {
        name: 'home',
        path: '/home',
        component: Home,
    },
    {
        name: 'about',
        path: '/about',
        component: About,
    },
    {
        name: 'team',
        path: '/team',
        component: Team,
    },
    {
        name: 'kuesioner_list',
        path: '/kuesioner',
        component : KuesionerList,
    },
    {
        name: 'kuesioner_edit',
        path: '/kuesioner/:id',
        component : KuesionerEdit,
    },
    {
        name: 'questionnaire',
        path: '/questionnaire/:id',
        component: Team,
    },
    {
        path: '/auth/:provide/callback',
        component: {
          template: '<div class="auth-component"></div>'
        }
    },
    {
        name: 'Not Found',
        path: '*',
        //redirect: '/error_404',
        redirect: '/home',
    },
    {
        name: 'Not Found',
        path: '/error_404',
        component: NotFound,
    },
];

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    linkActiveClass: 'active'
});

/*
router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
      if (store.getters.isLoggedIn) {
        next()
        return
      }
      next('/login')
    } else {
      next()
    }
  })
*/

export default router;