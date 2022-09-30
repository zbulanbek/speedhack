<template>
	<welcome-layout>
		<header-white></header-white>

		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-4 pg-not">
					<div class="register-poster">
						<img src="/images/bg/register-poster.jpg">
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-8 pg-not">
					<div class="register-wrap">
						<span class="title">
							Записаться на пробный урок
						</span>
						<form @submit.prevent="register">
							<div class="form-group">
							    <input type="text" class="form-control" placeholder="Ваши ФИО" v-model="form.name">
							    <invalid-feedback input="name"></invalid-feedback>
							</div>
							<div class="form-group">
							    <input type="text" 
								    class="form-control" 
								    placeholder="Ваш номер телефона" 
								    v-model="form.phone" 
								    v-mask="['# (###)-###-##-##']">
								<invalid-feedback input="phone"></invalid-feedback>
							</div>
							<div class="form-group">
							    <input type="email" class="form-control" placeholder="Ваш e-mail" v-model="form.email">
							     <invalid-feedback input="email"></invalid-feedback>
							</div>
							<!-- <div class="form-group password-wrap">
							    <input :type="passwordFieldType" class="form-control" placeholder="Придумайте пороль">
							    <a @click="switchVisibility" class="show-more"><img src="/images/icons/eye-off.svg"></a>
							</div> -->
							
							<!-- <label class="checkbox-container">
							  	<input type="checkbox"	>
							  	<span class="checkmark"></span>
							  	Запомнить меня
							</label> -->
							<div class="btn-wrap">
								<a href="/login/main" class="login-btn">Войти</a>
								<button type="submit" class="btn-main" :disabled="disabled" :class="{'disabled': disabled}">Отправить заявку</button>
							</div>	
						</form>	
						<p class="info">
							Это текст о компании. Он необходим <b>для дальнейшего продвижения Вашего</b> дальнейшего сайта.
						</p>
					</div>
					
				</div>
			</div>	
				
		</div>	
	</welcome-layout>
</template>
<script>
	import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';

	export default {
	    props: {
	      
	    },
	    components: {
	        HeaderWhite,
	    },
	    data() {
	        return {
	            passwordFieldType: 'password',
	            form:{
	            	name: '',
		            phone: '',
		            email: '',
	            },
	           	disabled: false,
	        }
	    },
	    methods: {
		    switchVisibility() {
		      this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password'
		    },
		    async register() {
	            try {
	            	const { data, status } = await window.axios.post(route('application.create').url(), this.form);
	                if(data.status == 'success'){
	                	this.disabled = true;
	                	this.$errors.flush();
	                	this.form.name = '';
	                	this.form.phone = '';
	                	this.form.email = '';

	                	this.$modal.show('successModel');

	                }
	            } catch (e) {
	                
	            }
	        },
		}
	}

</script>
<style scoped>
	.register-poster{
		width: 100%;
		height: 100%;
	}
	.register-poster img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	.register-wrap{
		background: #F8F8F8;
		height: 100%;
		padding: 90px 150px;
	}
	.register-wrap .title{
		font-family: 'Inter-Bold', sans-serif;
		font-size: 32px;
		line-height: 36px;
		display: inline-block;
		margin-bottom: 50px;
	}
	.pg-not{
		padding: 0px;
	}
	.form-control{
		padding: 8px 0px;
		border:none;
		border-bottom:1px solid #CFD6DD;
		font-family: 'Inter', sans-serif;
		font-size: 18px;
		line-height: 36px;
		background: #F8F8F8;
		border-radius: 1px;
	}
	.form-control:placeholder{
		color: #7B838B;
	}	
	.form-group{
		margin-bottom: 38px; 
	}
	.btn-wrap{
		display: flex;
		width: 100%;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 50px;
	}
	.login-btn{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 18px;
		line-height: 32px;
		color: #F2994A;
	}
	.btn-wrap .btn-main{
		padding: 17px 40px;
		font-size: 17px;
		line-height: 16px;
	}
	.info{
		margin: 0px;
		font-family: 'Inter', sans-serif;
		font-size: 14px;
		line-height: 17px;
		color: #7B838B;
	}
	.info b{
		color: #F2994A;
	}
	.password-wrap{
		position: relative;
	}
	.password-wrap .show-more{
		position: absolute;
		top: 50%;
		right: 0px;
		transform: translateY(-50%);
	}
	@media only screen and (max-width: 1102px) {
		.register-wrap{
			padding: 90px 60px;
		}
	}
	@media only screen and (max-width: 768px) {
		.register-wrap{
			padding: 40px 30px;
		}
		.register-poster{
			height: 500px;
		}
		
	}
	@media only screen and (max-width: 508px) {
		.register-poster{
			height: 200px;
		}
	}

	.btn-main.disabled{
		pointer-events: none;
		opacity: .8;
	}
</style>