<template>
	<div class="panel panel-default">
		<div class="panel-heading">
				<h4 style="display: inline-block"> {{ data.created_at }} </h4>
				<div class="pull-right">
					<button @click="close" class="btn btn-danger">X</button>
				</div>
		</div>

		<div class="panel-body">
			<table class="table">
		    <thead>
		      <tr>
		        <th class="col-md-3 col-sm-2 col-xs-10">Subject</th>
		        <th class="col-md-7 col-sm-8 hidden-xs">Description</th>
		        <th class="col-md-2 col-sm-2 col-xs-2">Action</th>
		      </tr>
		    </thead>
		    <tbody>
						  <tr v-for="subject in data.subjects">
						    <td class="col-md-3 col-sm-3 col-xs-10"><h5 class="pull-left">{{ subject.name }}</h5></td>
							    <td class="col-md-7 col-sm-7	hidden-xs"><h5 class="pull-left"> {{ subject.description }} </h5></td>
						    <td class="col-md-2 col-sm-2 col-xs-2"><button class="btn-xs btn-success"><span class="glyphicon glyphicon-download">
						    			</span> Download</button></td>
						  </tr>
		    </tbody>
		  </table>
		</div>
	</div>
</template>

<script>
	export default{
		name: 'show-journal',
		props:[
			'data'
		],
		methods:{
			close: function(){
				this.$emit('closeSubjects');
			}
		}
}
</script>

<style scoped>
	div{

	}
</style>