<template>
	<section class="form-wrap">

		<div class="avatar">
			<label class="upload__type">
                <input type="file"
                    accept="image/jpeg, image/png"
                    ref="image"
                    @change="updatePhotoPreview"
                   >
                <span class="upload__type-photo">
                    <img v-if="photoPreview" :src="photoPreview" alt="Фото" class="preview">
                    <img v-else-if="$page.props.user.profile_photo_url" :src="$page.props.user.profile_photo_url">
                    <img v-else src="/images/icons/avatar.jpg">
                </span>

                <span class="upload__type-desc">
                   <img src="/images/icons/camera.svg"> Заменить аватарку
                </span>
			</label>
		</div>

		<form class="form-wrap-main" @submit.prevent="update">
			<div class="column-wrap">
				<div class="form-group">
				    <label>Ваша имя</label>
				    <input type="text" class="form-control" placeholder="Введите имя" v-model="form.name">
                    <invalid-feedback-inertia :errors="form.errors" input="name" bag="updateProfileInformation"></invalid-feedback-inertia>
				</div>
				<div class="form-group">
				    <label>Ваша фамилия</label>
				    <input type="text" class="form-control" placeholder="Введите фамилию" v-model="form.surname">
                    <invalid-feedback-inertia :errors="form.errors" bag="updateProfileInformation" input="surname"></invalid-feedback-inertia>
				</div>
				<div class="form-group">
				    <label>Ваше отчество</label>
				    <input type="text" class="form-control" placeholder="Введите отчество" v-model="form.patronymic">
                    <invalid-feedback-inertia :errors="form.errors" bag="updateProfileInformation" input="patronymic"></invalid-feedback-inertia>
				</div>
				<div class="form-group">
				    <label>Дата рождение</label>
				    <input type="date" class="form-control" placeholder="Введите дату рождение" v-model="form.birth_day">
                    <invalid-feedback-inertia :errors="form.errors" bag="updateProfileInformation" input="birth_day"></invalid-feedback-inertia>
				</div>
			</div>
			<div class="column-wrap">
				<div class="form-group">
				    <label>Ваш e-mail</label>
				    <input type="email" class="form-control" placeholder="Введите e-mail" v-model="form.email">
                    <invalid-feedback-inertia :errors="form.errors" bag="updateProfileInformation" input="email"></invalid-feedback-inertia>
				</div>
				<div class="form-group">
				    <label>Ваш номер телефона</label>
				    <input type="text" class="form-control" placeholder="Введите номер" v-mask="['# (###)-###-##-##']" v-model="form.phone">
                    <invalid-feedback-inertia :errors="form.errors" bag="updateProfileInformation" input="phone"></invalid-feedback-inertia>
				</div>
				<div class="form-group">
				    <label>Ваш город</label>
				    <input type="text" class="form-control" placeholder="Введите город" v-model="form.city">
                    <invalid-feedback-inertia :errors="form.errors" bag="updateProfileInformation" input="city"></invalid-feedback-inertia>
				</div>
				<div class="form-group">
				    <label>Цель</label>
				    <input type="text" class="form-control" placeholder="Введите Цель" v-model="form.purpose">
                    <invalid-feedback-inertia :errors="form.errors" bag="updateProfileInformation" input="purpose"></invalid-feedback-inertia>
				</div>

                <button class="btn-main" type="submit" :disabled="disabled" :class="{'disabled': disabled}">Сохранить</button>
			</div>

		</form>

	</section>
</template>
<script>
	export default {
	    data() {
	        return {
	        	photoPreview: null,
                form: this.$inertia.form({
                    _method: 'PUT',
                    photo: null,
                    name:this.$page.props.user.name,
                    surname: this.$page.props.user.surname,
                    patronymic: this.$page.props.user.patronymic,
                    email:this.$page.props.user.email,
                    phone: this.$page.props.user.phone,
                    city: this.$page.props.user.city,
                    birth_day: this.$page.props.user.birth_day,
                    purpose: this.$page.props.user.purpose,
                }, {
                    bag: 'updateProfileInformation',
                    resetOnSuccess: false,
                }),
            	disabled: false,
	        }
	    },
	    methods: {
	    	async update() {
                this.form.post(route('user-profile-information.update'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.$openSuccessModal('Обновление успешно завершено.');
                    },
                });

	        },
	        updatePhotoPreview() {
	            const reader = new FileReader();
	            reader.onload = (e) => {
	                this.photoPreview = e.target.result;
	            };
	            reader.readAsDataURL(this.$refs.image.files[0]);
                this.form.photo = this.$refs.image.files[0];
        	},
	    },
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
		width: 50%;
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
    		margin-bottom: 100px;
        }
		 .form-wrap-main{
        	flex-direction: column;
        }
        .column-wrap{
        	width: 100%;
        }
	}

	@media only screen and (max-width: 1020px)  and (min-width: 768px){

        .form-wrap{
        	margin-left: 20px;
    		margin-right: 20px;
    		padding: 30px;
    		flex-direction: column;
    		margin-bottom: 100px;
        }
	}
</style>
