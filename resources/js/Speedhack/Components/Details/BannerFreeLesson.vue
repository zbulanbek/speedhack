<template>
	<section class="banner">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="content">
						<span class="title">{{ $page.props.sets['free.lesson.title'] }}</span>
						<span class="text">{{ $page.props.sets['free.lesson.body'] }}</span>
						<button @click="isClicked = !isClicked" class="btn-main">{{ $page.props.sets['free.lesson.btn'] }}</button>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="img">
						<img :src="$page.props.sets['free.lesson.image']">
					</div>
				</div>
                <get-trial-lesson v-if="isClicked"></get-trial-lesson>
			</div>
		</div>
	</section>
</template>
<script>

import ModalForm from '@/Speedhack/Components/Details/GetTrialLesson';
export default {
    data() {
        return {
            isClicked: false,
        };
    },
    components: {
        ModalForm,
    },
}
</script>
<style scoped>
	.banner{
		background-image: url(/images/bg/banner-3.jpg);
		background-repeat: no-repeat;
		background-position: top center;
    	background-size: cover;
    	padding-top: 60px;
    	padding-bottom: 60px;
	}
	.content{
		display: flex;
		flex-direction: column;
		justify-content: center;
		height: 100%;
		align-items: flex-start;
	}
	.content .title{
		font-family: 'Inter-Bold', sans-serif;
		color: #fff;
		font-size: 32px;
		display: block;
		line-height: 62px;
		margin-bottom: 8px;
	}
	.text{
		color: #fff;
		font-size: 16px;
		display: block;
		margin-bottom: 40px;
	}
	.title img{
		width: 22px;
		height: 22px;
		margin-right: 16px;
	}
	.btn-main{
		padding: 12px 40px;
	}
	.img{
		width: 510px;
		height: 360px;

	}
	.img img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	@media only screen and (max-width: 767px) {
		.img{
			width: 100%;
		}
	}
</style>
