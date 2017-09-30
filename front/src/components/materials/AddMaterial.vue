<template>
	<div class=" col-md-6 col-md-offset-3">


		<div class="panel panel-default" v-if ="showResult">
			<div class="panel-heading">
				<h3 > Create</h3>
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
						<input type="file" class="form-control" name="image" @change="imageUpload">
					</div>
					
					<div class="form-group input-data">
						<input v-show="sendOrNot" type="submit" class="btn btn-success" v-on:click.prevent="sendMaterial" value="+ Create">
					</div>
		
				</form>
			</div>
		</div>

		<div class="panel panel-success" v-if ="!showResult">
			<div class="panel-heading"><h1>Material Created Successfully</h1></div>
			<div class="panel-body">	
					<button class="btn btn-success" v-on:click="MaterialPage">Watch Result</button>
					<button class="btn btn-success" v-on:click="addAnoterMAterial">+ Add Material</button>
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
					content: '',
					image: ''
				},
				showResult : true,
				currentId : ''
			}
	},
	methods:{
			imageUpload(e){
				var fileReader = new FileReader()
				fileReader.readAsDataURL(e.target.files[0]);
				fileReader.onload = (e)=>{
					this.material.image = e.target.result; 
				}
				console.log(this.material);

			},
			sendMaterial: function(){
				this.$http.post('api/materials', this.material).then(response => {
					this.currentId = response.body.id;
					this.showResult = false;
				});
			},
			addAnoterMAterial: function(){
				this.material.title = '';
				this.material.content = '';
				this.showResult = true;
			},
			MaterialPage: function(){
				this.$router.push('/materials/'+this.currentId);
			}
	},
	computed:{
		sendOrNot: function(){
			if(this.material.title == '' || this.material.content =='')
				return false;
			return true
		}
	}
}
	
</script>


<style scoped>
	.input-data{
		margin-bottom: 20px;
	}
</style>