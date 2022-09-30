<template>
	<welcome-layout>
		<header-white></header-white>
		<div class="error-page">
			<div class="img">
				<img src="/images/ilustration/404.png">
			</div>
			<a href="/" class="btn-main">Вернуться на главную</a>
		</div>	
	</welcome-layout>
</template>
<script>
	import HeaderWhite from '@/Speedhack/Components/Details/HeaderWhite';
	export default {
	    components: {
	        HeaderWhite,
	    },
	}

</script>
<style scoped>
	.error-page{
		width: 100%;
		background-color: #003ECB;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		padding-top: 60px;
		padding-bottom: 120px;
	}	
	.img{
		width: 50%;
		height: 480px;
	}
	.img img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	.btn-main{
		padding: 16px 40px;
	}
	@media only screen and (max-width: 768px) {
		.img{
			width: 100%;
		}
	}
</style>