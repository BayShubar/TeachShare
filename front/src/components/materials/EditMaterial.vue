<template>
	<div class=" col-md-6 col-md-offset-3">


		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 >Edit</h3>
			</div>

			<div class="panel-body">
				<form class="form-group">
					<div class="form-group input-data">
						<input type="text" class="form-control" name="title" v-model="material.title" placeholder="Title">
					</div>

					<div class="form-group input-data">
						<textarea name="content" placeholder="Content" class="form-control" 
																	v-model="material.content" cols="30" rows="10"></textarea>
					</div>
					
					<div class="form-group input-data">
						<input v-show="updateOrNot" type="submit" class="btn btn-success" v-on:click.prevent="updateMaterial" value="+ Create">
					</div>
		
				</form>
			</div>
		</div>
	</div>
</template>


<script>
export default{
	data: function(){
			return{
				material:{
					title: '',
					content: ''
				}
			}
	},
	methods:{
			updateMaterial: function(){
				this.$http.put('api/materials/'+this.$route.params.editId, this.material).then(response => {
					console.log(response);
					this.$router.push('/materials/'+this.$route.params.editId);
				});
			}
	},
	computed:{
		updateOrNot: function(){
			if(this.material.title == '' || this.material.content =='')
				return false;
			return true
		}
	},
		created: function(){
			this.$http.get('api/materials/'+this.$route.params.editId+'/edit').then(response => {
					this.material.title = response.body.title;
					this.material.content = response.body.content;
			});
		}
}
	
</script>


<style scoped>
	.input-data{
		margin-bottom: 20px;
	}
</style>