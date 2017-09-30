export default{
	currentUser(state){
		return state.currentUser;
	},

	teacherMaterials(state){
		return state.teacherMaterials;
	},

	materials(state){
		return state.materials;
	},

	materialsScrol(state){
		return state.materialsScrol;
	},	

	teachers(state){
			return state.teachers;
	},

	journals(state){
			return state.journals;
	},


	currentMaterial(state){
			return state.currentMaterial;
	},

	currentMaterialComments(state){
		return state.currentMaterial.comments.reverse();
	},

	currentMaterialId(state){
		return state.currentMaterial.id;
	},

	currentMaterialPhotos(state){
		console.log(state.currentMaterial.photos[0])
		return state.currentMaterial.photos[0];
	},
}