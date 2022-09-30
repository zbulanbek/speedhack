<template>
	<a :href="route('account.catalog.courses.classes', course.id)" class="course-block">
        <span class="text"> Профессия</span>
        <div class="wrap">
            <p class="title">
            	{{ course.title }}
            	<!-- <b class="duration">
            		{{ course.duration }}
            	</b> -->
            </p>
            <div class="img">
                 <img :src="course.image">
            </div>
        </div>
        <div class="wrap">
        	<span class="price">
        		<!-- <template v-if="course.price">
        		{{ course.price }}  ₸
        		</template> -->
        	</span>
        	<a :href="route('account.catalog.courses.classes', course.id)" class="btn-main">Купить курс</a>
        </div>
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
		width: 140px;
		height: 140px;
		margin-bottom: 16px;
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
	.price{
		font-family: 'Inter-Bold', sans-serif;
		color: #050A1C;
		font-size: 20px;
	}
	.course-block:hover .price{
		color: #fff;
	}
	.course-block:hover .wrap .title{
		color: #fff;
	}
	.course-block .wrap .title{
		display: flex;
		flex-direction: column;
	}
	.course-block .wrap .title .duration{
		font-family: 'Inter';
		color: #7B838B;
		opacity: 0.9;
		font-size: 16px;
		line-height: 19px;
		margin-top: 5px;
		display: block;
	}
	.wrap-center{
		display: flex;
		justify-content: center;
	}
	.btn-main{
		padding: 9px 22px;
		font-size: 16px;
	}
</style>
