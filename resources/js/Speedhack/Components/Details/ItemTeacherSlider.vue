<template>
	<section class="wrap-teacher-slider-item">
		<div class="teacher-slider-item">
			<div class="category" :style="'background-color:' + teacher.color"><span>{{ teacher.category }}</span></div>
			<div class="content-wrap">
				<span class="subtitle">Курс</span>
				<span class="title">{{ teacher.course }}</span>
			</div>
			<span class="name">{{ teacher.name }}</span>
			<div class="img"><img :src="teacher.image"></div>
		</div>
	</section>
</template>
<script>
	export default {
	    props: {
	    	teacher: Object,
	    },
	}
</script>
<style scoped>
	.wrap-teacher-slider-item{
		padding: 15px 15px;
	}
	.teacher-slider-item{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		position: relative;
		padding: 20px;
		border-radius: 8px;
		display: flex;
	    flex-direction: column;
	    align-items: flex-start;
	    justify-content: space-between;
	    overflow: hidden;
	}
	.teacher-slider-item .category{
		padding: 4px 8px;
		border-radius: 8px;
	}
	.teacher-slider-item .category span{
		font-family: 'Inter', sans-serif;
		font-style: normal;
		font-weight: 500;
		font-size: 16px;
		color: #FFFFFF;
		text-align: center;
	}
	.teacher-slider-item .content-wrap{
		display: flex;
		flex-direction: column;
		padding-top: 40px;
		padding-bottom: 40px;
	}
	.teacher-slider-item .content-wrap .subtitle{
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		color: #050A1C;
	}

	.teacher-slider-item .content-wrap .title{
		font-family: 'Inter-Bold', sans-serif;
		font-weight: 600;
		font-size: 20px;
	}

	.teacher-slider-item .name{
		color: #7B838B;
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 14px;
		line-height: 26px;
	}

	.teacher-slider-item .img{
		position: absolute;
		bottom: -10px;
		right: 0px;
		width: 150px;
    	height: 85%;
	}
	.teacher-slider-item .img img{
		width: 100%;
		height: 100%;
	    object-fit: contain;
	}
</style>
