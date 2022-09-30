<template>
    <account-layout>
        <section class="bg-account">
            <div class="account-title">
                <a :href="route('account.courses.index')"><img src="/images/icons/arrow-left-blue.svg"/></a>
                <span> {{ course.title}}</span>
            </div>
<!--            <section class="tab-wrap">-->
<!--                <div class="item active">Общий обзор</div>-->
<!--                <div class="item">Мои оценки</div>-->
<!--            </section>-->

           <!--  <section class="overview-wrap row">
                <div class="item col-6 col-md">
                    <vue-circle
                        :progress="70"
                        :size="100"
                        :reverse="false"
                        line-cap="round"
                        :fill="fill"
                        empty-fill="#BEC3C7"
                        :animation-start-value="0.0"
                        :start-angle="11"
                        insert-mode="append"
                        :thickness="5"
                        :show-percent="true">
                    </vue-circle>
                </div>
                <div class="item col-6 col-md">
                    <img src="/images/icons/file-text.svg">
                    <div class="text-wrap">
                        <span class="title">18 / 24</span>
                        <span class="subtitle">Уроков</span>
                    </div>
                </div>

                <div class="item col-6 col-md">
                    <img src="/images/icons/book-open.svg">
                    <div class="text-wrap">
                        <span class="title">7 / 12</span>
                        <span class="subtitle">Задания</span>
                    </div>
                </div>

                <div class="item col-6 col-md">
                    <img src="/images/icons/clock.svg">
                    <div class="text-wrap">
                        <span class="title">18 часов</span>
                        <span class="subtitle">Длительность курса</span>
                    </div>
                </div>

                <div class="item">
                    <img src="/images/icons/online-learning 1.svg">
                    <div class="text-wrap">
                        <span class="title">Айсауле Азаматова</span>
                        <span class="subtitle">Имя учителя</span>
                    </div>
                </div>
            </section> -->
            <div class="course-title">Онлайн-уроки</div>
            <div class="colapse-wrap">
                <course-sections-collapse :sections="course.sections"></course-sections-collapse>
            </div>
        </section>
    </account-layout>
</template>
<script>
import VueCircle from 'vue2-circle-progress';
import CourseSectionsCollapse from '@/Speedhack/Components/Courses/CourseSectionsCollapse';

export default {
    components: {
        CourseSectionsCollapse,
        VueCircle
    },
    props: {
      course: {
          type: Object,
      }
    },
    data() {
        return {
            h: 'fds',
            fill: {gradient: ["#F2994A", "#F2994A", "#003ECB", "#003ECB"]},
        }
    }
}
</script>

<style scoped>
.bg-account {
    background: #F5F7F8;
    width: 100%;
    height: 100%;

}

.account-title {
    font-family: "Inter-Bold", sans-serif;
    padding: 30px 20px;
    font-weight: 600;
    color: #050A1C;
    font-size: 24px;
}

.account-title img {
    margin-right: 16px;
}

.tab-wrap {
    border-bottom: 1px solid #E0E3EB;
    display: flex;
    padding-right: 60px;
    padding-left: 60px;
    margin-bottom: 26px;
}

.tab-wrap .item {
    padding: 8px 0px;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    color: rgb(123, 131, 139);
    margin-right: 40px;
    margin-bottom: -1px;
}

.tab-wrap .item.active {
    color: #003ECB;
    border-bottom: 1px solid #003ECB;
}

.overview-wrap {
    display: flex;
    border-bottom: 1px solid #E0E3EB;
    padding-right: 60px;
    padding-left: 60px;
    padding-bottom: 26px;
    align-items: center;
}

.overview-wrap .item {
    display: flex;
    margin-right: 70px;
}

.overview-wrap .item:last-child {
    margin-right: 0px;
}

.overview-wrap .item img {
    width: 26px;
    height: 26px;
    margin-right: 12px;
    margin-top: 7px;
}

.overview-wrap .item .text-wrap {
    display: flex;
    flex-direction: column;
}

.overview-wrap .item .text-wrap .title {
    font-family: "Inter-Bold", sans-serif;
    font-size: 20px;
    color: #050A1C;
}

.overview-wrap .item .text-wrap .subtitle {
    color: rgb(123, 131, 139);
    font-size: 14px;
    font-family: "Inter", sans-serif;
}

.course-title {
    font-family: "Inter", sans-serif;
    font-size: 20px;
    color: #414246;
    margin-bottom: 20px;
    margin-top: 32px;
    padding-right: 60px;
    padding-left: 60px;
}

.colapse-wrap {
    padding-right: 60px;
    padding-left: 60px;
    margin-bottom: 60px;
}

@media only screen and (max-width: 768px) {
    .account-title {
        padding: 20px;
    }

    .tab-wrap {
        padding-right: 20px;
        padding-left: 20px;
    }

    .overview-wrap {
        padding-right: 20px;
        padding-left: 20px;
    }

    .overview-wrap .item {
        margin-right: 0;
        margin-bottom: 20px;
    }

    .overview-wrap .item:last-child {
        margin-bottom: 0px;
    }

    .course-title {
        padding-right: 20px;
        padding-left: 20px;
    }

    .colapse-wrap {
        padding-right: 20px;
        padding-left: 20px;
    }


}
</style>
