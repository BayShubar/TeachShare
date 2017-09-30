import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Welcome from './components/welcome/Welcome.vue'
import ShowMaterials from './components/materials/Show.vue'
import ShowMaterial from './components/materials/ShowMaterial.vue'
import ShowTeachers from './components/teachers/Show.vue'
import Profile from './components/teachers/Profile.vue'
import AddMaterial from './components/materials/AddMaterial.vue'
import EditMaterial from './components/materials/EditMaterial.vue'

import ShowJournals from './components/journal/Show.vue'
import AddJournal from './components/journal/AddJournal.vue'

export default new VueRouter({
	routes: [
			{path: '/', component: Welcome, meta: { forVisitors: true}},
			{path: '/materials', component: ShowMaterials, meta: { forAuth: true}},
			{path: '/materials/add', component: AddMaterial, meta: { forAuth: true}},
			{path: '/materials/edit/:editId', component: EditMaterial, meta: { forAuth: true}},
			{path: '/materials/:material', component: ShowMaterial, meta: { forAuth: true}},

			{path: '/teachers', component: ShowTeachers, meta: { forAuth: true}},
			{path: '/teachers/:teacher', component: Profile, meta: { forAuth: true}},

			{path: '/journals', component: ShowJournals, meta: { forAuth: true}},
			{path: '/journals/add', component: AddJournal, meta: { forAuth: true}},
	],
	mode: 'history',
	linkActiveClass : 'current'
})