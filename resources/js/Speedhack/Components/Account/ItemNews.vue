<template>
	<section class="wrap-news-slider-item">
		<div class="item-slider-news">
			<div class="img">
				<img :src="news.image">
			</div>
			<a :href="`/account/news/item/${news.id}`" class="wrap-text">
				<span class="date">{{  news.created_at  | dateFormatForHuman }}</span>
				<span class="title">{{ news.title }}</span>
				<p class="text">{{ news.body }}</p>
			</a>
		</div>
	</section>
</template>
<script>
	export default {
	    props: {
	      	news: Object,
	    },
	}
</script>
<style scoped>
	.wrap-news-slider-item{
		padding: 15px;
	}
	.item-slider-news{
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		overflow: hidden;
	}
	.img{
		width: 100%;
		height: 250px;
	}
	.img img{
		width: 100%;
		height: 100%;
		object-fit: cover;

	}
	.wrap-text{
		padding: 16px;
		display: flex;
		flex-direction: column;
	}
	.wrap-text:hover{
		background-color: #003ECB;
		transition: all .3s ease-out;
	}

	.wrap-text:hover .date{
		color: #fff;
	}

	.wrap-text:hover .title{
		color: #fff;
	}

	.wrap-text:hover .text{
		color: #fff;
	}

	.date{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 14px;
		margin-bottom: 8px;
		color: #7B838B;
	}
	.title{
		font-family: 'Inter-Bold', sans-serif;
		font-size: 18px;
		color: #050A1C;
	}
	.text{
		font-family: 'Inter', sans-serif;
		font-size: 14px;
		color: #414246;
	}
</style>
