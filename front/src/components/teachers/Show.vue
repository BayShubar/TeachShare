<template>
		<div class="teachers-holder">
			<teachers> </teachers>
		</div>
</template>

<script>
	import Teachers from './Teachers.vue'
	export default{
		components:{
				Teachers
		},
		created(){
			this.$store.dispatch('setCurrentUser', this.$auth.getAuthenticatedUser().id);
		}
	}
	
</script>

<style scoped>
	.teachers-holder{
		height:570px;
		overflow-x: hidden;
    overflow-y: scroll;
	}
</style>