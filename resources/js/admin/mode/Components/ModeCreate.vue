<template>
	<div class="wrap-main">
	<form @submit.prevent="create">
		<div class="item">
			<label class="title">Учитель</label>
			<div class="wrap">
				<div class="form-group">
	                <select class="form-control select-input" v-model="form.user_id" required>
	                   	<template v-for="item in metodists">
	                    	<option :value="item.id" >{{ item.name }} {{ item.surname }}</option>
	                    </template>
	                </select>
	            </div>
			</div>
		</div>
		
		<div class="item">
			<label class="title">Понедельник</label>
			<div class="wrap-t">
				<time-mode :times="form.monday" @on-change="ChangeMode" :week=" 'monday' "></time-mode>
			</div>
		</div>

		<div class="item">
			<label class="title">Вторник</label>
			<div class="wrap-t">
				<time-mode :times="form.tuesday" @on-change="ChangeMode" :week=" 'tuesday' "></time-mode>
			</div>
		</div>

		<div class="item">
			<label class="title">Среда</label>
			<div class="wrap-t">
				<time-mode :times="form.wednesday" @on-change="ChangeMode" :week=" 'wednesday' "></time-mode>
			</div>
		</div>

		<div class="item">
			<label class="title">Четверг</label>
			<div class="wrap-t">
				<time-mode :times="form.thursday" @on-change="ChangeMode" :week=" 'thursday' "></time-mode>
			</div>
		</div>

		<div class="item">
			<label class="title">Пятница</label>
			<div class="wrap-t">
				<time-mode :times="form.friday" @on-change="ChangeMode" :week=" 'friday' "></time-mode>
			</div>
		</div>

		<div class="item">
			<label class="title">Суббота</label>
			<div class="wrap-t">
				<time-mode :times="form.saturday" @on-change="ChangeMode" :week=" 'saturday' "></time-mode>
			</div>
		</div>

		<div class="item">
			<label class="title">Воскресенье</label>
			<div class="wrap-t">
				<time-mode :times="form.sunday" @on-change="ChangeMode" :week=" 'sunday' "></time-mode>
			</div>
		</div>

		<div class="wrap-btn">
			<button type="submit" class="btn btn-primary">Создать</button>
		</div>
	</form>
</div>
</template>
<script>
	import TimeMode from '@/admin/mode/Components/Time';

	export default {
		components: { 
			TimeMode
		},
		props: {
	    	metodists: Array
	    },
	   	data() {
	        return {
	        	form: {
	        		user_id:  null ,
	                monday:  null ,
	                tuesday:  null ,
	                wednesday:  null,
	                thursday:  null ,
	                friday:  null ,
	                saturday:  null,
	                sunday:  null ,
	        	}
	        }
	    },
	    mounted(){
	    	
	    },
	    methods: {
	    	ChangeMode(evt){
	    		if(evt.week == 'monday'){
	    			if(evt.items == "[]"){
	    				this.form.monday = null;	
	    			}else{
	    				this.form.monday = evt.items;	
	    			}
	    		}

	    		if(evt.week == 'tuesday'){
	    			if(evt.items == "[]"){
	    				this.form.monday = null;	
	    			}else{
	    				this.form.tuesday = evt.items;
	    			}
	    		}

	    		if(evt.week == 'wednesday'){
	    			if(evt.items == "[]"){
	    				this.form.monday = null;	
	    			}else{
	    				this.form.wednesday = evt.items;
	    			}
	    		}

	    		if(evt.week == 'thursday'){
	    			if(evt.items == "[]"){
	    				this.form.monday = null;	
	    			}else{
	    				this.form.thursday = evt.items;
	    			}
	    		}

	    		if(evt.week == 'friday'){
	    			if(evt.items == "[]"){
	    				this.form.monday = null;	
	    			}else{
	    				this.form.friday = evt.items;
	    			}
	    		}

	    		if(evt.week == 'saturday'){
	    			if(evt.items == "[]"){
	    				this.form.monday = null;	
	    			}else{
	    				this.form.saturday = evt.items;
	    			}
	    		}

	    		if(evt.week == 'sunday'){
	    			if(evt.items == "[]"){
	    				this.form.monday = null;	
	    			}else{
	    				this.form.sunday = evt.items;
	    			}
	    		}
	    	},
	    	async create(e) {
				const { data } = await window.axios.post('/admin/modes', { form: this.form });
				window.location = data['redirect'];
			},
	    }
	}
</script>
<style scoped>
	.select-input{
		width: 60%;
	}
	.item{
		display: flex;
		margin-bottom: 30px;
	}
	.title{
		padding-top: 10px;
		padding-right: 15px;
    	padding-left: 15px;
		width: 20%;
		text-align: right;
		color: #b9c8de;
		font-size: inherit;
    	line-height: 1.5;
	}
	.wrap{
		width: 80%;
	}
	.wrap-main{
		width: 100%;
		padding: 10px 100px;
	}
	.wrap-btn{
		display: flex;
		margin-left: 20%;
    	margin-top: 20px;
	}
	
</style>