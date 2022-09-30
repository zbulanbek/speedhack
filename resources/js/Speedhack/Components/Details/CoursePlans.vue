<template>
	<section class="plans" v-if="programs.length > 0">
		<div class="container">
			<div class="main-title">{{ $page.props.sets['course.program.title'] }}</div>
			<section class="lessons">
				<template v-for="(program, index) in programs">
					<div class="item">
						<b-button v-b-toggle="'collapse-' + index" class="content-wrap">
							<div class="texts">
								<span class="title">Раздел {{ index + 1 }} {{ program.title }}</span>
								<div class="wrap">
									<div class="icons"><img src="/images/icons/video.svg"> {{ program.lessons.length }} lessons</div>
									<!-- <div class="icons"><img src="/images/icons/file-text.svg"> {{ program.file_all }}  files </div> -->

								</div>
							</div>
							<div class="collapse-button"><img src="/images/icons/arraw-blue.svg"></div>
						</b-button>

						<b-collapse :id="'collapse-' + index">
						    <ul class="lessons-list">
						    	<template v-for="(item, i) in program.lessons">
						    		<li>
						    			<span class="lesson_title"> <b>{{ index + 1}}.{{ i + 1 }}</b> {{ item.title }}</span>
						    			<!-- <div class="fasts">
						    				<div class="icons"><img src="/images/icons/clock.svg"> {{ item.min }} min</div>
						    				<div class="icons"><img src="/images/icons/paperclip.svg"> {{ item.files_count.length }} file</div>
						    			</div> -->
						    		</li>
						    	</template>
						    </ul>
						</b-collapse>
					</div>
				</template>
			</section>
		</div>
	</section>
</template>
<script>
	export default {
	    props: {
	      programs: Array,
	    },
	}
</script>
<style scoped>
	.plans{
		padding-bottom: 100px;
		padding-top: 100px;
	}
	.main-title{
		padding: 16px 50px;
		background: #003ECB;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
		font-family: 'Inter', sans-serif;
		color: #fff;
		font-weight: 600;
		font-size: 28px;
		margin-bottom: 36px;
	}
	.item{
		margin-bottom: 30px;
		background: #FFFFFF;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		border-radius: 8px;
	}
	.lessons .item:last-child{
		margin-bottom: 0px;
	}
	.content-wrap{
		padding: 28px 50px;
		display: flex;
		justify-content: space-between;
		background-color: transparent !important;
		border: none !important;
		box-shadow: none !important;
		width: 100%;
		align-items: center;
	}
	.content-wrap.not-collapsed .collapse-button{
		transform: rotateX(180deg);
	}

	.content-wrap .title{
		font-family: 'Inter', sans-serif;
		font-weight: 600;
		font-size: 26px;
		display: block;
		margin-bottom: 20px;
		color: #000;
		text-align: left;
	}
	.icons{
		display: flex;
		align-items: center;
		margin-right: 60px;
		font-size: 16px;
		font-family: 'Inter', sans-serif;
		color: #7B838B;
	}
	.icons img{
		width: 25px;
		height: 25px;
		margin-right: 16px;
	}

	.content-wrap .wrap{
		display: flex;
	}
	.collapse-button{
		background-color: transparent !important;
		border: none !important;
		box-shadow: none !important;
	}
	.collapse-button:active{
		background-color: transparent;
		border: none;
		box-shadow: none;
	}
	.collapse-button:focus{
		background-color: transparent;
		border: none;
		box-shadow: none;
	}



	.lessons-list{
		border-top: 1px solid #F1F2F2;
		margin-bottom: 0px;
	}
	.lessons-list li{
		padding: 22px 50px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		border-bottom: 1px solid #F1F2F2;
	}
	.lessons-list li:last-child{
		border-bottom: none;
	}
	.lesson_title{
		font-family: 'Inter', sans-serif;
		font-size: 16px;
		color: #414247;
	}
	.lesson_title b{
		margin-right: 20px;
	}
	.fasts{
		display: flex;
		align-items: center;
	}
	.fasts .icons:first-child{
		min-width: 120px;
		margin: 0px;
	}
	.icons:last-child{
		margin: 0px;
	}
	@media only screen and (max-width: 767px) {
		.content-wrap{
			padding: 28px 30px;
		}
		.content-wrap .wrap{
			flex-direction: column;
		}
		.icons{
			margin-bottom: 16px;
		}
		.icons:last-child{
			margin-bottom: 0px;
		}
		.lessons-list li{
			padding: 22px 30px;
			flex-direction: column;
    		align-items: flex-start;
		}
		.lesson_title{
			margin-bottom: 20px;
		}
	}
</style>
