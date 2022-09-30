<template>
	<section class="news-slider">
		<div class="container">
			<block-title
	        :title="$page.props.sets['main.news.title']"
	        :subtitle="$page.props.sets['main.news.subtitle']"
	    	></block-title>

			<VueSlickCarousel  ref="carousel" v-bind="settings" @afterChange="currentSlider($event)">
				<template v-for="item in news">
					<item-news :news="item"></item-news>
				</template>
			</VueSlickCarousel>

			<div class="wrap-arrows-slider">
	    		<button class="arrow-slider left" @click="showPrev"><img src="/images/icons/arrow-left.svg"></button>
	    		<ul class="dots-slider">
        			<template v-for="(item, index) in news">
        				<li @click="slideTo(index)" :class="{'active': activeDots == index}"></li>
        			</template>
        		</ul>
	    		<button class="arrow-slider right" @click="showNext"><img src="/images/icons/arrow-left.svg"></button>
	    	</div>
		</div>
	</section>
</template>
<script>
import VueSlickCarousel from 'vue-slick-carousel';
import ItemNews from '@/Speedhack/Components/Details/ItemNews';
import BlockTitle from '@/Speedhack/Components/Details/BlockTitle';
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';

export default {
    props: {
        news: Array,
    },
	components: {
      	VueSlickCarousel,
      	BlockTitle,
      	ItemNews
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
			  	"slidesToShow": 4,
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
	.wrap-arrows-slider{
		display: flex;
		justify-content: center;
		margin-top: 20px;
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

</style>
