<template>
	<div class="wrap-item">
		<div class="items">
		<template v-for="(item, key) in items">
			<div class="item">
				<vue-timepicker :minute-interval="5" v-model="item.start" class="mine"
				placeholder="00:00" @input="change" style="margin-right: 10px;"></vue-timepicker>
				<!-- <input type="time" v-model="item.start" class="form-control" @change="change">  -->
				- 
				<vue-timepicker :minute-interval="5" v-model="item.end" class="mine"
				placeholder="00:00" @input="change" style="margin-left: 10px;"></vue-timepicker>
				<!-- <input type="time" v-model="item.end" class="form-control" @change="change"> -->
				<a @click="deleteMode(key)" class="delete-btn">
					<i class="fa fa-close"></i>
				</a>
			</div>
		</template>
		</div>
		<a @click="create" class="add-hour">добавить часы</a>
	</div>
</template>
<script>
	import VueTimepicker from 'vue2-timepicker';
	import 'vue2-timepicker/dist/VueTimepicker.css';

	export default {
		components: {
			VueTimepicker
		},
		props: {
			times: String,
			week: String
		},
		data() {
	        return {
	        	items: []
	        }
	    },
	    mounted(){
	    	this.items = JSON.parse(this.times);
	    },
	    methods: {
	    	deleteMode(key){
	    		this.items.splice(key, 1);
	    		this.change();
	    	},
	    	create(){
	    		let item = {
	    			start: '00:00',
	    			end: '00:00',
	    		}
	    		if(this.items == null){
	    			this.items = [];
	    		}
	    		this.items.push(item);
				this.change();
	    	},
	    	change(){
	    		let obj ={
	    			week: this.week,
	    			items: JSON.stringify(this.items)
	    		};
	    		this.$emit('on-change', obj);
	    	},

	    }
	}
</script>
<style scoped>
	.wrap-item{
		display: flex;
		width: 100%;
		align-items: flex-start;
	}
	.item{
		display: flex;
		align-items: center;
		margin-bottom: 16px;
	}
	.add-hour{
		color: rgb(39, 121, 189) !important;
		padding-left: 20px;
		font-size: 14px;
    	font-weight: 700;
    	padding-top: 6px;
	}
	.add-hour:hover{
		cursor: pointer;
	}
	.delete-btn{
		padding-left: 20px;
	}
	.delete-btn{
		font-size: 18px;
	    color: #b9c8de;
	}
	.delete-btn i{
		color: #b9c8de;
	}
	
</style>