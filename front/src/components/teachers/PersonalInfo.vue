<template>
	  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="300px" height="300px">
                        </div>
                        	
													<follow-button :id = "data.id"></follow-button>

                        <div class="media-body">
                          <ul class="list-group">
												    <li class="list-group-item"><strong>Position:</strong>  2 year Teacher</li>
												    <li class="list-group-item"><strong>Location:</strong> USA Alabama #47</li>
												    <li class="list-group-item"><strong>Education:</strong> London Cambridge Psyhology</li>
												    <li class="list-group-item"><strong>Email:</strong> {{ data.email }}</li>
												  </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</template>

<script>
	import FollowButton from './FollowButton.vue'
	export default{
		name:'personal-info',
		computed:{
				data(){
					return this.$store.getters.currentUser;
				}
		},
		components: {
			FollowButton
		}
	}
</script>

<style scoped>
	.controlUser{
		margin-bottom: 10px;
	}

</style>