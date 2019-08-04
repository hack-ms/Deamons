import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home.vue';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/result',
      name: 'result',
      component: () => import('./views/Result.vue'),
    },
    {
      path: '/deatils',
      name: 'details',
      component: () => import('./views/Details.vue'),
    },
    {
      path: '/rating',
      name: 'rating',
      component: () => import('./views/Rating.vue'),
    },
    {
      path: '/conclusion',
      name: 'conclusion',
      component: () => import('./views/Conclusion.vue'),
    },
  ],
});
