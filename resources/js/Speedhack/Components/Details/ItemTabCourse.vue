<template>
	<div class="item-tab-course">
		<div class="img">
			<img :src="img">
		</div>
		<div class="wrap-content">
			<span class="title">{{ title }}</span>
			<p class="text">{{ text }}</p>
			<a class="btn-main" @click="$modal.show('getTrialLesson')">Записаться</a>
		</div>
	</div>
</template>
<script>
	export default {
	    props: {
	      	img: String,
	      	title: String,
	      	text: String,
	    },
	}
</script>
<style scoped>
	.item-tab-course{
		display: flex;
		justify-content: center;
		padding-top: 60px;
	}
	.item-tab-course .img{
		width: 40%;
		margin-right: 20px;
	}
	.item-tab-course .img img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	.item-tab-course .wrap-content{
		width: 40%;
		margin-left: 20px;
	}
	.item-tab-course .wrap-content .title{
		font-family: 'Inter', sans-serif;
		color: #050A1C;
		font-size: 30px;
		line-height: 36px;
		display: inline-block;
		padding-bottom: 12px;
		padding-top: 12px;
	}
	.item-tab-course .wrap-content .text{
		font-family: 'Inter', sans-serif;
		font-size: 18px;
		color: #050A1C;
		display: inline-block;
		padding-bottom: 20px;
	}
	.btn-main{
		padding: 15px 35px;
		font-weight: 500;
		font-size: 16px;
		line-height: 19px;
	}
	.btn-main:hover{
		cursor: pointer;
	}
	@media only screen and (max-width: 768px) {
		.item-tab-course{
			flex-direction: column;
		}

		.item-tab-course .img{
			width: 100%;
			margin: 0px;
		}

		.item-tab-course .wrap-content{
			width: 100%;
			margin: 0px;
		}
	}
</style>
