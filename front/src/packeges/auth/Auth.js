export default function(Vue){
	let authenticatedUser = {}
		Vue.auth = {
				getToken(){
					var t = localStorage.getItem('token');
					var e = localStorage.getItem('expiration');

					if(!t || !e)
						return null;
					else if(parseInt(e) < Date.now()){
						this.destroy();
						return null;
					}else
						return t;
				},

				setToken(token, expiration){
					localStorage.setItem('token', token);
					localStorage.setItem('expiration', expiration);
				},

				isAuthenticated(){
					if(this.getToken())
						 return true;
					else 
						 return false;
				},

				destroy(){
					localStorage.clear();
				},

				setAuthenticatedUser(user){
						authenticatedUser = user;
				},

				getAuthenticatedUser(){
					return authenticatedUser;
				},

		}	
	Object.defineProperties(Vue.prototype,{
		$auth: {
			get: ()=>{
				return Vue.auth;
			}
		}
	})
}