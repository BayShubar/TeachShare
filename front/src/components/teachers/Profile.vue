<template>
		<div class="mainbody container-fluid">
		    <div class="row">
		<!-- 				here go left bar -->
						<personal-info></personal-info>

		<!-- 				this is center -->
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<general-info v-on:changeContent = "updateContent($event)"></general-info>

								<div class="scroll-material col-md-12" v-show="currentContent[0].active">
									<teacher-materials></teacher-materials>
								</div>

								<div class="scroll-material col-md-12" v-show="currentContent[1].active">
									<journals></journals>
								</div>

								<div class="teachers-holder col-md-12" v-show="currentContent[2].active">
									<teachers ></teachers>
								</div>
						</div>
		    </div>
    </div>
</template>

<script>
import PersonalInfo from './PersonalInfo.vue'
import GeneralInfo from './GeneralInfo.vue'
import TeacherMaterials from '../materials/TeacherMaterials.vue'
import Teachers from './Teachers.vue'
import Journals from '../journal/Journals.vue'
	export default{
		components:{
			PersonalInfo, GeneralInfo, TeacherMaterials, Teachers, Journals
		},
		data: function(){
				return{
						request:"/teachers/",
						currentContent: [
								{name: 'Materials', active: true},
								{name: 'Journal', active: false},
								{name: 'Teachers', active: false}
						]
				}
		},
		computed:{
				data(){
						return this.$store.getters.currentUser;
				}
		},
		created: function(){
			this.$store.dispatch('setCurrentUser', this.$route.params.teacher);
			this.$store.dispatch('setJournals', this.$route.params.teacher);
		},
		methods:{
					updateContent: function(contentName){
						var id = 0;
						 for (var i = 0 ; i < this.currentContent.length; i++) {
                        this.currentContent[i].active=false;
                        if(contentName == this.currentContent[i].name)
                        		id = i;
              	}
              this.currentContent[id].active = true;
					}
		}
	}
</script>

<style scoped>
.scroll-material{
		height:535px;
		overflow-x: hidden;
    overflow-y: scroll;
    margin-top: -20px;
}
.mainbody{
	margin-top: -20px;
}

.teachers-holder{
		margin-top: -20px;
		height:540px;
		overflow-x: hidden;
    overflow-y: scroll;
	}
</style>