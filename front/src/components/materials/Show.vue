<template>

			<div class=" materials-holdercontainer col-md-6 col-md-offset-3" id="material-part">
				<materials></materials>
			</div>
</template>

<script>
		import Materials from './Materials.vue'
	export default{
		name: 'matrial-show',
		components: {
			Materials
		},
		created(){
			this.$store.dispatch('setMaterials');
		}
	}
</script>

<style scoped>

</style>