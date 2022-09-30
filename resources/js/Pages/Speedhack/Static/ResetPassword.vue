<template>
	<welcome-layout>
	<header-white></header-white>
		<section class="login-page">
			<div class="login-form">
				<div class="header">
					<span class="title">Сброс пароля</span>
				</div>

				<form @submit.prevent="login" class="form-wrap">
					<div class="form-group">
					    <label>Логин</label>
					    <input  v-model="form.email" class="form-control" type="email" name="email" required>
			    		<invalid-feedback input="email"></invalid-feedback>
			    	</div>

					<div class="form-group">
					    <label>Пороль</label>
					    <input  v-model="form.password" class="form-control" type="password" name="password" required autofocus>
			    		<invalid-feedback input="password"></invalid-feedback>
					</div>

					<div class="form-group">
					    <label>Подтвердить Пароль</label>
					    <input  v-model="form.password_confirmation" class="form-control" type="password" name="password_confirmation" required autofocus>
			    		<invalid-feedback input="password_confirmation"></invalid-feedback>
					</div>
					<button type="submit" :disabled="disabled" class="btn-main login">Сброс пароля</button>
				</form>
			</div>
		</section>

		<modal name="resetPasswordModel"
            :width="450"
            :height="367"
            :scrollable="true"
            :adaptive="true">
            <div class="login-form-success">
				<div class="img">
					<img src="/images/ilustration/success.png">
				</div>
				<span class="text">Ваш пароль был сброшен!</span>
				<button class="btn-main" @click="hideSuccessModal">Ok, спасибо!</button>
			</div>
        </modal>

	</welcome-layout>
</template>
<script>
	import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';

	export default {
	    props: {
	      email: String,
	      token: String,
	    },
	    components: {
	        HeaderWhite,
	    },
	    data() {
	        return {
	           form: {
	                email: '',
	                password: '',
	                password_confirmation: '',
	                token: '',
	            },
	            disabled: false,
	            
	        }
	    },
	    mounted() {
	    	this.form.email = this.email;
	    	this.form.token = this.token;
	    },
	    methods: {
		    async login() {
            	try {
				const { data, status } = await window.axios.post(route('password.update').url(), this.form);
					if(data['message'] == "Ваш пароль был сброшен!"){
						this.form.email = '';
						this.form.password = '';
						this.form.password_confirmation = '';
						this.$errors.flush();
						this.disabled = true;
						this.$modal.show('resetPasswordModel');
						//window.location = route('login.index').url();
					}
               
	            } catch (e) {
	                
	            }
	        },
	        showPassword(){
	            this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password';
	        },
	       
	        hideSuccessModal(){
	            this.$modal.hide('resetPasswordModel');
	        }
		}
	}

</script>
<style scoped>
	.login-page{
		background-color: #FAFBFC;
		padding: 100px 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.login-form{
		width: 450px;
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		overflow: hidden;
	}
	.login-form .header{
		padding: 30px 25px 10px;
		border-bottom: 1px solid #F1F1F1;
	}
	.login-form .header .title{
		font-family: 'Inter-Bold', sans-serif;
		font-size: 24px;
		line-height: 20px;
	}
	.login-form .form-wrap{
		padding: 25px;
	}
	.form-group{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 16px;
		line-height: 24px;
		margin-bottom: 8px;
		color: #2C2C2A;
		margin-bottom: 20px;
	}
	.form-group .form-control{
		border: 1px solid #CCCCCC;
		box-sizing: border-box;
		border-radius: 8px;
		padding: 16px;
		font-size: 16px;
		height: auto;
		line-height: 24px;
	}
	.btn-main.login{
		font-size: 16px;
		line-height: 24px;
		width: 100%;
		padding: 15px;
	}
	.btn-main.login:disabled{
		opacity: .8;
	}
	/*dd*/
	.login-form-success{
		padding-top: 20px;
		padding-bottom: 20px;
		width: 450px;
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		overflow: hidden;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
	.login-form-success .img{
		width: 200px;
		height: 200px;
		margin-bottom: 20px;
	}
	.login-form-success .img img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	.login-form-success .text{
		color: #2C2C2A;
		margin-bottom: 20px;
		font-family: 'Inter', sans-serif;
		font-size: 20px;
		line-height: 30px;
		text-align: center;
	}
	.login-form-success .btn-main{
		font-size: 16px;
		line-height: 24px;
		padding: 16px 40px;
	}
</style>