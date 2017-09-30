<template> 
<div>
  <table class="table" v-show="!show.open">
    <thead>
      <tr>
        <th class="col-md-3 col-sm-2 col-xs-10">Date</th>
        <th class="col-md-7 col-sm-8 hidden-xs">Subjects</th>
        <th class="col-md-2 col-sm-2 col-xs-2">Action</th>
      </tr>
    </thead>
    <tbody>

			<journal @showSubjects="showSubjects(journal)" :data="journal" v-for="journal in journals"></journal>

    </tbody>
  </table>

	<show-journal @closeSubjects="closeSubjects()" :data="show.data" v-show="show.open"> </show-journal>

 </div>
</template>

<script>
	import Journal from './Journal.vue';
	import ShowJournal from './ShowJournal.vue'
	export default{
		name: 'journals',
		data: function(){
				return{
						show: {
							open: false,
							data: {}
						}
				}
		},
		components:{
				Journal, ShowJournal
		},
		computed:{
				journals(){
					return this.$store.getters.journals;
				}
		},
		methods:{
			showSubjects: function(data){
				this.show.open = true;
				this.show.data= data;
			},
			closeSubjects: function(){
				this.show.open=false;
			}
		}
	}
</script>

<style scoped>
	
</style>