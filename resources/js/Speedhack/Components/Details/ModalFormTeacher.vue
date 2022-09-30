<template>
    <div v-if="!submited" class="login-form">
            <div class="header">
                <span class="title">Оставить заявку на вакансию</span>
            </div>
            <form @submit.prevent="submit" class="form-wrap">
                <div class="form-group">
                    <label>Ваши ФИО</label>
                    <input required type="text" class="form-control" placeholder="Введите ФИО">
                </div>
                 <div class="form-group">
                    <label>Ваш номер телефона</label>
                    <input required type="text" class="form-control" placeholder="Введите номер телефона">
                </div>
                <div class="form-group">
                    <label>Ваш e-mail</label>
                    <input required type="email" class="form-control" placeholder="Введите e-mail">
                </div>
                <button type="submit" class="btn-main">Отправить</button>
            </form>
        </div>
    <modal-success v-else>
    </modal-success>
</template>
<script>
import ModalSuccess from '@/Speedhack/Components/Details/ModalSuccess';
export default {
    data: () => ({
        submited: false,
    }),
    components: {
        ModalSuccess
    },
    methods: {
        submit(){
            this.submited = true;
        }
    }
}
</script>
<style scoped>
    .login-form {
        position: absolute;
        left:0;
        right:0;
        margin-left:auto;
        margin-right:auto;
    }
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

	.form-group .form-control:focus{
		border-color: #F2994A;
	}
	.btn-main{
		font-size: 16px;
		line-height: 24px;
		width: 100%;
		padding: 15px;
	}
</style>
