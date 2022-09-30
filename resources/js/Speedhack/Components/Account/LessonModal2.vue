<template>
	<section class="lesson-modal-wrap">
		<button class="close-btn" @click="close"><img src="/images/icons/cancel.svg"></button>
		<div class="video-wrap">
			<div class="little-photo"></div>	
		</div>
		<div class="test-wrap">
			<class-course></class-course>
		</div>
	</section>
</template>
<script>
	import ClassCourse from '@/Speedhack/Components/Account/ClassCourseTrial2';
  	export default {
  		props:{
  			
  		},
	    components: {
	    	ClassCourse,
        },
	    data() {
	        return {
	        
	    	}
	    },
      	methods: {
	       	close(){
	        	this.$modal.hide('LessonModel');
	        },
    	},
	}
</script>
<style scoped>
	.lesson-modal-wrap{
		width: 100%;
		display: flex;
		padding: 0px;
		height: 100%;
		position: relative;
		background-color: #fff;
	}
	.close-btn{
		background-color: transparent;
		border:none;
		position: absolute;
		top: 5px;
		right: 10px;
	}
	.close-btn img{
		width: 16px;
		height: 16px;
	}
	.video-wrap{
		width: 50%;
		height: 100%;
		background-image: url('/images/course/teacher-bg3.jpg');
		background-size: cover;
		background-position: center;
		position: relative;
	}
	.little-photo{
		position: absolute;
		bottom: 20px;
		left: 20px;
		width: 220px;
		height: 170px;
		background-image: url('/images/course/student-bg.jpg');
		background-size: cover;
		background-position: center;
		border-radius: 10px;
    	border: 1px solid #7b838b;
    	box-shadow: 0px 0px 8px #7b838b;
	}
	.test-wrap{
		width: 50%;
	}
	.video-wrap{
		width: 100%;
		height: 100%;
	}
	.main-video{
		height: 60%;
		width: 100%;
	}
	.little-video{
		height: 40%;
		width: 100%;
		/*padding-top: 10px;*/
	}
	.test-wrap{
		/*padding: 16px;*/
		padding-top: 40px;
	}

	@media only screen and (max-width: 768px) {
		.lesson-modal-wrap{
			flex-direction: column;
		}
		.test-wrap,
		.video-wrap{
			width: 100%;
			   
		}
		.video-wrap{
			height: 200px;
			min-height: 200px;
		}
		.lesson-modal-wrap{
			padding:10px;	
		}
		.close-btn{
			display: none;
		}
		.little-photo{
			width: 90px;
    		height: 70px;
		}
	}	
</style>