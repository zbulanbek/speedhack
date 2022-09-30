<template>
    	<section class="bg-account">
    		<section class="content-wrap">
		    	<div v-if="!result">
					<template v-for="(task, index) in all_tasks">
						<all-tasks 
							:task="task" 
							v-if="option_index === index">
						</all-tasks>
					</template>
				</div>

				<template v-if="result">
					<result></result>
				</template>

				<div class="buttons-wrap" v-if="!result">
					<button @click="nextTest" class="btn-next">
		    			Next
		    			<img src="/images/icons/arr-black.svg">
		    		</button>
	    		</div>
	    	
	    	</section>
    	</section>
</template>
<script>
	import { mapGetters, mapActions } from 'vuex';
	import Drag from '@/Speedhack/Components/Test/OneDrag';
	import AllTasks from '@/Speedhack/Components/Tasks/AllTasks';
	import Result from '@/Speedhack/Components/Test/Result';

	export default {
		props:{
			tasks: Array,
			questions: Object,
			lesson: Object,
		},
		components: {
			Drag,
			AllTasks,
			Result
	    },
	    data() {
	        return {
	        	option_index: 0,
	        	result: false
	        }
	    },
	    computed: {
	        ...mapGetters({
	            all_tasks: 'getTasks',
	            all_balls: 'getBall'
	       	}),
	    },
	    mounted(){
	    	this.setTasks(this.tasks);
	    	this.setAllQuestions(this.questions);
	    },
	    methods: {
	    	...mapActions([
	    		'setTasks',
	    		'setTaskSuccess',
	    		'setAllQuestions',
	    		'saveLessonBall'
	    	]),
	    	nextTest() {
		    	if(this.option_index < this.tasks.length - 1){
					let index = this.option_index;
					let current_task =  this.tasks[this.option_index];
		    		let next_index  = this.option_index + 1;
		    		let next_task  = this.tasks[this.option_index + 1];
		    		this.setTaskSuccess({index, current_task, next_index, next_task});

		    		this.option_index = this.option_index + 1;
		    	}else{
		    		let index = this.option_index;
		    		let current_task =  this.tasks[this.option_index];
		    		let next_index  = null;
		    		let next_task  = null;
		    		this.setTaskSuccess({index, current_task, next_index, next_task});

		    		let lesson_id = this.lesson.id;
		    		let ball = this.all_balls;
		    		this.saveLessonBall({ lesson_id, ball});
		    		
		    		this.result = true;
		    	}
		    }
	    },
	}
</script>
<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    	display: flex;
	}
	.content-wrap{
		width: 100%;
	}
	.account-title{
		font-family: "Inter-Bold", sans-serif;
		padding: 30px 20px;
		font-weight: 600;
		color: #050A1C;
		font-size: 24px;
	}
	.account-title img{
		margin-right: 16px;
	}
	.tab-wrap{
		border-bottom: 1px solid #E0E3EB;
		display: flex;
		padding-right: 60px;
		padding-left: 60px;
		margin-bottom: 26px;
	}
	.tab-wrap .item{
		padding: 8px 0px;
		font-size: 18px;
		font-family: "Inter", sans-serif;
		color: rgb(123, 131, 139);
		margin-right: 60px;
		margin-bottom: -1px;
	}
	.tab-wrap .item.active{
		color: #003ECB;
		border-bottom: 1px solid #003ECB;
	}
	.wrap-test{
		padding-left: 40px;
		padding-right: 40px;
		margin-bottom: 60px;
	}
	.wrap-item{
		display: flex;
		margin-bottom: 16px;
		align-items: center;
	}
	.wrap-item b{
		font-family: 'Inter', sans-serif;
		color: #050A1C;
		font-size: 18px;
		margin-right: 16px;
		font-weight: normal;
	}
	.text-test{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 24px;
		color: #003ECB;
		margin-left: 40px;
		margin-bottom: 20px;
	}
	.buttons-wrap{
		display: flex;
		align-items: flex-end;
		justify-content: flex-end;
    	padding-right: 40px;
    	font-size: 14px;
    	color: #fff;
	}
	.btn-prev img{
		margin-right: 10px;
	}
	.btn-prev{
		background-color: #F2994A;
		border-radius:  12px;
		margin-right: 24px;
		padding: 6px 20px;
		color: #fff;

	}

	.btn-next img{
		margin-left: 10px;
	}
	.btn-next{
		background-color: rgba(208, 208, 208, 0.56);
		border-radius:  12px;
		margin-left: 24px;
		padding: 6px 20px;
		display: flex;
		justify-content: center;
		align-items: center;
		width: 118px;
	}

	@media only screen and (max-width: 768px) {
		.tab-wrap{
			padding-right: 20px;
    		padding-left: 20px;
		}
		.tab-wrap .item:last-child{
			margin: 0px;
		}
		.text-test{
			margin-right: 20px;
			margin-left: 20px;
		}
		.wrap-test{
			padding-left: 20px;
    		padding-right: 20px;
		}
		.content-wrap{
			margin-bottom: 100px;
		}

		.bg-account{
			flex-direction: column;
		}

	}
</style>
