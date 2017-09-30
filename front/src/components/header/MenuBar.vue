<template>
	<nav class="navbar ">
		  <div class="container-fluid">

		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span style="color: white; font-size:20px; " class="glyphicon glyphicon-menu-hamburger"></span>                     
		      </button>
		      <a class="navbar-brand" style="color:white; font-wheit: bold; font-size:25px; " href="#"> TeachShare </a>
		    </div>

		    <div class="collapse navbar-collapse" id="myNavbar" v-if="isAuth">
			      <ul class="nav navbar-nav">
			      <router-link tag="li" class="dropdown menu-item" to="/materials"><a class="dropdown-toggle" data-toggle="dropdown">
			        	<span class="glyphicon glyphicon-folder-open"></span> Materials <span class="caret"></span></a>
									        <ul class="dropdown-menu dropdown">
									          <li class="dropdown-add"><router-link tag="a" to="/materials/add">+ Add</router-link></li>
									        </ul>
			       </router-link>


			      <router-link tag="li" class="dropdown menu-item" to="/journals"><a class="dropdown-toggle" data-toggle="dropdown">
			        	<span class="glyphicon glyphicon-folder-open"></span> My Joournal <span class="caret"></span></a>
									        <ul class="dropdown-menu dropdown">
									          <li class="dropdown-add"><router-link tag="a" to="/journals/add">+ Add</router-link></li>
									        </ul>
			       </router-link>


			      <router-link tag="li" class="menu-item" to="/teachers"><a>
			        	<span class="glyphicon glyphicon-user"></span>
			        		<span style="margin-left: -10px;" class="glyphicon glyphicon-user"></span> Teachers</a></router-link>
			     </ul>
							

			      <ul class="nav navbar-nav navbar-right">
			       <router-link tag="li" class="menu-item" :to="'/teachers/'+user.id">
			        		<a><span class="glyphicon glyphicon-user"></span> profile</a></router-link>

		        <li class="menu-item"><a href="/" v-on:click="logOut()"><span class="
		        	glyphicon glyphicon-log-out"></span> Log out</a></li>
			      </ul>
		    </div>


		  </div>
</nav>

</template>

<script>
	export default{
		name: 'menu-bar',
		data: function(){
				return{
					user: {}
				}
		},
		created: function(){
			this.setAuthenticatedUser();
		},
		methods:{
				setAuthenticatedUser: function(){
						this.$http.get('api/user').then(response => {
								this.$auth.setAuthenticatedUser(response.body);
								this.user = this.$auth.getAuthenticatedUser();
						});
				},
				logOut: function(){
					this.$auth.destroy();
					this.$router.push('/');
				}
		},
		computed: {
				isAuth(){
					return this.$auth.isAuthenticated();
				}
		}
	}
</script>

<style scoped>
.menu-item a{
	color: white;
}
.menu-item a:hover{
	height: 50px;
	background-color: white;
	color:rgb(104, 145, 162);;
}
.navbar{
	background-color: rgb(104, 145, 162);
	border: 0px solid red;
	border-radius: 0px;
}
.navbar-header{
	background-color: rgb(104, 145, 162);
}

.dropdown{
	background-color: rgb(104, 145, 162);
}
.dropdown-add a:hover {
	height: 26px;
	color: rgb(104, 145, 162);;
}
	
</style>