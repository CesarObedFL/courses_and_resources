
import { createRouter, createWebHistory } from 'vue-router';
import NotFound from '@/modules/notFound/NotFound.vue';
import isAuthenticatedGuard from '@/modules/auth/guards/is_authenticated.guard';

const router = createRouter({
    history: createWebHistory( import.meta.env.BASE_URL ),
    routes: [

        // landing routes
        {
            path: '/',
            name: 'landing',
            component: () => import('@/modules/landing/layouts/LandingLayout.vue'),
            children: [
                {
                    path: '/',
                    name: 'home',
                    component: () => import('@/modules/landing/views/HomeView.vue'),
                },
                {
                    path: '/features',
                    name: 'features',
                    component: () => import('@/modules/landing/views/FeaturesView.vue'),
                },
                {
                    path: '/contact',
                    name: 'contact',
                    component: () => import('@/modules/landing/views/ContactView.vue'),
                },
                {
                    path: '/pricing',
                    name: 'pricing',
                    component: () => import('@/modules/landing/views/PricingView.vue'),
                },
                {
                    path: '/pokemon/:id',
                    name: 'pokemon',
                    beforeEnter: [
                        isAuthenticatedGuard
                    ],
                    //props: true,
                    props: ( route ) => {
                        const id = Number(route.params.id);

                        return isNaN(id) ? { id: 1 } : { id };
                    },
                    component: () => import('@/modules/common/pokemons/PokemonView.vue'),
                },
            ],
        },

        // auth routes
        { 
            path: '/auth',
            redirect: '/login',
            component: () => import('@/modules/auth/layout/AuthLayout.vue'),
            children: [
                {
                    path: '/login',
                    name: 'login',
                    component: () => import('@/modules/auth/views/LoginView.vue'),
                },
                {
                    path: '/register',
                    name: 'register',
                    component: () => import('@/modules/auth/views/RegisterView.vue'),
                }
            ],
        },

        // 404 not found
        {
            path: '/:pathMatch(.*)*',
            name: 'notFound',
            component: NotFound,
        },
    ]   
});

export default router;