<template>
	<section class="form-wrap">
		<form @submit.prevent="update" class="form-wrap-main">
			<div class="column-wrap">
				<div class="form-group">
				    <label>Старый пороль</label>
				    <div class="password-wrap">	
				    	<input :type="password_type_1" class="form-control" v-model="form.old_password" placeholder="Введите cтарый пороль">
				    	<span class="pass-view" @click="showPassword(1)">
					    	<img src="/images/icons/padlock.svg">
					    </span>
					</div>
					    <invalid-feedback input="old_password"></invalid-feedback>
					
				</div>
				<div class="form-group">
				    <label>Придумайте новый пороль</label>
				    <div class="password-wrap">
				    	<input :type="password_type_2" class="form-control" v-model="form.new_password" placeholder="Введите пороль">
				    	<span class="pass-view" @click="showPassword(2)">
					    	<img src="/images/icons/padlock.svg">
					    </span>
					</div>
					<invalid-feedback input="new_password"></invalid-feedback>
					
				</div>
				<div class="form-group">
				    <label>Повторите новый пороль</label>
				    <div class="password-wrap">
				    	<input :type="password_type_3" class="form-control" v-model="form.repeat_password" placeholder="Повторите пароль">
				    	<span class="pass-view" @click="showPassword(3)">
					    	<img src="/images/icons/padlock.svg">
					    </span>
					</div>
					<invalid-feedback input="repeat_password"></invalid-feedback>
					
				</div>
				<button class="btn-main" type="submit" :disabled="disabled" :class="{'disabled': disabled}">Изменить пароль</button>
			</div>
		</form>
	</section>
</template>
<script>
	export default {
	    components: {
	    	
	    },
	    data() {
	        return {
	        	form: {
					old_password: '',
	                new_password:'',
	                repeat_password: '',
	            },
	            disabled: false,
	            password_type_1: 'password',
	            password_type_2: 'password',
	            password_type_3: 'password',
	        }
	    },
	    methods: {
	    	async update() {
	           	const { data, status } = await window.axios.post(route('account.student.update.password').url(), this.form);
               	if(data['status'] == 'success'){
               		this.disabled = true;
                	this.$errors.flush();

                	this.form.old_password = '';
                	this.form.new_password = '';
                	this.form.repeat_password = '';

                	this.$modal.show('successModel');
               	}
	        },
	        showPassword(num){
	        	if(num == 1){
	        		this.password_type_1 = this.password_type_1 === 'password' ? 'text' : 'password';
	        	}
            	if(num == 2){
	        		this.password_type_2 = this.password_type_2 === 'password' ? 'text' : 'password';
	        	}
	        	if(num == 3){
	        		this.password_type_3 = this.password_type_3 === 'password' ? 'text' : 'password';
	        	}
        	},	
	    }
	}
</script>
<style scoped>
	.form-wrap{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		display: flex;
		padding: 60px;
		margin-left: 60px;
		margin-right: 60px;
		width: 70%;
	}
	.form-wrap-main{
		display: flex;
		width: 100%;
	}
	.upload__type{
		width: auto;
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.column-wrap{
		width: 100%;
		padding: 25px;
	}
	.upload__type-photo{
		border: 4px solid #F2994A;
		border-radius: 50%;
		overflow: hidden;
		width: 210px;
		height: 210px;
		margin-bottom: 16px;
	}
	.avatar{
		margin-right: 20px;
	}
	.upload__type-photo img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.upload__type-desc{
		display: flex;
		align-items: center;
		font-size: 16px;
		text-decoration-line: underline;
		color: #7B838B;
	}

	.upload__type-desc img{
		margin-right: 10px;
	}

	.form-group label{
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		line-height: 24px;
	}
	.form-control{
		padding: 11px;
		height: auto;
		border: 1px solid #CCCCCC;
		box-sizing: border-box;
		border-radius: 8px;
	}
	.form-control:focus{
		border-color: #F2994A;
	}
	.form-control:placeholder{
		color: #CCCCCC;
	}
	.btn-main{
		width: 100%;
		padding: 12px;
		font-size: 16px;
		margin-top: 20px;
	}

	.password-wrap{
		position: relative;
	}
	.pass-view{
		top: 50%;
		transform: translateY(-50%);
		height: inherit;
		right: 20px;
    	width: inherit;
	}
	.pass-view img{
		width: 20px;
		height: 20px;
	}
	
	.btn-main.disabled{
		pointer-events: none;
		opacity: .8;
	}

	@media only screen and (max-width: 767px) {
		.form-wrap{
        	margin-left: 20px;
    		margin-right: 20px;
    		padding: 30px;
    		flex-direction: column;
    		margin: auto;
    		margin-bottom: 100px;
        }
		 .form-wrap-main{
        	flex-direction: column;
        }
        .column-wrap{
        	width: 100%;
        	padding: 20px 0px;
        }
        .form-wrap{
        	width: 90%;
        }
	}


	@media only screen and (max-width: 1020px)  and (min-width: 768px){
		.form-wrap{
			margin-left: 20px;
    		margin-right: 20px;
    		padding: 30px;
    		flex-direction: column;
        	margin: auto;
    		margin-bottom: 100px;
        }
	}
</style>