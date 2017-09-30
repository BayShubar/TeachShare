<template>
		<div class="col-md-6 col-md-offset-3 holder">
					<h3>The Journal may have many Subjects min 1, max 6</h3>
					<div class="controller">
						<button class="btn-sm btn-danger"  @click="minus"><span class="glyphicon glyphicon-minus"></span></button>
						<button class="btn-sm btn-success"  @click="plus"><span class="glyphicon glyphicon-plus"></span></button>
					</div>

				<div :class="{ subject: true, error: subject.error }" v-for="subject in subjects">
					  <div class="form-group">
						    <input class="" type="text" v-model="subject.name" class="form-control" name="name" placeholder="Name of Subject">
						    <textarea type="text" v-model="subject.description" class="form-control" name="description" placeholder="Description"></textarea>
						     
								
									<div class="entry input-group col-md-5 col-md-offset-1 col-xs-3">
			                <input class="btn btn-primary" name="fields[]" type="file">
			                <span class="input-group-btn">
			                    <button class="btn btn-success btn-add hidden-xs" type="button">
			                                <span class="glyphicon glyphicon-plus"></span>
			                     </button>
			                </span>
			            </div>
					  </div>
				</div>
				<button class="btn-sm btn-success" @click="submit">Submit</button>
		</div>
</template>

<script>
export default{
	data(){
			return{
					subjects: [
							{	name:'', description:'', error: false}
					]
			}
	},
	methods:{
			plus: function(){
				var pattern = {name: '', description:''}
				if(this.subjects.length < 6)
					this.subjects.push(pattern);
			},
			minus: function(){
				if(this.subjects.length > 1)
					this.subjects.pop();
			},
			submit: function(){
						var arr = [];
						var cheker = true;

						for (var i = 0; i < this.subjects.length; i++) {
								if(this.subjects[i].name  == '' && this.subjects[i].description == ''){
									if(i!=0)arr.push(i);
									cheker = false;
								}else	if(this.subjects[i].name  == '' || this.subjects[i].description == ''){
									this.subjects[i].error = true;
									cheker = false;
								}
						}

						for (var i = arr.length - 1; i >= 0; i--) 
								this.subjects.splice(i,1);


						if(cheker){
							this.$http.post('api/journals', this.subjects).then(response => {
										console.log(response);
									});
							this.subjects = []
							this.plus();							
						}
							
		},
	}
}

</script>

<style scoped>
input{
	margin-bottom: 10px
}
.entry{
	margin-top: 10px;
}
.entry input{
	margin-bottom: 0px;
	background-color: rgb(104, 145, 162);
	border: 1px solid rgb(104, 145, 162);
}
.subject{
	padding: 20px;
	border: 1px solid rgb(104, 145, 162);
	border-radius: 10px;
	margin-bottom: 10px;
}

.error{
	background-color: #FFCCCC;
	border: 3px solid red;
}

.controller{
	padding: 10px;
}
.holder{
	padding: 20px;
	border: 4px solid rgb(104, 145, 162);
	border-radius: 10px;
	margin-bottom: 10px;
}

</style>