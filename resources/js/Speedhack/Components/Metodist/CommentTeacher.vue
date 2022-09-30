<template>
	<section class="main-section">
		<button class="btn-open-comment" @click="openCommentModel" :disabled="disabledBtn" :class="{'disabled': disabledBtn}">
			Комментарии к ученику
		</button>

		<modal name="commentModel"
            :width="1000"
            :height="540"
            :adaptive="true">
            <div class="accept-wrap">
            	<div class="header">
            		<span>Отчет №{{ trial_lesson.id }}  {{ trial_lesson.student ? trial_lesson.student.full_name: '' }}</span>
            		<button class="close-btn" @click="closeCommentModel">
            			<img src="/images/icons/close-btn.svg" alt="close">
            		</button>
            	</div>
            	<div class="wrap-inputs">
            		<span class="title">Студент</span>
            		<div class="wrap">
            			<div class="form-group">
						    <label>Имя *</label>
						    <input type="text" class="form-control" v-model="form.name">
						    <invalid-feedback input="name"></invalid-feedback>
						</div>
						<div class="form-group">
						    <label>Фамилия</label>
						    <input type="text" class="form-control" v-model="form.surname">
						    <invalid-feedback input="surname"></invalid-feedback>
						</div>
            		</div>


				    <label class="title-form">Пол *</label>
				    <b-form-group v-slot="{ ariaDescribedby }" class="radio-wrap">
				      	<b-form-radio v-model="form.gender" class="radio" :aria-describedby="ariaDescribedby" name="some-radios" value="Мужской">Мужской</b-form-radio>
				      	<b-form-radio v-model="form.gender" class="radio" :aria-describedby="ariaDescribedby" name="some-radios" value="Женский">Женский</b-form-radio>
				    </b-form-group>

					<div class="wrap">
            			<div class="form-group">
						    <label>Возраст *</label>
                            <label>
                                <input type="text" class="form-control" v-model="form.age">
                            </label>
                            <!-- <invalid-feedback input="name"></invalid-feedback> -->
						</div>
						<div class="form-group">
						    <label>Дата рождения *</label>
                            <label>
                                <input type="date" class="form-control" v-model="form.birthday">
                            </label>
                            <!-- <invalid-feedback input="name"></invalid-feedback> -->
						</div>
            		</div>


					<label class="title-form">Цели *</label>

				    <b-form-group v-slot="{ ariaDescribedby }" class="metodist-checkbox-wrap">
				      	<b-form-checkbox-group
					        id="checkbox-group-1"
					        v-model="form.goal"
					        :options="options"
					        :aria-describedby="ariaDescribedby"
					        name="flavour-1"
				      	></b-form-checkbox-group>
				    </b-form-group>
				</div>

				<div class="footer-model">
					<button class="btn-main" @click="sumbit">Отправить</button>
				</div>
            </div>
      	</modal>

	</section>
</template>
<script>
	export default {
		props:{
			trial_lesson: Object
		},
		data() {
        	return {
        		disabledBtn: false,
        		form: {
        			name: this.trial_lesson.student ? this.trial_lesson.student.name: '',
	        		surname: this.trial_lesson.student ? this.trial_lesson.student.surname: '',
	        		age: null,
	        		birthday: '',
	        		gender: null,
	        		goal: [],
        		},
        		options: [
		          { text: 'Для саморазвития', value: 'Для саморазвития' },
		          { text: 'Для подготовки к школе', value: 'Для подготовки к школе' },
		          { text: 'Улучшить оценки в школе', value: 'Улучшить оценки в школе' },
		          { text: 'Нравится изучать английский', value: 'Нравится изучать английский' }
		        ],
		    }
        },

        methods:{
        	openCommentModel() {
        		this.$modal.show('commentModel');
        	},
        	closeCommentModel() {
        		this.$modal.hide('commentModel');
        	},
        	async sumbit(){
        		const {data} = await window.axios.post('/metodist/comment', {
        		    trial_lesson: this.trial_lesson,
                    form: this.form
        		});
        		if(data['status'] === 'success'){
        			this.disabledBtn = true;
        			this.$modal.hide('commentModel');
        		}
        	}
        }
	}
</script>
<style scoped>
    /*Main section*/

    .main-section {
        display: flex;
        justify-content: flex-end;
        padding: 0;
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

	.accept-wrap .body span{
		text-align: center;
		color: #2C2C2A;
		font-size: 24px;
		line-height: 32px;
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
	.wrap-inputs{
		padding: 20px 30px;
	}
	.wrap-inputs .title{
		color: rgba(44, 44, 42, 0.5);
		font-size: 24px;
		line-height: 24px;
		display: block;
		margin-bottom: 20px;
	}

	.wrap-inputs .wrap{
		display: flex;
	}

	.wrap-inputs .wrap .form-group{
		color: #2C2C2A;
		font-size: 18px;
		line-height: 24px;
		margin-bottom: 16px;
		width: 50%;
	}
	.wrap-inputs .wrap .form-group:first-child{
		padding-right: 10px;
	}
	.wrap-inputs .wrap .form-group:last-child{
		padding-left: 10px;
	}
	.form-control{
		border: 1px solid rgba(0, 0, 0, 0.2);
		box-sizing: border-box;
		border-radius: 5px;
		line-height: 32px;
    	height: auto;
	}

	.form-control label{
		color: #2C2C2A;
		font-size: 18px;
		line-height: 24px;
	}
	.wrap-inputs .title-form{
		color: #2C2C2A;
		font-size: 18px;
		line-height: 24px;
	}

	.wrap-inputs{
		margin-bottom: 20px;
	}
	.radio-wrap .form-group div{
		display: flex;
	}

	.btn-open-comment{
        width: 100%;
        /*height: 40px;*/
        background: #003ECB;
        border-radius: 6px;
        color: #FFFFFF;
        text-align: center;
        padding: 8px 18px;
        max-width: 240px;
        margin-top: 16px;
        margin-right: auto;
        font-size: 14px;
        /*margin-right: 30px;*/
	}
	.btn-open-comment.disabled{
		opacity: .7;
		pointer-events: none;
	}

	.footer-model{
		display: flex;
    	justify-content: center;
	}

	.footer-model .btn-main{
		padding: 16px 60px;
    	margin-bottom: 20px;
    	font-size: 18px;
	}
    @media (max-width: 577px) {
        .btn-open-comment{
            height: 50px;
            margin-right: 0px;
        }
    }

    @media only screen and (max-width: 768px) {
    	 .btn-open-comment{
	        margin-top: 0px;
	        height: 45px;
	        margin-right: 0px;
	        max-width: 100%;
	        padding: 0 10px;
	        font-size: 14px;
	      
	    }
    }
</style>
