import Vue from 'vue'
export default{
	setCurrentUser(context, userId){
			Vue.http.get('api/teachers/'+userId).then(response => {
					context.commit('setCurrentUser', response.body);
					context.dispatch('setTecherMaterials', userId);
					context.dispatch('setTeachers', userId);
			});
	},

	setTecherMaterials(context, userId){
			Vue.http.get('api/materials/teachers/'+userId).then(response=>{
					context.commit('setTecherMaterials', response.body);
			});
	},

	setMaterials(context){
		Vue.http.get('api/materials').then(response=>{
				context.commit('setMaterials', response.body);
			});
	},

	setTeachers(context, userId){
		Vue.http.get('api/teachers/'+userId+'/teachers').then(response=>{
			context.commit('setTeachers', response.body);
		});
	},

	setJournals(context, userId){
			Vue.http.get('api/journals/teachers/'+userId).then(response=>{
				context.commit('setJournals', response.body);
			});
	},

	setCurrentMaterial(context, materialId){
			Vue.http.get('api/materials/'+materialId).then(response=>{
						//	console.log( response);
					context.commit('setCurrentMaterial', response.body);
			});
	},

	setMaterialsScroll(context){
		context.commit('setMaterialsScroll');
	},

	setUpdatedCommentByWeb(context){
		Vue.http.get('api/materials/comment/'+context.getters.currentMaterialId)
				.then(response=>{
							context.commit('setUpdatedCommentByWeb', response.body);
		});
	}
}