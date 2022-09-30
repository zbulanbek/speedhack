<template>
    <account-layout>
    	<section class="bg-account">
	    	<div class="block-wrap">
    		<div class="week-slider-wrap">
	    		<button class="arrow-slider left" @click="showPrev" v-if="activeClass == 2"><img src="/images/icons/chevron-left-left.svg"></button>
	    		<div class="week week-slider">

	    		<VueSlickCarousel  ref="carousel" v-bind="settings" @afterChange="currentSlider($event)">
		    		<template v-for="(item, index) in calendars">
		    			<div class="day" :class="{'active': activeClass == index}" @click="changeDate(index,item.full)">
		    				<div class="day_week">
                            	<h5> {{ item.full | day_mine }}</h5> <span>{{ item.full | week_mine }}</span>
                        	</div>
                        	<span>{{ item.full |  month_mine}}</span>
		    			</div>
		    		</template>
		    	</VueSlickCarousel>

		    	</div>
		    	<button class="arrow-slider right" @click="showNext" v-if="activeClass !== 29"><img src="/images/icons/chevron-left-right.svg"></button>
	    	</div>
	    	<template v-if="count > 0">
	    	<div class="cards">
	    		<template v-for="item in events">
	    			 <div class="card-item">
                   		<div class="date">
                            <div class="time">
                                <b>{{ item.time }}</b>
                                <span>{{item.period}} min</span>
                            </div>
                       </div>
                        <div class="content">
                            <div class="name_img">
                                <div class="ellipse"> <img src="/images/users/teacher-1.png" alt=""></div>
                                <div class="name">
                                    <span>Ведущий</span>
                                    <p>{{ item.teacher_name }}</p>
                                </div>
                            </div>
                            <div class="mess">
                                <h5>{{item.title}}</h5>
                                <span>{{item.subtitle}}</span>
                                <p>{{item.text}}</p>
                            </div>
                        </div>
                        <div class="button">
                            <a href="/account/event/lesson" class="add">Перейти на урок</a>
                            <br>
                            <span>{{ item.places }} места</span>
                        </div>
                    </div>
	    		</template>
            </div>
        	</template>
        	<template v-else>
		    	<div class="empty-wrap">
					<span class="title">В данный момент у вас нет материалы</span>
				</div>
		    </template>
            </div>
    	</section>
    </account-layout>
</template>
<script>
	import VueSlickCarousel from 'vue-slick-carousel';
	import 'vue-slick-carousel/dist/vue-slick-carousel.css';
	// optional style for arrows & dots
	import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';
	import moment from 'moment';

	export default {
		components: {
      		VueSlickCarousel,
    	},
	    props: {
	    	calendars: Array,
	    	counter: Number,
	    	first_events: Array
	    },
	    data() {
        return {
        	events: [],
        	count: 0,
        	activeClass: 0,
	           	settings:{
	           	 	"dots": false,
				  	"focusOnSelect": true,
				  	"arrows": true,
				  	"infinite": false,
				  	"speed": 500,
				  	"slidesToShow": 7,
				  	"slidesToScroll": 1,
				  	responsive:[
				  		{
			            	breakpoint: 1120,
			                settings:
			    			{
			                slidesToShow: 3,
			                slidesToScroll: 1,
			                }
			            },
			            {
			                breakpoint: 800,
			                settings:
			    			{
			                slidesToShow: 3,
			                slidesToScroll: 3
			                }
			            },
			            {
			                breakpoint: 600,
			                settings:
			    	        {
			                slidesToShow: 2,
			                slidesToScroll: 1
			                }
			            }
		    	    ]
				},
			}
		},
	    filters: {
			month_mine: function (value) {
			  	if (!value) return '';
			   	return  moment(value).locale("ru").format('MMMM');
			},
			day_mine: function (value) {
			  	if (!value) return '';
			   	return  moment(value).locale("ru").format('DD');
			},
			week_mine: function (value) {
			  	if (!value) return '';
			  	let str = moment(value).locale("ru").format('llll');
			  	str = str.substr(0, 2)
			   	return  str;
			},
		},
		mounted(){
			this.events  = this.first_events;
			this.count = this.counter;
		},
		methods: {
      	showNext() {
        	this.$refs.carousel.next();
        },
      	showPrev() {
        	this.$refs.carousel.prev();
        },
        async changeDate(inx, date){
        	this.activeClass = inx;
        	const { data } = await window.axios.post(route('account.get.events').url(), { date: date });
        	this.events = data.events;
        	this.count = data.counter;
        },
        currentSlider(event){
	    	this.activeDots = event;
	    }
    	},
    	watch : {
			events: function (val) {
		      this.events = val;
		    },

		},

	}
</script>

<style scoped>
	.bg-account{
		background: #F5F7F8;
		width: 100%;
    	height: 100%;
    	padding: 50px;
	}

	.block-wrap{
		background-color: #fff;
		box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
   		border-radius: 8px;
   		padding: 50px 80px;
	}

	.day {
	    width: 100%;
	    border-left: 1px solid #DFDFDF;
	    padding: 22px 21px;
	    margin-left: -1px;

	 /*   border-top: 1px solid #DFDFDF;
	    border-bottom: 1px solid #DFDFDF;*/
	}
	.week{
		border: 1px solid #DFDFDF;
		border-radius: 8px;
		 overflow: hidden;
	}

	.day.active {
	    background: #003ECB;
    }
	.day_week {
	    display: flex;
	    justify-content: space-between;
	}
	.day .day_week h5 {
	   	font-family: "Inter-Bold", sans-serif;
	    font-size: 30px;
	    color: #050A1C;
	}
	.day span {
	   	font-family: "Inter", sans-serif;
	   	font-weight: 500;
	    font-size: 18px;
	   	color: #050A1C;
	}

	.day.active .day_week h5{
		color: #fff;
	}


	.day .day_week span {
		font-family: "Inter", sans-serif;
	    font-weight: 500;
	    font-size: 18px;
	    color: #050A1C;
	}
	.day.active span{
		color: #fff;
	}

	.week-slider-wrap{
		position: relative;
		padding-left: 35px;
		padding-right: 35px;
		margin-left: -35px;
		margin-right: -35px;
		margin-bottom: 30px;
	}
	.arrow-slider{
		position: absolute;
		padding-left: 0px;
		z-index: 20px;
		top: 50%;
		transform: translateY(-50%);
	}
	.arrow-slider.left{
		left: 0px;
	}
	.arrow-slider.right{
		right: 0px;
	}





	.card-item {
		display: flex;
		margin-bottom: 30px;
	    background: #FFFFFF;
	    border: 1px solid #DFDFDF;
	    box-sizing: border-box;
	    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
	    border-radius: 8px;
	    padding: 26px 28px;
	}

	.card-item .date {
	    width: 20%;
	    display: flex;
	    border-right: 1px solid #DFDFDF;
	    margin-right: 20px;
	}

	.card-item  .time {
	    display: flex;
	    width: 100%;
	    flex-direction: column;
	    align-items: center;
	    margin: 0 auto;
	    justify-content: center;
	}

	.card-item  .time b {
	    font-family: "Inter-Bold", sans-serif;
	    font-size: 32px;
	   	color: #050A1C;
	}
	.card-item .time span {
	    font-family: "Inter", sans-serif;
		font-size: 18px;
		color: #7B838B;
    }

    /*.card-item .vl {
	    border-left: 1px solid #DFDFDF;
	    height: auto;
	    margin-right: 12%;
	  }*/

	.card-item .content {
	    width: 80%;
	    margin: 0 auto;
	}

	.card-item .name_img {
	    display: flex;
	    margin-bottom: 12px;
	}
	.card-item .name_img .ellipse{
		width: 70px;
		height: 70px;
		border-radius: 50%;
		overflow: hidden;
	}
	.card-item .name_img .ellipse img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.card-item .name {
	    margin-left: 16px;
	}

	.card-item .name span {
	   	font-family: "Inter", sans-serif;
	    font-size: 14px;
	   	color: #7B838B;
	}

	.card-item .name p {
	    font-family: "Inter", sans-serif;
		font-weight: 500;
	    font-size: 18px;
		color: #050A1C;
		margin-bottom: 0px;
	}

	.card-item .mess h5 {
	    font-family: "Inter", sans-serif;
	    font-weight: 600;
	    font-size: 18px;
	   	color: #050A1C;
	}

	.card-item .mess span {
	    font-family: "Inter", sans-serif;
		font-size: 16px;
	    color: #1B5AEC;
	}

	.card-item .mess p {
	    font-family: "Inter", sans-serif;
	   	font-size: 16px;
	    color: #7B838B;
	    margin-bottom: 0px;
	}

	.card-item .button {
	    width: 30%;
	    align-items: center;
	    display: flex;
	    flex-direction: column;
	    justify-content: center;
	}


	.card-item .add {
	    background: #F2994A;
	    border-radius: 8px;
	    padding: 10px 30px;
	    font-family: "Inter", sans-serif;
	   	font-size: 12px;
	    color: #FFFFFF;
	}
	.card-item .add.active {
		border: 1.6px solid #F2994A;
		background-color: #fff;
		color: #F2994A;
	}
	.card-item .button span {
	    font-family: "Inter", sans-serif;
	    font-weight: 400;
	    font-size: 15px;
	   	color: #7B838B;
	}

	.card-item .add:hover {
	    text-decoration: none;
	    color: #FFFFFF;
	    background: #f0913e;
	}

	.card-item .add2:hover {
	    text-decoration: none;
	    color: #FFFFFF;
	    background: #F2994A;
	}
	@media only screen and (max-width: 1024px) {
		.bg-account{
			padding: 50px 30px;
		}
		.block-wrap{
			padding: 30px 35px;
		}
	}
	@media only screen and (max-width: 768px) {
		.bg-account{
			padding: 50px 20px;
		}
		.block-wrap{
			padding: 30px 25px;
		}

		.arrow-slider{
			display: none;
		}
		.card-item{
			flex-direction: column;
			padding: 26px 0px;
		}
		.card-item .date{
			border: none;
			width: 100%;
			border-bottom: 1px solid #DFDFDF;
		}
		.card-item .content{
			margin: 0px;
			padding: 20px 16px;
			width: 100%;
		}
		.card-item .name_img{
			margin-bottom: 18px;
		}
		.card-item .button{
			width: 100%;
		}
	}

	.empty-wrap .title{
		font-size: 18px;
		color: rgb(123, 131, 139);
	}
</style>
