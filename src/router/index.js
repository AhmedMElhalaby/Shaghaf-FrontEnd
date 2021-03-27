import { createRouter, createWebHashHistory } from 'vue-router'
import Home from '../views/Home.vue'

const routes = [
  {
    path: '/',
    name: 'shaghaf',
    component:() => import('../views/pages/home.vue')
  },
  {
    path: '/my_account',
    name: 'my_account',
    component:() => import('../views/pages/my_account.vue')
  },
  {
    path: '/my_account_2',
    name: 'my_account_2',
    component: () => import('../views/pages/my_account_2.vue')
  },
  {
    path: '/serve_user',
    name: 'serve_user',
    component: () => import('../views/pages/serve_user.vue'),
  },
  {
    path: '/user_services',
    name: 'user_services',
    component: () => import('../components/sections/serve_user/user_services.vue')
  },
  {
    path: '/portfolio',
    name: 'portfolio',
    component:  () => import('../components/sections/serve_user/portfolio.vue')
  },
  {
    path: '/our_serve',
    name: 'our_serve',
    component: () => import('../views/pages/our_serve.vue')
  },
  {
    path: '/serve_user',
    name: 'serve_user',
    component: () => import('../views/pages/serve_user.vue')
  },
  {
    path: '/add_service',
    name: 'add_service',
    component: () => import('../views/pages/add_service.vue')
  },
  {
    path: '/orders',
    name: 'orders',
    component: () => import('../views/pages/orders.vue')
  },
  {
    path: '/orders_2',
    name: 'orders_2',
    component:  () => import('../views/pages/orders_2.vue')
  },
  {
    path: '/orders_details',
    name: 'orders_details',
    component: () => import('../views/pages/orders_details.vue')
  },
  {
    path: '/orders_details_2',
    name: 'orders_details_2',
    component:  () => import('../views/pages/orders_details_2.vue')
  },
  {
    path: '/chats',
    name: 'chats',
    component: () => import('../views/pages/chats.vue')
  },
  {
    path: '/financial',
    name: 'financial',
    component: () => import('../views/pages/financial_operation.vue')
  },
  {
    path: '/payment',
    name: 'payment',
    component: () => import('../components/sections/payment.vue')
  },
  {
    path: '/paymentStatus',
    name: 'paymentStatus',
    component: () => import('../components/modals/paymentStatus.vue')
  },
  {
    path: '/Freelancer_page',
    name: 'Freelancer_page',
    component: () => import('../views/pages/Freelancer_page.vue')
  },
  {
    path: '/notifications',
    name: 'notifications',
    component: () => import('../views/pages/notifications.vue')
  },
  {
    path: '/Home',
    name: 'Home',
    component: Home
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
