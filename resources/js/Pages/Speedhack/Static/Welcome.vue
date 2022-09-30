<template>
    <welcome-layout>
        <section class="welcome-banner">
            <div class="container" ref="infoBox">
                <header-welcome></header-welcome>
                <div class="wrap">
                    <div class="content-banner" >
                        <h1 class="title">{{ $page.props.sets['main.banner.title'] }}</h1>
                        <span class="subtile">{{ $page.props.sets['main.banner.body'] }}</span>
                        <div class="button-wrap">
                            <a class="btn-main" @click="showGetTrialLessonModal">Записаться</a>
                            <a @click="scrollToCourses" class="link-main">Посмотреть курсы</a>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img src="/images/ilustration/banner-1.png">
                    </div>
                </div>
            </div>
        </section>

        <block-title
            :title="$page.props.sets['main.courses.title']"
            :subtitle="$page.props.sets['main.courses.subtitle']"
        ></block-title>

        <course-block :courses="courses"></course-block>
        <tab-course :tabs="tabs"></tab-course>
        <teacher-slider :teachers="teachers"></teacher-slider>
        <news-slider :news="news"></news-slider>
        <comments-block :comments="comments" :avg="avg"></comments-block>
        <form-request></form-request>
    </welcome-layout>
</template>

<script>
import HeaderWelcome from '@/Speedhack/Components/Details/HeaderBanner';
import BlockTitle from '@/Speedhack/Components/Details/BlockTitle';
import CourseBlock from '@/Speedhack/Components/Details/CourseBlock';
import TabCourse from '@/Speedhack/Components/Details/TabCourse';
import TeacherSlider from '@/Speedhack/Components/Details/TeacherSlider';
import NewsSlider from '@/Speedhack/Components/Details/NewsSlider';
import CommentsBlock from '@/Speedhack/Components/Details/CommentsBlock';
import FormRequest from '@/Speedhack/Components/Details/FormRequest';

export default {
    props: {
        courses: Array,
        comments: Array,
        avg: Number,
        news: Array,
        tabs: Array,
        teachers: Array,
    },
    components: {
        HeaderWelcome,
        BlockTitle,
        CourseBlock,
        TabCourse,
        TeacherSlider,
        NewsSlider,
        CommentsBlock,
        FormRequest
    },
    data() {
        return {

        }
    },
    methods: {
        showGetTrialLessonModal(){
            this.$modal.show('getTrialLesson');
        },
        scrollToCourses() {
            let height = this.$refs.infoBox.clientHeight;
            window.scrollTo({
                top: height,
                behavior: 'smooth'
            });
        }
    },
    mounted() {

    },
}
</script>
