<<template>
	<div>
		<template v-if="$page.props.user.role_id === '4' || active == true">
		<section class="test-wrap">
			<div class="wrap-h">
			<div class="text-test">Match the questions and answers</div>
			<template v-if="$page.props.user.role_id === '4'">
				<template v-if="block.is_show == 0">
					<button class="btn-show" :class="{'active': active}" @click="toggleText">
						<img src="/images/icons/eye-grey.svg" class="grey">
						<img src="/images/icons/eye-blue.svg" class="blue">
					</button>
				</template>
			</template>
		</div>
		<section class="wrap-test">
			<ul class="wrap-static">
				<template v-for="(item, key) in questions">
					<li class="item"  :class="{ green_full: check_questions[key].currect == true && move_class == true}">
						{{ item.question }}
					</li>
				</template>
			</ul>

			<div class="drag-wrap" :class="{'green': currect }">
				<draggable v-model="answers_all" :move="checkMove"  @change="log">
				    <transition-group>
				        <div v-for="(element, key) in answers_all" :key="element.name"
				        	class="item"
				        	:class="{ green_full: check_answers[key].currect == true && move_class == true,  error: check_answers[key].currect == false && move_class == true}">
				            <div class="item-drag" >
								{{ element.name }}
				            </div>
				            <div class="progress">
								<div class="procent" :style="{height: check_answers[key].percent + '%' }"></div>
							</div>
				        </div>
				    </transition-group>
				</draggable>
			</div>
		</section>
		<div class="btn-wrap-end">
			<button class="btn-main check" @click="checkAnswers">Check</button>
		</div>
		</section>
		</template>
	</div>
</template>
<script>
	import { mapGetters, mapActions } from 'vuex';
	import draggable from 'vuedraggable';

	export default {
		props:{
			task: Object,
			user_role: String
		},
		components: {
			draggable
		},
		data() {
	        return {
	        	answers_all: null,
	        	check_answers: null,
	        	questions: null,

	        	currect: true,
	        	move_class: null,
	        	active: false,
	        }
	    },
	    mounted() {
	    	this.getAnswers();

	    	this.questions = this.task.questions;
	    	this.check_questions = this.task.questions;

	    	for (let key in this.questions) {
	    		this.questions[key].currect = null;
			}


			let vm = this;
	        window.Echo.private('two-drag.' + this.task.id)
            .listen('.two.drag', function ({item}) {
               	vm.answers_all = item.all_answers;
            });

            if(this.block.is_show == 1 ){
        		this.active = true;
        	}

			let vm = this;
	        window.Echo.private('show-topic-block.' + this.block.id)
            .listen('.show.topic.block', function ({item}) {
                vm.active = item.active;
            });
	    },
	   	methods: {
	   		...mapActions([
	    		'setBalles'
	    	]),
	   		async getAnswers(e) {
				const { data } = await window.axios.post('/test/question/answers', { id: this.task.id });
				this.answers_all = data['answers'];
				this.check_answers = data['answers'];
			},
			async checkAnswers() {
				const { data } = await window.axios.post('/test/question/two/check', { id: this.task.id, questions: this.task.questions, answers: this.answers_all });
				this.move_class = true;
				this.check_answers = data['answers'];
				this.check_questions = data['questions'];
				let task_id = this.task_id;

				for (let item of this.check_questions) {
					let question_id = item.id;
					let ball = item.ball;
					this.setBalles({ question_id, ball, task_id});
				}
			},
			checkMove: function(e) {
		      	//console.log("Future index: " + e.draggedContext.futureIndex);
		      	//console.log(e.draggedContext);
		      	//console.log( this.answers_all[newIndex].item);
		      	// let item = {
	        //      	value: this.answers_all[newIndex].item,
	        //         key: newIndex
	        //     }

	        //     window.axios.post('/test/question/two/drag', {item})
		    },
		    log: function(evt) {
		    	//console.log(evt.moved.element);
		    	let vm = this;
		      	let item = {
		      		id: this.task.id,
	             	element: evt.moved.element,
	                newIndex: evt.moved.newIndex,
	                oldIndex: evt.moved.oldIndex,
	                all_answers: this.answers_all,
	            }
	           	window.axios.post('/test/question/two/drag', {item});

		      	this.move_class = null;
		    },

		    toggleText() {
        		this.active = !this.active;

        		let item = {
	                id: this.block.id,
	                active: this.active,
	            }
				window.axios.post('/metodist/show/topic/block', {item})

        	},

		},
	}
</script>
<style scoped>
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
	.bg-account{
		background: #F5F7F8;
		width: 100%;
		height: 100%;
    	display: flex;
	}
	.content-wrap{
		width: 100%;
	}
	.text-test{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 24px;
		color: #003ECB;
		margin-left: 60px;
		margin-bottom: 20px;
	}
	.wrap-test{
		display: flex;
		padding: 0px 60px;
	}
	.wrap-static{
		padding-right: 20px;
		width: 100%;
	}
	.drag-wrap{
		padding-left: 20px;
		width: 100%;
	}
	.wrap-static .item{
		padding: 15px 16px;
		font-size: 16px;
		line-height: 22px;
		margin-bottom: 20px;
		border-radius: 8px;
		background-color: #fff;
		color: #050A1C;
		position: relative;
		border: 2px solid #fff;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		font-family: "Inter", sans-serif;
	}
	.wrap-static .item:after{
		content: '';
		display: block;
		width: 12px;
		height: 12px;
		border-radius: 2px;
		background-color: #fff;
		position: absolute;
		top: 50%;
		right: -7px;
		border-top: 2px solid #fff;
    	border-right: 2px solid #fff;
		transform: rotate(45deg) translate(-40%, -50%);
	}
	.wrap-static .item.green_border{
		border: 2px solid #D5F0B0;
	}
	.wrap-static .item.green_border:after{
		border-top: 2px solid #D5F0B0;
    	border-right: 2px solid #D5F0B0;
	}
	.wrap-static .item.green_full{
		background: #D5F0B0;
		border: 2px solid #D5F0B0;
	}
	.wrap-static .item.green_full:after{
		background: #D5F0B0;
		border-top: 2px solid #D5F0B0;
    	border-right: 2px solid #D5F0B0;
	}
	.wrap-static .item:hover{
		cursor: pointer;
	}

	.drag-wrap .item{
		display: flex;
		align-content: center;
		justify-content: space-between;
	}
	.drag-wrap .item .item-drag{
		padding: 15px 16px;
		width: 100%;
		margin-right: 8px;
		font-size: 16px;
		line-height: 22px;
		margin-bottom: 20px;
		border-radius: 8px;
		background-color: #fff;
		color: #050A1C;
		position: relative;
		border: 2px solid #fff;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
		font-family: "Inter", sans-serif;
	}

	.drag-wrap .item .item-drag:before{
		content: '';
		display: block;
		width: 12px;
		height: 12px;
		border-radius: 2px;
		background-color: #fff;
		position: absolute;
		top: 50%;
		left: -8px;
		border-bottom: 2px solid #fff;
    	border-left: 2px solid #fff;
		transform: rotate(45deg) translate(-40%, -50%);
	}

	.drag-wrap .item.green_border .item-drag{
		border: 2px solid #D5F0B0;
	}
	.drag-wrap .item.green_border .item-drag:before{
		border-bottom: 2px solid #D5F0B0;
    	border-left: 2px solid #D5F0B0;
	}
	.drag-wrap .item.green_full .item-drag{
		background: #D5F0B0;
		border: 2px solid #D5F0B0;
	}
	.drag-wrap .item.green_full .item-drag:before{
		background: #D5F0B0;
		border-bottom: 2px solid #D5F0B0;
    	border-left: 2px solid #D5F0B0;
	}

	.drag-wrap .item.error .item-drag{
		border: 2px solid #EEA5A5;
	}
	.drag-wrap .item.error .item-drag:before{
		border-bottom: 2px solid #EEA5A5;
    	border-left: 2px solid #EEA5A5;
	}
	.drag-wrap .item:hover{
		cursor: pointer;
	}

	.progress{
		width: 6px;
		height: 100%;
		background: #BAC9DF;
		border-radius: 8px;
		height: 40px;
		margin-top: 8px;
		display: flex;
    	justify-content: space-between;
	}
	.progress .procent{
		display: block;
		width: 100%;
		background: #E46E67;
		margin-top: auto;
	}
	.btn-wrap-end{
		display: flex;
		justify-content: flex-end;
		padding-left: 60px;
	    padding-right: 60px;
	    margin-bottom: 40px;
	    margin-top: 20px;
	}

	.btn-main.check{
		padding: 12px 30px;
		font-size: 16px;
    	line-height: 16px;
	}
	@media only screen and (max-width: 768px) {
		.drag-wrap{
			padding-left: 10px;
		}
		.wrap-static{
			padding-right: 10px;
		}
		.wrap-static .item{
			padding: 15px 15px;
		    font-size: 14px;
		    line-height: 18px;
		}

		.drag-wrap .item .item-drag{
			padding: 15px 15px;
		    font-size: 14px;
		    line-height: 18px;
		}
	}


   	.btn-show{
		background-color: transparent;
	}
	.btn-show .blue{
		display: none;
	}
	.btn-show.active .grey{
		display: none;
	}
	.btn-show.active .blue{
		display: block;
	}
</style>
