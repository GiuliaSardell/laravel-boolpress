import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './components/pages/Home';
import About from './components/pages/About';
import Contact from './components/pages/Contact';
import Posts from './components/pages/Posts';

const router = new VueRouter({
  mode: 'history', //metto in relazione col browser
  linkExactActiveClass: 'active',
  routes:[
    {
      path:'/',
      name: 'home',
      component: Home
    },
    {
      path:'/chi-siamo',
      name: 'about',
      component: About
    },
    {
      path:'/contatti',
      name: 'contact',
      component: Contact
    },
    {
      path:'/blog',
      name: 'blog',
      component: Posts
    }
  ]

});


export default router; //esporto la classe router

