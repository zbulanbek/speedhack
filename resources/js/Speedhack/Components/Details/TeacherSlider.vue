<template>
	<section class="bg-yellow">
		<div class="container">
			<div class="teacher-slider">
				<div class="wrap-header">
					<block-title
		            :title="$page.props.sets['main.teachers.title']"
		            :subtitle="$page.props.sets['main.teachers.subtitle']"
		        	></block-title>

		        	<div class="wrap-arrows-slider">
		        		<button class="arrow-slider left" @click="showPrev"><img src="/images/icons/arrow-left.svg"></button>
		        		<ul class="dots-slider">
		        			<template v-for="(item, index) in teachers">
		        				<li @click="slideTo(index)" :class="{'active': activeDots == index}"></li>
		        			</template>
		        		</ul>
		        		<button class="arrow-slider right" @click="showNext"><img src="/images/icons/arrow-left.svg"></button>
		        	</div>
		        </div>
				<VueSlickCarousel  ref="carousel" v-bind="settings" @afterChange="currentSlider($event)">
					<template v-for="item in teachers">
						<item-teacher-slider
							:teacher="item">
						</item-teacher-slider>
					</template>
				</VueSlickCarousel>
			</div>
		</div>
	</section>
</template>
<script>
import VueSlickCarousel from 'vue-slick-carousel';
import ItemTeacherSlider from '@/Speedhack/Components/Details/ItemTeacherSlider';
import BlockTitle from '@/Speedhack/Components/Details/BlockTitle';
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';

export default {
    props: {
        teachers: Array,
    },
	components: {
      	VueSlickCarousel,
      	ItemTeacherSlider,
      	BlockTitle
    },
    data() {
        return {
        	activeDots: 0,
           	settings:{
           	 	"dots": false,
			  	"focusOnSelect": true,
			  	"arrows": false,
			  	"infinite": true,
			  	"speed": 500,
			  	"slidesToShow": 3,
			  	"slidesToScroll": 1,
			  	responsive:[
			  		{
		            	breakpoint: 1120,
		                settings:
		    			{
		                slidesToShow: 2,
		                slidesToScroll: 1,
		                }
		            },
					{
		                breakpoint: 800,
		                settings:
		    			{
		                slidesToShow: 2,
		                slidesToScroll: 2
		                }
		            },
		            {
		                breakpoint: 600,
		                settings:
		    	        {
		                slidesToShow: 1,
		                slidesToScroll: 1
		                }
		            }

	    	    ]

			},
        }
    },
    methods: {
      	showNext() {
        	this.$refs.carousel.next();
        },
      	showPrev() {
        	this.$refs.carousel.prev();
        },
      	slideTo(index) {
	      this.$refs.carousel.goTo(index);
	      this.activeDots = index;
	    },
	    currentSlider(event){
	    	this.activeDots = event;
	    }
    },
}

</script>
<style scoped>
.teacher-slider{
	margin-bottom: 100px;
}
.teacher-slider .wrap-header{
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.teacher-slider .wrap-header .wrap-arrows-slider{
	display: flex;

}
.dots-slider{
	display: flex;
	align-items: center;
	margin: 0px 32px;
}
.dots-slider li{
	width: 10px;
	height: 10px;
	border-radius: 50%;
	background: rgba(5, 10, 28, 0.28);
	display: block;
	margin-right: 16px;
}
.dots-slider li:hover{
	cursor: pointer;
}
.dots-slider li:last-child{
	margin-right: 0px;
}
.dots-slider li.active{
	background: #050A1C;
}
.teacher-slider-item .content-wrap{
	z-index: 2;
}
@media only screen and (max-width: 768px) {
	.teacher-slider .wrap-header{
		flex-direction: column;
	}

	.teacher-slider .wrap-header .wrap-arrows-slider{
		margin-bottom: 20px;
	}
	.wrap-teacher-slider-item{
		padding: 0px 5px;
	}
}
</style>








