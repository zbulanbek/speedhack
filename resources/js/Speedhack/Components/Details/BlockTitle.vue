<template>
	<div class="container"> 
        <span class="block-title">{{ title }}</span>
        <span class="block-subtitle">{{ subtitle }}</span>   
    </div>
</template>
<script>
	export default {
    props: {
      title: String,
      subtitle:  String,
    },
    data() {
	        return {
	           
	        }
    	},
    }
</script>

<style scoped>
	.block-title{
		font-family: "Inter-Bold", sans-serif;
		font-weight: bold;
		font-size: 40px;
		line-height: 58px;
		margin-bottom: 12px;
		color: #050A1C;
		display: block;
		padding-top: 100px;
	}
	.block-subtitle{
		font-family: "Inter", sans-serif;	
		font-size: 16px;
		line-height: 18px;
		color: #050A1C;
		margin-bottom: 50px;
		display: block;
	}
	@media only screen and (max-width: 768px) {
		.block-title{
			font-size: 32px;
			line-height: 40px;
			margin-bottom: 20px;
		}
	}
</style>