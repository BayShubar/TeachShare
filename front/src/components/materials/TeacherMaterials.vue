<template>

		<div>
			<material :data="material" v-for="material in materials"></material>
		</div>

</template>

<script>
	import Material from './Material.vue'
	export default{
		name: 'teacher-materials',
		components: {
			Material
		},
		computed:{
				materials(){
					return this.$store.getters.teacherMaterials;
				}
		}
	}
</script>

<style scoped>
	
</style>