<template>
		<div class="col-md-6 item col-md-offset-3 user-holder">
				<div class="container">

						<div class="row">
								<div class="col-md-1 col-xs-3">
									<img class="img img-circle user-photo" src="https://semantic-ui.com/images/avatar2/large/matthew.png" alt="">
								</div>
								<div class="col-md-2 col-xs-6" v-on:click.prevent="goToUser()">
										<a href="">{{ data.name }}</a>
										<p>12:34 was online</p>
								</div>

								<div class="col-md-2 hidden-xs hidden-sm">
									<div class="col-md-6">
										<span class="glyphicon glyphicon-folder-open"></span><br>
										34
									</div>
									<div class="col-md-6">
										<span class="glyphicon glyphicon-user"></span>
			        		<span style="margin-left: -5px;" class="glyphicon glyphicon-user"></span><br>
										34
									</div>
								</div>


								<div class="col-md-1 col-xs-1" >
										<button class="btn btn-danger">Delete</button>
								</div>
						</div>
						
				</div>
				<hr>
		</div>
</template>
<script>
	export default{
			name: 'teacher',
			props: [
				'data'
			],
			methods:{
				goToUser: function(){
					this.$router.push('/teachers/'+this.data.id);
					this.$store.dispatch('setCurrentUser', this.data.id);
				}
			}
	}
</script>

<style scoped>
.glyphicon{
	color: rgb(104, 145, 162);
	font-size: 18px;
}
.user-photo{
	height: 60px;
	width: 60px;
}
.item{
	background-color: white;
	margin-bottom: 5px;
}
.user-holder{
	padding: 15px;
}
.btn{
	margin-left: -20px;
}
</style>