<template>
	<section class="course-facts">
		<div class="container">
			<span class="main-title">{{ $page.props.sets['course.fact'] }}</span>
			<div class="row">
				<template v-for="item in facts">
					<div class="col-12 col-md-4">
						<span class="title">
							<img src="/images/icons/blue-arr.svg">
							{{ item.body }}
						</span>
					</div>
				</template>
			</div>
		</div>
	</section>
</template>
<script>
	export default {
	    props: {
	      	facts: Array,
	    },
	}
</script>
<style scoped>
	.course-facts{
		background-color: #FAFBFC;
		padding-bottom: 100px;
		padding-top: 0px;
	}
	.main-title{
		font-family: 'Inter-Bold', sans-serif;
		color: #050A1C;
		font-size: 40px;
		display: block;
		line-height: 50px;
		margin-bottom: 20px;
	}
	.title{
		color: #2C2D32;
		font-size: 20px;
		display: block;
		margin-bottom: 50px;
	}
	.title img{
		width: 22px;
		height: 22px;
		margin-right: 16px;
	}
	@media only screen and (max-width: 767px) {
		.main-title{
			font-size: 32px;
			line-height: 38px;
		}
		.title{
			margin-bottom: 30px;
		}
	}
</style>
