import Vue from 'vue'
import VueX from 'vuex'
import Getters from './Getters.js'
import Mutations from './Mutations.js'
import Actions from './Actions.js'
Vue.use(VueX);

export const store = new VueX.Store({
	state: {
			currentUser:{},
			teacherMaterials:[],
			materials:[],
			materialsScrol:[],

			teachers:[],
			journals:[],

			currentMaterial:{}
	},
	getters: Getters,
	mutations: Mutations,
	actions: Actions
})