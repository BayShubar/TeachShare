<template>
	<div class="container">
			<div class="row">
				<teacher  v-for="teacher in teachers" :data="teacher"></teacher>
			</div>
	</div>
</template>

<script scoped>
import Teacher from './Teacher.vue'
export default{
		name: 'teachers',
		components: {
			Teacher
		},
		computed:{
				teachers(){
					return this.$store.getters.teachers;
				}
		}
	}
</script>

<style scoped>
</style>