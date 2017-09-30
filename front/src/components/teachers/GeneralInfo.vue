<template>
<div class="panel panel-default">
    <div class="panel-body">
           
        <span class="pull-left">
            <div class="col-md-3  col-sm-3 col-xs-12">
             <h4 class="panel-title" style="font-size:17px;">{{ data.name }}</h4>
            </div>

            <div class="col-md-3  col-sm-3 col-xs-12"  @click="changeContent(menuItems[0])">
                 <router-link v-bind:class="{ btn: true, currenеItem:menuItems[0].active}" to="">
                    <span class="glyphicon glyphicon-folder-open"></span> Materials
                            <span class="badge">{{ data.materials }}</span></router-link>
            </div>

            <div class="col-md-3  col-sm-3 col-xs-12"  @click="changeContent(menuItems[1])">
                 <router-link v-bind:class="{ btn: true, currenеItem:menuItems[1].active}" to="">
                    <span class="glyphicon glyphicon-th-list"></span> Journal
                            <span class="badge">{{ data.journals }}</span></router-link>
            </div>

            <div class="col-md-3  col-sm-3 col-xs-12"  @click="changeContent(menuItems[2])">
                 <router-link v-bind:class="{ btn: true, currenеItem:menuItems[2].active}" to="">
                    <span class="glyphicon glyphicon-user"></span> Teachers
                            <span class="badge">{{ data.teachers }}</span></router-link>
            </div>


            
        </span>
    </div>
</div>

</template>

<script>
	export default{
		name:'general-info',
        data: function(){
                return{
                    menuItems: [
                        {name: 'Materials', active: true},
                        {name: 'Journal', active: false},
                        {name: 'Teachers', active: false},
                    ]
                }
        },
        methods: {
        changeContent: function(item){
                for (var i = 0 ; i < this.menuItems.length; i++) {
                    this.menuItems[i].active=false;
                }
                this.$emit('changeContent', item.name);
                item.active = true;
        }
        },
        computed: {
            data: function(){
                return this.$store.getters.currentUser;
            }
        }
	}
</script>

<style scoped>
.glyphicon{
    margin-right: 7px;
    font-size: 12px;
    color: rgb(104, 145, 162);
}
.currenеItem{
    border-bottom: rgb(104, 145, 162) 3px solid;
}
.badge{
    background-color: rgb(104, 145, 162);
}

</style>