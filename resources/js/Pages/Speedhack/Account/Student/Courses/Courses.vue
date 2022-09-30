<template>
    <account-layout>
        <section class="bg-account">
            <div class="account-title">
                <span>Мои курсы</span>
            </div>
            <div class="pg-50">
                <div class="row" v-if="trialLessons">
                    <div class="col-12 col-md-4">
                        <lesson-timer :lessons="trialLessons"></lesson-timer>
                    </div>
                </div>
                <template v-else>
                    <div class="row" v-if="!empty">
                        <template v-for="item in courses">
                            <div class="col-12 col-md-4">
                                <course :course="item"></course>
                            </div>
                        </template>
                        <!-- <template v-for="(item, key) in courses[0].sections">
                            <template v-for="(lesson, index) in item.lessons" v-if="item.lessons">

                                <div class="col-12 col-md-4" v-if="index == 0 && (key == 0 || key == 1)">
                                    <a :href="route('account.lessons.show', lesson.id)" class="course">
                                        <div class="img">
                                            <img src="/images/course/course-1.jpg">
                                        </div>
                                        <div class="content-wrap">
                                            <span class="subtitle">Название курса</span>
                                            <span class="title">{{item.title}}</span>
                                        </div>
                                    </a>
                                </div>
                            </template>
                        </template> -->
                        <!-- <div class="col-12 col-md-4">
                            <a :href="route('account.lessons.show', 2)" class="course">
                                <div class="img">
                                    <img src="/images/course/course-1.jpg">
                                </div>
                                <div class="content-wrap">
                                    <span class="subtitle">Название курса</span>
                                    <span class="title">Elementary</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                             <a :href="route('account.lessons.show', 3)" class="course">
                                <div class="img">
                                    <img src="/images/course/course-1.jpg">
                                </div>
                                <div class="content-wrap">
                                    <span class="subtitle">Название курса</span>
                                    <span class="title">Pre-intermediate</span>
                                </div>
                            </a>
                        </div> -->
                    </div>
                    <div class="empty-wrap" v-else>
                        <span class="title">В данный момент у вас нет онлайн курсов</span>
                        <a class="btn-main">Записаться</a>
                    </div>
                </template>
                
            </div>

        </section>
    </account-layout>
</template>
<script>
import Course from '@/Speedhack/Components/Account/CoursePercent';
import LessonTimer from '@/Speedhack/Components/Account/LessonTimer';

export default {
    components: {
        Course,
        LessonTimer
    },
    props: {
        courses: Array,
        trialLessons: Object
    },
    data() {
        return {
            empty: false,
            // courses: [
            //     {
            //         title: "General English",
            //         lessons: 12,
            //         img: '/images/course/course-1.jpg',
            //         percent: 90,
            //     },
            //     {
            //         title: "Начальная арифметика",
            //         lessons: 8,
            //         img: '/images/course/course-2.jpg',
            //         percent: 50,
            //     },
            //     {
            //         title: "General English",
            //         lessons: 12,
            //         img: '/images/course/course-1.jpg',
            //         percent: 90,
            //     },
            //     {
            //         title: "Начальная арифметика",
            //         lessons: 8,
            //         img: '/images/course/course-2.jpg',
            //         percent: 50,
            //     },
            // ]
        }
    },
    methods: {
        toggleClassAside() {
            this.activeClass = !this.activeClass;
        }
    },
}
</script>
<style scoped>
.bg-account {
    background: #F5F7F8;
    width: 100%;
}

.account-title {
    font-family: "Inter-Bold", sans-serif;
    border-bottom: 1px solid #E0E3EB;
    padding: 30px 60px;
    font-weight: 600;
    color: #050A1C;
    font-size: 24px;
}

.pg-50 {
    padding: 50px;
}

.course {
    display: block;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
    overflow: hidden;
    margin-bottom: 30px;
}

.course .progress {
    width: 100%;
    margin-bottom: 0px;
    height: 7px;
    border-radius: 0px;
    background-color: #E0E3EB;
}

.course .img {
    height: 230px;
    width: 100%;
}

.course .img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.content-wrap {
    padding: 20px 20px 25px;
    display: flex;
    flex-direction: column;
    width: 100%;
}

.content-wrap .subtitle {
    font-size: 14px;
    color: #7B838B;
    font-family: "Inter", sans-serif;
    margin-bottom: 8px;
}

.content-wrap .title {
    font-family: "Inter-Bold", sans-serif;
    font-size: 18px;
    line-height: 16px;
    color: #050A1C;
    margin-bottom: 16px;
}

.content-wrap .lesson {
    display: flex;
    align-items: center;
    font-size: 14px;
    line-height: 17px;
    color: #003ECB;
}

.content-wrap .lesson img {
    margin-right: 8px;

}

@media only screen and (max-width: 768px) {
    .account-title {
        padding: 20px;
    }

    .pg-50 {
        padding: 40px 20px;
    }
}
</style>
