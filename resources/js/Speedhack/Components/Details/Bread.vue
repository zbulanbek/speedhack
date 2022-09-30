<template>
	<section class="bread">
		<div class="container">
			<ul class="bread-links">
				<template v-for="item in breads">
					<li><a :href="item.link"><img src="/images/icons/bread.svg">{{ item.title }}</a></li>
				</template>
			</ul>
		</div>
	</section>
</template>
<script>
	export default {
    props: {
      breads: Array,
    },
    data() {
        return {
           
        }
    },
    methods: {
       
    },
    mounted() {
        
    },
}
</script>
<style scoped>
	.bread{
		border-bottom: 1px solid #E0E3EB;
		padding: 18px 0px;
	}

	.bread-links{
		padding: 0px;
		margin: 0px;
		display: flex;
	}
	.bread-links li{
		margin-right: 16px;
	}
	.bread-links li a{
		display: flex;
		align-items: center;
		color: #050A1C;
		font-family: "Inter", sans-serif;	
		font-weight: 500;
		font-size: 16px;
	}
	.bread-links li a img{
		margin-right: 16px;
    	width: 20px;
	}
</style>