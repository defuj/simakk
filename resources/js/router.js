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
import KuesionerEdit from './components/pages/kuesioner/Edit.vue'
import KuesionerView from './components/pages/kuesioner/Show.vue'
import KuesionerPreview from './components/pages/kuesioner/Preview.vue'
import KuesionerResponses from './components/pages/kuesioner/Responses.vue'

const routes = [
    {
      path:'/',
      redirect: '/forms',
    },
    {
      path:'/forms',
      name: 'home',
      component: Home,
    },
    {
      path:'/forms/:id/edit',
      name: 'edit_kuesioner',
      component : KuesionerEdit,
    },
    {
      path:'/forms/:id/edit/responses',
      name: 'responses_kuesioner',
      component : KuesionerResponses,
    },
    {
      path:'/forms/:id/view',
      name: 'view_kuesioner',
      component : KuesionerView,
    },
    {
      path:'/forms/:id/preview',
      name: 'preview_kuesioner',
      component : KuesionerPreview,
    },
    {
      path: '/pages/team',
      name: 'team',
      component: Team,
    },
    {
      path: '/pages/about',
      name: 'pages',
      component: About,
    },
    {
      path: '/auth/:provide/callback',
      component: {
        template: '<div class="auth-component"></div>'
      }
    },
    {
      path: '/error_404',
      name: 'not_found',
      component: NotFound,
    },
    {
      path: '/*',
      name : 'not_found',
      component: NotFound,
    },
];

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    linkActiveClass: 'active'
});

export default router;