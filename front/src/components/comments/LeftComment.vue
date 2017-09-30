<template>
	<div class="container">
		<div class=" col-md-12">
			<div class="form-group">
	      <textarea v-model="content" class="form-control" rows="4" id="comment"></textarea>
	      <button class="btn btn-success" v-on:click="sendComment" >Send</button>
	    </div>
		</div>
	</div>
</template>

<script>
	export default{
		name:'left-comment',
		computed:{
			id(){
				return this.$store.getters.currentMaterialId;
			}
		},
		data(){
			return{
						content: ''
			}
		},
		methods:{
				sendComment: function(){
						this.$http.put('api/materials/comment/'+this.id, {content: this.content}).then(response=>{
								this.$store.dispatch('setUpdatedCommentByWeb');
						});

						this.content = '';
				}
		}
	}
</script>

<style scoped>
textarea{
	width: 96%;
	margin: 2%;
}
.container{
	border: 1px solid rgb(104, 145, 162);
	border-radius: 10px;
	width: 96%;	
	margin:2%;
}
	
</style>