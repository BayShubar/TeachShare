<template>

		<div class="materials-holder" @scroll="scroll">
			<div>
			<material :data="material" v-for="material in materials"></material>
			</div>
		</div>

</template>

<script>
	import Material from './Material.vue'
	export default{
		name: 'matrials',
		components: {
			Material
		},
		computed:{
				materials(){
						return this.$store.getters.materialsScrol;
				}
		},
		created(){
			this.$store.dispatch('setMaterials');
						console.log(this.$store.state.materials)
			this.$store.dispatch('setMaterialsScroll');
		},
		methods:{
			scroll(event){
				var wraper = event.target,
						list = wraper.firstElementChild

				var scrollTop = wraper.scrollTop,
						wH = wraper.offsetHeight,
						lH = list.offsetHeight

				var dif = lH-wH

				if(dif <= scrollTop){
					this.$store.dispatch('setMaterialsScroll');
				}
			}
		}
	}
</script>

<style scoped>
		.materials-holder{
		height:610px;
		overflow-x: hidden;
    overflow-y: scroll;
    margin-top:-20px;
	}
</style>