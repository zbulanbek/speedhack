<template>
	<a :href="`/course/${course.id}`" class="course-block">
        <!-- <span class="text"> {{ course.text }}</span> -->
        <div class="wrap">
            <p class="title">{{ course.title }}</p>
            <div class="img">
                 <img :src="course.image">
            </div>
        </div>
        <!-- <span class="text">{{ course.duration }}</span> -->
    </a>
</template>
<script>
	export default {
		props: {
			course: Object
   		},
   	}
</script>
<style scoped>
	.course-block{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		padding: 30px;
		display: block;
		transition: all .7s ease;
		margin-bottom: 24px;
	}

	.course-block .text{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 14px;
		color: #050A1C;
		opacity: .9;
		transition: all .5s ease;
	}
	.course-block .wrap{
		display: flex;
		align-items: center;
		justify-content: space-between;
	}
	.course-block .wrap .title{
		font-family: 'Inter', sans-serif;
		font-style: normal;
		font-weight: 600;
		font-size: 18px;
		color: #050A1C;
		transition: all .5s ease;
	}

	.course-block .wrap .img{
		width: 155px;
		height: 155px;
	}

	.course-block .wrap .img img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}

	.course-block:hover {
		background-image: url('/images/bg/banner-1.jpg');
		background-position: top right;
    	background-size: cover;
	}

	.course-block:hover .text{
		color: #fff;
	}

	.course-block:hover .wrap .title{
		color: #fff;
	}

	.wrap-center{
		display: flex;
		justify-content: center;
	}
</style>
