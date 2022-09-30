<template>
	<div class="login-form">
		<div class="img">
			<img src="/images/ilustration/success.png">
		</div>
		<span class="text">{{ text }}</span>
		<button class="btn-main" @click="$emit('close')">Ok, спасибо!</button>

	</div>
</template>
<script>
	export default {
		props:{
			text: String
		},
	}
</script>
<style scoped>

	.login-form{
		padding-top: 20px;
		padding-bottom: 20px;
		width: 450px;
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		overflow: hidden;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
	}
	.img{
		width: 200px;
		height: 200px;
		margin-bottom: 20px;
	}
	.img img{
		width: 100%;
		height: 100%;
		object-fit: contain;
	}
	.text{
		color: #2C2C2A;
		margin-bottom: 20px;
		font-family: 'Inter', sans-serif;
		font-size: 20px;
		line-height: 30px;
	}
	.btn-main{
		font-size: 16px;
		line-height: 24px;
		padding: 16px 40px;
	}
</style><
