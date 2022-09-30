<template>
    <account-layout>
        <section class="bg-account course-text">
            <a :href="route('account.catalog.courses.index')" class="title-page">
                <img src="/images/icons/arrow-left-blue.svg">
                <span>Каталог курсов</span>
            </a>
            <div class="main-wrap">
                <div class="title">
                    {{ course.title }}
                </div>

                <div v-if="course.text" v-html="course.text" class="text-wrap"></div>

                <div class="programs">
                    <div class="row">
                        <template v-for="item in course.classes">
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                <course-class-item :item="item" :column="false"></course-class-item>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </section>
    </account-layout>
</template>
<script>
import CourseClassItem from "@/Speedhack/Components/Courses/CourseClassItem";

export default {
    props: {
        course: Object,
    },
    components: {
        CourseClassItem
    },
    data() {
        return {}
    }
}
</script>
<style scoped>
.bg-account {
    background: #F5F7F8;
    width: calc(100% - 320px);
    width: auto;
    height: 100%;
}

.title-page {
    display: flex;
    padding: 30px 30px;
    align-items: center;
}

.title-page span {
    font-size: 24px;
    font-family: "Inter-Bold", sans-serif;
    color: #050A1C;
}

.tab-course-account .tab-content {
    margin-left: 60px;
    margin-right: 60px;
}

.tab-wrap {
    border-bottom: 1px solid #E0E3EB;
    display: flex;
    padding-right: 60px;
    padding-left: 60px;
    margin-bottom: 46px;
}

.tab-wrap .item {
    padding: 8px 0px;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    color: rgb(123, 131, 139);
    margin-right: 40px;
    margin-bottom: -1px;
}

.title-center {
    text-align: center;
    font-family: 'Inter', sans-serif;
    font-weight: bold;
    font-size: 50px;
    line-height: 78px;
    color: #050A1C;
}

.wrap-center {
    display: flex;
    justify-content: center;
    margin-top: 80px;
}

.circle {
    display: block;
    width: 8px;
    height: 8px;
    background-color: #A339FF;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 8px;
}

.top-40 {
    margin-top: 40px;
}

.tab-course-account .nav-tabs .nav-link {
    display: flex;
    justify-content: left;
    align-items: center;
}

.tab-course-account .nav-tabs .nav-link.active, .tab-course-account .nav-tabs .nav-item.show .nav-link {
    background-color: transparent;
}

.title-page img {
    padding-right: 20px;
}

.main-wrap .title {
    color: #050A1C;
    font-family: 'Inter';
    font-weight: 600;
    font-size: 20px;
    padding: 24px;
    border-bottom: 1px solid #E0E3EB;
}

.main-wrap {
    margin: 30px 60px;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
    margin-top: 20px;
}

.programs {
    padding: 40px 24px;
}



.course-text .text-wrap h1, 
.course-text .text-wrap h2, 
.course-text .text-wrap h3, 
.course-text .text-wrap h4, 
.course-text .text-wrap h5{
    font-size: 24px;
}

@media only screen and (max-width: 768px) {
    .tab-course-account {
        margin-left: 20px;
        margin-right: 20px;
    }

    .title-page {
        padding: 30px 20px;
    }

    .tab-course-account .tab-content{
        margin-left: 0px;
        margin-right: 0px
    }

}


</style>
