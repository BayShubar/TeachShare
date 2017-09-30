export default{
	setCurrentUser(state, user){
			state.currentUser = user;
	},

	setTecherMaterials(state, materials){
			state.teacherMaterials = materials;
	},

	setMaterials(state, materials){
			state.materials = materials;
	},

	setMaterialsScroll(state){
		if(state.materials.length > state.materialsScrol.length+11){
			state.materialsScrol = state.materials.slice(0, state.materialsScrol.length+5);
		}
	},

	setTeachers(state, teachers){
			state.teachers = teachers;
	},

	setJournals(state, journals){
			state.journals = journals;
	},

	setCurrentMaterial(state, material){
			state.currentMaterial = material;
	},

	setUpdatedCommentByWeb(state, comments){
		 state.currentMaterial.comments = comments;
	}
}