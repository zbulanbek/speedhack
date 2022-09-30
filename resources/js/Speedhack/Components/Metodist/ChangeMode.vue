<template>
	<div>
		<modal name="successModel" 
            :width="450"
            :height="366"
            :adaptive="true"> 
            <modal-success :text="success_text"></modal-success>
        </modal>

		<button class="btn-main" @click="openModel">Изменить расписание</button>
		<modal name="changeModel" 
            :width="500"
            :height="470"
            :adaptive="true"> 
            <form @submit.prevent="send">
            <div class="accept-wrap">
            	<div class="header">
            		<span>Изменить расписание</span>
            		<button class="close-btn" @click="closeModel">
            			<img src="/images/icons/close-btn.svg">
            		</button>
            	</div>
            	<div class="body">
	            	<div class="form-group">
					    <label>Выберите день недели, который хотите поменять</label>
					    <select class="form-control select-input" v-model="form.week" required>
		                   	<template v-for="item in week">
		                    	<option :value="item" >{{ item }}</option>
		                    </template>
		                </select>
					</div>
					<div class="form-group">
					    <label>Выберите желаемое время</label>
					    <div class="time-wrap">
					    	<vue-timepicker :minute-interval="5" v-model="form.start" class="form-control mine" required
					    	 placeholder="00:00"></vue-timepicker>
							<!-- <input type="time" v-model="form.start" class="form-control" required>  -->
							- 
							<vue-timepicker :minute-interval="5" v-model="form.end" class="form-control mine" required
					    	 placeholder="00:00"></vue-timepicker>
							<!-- <input type="time" v-model="form.end" class="form-control" required> -->
						</div>
					</div>
					<div class="form-group">
					    <label>Комментарии</label>
					    <input type="text" class="form-control" v-model="form.comment" placeholder="Оставьте комментарий...">
					</div>
				</div>
            	<div class="footer-model">
					<button type="submit" class="btn-main">Отправить</button>
				</div>
            </div>
        	</form>
        </modal>
	</div>
</template>
<script>
	import VueTimepicker from 'vue2-timepicker';
	import 'vue2-timepicker/dist/VueTimepicker.css';

	export default {
		components: {
			VueTimepicker
		},
		data() {
	        return {
	        	success_text: "Ваша заявка успешно отправлена",
	        	form:{
	        		week: '',
	        		start: '00:00',
	        		end: '00:00',
	        		comment: '',
	        	},
	        	week:[
	        		'Понедельник',
	        		'Вторник',
	        		'Среда',
	        		'Четверг',
	        		'Пятница',
	        		'Суббота',
	        		'Воскресенье'
	        	]
	        }
	    },
	    methods: {
	    	openModel() {
        		this.$modal.show('changeModel');
        	},
        	closeModel() {
        		this.$modal.hide('changeModel');
        	},
        	async send(e) {
        		window.axios.post('/metodist/change/mode', { form: this.form, item: item });
				
				let item = {
	                id: 1,
	                notifications: null,
	                count: null,
	            }
	            window.axios.post('/metodist/get/notice', {item});

				this.$modal.hide('changeModel');

				this.form.week = '';
				this.form.start = '';
				this.form.end = '';
				this.form.comment = '';

				this.$modal.show('successModel');
			},
	    },
	}
</script>
<style scoped>
	.btn-main{
		padding: 9px 50px;
    	margin-bottom: 20px;
    	font-size: 16px;
	}
	/*modal*/
	
	.accept-wrap{
		height: 100%;
    	display: flex;
    	flex-direction: column;
	}

	.accept-wrap .header{
		padding: 20px 30px;
		display: flex;
		justify-content: space-between;
		border-bottom: 1px solid #F1F1F1;
	}
	.accept-wrap .body{
		padding: 20px 30px;
	}
	.accept-wrap .header .close-btn{
		background-color: transparent;
	}

	.accept-wrap .header .close-btn img{
		width: 17px;
		height: 17px;
	}
	.accept-wrap .header span{
		font-weight: bold;
		font-size: 21px;
		line-height: 40px;
		color: #2C2C2A;
	}
	.footer-model{
		display: flex;
    	justify-content: center;
	}

	.footer-model .btn-main{
		padding: 9px 50px;
    	margin-bottom: 20px;
    	font-size: 16px;
	}
	.form-control{
		border: 1px solid rgba(0, 0, 0, 0.2);
		box-sizing: border-box;
		border-radius: 5px;
		line-height: 32px;
    	height: auto;
    	
	}
	.form-control.mine{
		width: 50%;
	}
	.form-control label{
		color: #2C2C2A;
		font-size: 18px;
		line-height: 24px;
	}
	.time-wrap{
		display: flex;
		align-items: center;
	}
	.time-wrap .form-control:first-child{
		margin-right: 10px;
	}
	.time-wrap .form-control:last-child{
		margin-left: 10px;
	}
	
</style>