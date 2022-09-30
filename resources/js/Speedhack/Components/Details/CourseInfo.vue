<template>
	<section class="course-info">
		<div class="container">
			<span class="main-title">{{ $page.props.sets['course.info'] }}</span>
			<div class="row">
				<template v-for="item in info">
					<div class="col-12 col-md-4">
						<div class="item">
							<div class="img">
								<img :src="item.image">
							</div>
							<span class="title">{{ item.title }}</span>
							<span class="subtitle">{{ item.body }}</span>
						</div>
					</div>
				</template>
			</div>
		</div>
	</section>
</template>
<script>
	export default {
	    props: {
	      	info: Array,
	    },
	}
</script>
<style scoped>
	.main-title{
		font-family: 'Inter-Bold', sans-serif;
		color: #050A1C;
		font-size: 40px;
		display: block;
		line-height: 50px;
		margin-bottom: 20px;
	}
	.course-info{
		background-color: #FAFBFC;
		padding-bottom: 150px;
		padding-top: 150px;
	}
	.item .img{
		width: 100%;
		height: 300px;
		margin-bottom: 20px;
	}
	.item .img img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.item .title{
		font-family: 'Inter', sans-serif;
		color: #050A1C;
		font-size: 18px;
		line-height: 22px;
		margin-bottom: 16px;
		display: block;
	}
	.item .subtitle{
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		color: #7B838B;
	}
	@media only screen and (max-width: 767px) {
		.course-info{
			padding-top: 20px;
		}
		.main-title{
			font-size: 28px;
 			line-height: 38px;
		}
		.item{
			margin-bottom: 40px;
		}
	}
</style>
