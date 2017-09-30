<template>
	<div class="container">
		<div class="row">
			<div class="col-md-7"> </div>
			<div class="col-md-5">
				<login> </login>
				<registr></registr>
			</div>
		</div>
	</div>
</template>

<script>
	import Login from '../authentication/Login.vue'
	import Registr from '../authentication/Registr.vue'
	export default{
		name: 'welcome',
		components:{
			Login, Registr
		}
	}
</script>

<style scoped>
	
</style>