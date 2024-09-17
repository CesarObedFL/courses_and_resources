import type { NavigationGuardNext, RouteLocationNormalized } from "vue-router";


const isAuthenticatedGuard = (to:RouteLocationNormalized, from:RouteLocationNormalized, next:NavigationGuardNext) => {

    const userId = localStorage.getItem('user_id');

    localStorage.setItem('last_path', to.path);
    
    if ( !userId ) { 
        next({
            name: 'login',
        })
    }

    return next();
}

export default isAuthenticatedGuard;
