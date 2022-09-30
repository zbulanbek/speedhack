<template>
    <welcome-layout>
        <header-white></header-white>
        <section class="login-page">
            <div class="login-form">
                <div class="header">
                    <span class="title">Вход</span>
                </div>
                <form @submit.prevent="login" class="form-wrap">
                    <div class="form-group">
                        <label>Логин</label>
                        <input type="text" v-model="form.email" class="form-control"
                               placeholder="Номер телефона или логин">
                        <invalid-feedback input="email"></invalid-feedback>
                    </div>
                    <div class="form-group">
                        <label>Пароль</label>
                        <input :type="passwordFieldType" v-model="form.password" class="form-control"
                               placeholder="Введите пароль">
                        <span class="pass-view" @click="showPassword">
					    	<img src="/images/icons/padlock.svg">
					    </span>
                        <invalid-feedback input="password"></invalid-feedback>
                    </div>
                    <button type="submit" class="btn-main">Войти</button>
                </form>
                <a class="link">Забыли пароль?</a>
                <div class="footer-form">
                    <p>Еще нет аккаунта? <a href="/register">Зарегистрируйтесь</a></p>
                </div>
            </div>
        </section>
    </welcome-layout>
</template>
<script>
import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';

export default {
    props: {
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
            },
            passwordFieldType: 'password',
        }
    },
    methods: {
        async login() {
            try {
                const {data, status} = await window.axios.post(route('login.main.authenticate').url(), this.form);
                if (data['status'] === 'success') {
                    this.$errors.flush();
                    window.history.back;
                }
            } catch (e) {

            }
        },
        showPassword() {
            this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password';
        },
        hideLoginModal() {
            this.$modal.hide('login-modal');
        },
        showForgetModal() {
            this.$modal.hide('login-modal');
            this.$modal.show('forget-password-modal');
        }
    }
}

</script>
<style scoped>
.login-page {
    background-color: #FAFBFC;
    padding: 100px 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-form {
    width: 450px;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
    overflow: hidden;
}

.login-form .header {
    padding: 30px 25px 10px;
    border-bottom: 1px solid #F1F1F1;
}

.login-form .header .title {
    font-family: 'Inter-Bold', sans-serif;
    font-size: 24px;
    line-height: 20px;
}

.login-form .form-wrap {
    padding: 25px;
}

.form-group {
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 16px;
    line-height: 24px;
    margin-bottom: 8px;
    color: #2C2C2A;
    margin-bottom: 20px;
}

.form-group .form-control {
    border: 1px solid #CCCCCC;
    box-sizing: border-box;
    border-radius: 8px;
    padding: 16px;
    font-size: 16px;
    height: auto;
    line-height: 24px;
}

.form-group .form-control:focus {
    border-color: #F2994A;
}

.btn-main {
    font-size: 16px;
    line-height: 24px;
    width: 100%;
    padding: 15px;
}

.link {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    line-height: 24px;
    color: #979797;
    display: block;
    text-align: center;
    margin-bottom: 20px;
}

.footer-form {
    border-top: 1px solid #F1F1F1;
    padding-bottom: 20px;
    padding-top: 20px;
    display: flex;
    justify-content: center;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    line-height: 24px;
}

.footer-form p {
    margin-bottom: 0px;
}

.footer-form p a {
    color: #F2994A;
}

@media only screen and (max-width: 767px) {
    .login-page {
        padding: 40px 0;
    }

    .login-form {
        width: 100%;
        box-shadow: none;
    }
}
</style>
