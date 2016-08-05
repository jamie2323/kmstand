import Vue from 'vue';
import NProgress from 'nprogress';
import Resource from 'vue-resource';
import Router from 'vue-router';
import App from './components/App.vue';
import auth from './services/Auth';
import LoginView from './components/LoginView.vue';
import RideView from './components/RideView.vue';
import Register from './components/Register.vue';

Vue.use(Router);
Vue.use(Resource);

export var router = new Router({
	history: true
});

router.map({
	'/': {
		name: 'login',
		component: LoginView,
		guest: true
	},
	'/ritten': {
		name: 'ritten',
		component: RideView
	}, 
	'/registreer': {
		name: 'register',
		component: Register,
		guest: true
	}
});

router.redirect({
	'*': '/'
});

router.beforeEach((transition) => {    
	console.log(auth.user.authenticated);
    if (transition.to.auth && !auth.user.authenticated) {
        transition.redirect('/');
    } else if (transition.to.guest && auth.user.authenticated) {
        transition.redirect('/');
    } else {
        transition.next();
    }
});


Vue.http.interceptors.push((request, next)  => {

	NProgress.start();
    const token = auth.getToken();
    request.headers['Authorization'] = 'Bearer ' + token;
    request.headers['X-CSRF-TOKEN'] = document.querySelector('meta[name="token"]').content;

    request.respondWith(request.body);

    next((response) => {
	    NProgress.done();

	    if (response.status == 404) {
	      router.go('/');
	    } else if (response.status == 401 && response.data.refreshed_token) {
	      // If you received 401 "Unauthorized" response
	      // with a refreshed_token in the payload,
	      // this means you've got to refresh your token
	      auth.setToken(response.data.refreshed_token);
	    }

	    return response;
    });
});

auth.checkAuth();
router.start(App, 'app');



