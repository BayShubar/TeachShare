	// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Router from './routes.js'
import VueResource from 'vue-resource'
import Auth from './packeges/auth/Auth.js'
import {store} from './store/Store.js'

Vue.use(VueResource);
Vue.use(Auth);
Vue.http.options.root = 'http://teachshare/'
Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken();



//guardians
Router.beforeEach(
		(to, from, next)=>{
					if(to.matched.some(record => record.meta.forVisitors)){
						if(Vue.auth.isAuthenticated()){
							 next({path: '/materials'});
						}else next()
					}
					else if(to.matched.some(record => record.meta.forAuth)){
						if(!Vue.auth.isAuthenticated()){
							 next({path: '/'});
						}else next()		
					}next()
			}
	);

/* eslint-disable no-new */
new Vue({
	store: store, 
  el: '#app',
  template: '<App/>',
  components: { App },
  router: Router
})
