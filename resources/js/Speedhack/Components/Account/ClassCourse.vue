<template>
	<section class="class-carousel-wrap">
		<VueSlickCarousel  ref="carousel" v-bind="settings">
			<div class="carousel-item" v-for="time_line in lesson.time_lines">
				<div class="title-lesson">
                    <span>{{ time_line.title }}</span>
                </div>
				<ul class="lesson-wrap">
					<template v-for="(block, index) in time_line.blocks">
						<li class="item">
							<span class="title">
                                <b>{{ index + 1 }}. </b> <icon :icon-name="block.type + '-icon'"></icon> {{ block.title }}
                            </span>
							<div class="conent-wrap">
                                <template v-for="content in block.content">
                                    <p v-if="content.text" class="text" v-html="content.text"></p>
                                    <vue-plyr v-if="content.video">
                                        <video controls crossorigin playsinline>
                                            <source :src="content.video" />
                                        </video>
                                    </vue-plyr>
                                    <vue-plyr v-if="content.audio">
                                        <audio controls crossorigin playsinline>
                                            <source :src="content.audio" type="audio/mp3" />
                                        </audio>
                                    </vue-plyr>

                                    <section class="test-wrap" v-if="content.vocabularies">
                                        <div class="wrap-h">
                                            <div class="text-test">
                                                {{ content.subtitle }}
                                            </div>
                                        </div>
                                        <div class="example">
                                            <ul class="vocabulary-list">
                                                <li v-for="vocabulary in content.vocabularies" class="vocabulary-list__item">
                                                    <span>{{ vocabulary.word }}</span> - {{ vocabulary.translate }}
                                                </li>
                                            </ul>
                                        </div>
                                    </section>

                                </template>
							</div>
						</li>
					</template>
				</ul>
			</div>
<!--			<div class="test-wrap">-->
<!--				<div class="text-test">Match the questions and answers</div>-->
<!--	    		<div class="example"> <i>Example:</i> <b>Do</b> you drink black tea? </div>-->
<!--	    		<section class="test">-->
<!--	    			<template v-for="(item, key) in lists">-->
<!--		    			<div class="wrap-test-item"> <span class="key"> {{ key + 1 }}. </span> <drag :test="item"></drag></div>-->
<!--		    		</template>-->
<!--	    		</section>-->
<!--	    		&lt;!&ndash; <div class="buttons-wrap">-->
<!--		    		<button class="btn-prev">-->
<!--		    			<img src="/images/icons/arr-white-test.svg">-->
<!--		    			Previous-->
<!--		    		</button>-->
<!--		    		<button class="btn-next">-->
<!--		    			Next-->
<!--		    			<img src="/images/icons/arr-black.svg">-->
<!--		    		</button>-->
<!--		    	</div> &ndash;&gt;-->
<!--			</div>-->
<!--			<div class="test-wrap">-->
<!--				<div class="text-test">Put  the words in the correct order to make sentences</div>-->
<!--		    	<section class="test">-->
<!--	    			<drag-four :test="questions" :answers="answers"></drag-four>-->
<!--				</section>-->
<!--	    	</div>-->
		</VueSlickCarousel>
	</section>
</template>
<script>
	import VueSlickCarousel from 'vue-slick-carousel';
	import 'vue-slick-carousel/dist/vue-slick-carousel.css';
	// optional style for arrows & dots
	import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';
	import Drag from '@/Speedhack/Components/Test/ThreeDrag';
	import DragOne from '@/Speedhack/Components/Test/OneDrag';
	import DragFour from '@/Speedhack/Components/Test/FourDrag';
export default {
    props: {
        lesson: Object
    },
	components: {
      	VueSlickCarousel,
      	Drag,
      	DragOne,
      	DragFour
    },
    data() {
        return {
        	activeDots: 0,
           	settings:{
           	 	"dots": false,
			  	"focusOnSelect": true,
			  	"arrows": true,
			  	"infinite": false,
			  	"speed": 500,
			  	"slidesToShow": 1,
			  	"slidesToScroll": 1,
			},
			lists: [
        		{ text: "#??# your sister work in a school?"},
		       	{ text: '"Does Jim live near here?" "No, he? #??# .'},
		        { text: "What #??# your parents do?"},
        	],
        	lists_2: [
        		[
        			{ name: "Do", id: 0 },
			        { name: "drink", id: 1 },
			        { name: "black", id: 2 }
        		],
        		[
        			{ name: "drink", id: 3 },
			        { name: "Do", id: 4 },
			        { name: "black", id: 5 }
        		],
		        [
        			{ name: "Asel", id: 6 },
			        { name: "Aida", id: 7 },
			        { name: "Dina", id: 8 }
        		],
	      	],
	      	answers: [
	        	{ name: "happen", id: 1, currect: null},
	        	{ name: "afraid", id: 2, currect: null},
	        	{ name: "speak", id: 3, currect: null },
	        	{ name: "problem", id: 8, currect: null }
	      	],
			questions: [
        		[{ name: "I'm #??# I've got a complaint." ,id: 5, right: 1}],
		       	[{ name: 'Im sorry, but I"ve got a #??# .' ,id: 6, right: 2}],
		        [{ name: "I think there's something  #??# with my order.",id: 7, right: 8}],
        	],
			lessons:[
				{
					title: "Happy families day!",
					lessons: [
						{
							title: 'Read and translate this text.',
							text: 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.First of all some words about my parents. My mother is a teacher of biology. She works in a school. She likes her profession. She is a good-looking woman with brown hair. She is 44 but she looks much younger. My father is programmer. He is forty-six. My father often sings and when we are at home and have some free time I play guitar and we sing together. He is also handy with many things. When he was small he liked to take everything to pieces. My grandmother told me a story that once my father tried to repair their kitchen clock but without success. They had to give it to a repairman. But it happened a long time ago. Now he can fix almost everything. My parents have been married for 18 years. They have much in common, but they have different views on music, books, and',
							img:"/images/course/course-1.jpg",
						},
						{
							title: '2 Read and translate this text.',
							text: 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.First of all some words about my parents. My mother is a teacher of biology. She works in a school. She likes her profession. She is a good-looking woman with brown hair. She is 44 but she looks much younger.',
							img:"/images/course/course-2.jpg",
						},
					]
				},
				{
					title: "2 Happy families day!",
					lessons: [
						{
							title: 'Read and translate this text.',
							text: 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.First of all some words about my parents. My mother is a teacher of biology. She works in a school. She likes her profession. She is a good-looking woman with brown hair. She is 44 but she looks much younger. My father is programmer. He is forty-six. My father often sings and when we are at home and have some free time I play guitar and we sing together. He is also handy with many things. When he was small he liked to take everything to pieces. My grandmother told me a story that once my father tried to repair their kitchen clock but without success. They had to give it to a repairman. But it happened a long time ago. Now he can fix almost everything. My parents have been married for 18 years. They have much in common, but they have different views on music, books, and',
							img:"/images/course/course-1.jpg",
						},
						{
							title: '2 Read and translate this text.',
							text: 'I am Zhilin Andrey. Andrey is my name and Zhilin is my surname. I am seventeen years old. I want to tell you a few words about my family. My family is not large. I have got mother, father and grandmother. There are four of us in the family.First of all some words about my parents. My mother is a teacher of biology. She works in a school. She likes her profession. She is a good-looking woman with brown hair. She is 44 but she looks much younger.',
							img:"/images/course/course-2.jpg",
						},
					]
				},
			]
        }
    },

}

</script>
<style scoped>
	.class-carousel-wrap{
		padding-top: 38px;
		width: 100%;
	}
    .title svg {
        margin-right: 10px
    }
	.carousel-item{
		height: 560px;
		overflow-y: auto;
		width: 100%;
		background-color: #fff;
		border-radius: 8px;
	}

	.carousel-item .title-lesson{
		background: #F2994A;
		border-radius: 8px;
		border-bottom-left-radius: 0px;
		display: inline-flex;
		/*-webkit-transform: skew(30deg);
	    -moz-transform: skew(30deg);
	    -o-transform: skew(30deg);
	    transform: skew(30deg);*/
	    /*border-top: 100px solid red;
		border-right: 50px solid transparent;*/

	}

	.carousel-item .title-lesson span{
		font-family: "Inter", sans-serif;
		font-style: normal;
		font-weight: 600;
		font-size: 18px;
		color: #FFFFFF;
		padding: 20px;
		padding-right: 40px;
	}

	.lesson-wrap{
		padding: 16px 24px;
	}

	.lesson-wrap li{
		font-family: "Inter", sans-serif;
		font-size: 18px;
		line-height: 22px;
		color: #050A1C;
		margin-bottom: 20px;
	}

	.lesson-wrap .text{
		line-height: 28px;
	}

	.lesson-wrap li .title{
		font-family: "Inter-Bold", sans-serif;
		font-size: 18px;
		color: #050A1C;
		margin-bottom: 8px;
		display: flex;
		align-items: center;
	}
	.lesson-wrap li .title b{
		color: #F2994A;
		font-size: 26px;
	}
	.lesson-wrap li .title img{
		margin-left: 8px;
		margin-right: 8px;
	}
	.lesson-wrap li .conent-wrap .img{
		float: right;
		width:170px;
		height:170px;
		margin-left:15px;
		border-radius: 5px;
	}
	.lesson-wrap li .conent-wrap .img img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.text-test{
		font-family: 'Inter', sans-serif;
		font-weight: 500;
		font-size: 24px;
		color: #003ECB;
		margin-left: 10px;
		margin-bottom: 20px;


	}
	.example{
		background: #EEFADE;
		border-radius: 8px;
		padding: 16px;
		margin-left: 10px;
		margin-right: 10px;
		font-family: 'Inter', sans-serif;
		font-size: 18px;
		color: #050A1C;
		margin-bottom: 30px;
	}

	.wrap-test-item{
		display: flex;
		margin-bottom: 20px;
	 	align-items: center;
	}
	.wrap-test-item .key{
		font-family: 'Inter', sans-serif;
		font-size: 18px;
		color: #050A1C;
		margin-right: 6px;
	}

	.example i{
		font-style: italic;
	}
	.example b{
		display: inline-block;
		padding: 2px 11px;
		background: #D5F0B0;
		border-radius: 8px;
		margin-right: 16px;
		margin-left: 30px;
	}
	.test-wrap{
		background-color: #fff;
		padding: 15px;
		padding-top: 20px;
		border-radius: 8px;
	}

	.buttons-wrap{
		display: flex;
		align-items: flex-end;
		justify-content: flex-end;
    	margin-top: 20px;
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
		display: flex;

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


</style>



