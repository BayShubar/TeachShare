<template>
	<div class="col-md-6 col-md-offset-3">
		<journals></journals>
	</div>
</template>

<script>
	import Journals from './Journals.vue'
	export default{
		components:{
			Journals
		},
		created(){
			this.$store.dispatch('setCurrentUser', this.$auth.getAuthenticatedUser().id);
			this.$store.dispatch('setJournals',this.$auth.getAuthenticatedUser().id);
		}
	}
</script>

<style scoped>
	
</style>