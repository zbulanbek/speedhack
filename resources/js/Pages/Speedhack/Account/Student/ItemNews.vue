<template>
    <account-layout>
    	<section class="bg-account">
    		<a href="/account/news" class="account-title">
    			<img src="/images/icons/arrow-left-blue.svg"><span>Новости</span>
    		</a>

    		<section class="news-item">
    			<div class="content-wrap">
    				<span class="title">{{ news.title }}</span>
    				<span class="date">{{  news.created_at  | dateFormatForHuman }}</span>
    				<p class="text">
    					{{ news.body }}
    				</p>
    			</div>
    			<div class="img-wrap">
    				<div class="img">
    					<img :src="news.image" v-if="news.image">
    					<img src="/images/ilustration/news-1.jpg" v-else>
    				</div>
    			</div>
    		</section>
    	</section>
    </account-layout>
</template>
<script>
	export default {
		props:{
			news: Object
		},
	    components: {

	    },
	    data() {
	        return {
	        	}
	    },
	}
</script>
<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
	}

	.account-title{
		display: block;
		width: 100%;
		font-family: "Inter-Bold", sans-serif;
		padding: 30px 20px;
		font-weight: 600;
		color: #050A1C;
		font-size: 24px;
		border-bottom: 1px solid #E0E3EB;
	}
	.account-title img{
		margin-right: 16px;
	}
	.news-item{
		padding: 40px;
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		display: flex;
		margin: 40px 60px 60px;
	}
	.content-wrap{
		width: 60%;
		margin-right: 16px;
	}
	.title{
		font-family: "Inter", sans-serif;
		color: #050A1C;
		font-size: 32px;
		display: inline-block;
	}
	.date{
		font-family: "Inter", sans-serif;
		font-size: 14px;
		color: #7B838B;
		display: block;
		margin-bottom: 12px;
	}
	.text{
		font-size: 16px;
		color: #414246;
	}
	.img-wrap{
		width: 40%;
	}
	.img{
		width: 100%;
		height: 350px;
		overflow: hidden;
		border-radius: 8px;
	}
	.img img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	@media only screen and (max-width: 768px) {
		.news-item{
			margin: 20px 30px 20px;
		}
		.news-item{
			flex-direction: column;
			margin: 10px 15px 10px;
    		padding: 20px;
    		margin-top: 40px;
    		margin-bottom: 100px;
		}
		.content-wrap{
			width: 100%;
		}
		.img-wrap{
			margin-bottom: 50px;
			width: 100%;
			order: 1;
		}
		.img{
			height: 250px;
		}
		.content-wrap{
			margin-right: 0px;
			order: 2;
		}
	}
</style>
