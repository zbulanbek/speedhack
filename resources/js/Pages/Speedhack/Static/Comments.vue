<template>
    <welcome-layout>
        <section class="welcome-banner">
            <div class="container">
                <header-welcome></header-welcome>
                <div class="wrap">
                    <div class="content-banner">
                        <h1 class="title">{{ $page.props.sets['feedback.title'] }}</h1>
                        <span class="subtile">{{ $page.props.sets['feedback.subtitle'] }}</span>
                        <div class="button-wrap">
                            <a class="btn-main" @click="showGetTrialLessonModal">Записаться</a>
                            <a href="/all/courses" class="link-main">Посмотреть курсы</a>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img src="/images/ilustration/banner-4.png">
                    </div>
                </div>
            </div>
        </section>

        <section class="comments-block">
            <block-title
                title="Отзывы"
                subtitle="Предлагаем вам почитать отзывы наших учеников"
            ></block-title>
            <div class="container">
                <div class="raiting">
                    <span class="number">{{ avg }}</span>
                    <stars :count="Math.round(2.9)"></stars>
                    <span class="info">{{ comments.length }} оценок</span>
                </div>

                 <div class="commnets-wrap" v-if="comments.length > 4">
                    <VueSlickCarousel  ref="carousel" v-bind="settings" @afterChange="currentSlider($event)">
                        <template v-for="comment in chunked">
                            <div class="group-slider">
                                <template v-for="item in comment">
                                    <item-comment :comment="item"></item-comment>
                                </template>
                            </div>
                        </template>
                    </VueSlickCarousel>
                    <div class="wrap-arrows-slider">
                        <button class="arrow-slider left" @click="showPrev"><img src="/images/icons/arrow-left.svg"></button>
                        <ul class="dots-slider">
                            <template v-for="(item, index) in chunked">
                                <li @click="slideTo(index)" :class="{'active': activeDots == index}"></li>
                            </template>
                        </ul>
                        <button class="arrow-slider right" @click="showNext"><img src="/images/icons/arrow-left.svg"></button>
                    </div>
                </div>



                <div class="commnets-wrap" v-else>
                    <template v-for="item in comments">
                        <item-comment
                            :comment="item"
                            ></item-comment>
                    </template>
                </div>

                <!-- <a href="/" class="btn-link">Посмотреть все отзывы</a> -->
            </div>
        </section>

        <form-comment></form-comment>
    </welcome-layout>
</template>
<script>
import HeaderWelcome from '@/Speedhack/Components/Details/HeaderBanner';
import BlockTitle from '@/Speedhack/Components/Details/BlockTitle';
import Stars from '@/Speedhack/Components/Details/Stars';
import ItemComment from '@/Speedhack/Components/Details/ItemComment';
import FormComment from '@/Speedhack/Components/Details/FormComment';

import VueSlickCarousel from 'vue-slick-carousel';
import 'vue-slick-carousel/dist/vue-slick-carousel.css';
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css';

export default {
    props: {
      comments: Array,
        avg: Number,
    },
    components: {
        HeaderWelcome,
        BlockTitle,
        Stars,
        ItemComment,
        VueSlickCarousel,
        FormComment
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
                "slidesToShow": 1,
                "slidesToScroll": 1,
            },
        }
    },
    computed: {
        chunked(){
            let count = this.comments.length / 2;
            count = Math.round(count);
            return _.chunk(this.comments, count);
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
        },
        showGetTrialLessonModal(){
            this.$modal.show('getTrialLesson');
        },
    },
}
</script>
<style scoped>
    .raiting{
        display: flex;
        align-items: center;
        margin-bottom: 32px;
    }
    .number{
        font-family: 'Inter', sans-serif;
        font-weight: 600;
        font-size: 46px;
        color: #003ECB;
        margin-right: 40px;
    }
    .info{
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 20px;
        margin-left: 40px;
    }
    .btn-link{
        font-family: 'Inter', sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        color: #003ECB;
        margin-top: 12px;
    }
    .btn-link:hover{
        text-decoration: none;
        color: #003ECB;
    }
    .comments-block{
        margin-bottom: 100px;
    }
    .commnets-wrap{
        margin-left: -10px;
        margin-right: -10px;
    }
    .group-slider{
        padding-left: 10px;
        padding-right: 10px;
    }

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
    .dots-slider li:hover{
        cursor: pointer;
    }
    .dots-slider li{
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(5, 10, 28, 0.28);
        display: block;
        margin-right: 16px;
    }
    .dots-slider li:last-child{
        margin-right: 0px;
    }
    .dots-slider li.active{
        background: #050A1C;
    }
    @media only screen and (max-width: 768px) {
        .raiting{
            flex-wrap: wrap;
        }
        .info{
            margin: 0px;
        }
    }
</style>
