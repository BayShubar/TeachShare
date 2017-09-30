<template>
		<div>
			<button @click="followPerson" v-show="!iFollow"  class="controlUser btn btn-success">Follow</button>
			<button @click="followPerson" v-show="iFollow" class="controlUser btn btn-danger">Delete</button>
		</div>
</template>

<script>
	export default{
		name: 'follow-button',
		data(){
				return {
					iFollow: {}
				}
		},
		methods:{
			followPerson: function(){
					this.$http.put('api/teachers/'+this.$route.params.teacher).
							then(response => {
								this.cheker();
					});
			},
			cheker: function(){
				this.$http.get('api/teachers/'+this.$route.params.teacher+'/iFolow')
					.then(response => {
						if(response.body == 'true')
								this.iFollow = true;
						else this.iFollow = false;
					});
			}
		},
		created: function(){
				this.cheker();
		}
	}

</script>

<style scoped>
	button{
		margin-bottom: 10px;
	}
</style>