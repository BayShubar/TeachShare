<template>
  <tr>
    <td class="col-md-3 col-sm-3 col-xs-10"><h5 class="pull-left">{{ data.created_at }}</h5></td>
    <td class="col-md-7 col-sm-7	hidden-xs"><h5 class="pull-left">
    				<span v-for="subject in data.subjects">{{ subject.name }} </span></h5></td>
    <td class="col-md-2 col-sm-2 col-xs-2"><button @click="show(data)" class="btn btn-success"><span class="glyphicon glyphicon-fullscreen">
    			</span> Open</button></td>
  </tr>
</template>

<script>
	export default{
		name: 'journal',
		props:[
			'data'
		],
		methods:{
			show: function(data){
					this.$emit('showSubjects');
			}
		}
	}
</script>

<style scoped>
	
</style>