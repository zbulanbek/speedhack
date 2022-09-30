<template>
	<section class="form-request course-buy-wrap">
		<div class="container">
			 <div class="row d-flex justify-content-center">
			 	<!-- <div class="col-12 col-md-7">
			 		<div class="row classes-row">
			 			<template v-for="item in classes">
					 		<div class="col-12 col-md-6">
					 			<course-class-item :item="item" :column="false" :show="false"></course-class-item>
					 		</div>
					 	</template>
				 	</div>
			 	</div> -->
			    <div class="col-12 col-md-7">
			      	<div class="content">
			      		<p class="title">{{ $page.props.sets['main.bid.title'] }}</p>
			      		<p class="subtitle">{{ $page.props.sets['main.bid.subtitle'] }}</p>
			      		<form @submit.prevent="register" class="form-wrap">
			      			<div class="form-group">
							    <label>ФИО</label>
							    <input type="text" class="form-control" placeholder="Ваша имя и фамилия" v-model="form.name" required>
							</div>

							<div class="form-group">
							    <label>Ваш e-mail</label>
							    <input type="text" class="form-control" placeholder="Введите e-mail" v-model="form.email"  required>
							</div>

							<div class="form-group">
							    <label>Ваш номер телефона</label>
							    <input type="text" class="form-control" v-mask="['# (###)-###-##-##']" placeholder="Введите номер" v-model="form.phone" required>
							</div>
							<p class="text_info">
								Нажимая кнопку “Записаться” вы оставляете заявку и наш менеджер свяжется с Вами в ближайшее время
							</p>
							<button class="btn-main">
								Записаться
							</button>
			      		</form>
			      	</div>
			    </div>
			</div>
		</div>
	</section>
</template>
<script>
import CourseClassItem from "@/Speedhack/Components/Courses/CourseClassItem";

export default {
	props: {
       	classes: Array,
    },
    components: {
        CourseClassItem
    },
    data: () => ({
    	form:{
        	name: '',
            phone: '',
            email: '',
        },
    }),
    methods: {
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
	.classes-row{
		align-items: center;
		height: 90%;
	}
	.form-request{
		background-image: url(/images/bg/yellow-bg.jpg);
		background-repeat: no-repeat;
		background-position: top center;
    	background-size: cover;
    	padding: 100px 0px;
	}

	.content .title{
		font-family: 'Inter-Bold', sans-serif;
		font-size: 36px;
		width: 85%;
		margin: 0 auto;
		margin-bottom: 8px;
		line-height: 34px;
	}
	.content .subtitle{
		font-family: 'Inter', sans-serif;
		font-size: 18px;
		width: 85%;
		margin: 0 auto;
		margin-bottom: 16px;
		line-height: 28px;
	}
	.form-wrap{
		width: 85%;
		margin: 0 auto;
	}
	.form-group{
		margin-bottom: 20px;
	}
	.form-group label{
		font-family: 'Inter', sans-serif;
		font-size: 18px;
		line-height: 24px;
		margin-bottom: 8px;
	}
	.form-group .form-control{
		padding: 16px;
    	height: auto;
		background: #FFFFFF;
		border-radius: 8px;
		border:none;
	}
	.form-group .form-control::placeholder{
		color: #C4C4C4;
	}
	.text_info{
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		line-height: 19px;
		text-align: center;
		color: #050A1C;
		margin-bottom: 32px;
	}
	.btn-main{
		width: 100%;
		font-size: 18px;
	    line-height: 20px;
	    text-align: center;
	    padding: 16px;
	}
	.title-main{
		font-family: 'Inter-Bold', sans-serif;
		font-size: 19px;
		line-height: 21px;
		color: #050A1C;
		display: block;
		margin-bottom: 20px;
	}
	.new-price{
		margin-bottom: 10px;
	}
	.new-price span{
		font-size: 17px;
		line-height: 21px;
		color: #2C2D32;
		font-family: 'Inter', sans-serif;
	}
	.new-price p{
		font-family: 'Inter-Bold', sans-serif;
		font-weight: 800;
		font-size: 28px;
		margin-bottom: 0px;
		line-height: 28px;
	}
	.old-price span{
		font-size: 16px;
		line-height: 19px;
		font-family: 'Inter', sans-serif;
		color: #9B8839;
	}
	.price-wrap{
		display: flex;
		flex-direction: column;
		align-items: center;
		margin-bottom: 20px;
	}
	.price-wrap .wrap{
		width: 100%;
	}
	.old-price p{
		font-family: 'Inter-Bold', sans-serif;
		text-decoration-line: line-through;
		color: #9B8839;
		margin-bottom: 0px;
		font-size: 16px;
		line-height: 32px;
	}

	@media only screen and (max-width: 767px) {
		.title-main{
			font-size: 42px;
    		line-height: 69px;
		}
		.new-price p{
			font-size: 50px;
		}
		.new-price{
			margin-bottom: 20px;
		}
		.old-price{
			margin-bottom: 60px;
		}
		.content .title{
			width: 100%;
		}
		.content .subtitle{
			width: 100%;
		}
		.form-wrap{
			width: 100%;
		}
	}
</style>
