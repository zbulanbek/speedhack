<template>
	<section class="banner-white">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="content">
						<h2 class="title">{{ course.title }}</h2>
						<div class="subtitle" v-html="course.body"></div>
						<button class="btn-main" @click="$modal.show('getTrialLesson')">Записаться</button>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="img">

						<!-- <img :src="course.image"> -->
						<img src="/images/bg/banner-10.jpg">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<ul class="facts">
						<template v-for="item in cases">
							<li>
								<b>{{ item.title }}</b>
									{{ item.subtitle }}
							</li>
						</template>
					</ul>
				</div>
			</div>
		</div>
	</section>
</template>
<script>
	export default {
	    props: {
	      	course: Object,
	      	cases: Array
	    },
	}
</script>
<style scoped>
	.banner-white .content{
		display: flex;
		flex-direction: column;
		align-items: flex-start;
	    height: 100%;
	    justify-content: center;
	    margin-top: 25px;
	}
	.banner-white .title{
		font-family: "Inter-Bold", sans-serif;
		font-size: 44px;
		line-height: 52px;
		margin-bottom: 32px;
		color: #050A1C;
	}
	.banner-white .subtitle{
		font-family: "Inter", sans-serif;
		font-size: 16px;
		line-height: 24px;
		margin-bottom: 32px;
		color: #050A1C;
		opacity: 0.7;
	}
	.banner-white .btn-main{
		padding: 14px 36px;
	}
	.banner-white .img{
		width: 100%;
		height: 100%;
	}
	.banner-white .img img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	.facts{
		display: flex;
		justify-content: space-between;
		margin: 120px 0px;
	}
	.facts li{
		font-family: "Inter", sans-serif;
		font-weight: 600;
		font-size: 18px;
		position: relative;
		padding-left: 20px;
		line-height: 20px;
	}
	.facts li b{
		font-family: "Inter-Bold", sans-serif;
		display: block;
		margin-bottom: 4px;
	}
	.facts li:after{
		content: "";
		width: 8px;
		height: 8px;
		border-radius: 50%;
		overflow: hidden;
		display: block;
		background-color:  #050A1C;
		position: absolute;
		top: 5px;
		left: 0px;
	}
	@media only screen and (max-width: 767px) {
		.banner-white .title{
			font-size: 32px;
    		line-height: 38px;
		}
		.banner-white .img{
			margin-top: 60px;
		}
		.facts{
			flex-direction: column;
			margin-bottom: 60px;
		}
		.facts li{
			margin-bottom: 30px;
		}

	}
</style>
