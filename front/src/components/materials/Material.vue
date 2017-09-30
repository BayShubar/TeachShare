<template>
		<div class="panel panel-default">

				<div class="panel-heading">
						<div class="">
							<img src="https://tripway.com/blog/wp-content/uploads/2016/06/iwa_marvel.jpg" class="img img-circle" alt="">
							<h4 class="user-name"><router-link :to="'/teachers/'+data.user.id" >{{ data.user.name }} </router-link></h4>
						</div>
				</div>

				<div class="panel-body">
						<router-link :to="'/materials/'+data.id"><h4>A{{ data.title }}</h4> </router-link>

							<photo-slider :photos="data.photos"></photo-slider><br>

						<p>{{ data.content }}</p>
						<hr>
						<div class="row">
							<div id="like-div" @click="setLike" class="col-md-2 col-xs-6"><span class="glyphicon glyphicon-heart">
									</span><span class="badge">{{ likes }}</span></div>
							<div class="col-md-2"><span class="glyphicon glyphicon-comment"></span></span><span class="badge">{{ data.commentsSum }}</span></div>
						</div>
				</div>
		</div>
</template>

<script>
	import PhotoSlider from './PhotoSlider.vue'
	export default{
		data:function(){
					return{
							likes: this.data.likes.length
					}
		},
		name: 'matrial',
		props: [
			'data'
		],
		components: {
			PhotoSlider
		},
		methods:{
				setLike: function(){
						this.$http.get('api/materials/like/'+this.data.id).then( response => {
									this.likes = response.body.length;
						});
				}
		}
	}
</script>

<style scoped>
.user-name{
	color:rgb(104, 145, 162);
	display: inline-block;
	margin-left: 20px;
}
	.img-circle{
		height: 40px;
		width: 40px;
	}
	#material-part{
		margin-bottom: 10px;
	}
	.glyphicon{
		font-size: 20px;
		color: rgb(104, 145, 162);
	}
	#like-div :hover {
		color: rgb(104, 115, 142);
	}
	.badge{
		font-size: 13px;
		background-color: rgb(104, 145, 162);
		margin-bottom: 10px;
		margin-left: 10px;
	}
</style>