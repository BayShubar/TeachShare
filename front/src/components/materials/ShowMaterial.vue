<template>
	<div class="container col-md-8 col-md-offset-2">
						<div class="panel panel-default">
							<div class="panel-heading">
									<div class="">
										<img src="https://tripway.com/blog/wp-content/uploads/2016/06/iwa_marvel.jpg" class="img img-circle" alt="">
										<h4 class="user-name"><router-link :to="'/teachers/'+user.id" >{{ data.user.name }}</router-link></h4>
									</div>
							</div>

							<div class="panel-body">
									<h3 class="user-name">{{ data.title }}</h3>
									<photo-slider :photos="data.photos"></photo-slider> <br>
									<p>{{ data.content }}</p> <br>
									<files-download></files-download><br>
							</div>

							<left-comment> </left-comment>
						</div>
						<comments></comments>
	</div>
</template>

<script>
	import FilesDownload from './FilesDownload.vue'
	import PhotoSlider from './PhotoSlider.vue'
	import Comments from '../comments/comments.vue'
	import LeftComment from '../comments/LeftComment.vue'
	export default{
		data: function(){
					return {
						user: {},
					}
		},
		created: function(){
			this.$store.dispatch('setCurrentMaterial', this.$route.params.material);
		},
		computed:{
				data(){
					return this.$store.getters.currentMaterial;
				}
		},
		components: {
			PhotoSlider, FilesDownload, Comments, LeftComment
		}
	}
</script>

<style scoped>
.img-circle{
		height: 40px;
		width: 40px;
	}
.user-name{
	color:rgb(104, 145, 162);
	display: inline-block;
	margin-left: 20px;
}
	.panel{
		box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
	}
</style>