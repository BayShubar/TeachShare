<template>
								<div id="myCarousel" class="carousel slide" data-ride="carousel">
									    <!-- Indicators -->
									    <ol class="carousel-indicators">
									      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									      <li data-target="#myCarousel" data-slide-to="1"></li>
									      <li data-target="#myCarousel" data-slide-to="2"></li>
									    </ol>

									    <!-- Wrapper for slides -->
									    <div class="carousel-inner">
															<div class="item active" v-if="photos != null" >
												        <img :src="'http://teach/'+photos.link" style="width:100%;">
												      </div>
												      <div class="item active" v-if="photos == null" >
												        <img src="http://teach/cX09KbIffZHUWbCC.jpeg" style="width:100%;">
												      </div>

												      <div class="item active" v-else="" >
												        <img src="http://teach/cX09KbIffZHUWbCC.jpeg" style="width:100%;">
												      </div>


											    <!-- Left and right controls -->
											    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
											      <span class="glyphicon glyphicon-chevron-left"></span>
											      <span class="sr-only">Previous</span>
											    </a>
											    <a class="right carousel-control" href="#myCarousel" data-slide="next">
											      <span class="glyphicon glyphicon-chevron-right"></span>
											      <span class="sr-only">Next</span>
											    </a>
									  </div>
							</div>

</template>

<script>
	export default{
		name: 'photo-slider',
		props:['photos']
		// computed:{
		// 	photos(){
		// 		return this.$store.getters.currentMaterialPhotos;
		// 	}
		//}
	}
</script>

<style scoped>
	
</style>