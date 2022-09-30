<template>
    <welcome-layout>
        <section class="welcome-banner">
            <div class="container">
                <header-welcome></header-welcome>
                <div class="wrap">
                    <div class="content-banner">
                        <h1 class="title">{{ $page.props.sets['news.banner.title'] }}</h1>
                        <span class="subtile">{{ $page.props.sets['news.banner.subtitle'] }}</span>
                        <div class="button-wrap">
                            <a @click="showGetTrialLessonModal" class="btn-main">Записаться</a>
                            <a href="/all/courses" class="link-main">Посмотреть курсы</a>
                        </div>
                    </div>
                    <div class="banner-img">
                        <img src="/images/ilustration/banner-3.png">
                    </div>
                </div>
            </div>
        </section>
        <div class="container mg-150">
            <block-title
                :title="$page.props.sets['news.title']"
                :subtitle="$page.props.sets['news.subtitle']"
            ></block-title>

            <div class="row">
                <template v-for="item in news">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="pg-not">
                            <item-news :news="item"></item-news>
                        </div>
                    </div>
                </template>
            </div>
        </div>
        <form-request></form-request>
    </welcome-layout>
</template>

<script>
import HeaderWelcome from '@/Speedhack/Components/Details/HeaderBanner';
import FormRequest from '@/Speedhack/Components/Details/FormRequest';
import BlockTitle from '@/Speedhack/Components/Details/BlockTitle';
import ItemNews from '@/Speedhack/Components/Details/ItemNews';

export default {
    props: {
        news: Array,
    },
    components: {
        HeaderWelcome,
        FormRequest,
        BlockTitle,
        ItemNews
    },
    data() {
        return {}
    },
    methods: {
        showGetTrialLessonModal() {
            this.$modal.show('getTrialLesson');
        },
    }
}
</script>
<style scoped>
.pg-not .wrap-news-slider-item {
    padding: 0px;
    margin-bottom: 40px;
}

.mg-150 {
    margin-bottom: 150px;
}
</style>
