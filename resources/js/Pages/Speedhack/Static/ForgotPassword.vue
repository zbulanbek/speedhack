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
                        <input v-model="form.email" class="form-control" type="email" name="email" required autofocus>
                        <invalid-feedback input="email"></invalid-feedback>
                    </div>
                    <button type="submit" :disabled="disabled" class="btn-main login"><img
                        src="/images/icons/loader.gif" v-show="loader">Войти
                    </button>
                </form>
            </div>
        </section>

        <modal name="forgotEmailModel"
               :width="450"
               :height="397"
               :scrollable="true"
               :adaptive="true">
            <div class="login-form-success">
                <div class="img">
                    <img src="/images/ilustration/success.png">
                </div>
                <span class="text">Мы отправили вам ссылку для сброса пароля по электронной почте!</span>
                <button class="btn-main" @click="hideSuccessModal">Ok, спасибо!</button>
            </div>
        </modal>

    </welcome-layout>
</template>
<script>
import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';

export default {
    props: {},
    components: {
        HeaderWhite,
    },
    data() {
        return {
            form: {
                email: '',
            },
            loader: false,
            disabled: false,
            passwordFieldType: 'password',
        }
    },
    methods: {
        async login() {
            this.loader = true;
            try {
                const {data, status} = await window.axios.post(route('password.email').url(), this.form);
                if (data['message'] == "Мы отправили вам ссылку для сброса пароля по электронной почте!") {
                    this.form.email = '';
                    this.$errors.flush();
                    this.disabled = true;
                    this.loader = false;
                    this.$modal.show('forgotEmailModel');
                }

            } catch (e) {
                this.loader = false;
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
        },
        hideSuccessModal() {
            this.$modal.hide('forgotEmailModel');
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

.btn-main.login {
    font-size: 16px;
    line-height: 24px;
    width: 100%;
    padding: 15px;
}

.btn-main.login:disabled {
    opacity: .8;
}

/*dd*/
.login-form-success {
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

.login-form-success .img {
    width: 200px;
    height: 200px;
    margin-bottom: 20px;
}

.login-form-success .img img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.login-form-success .text {
    color: #2C2C2A;
    margin-bottom: 20px;
    font-family: 'Inter', sans-serif;
    font-size: 20px;
    line-height: 30px;
    text-align: center;
}

.login-form-success .btn-main {
    font-size: 16px;
    line-height: 24px;
    padding: 16px 40px;
}

.btn-main {
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-main img {
    width: 30px;
    height: 20px;
    margin-right: 2px;
}
</style>
