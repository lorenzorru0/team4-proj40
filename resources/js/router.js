import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './pages/Home';
import About from './pages/About';
import Contacts from './pages/Contacts';
// import SinglePost from './pages/SinglePost';
import NotFound from './pages/NotFound';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: About
        },
        {
            path: '/contatti',
            name: 'contacts',
            component: Contacts
        },
        // {
        //     path: '/users/:slug',
        //     name: 'user-post',
        //     component: SingleUser
        // },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ]
});

export default router;