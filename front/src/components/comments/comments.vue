<template>
    <div class="row">
    	 <div class="col-md-12">
    			<comment v-for="comment in comments" :comment="comment"></comment>
    	 </div>
    </div>
</template>

<script>
	import Comment from './comment.vue'
	export default{
		name: 'comments',
		computed:{
			comments(){
					return this.$store.getters.currentMaterialComments;
			}
		},
		components: {
			Comment
		}
	}
</script>

<style>
	
</style>