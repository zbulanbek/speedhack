<template>
    <section class="lessons">
        <template v-for="(section, index) in sections">
            <div class="item">
                <div class="white-bg" v-if="section.status == 'wait'"></div>
                <b-button v-b-toggle="'collapse-' + index" class="content-wrap" :disabled="section.lessons.length == 0">
                    <div class="texts">
                        <span class="title">Раздел {{ index + 1 }} {{ section.title }}</span>
                        <div class="wrap">
                            <div class="icons">
                                <img src="/images/icons/video.svg"> {{ section.lessons.length }} lessons & task
                            </div>
                            <div class="icons">
                                <img src="/images/icons/file-text.svg"> {{ section.homeworks }} lessons & task
                            </div>
                        </div>
                    </div>
                    <div class="wrap-rigth">
                       <!--  <div class="status" v-if="section.status == 'done'">
                            <img src="/images/icons/check-success.svg"> Пройдено
                        </div>
                        <div class="status" v-if="section.status == 'current'">
                            <img src="/images/icons/pause-circle.svg"> Доступно
                        </div>
                        <div class="status" v-if="section.status == 'wait' || section.lessons.length == 0">
                            <img src="/images/icons/alert-circle.svg"> В ожидании
                        </div>
                        <div class="status" v-else>
                            <img src="/images/icons/pause-circle.svg"> Доступно
                        </div> -->
                        <div class="collapse-button"><img src="/images/icons/arraw-blue.svg"></div>
                    </div>
                </b-button>
                <b-collapse :id="'collapse-' + index" v-if="section.status !== 'wait'">
                    <ul class="lessons-list">
                        <template v-for="(item, i) in section.lessons">
                            <li :class="{'active': item.show }">
                                <a :href="route('timetable.show_lesson', item.timetable_id)" v-if="item.timetable_id">
                                    
                                    <span class="lesson_title">
                                       <!--  <b>{{ index + 1 }}.{{ i + 1 }}</b>  -->
                                       <b>{{ i + 1 }}</b> 
                                        Урок
                                        <!-- {{ item.title }} -->
                                    </span>
                                    <div class="fasts">
                                        <div class="icons">
                                            <img src="/images/icons/clock.svg" v-if="item.status !== 'current'">
                                            <img src="/images/icons/clock-white.svg" v-else>
                                            {{ item.duration_minute }} min
                                        </div>
                                       <!--  <div class="icons">
                                            <img src="/images/icons/paperclip.svg" v-if="item.status !== 'current'">
                                            <img src="/images/icons/paperclip-white.svg" v-else>
                                            {{ item.materials.length }} file
                                        </div> -->
                                        <div class="icons">
                                            <img src="/images/icons/check-success.svg" v-if="item.status == 'done'">
                                            <img src="/images/icons/pause-circle-white.svg"
                                                 v-if="item.status == 'current'">
                                            <img src="/images/icons/alert-circle.svg" v-if="item.status == 'wait'">
                                        </div>
                                    </div>
                                </a>
                                <a v-else>
                                    
                                    <span class="lesson_title">
                                         <!--  <b>{{ index + 1 }}.{{ i + 1 }}</b>  -->
                                        <b>{{ i + 1 }}</b> 
                                         Урок
                                        <!-- {{ item.title }} -->
                                    </span>
                                    <div class="fasts">
                                        <div class="icons">
                                            <img src="/images/icons/clock.svg" v-if="item.status !== 'current'">
                                            <img src="/images/icons/clock-white.svg" v-else>
                                            {{ item.duration_minute }} min
                                        </div>
                                        <!-- <div class="icons">
                                            <img src="/images/icons/paperclip.svg" v-if="item.status !== 'current'">
                                            <img src="/images/icons/paperclip-white.svg" v-else>
                                            {{ item.materials.length }} file
                                        </div> -->
                                        <div class="icons">
                                            <img src="/images/icons/check-success.svg" v-if="item.status == 'done'">
                                            <img src="/images/icons/pause-circle-white.svg"
                                                 v-if="item.status == 'current'">
                                            <img src="/images/icons/alert-circle.svg" v-if="item.status == 'wait'">
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </template>
                    </ul>
                </b-collapse>
            </div>
        </template>
    </section>

</template>
<script>
export default {
    props: {
        sections: Array,
    },
}
</script>
<style scoped>
.plans {
    padding-bottom: 100px;
    padding-top: 100px;
}

.item {
    margin-bottom: 30px;
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 8px;
    position: relative;
}

.lessons .item:last-child {
    margin-bottom: 0px;
}

.content-wrap {
    padding: 26px 26px 28px;
    display: flex;
    justify-content: space-between;
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
    width: 100%;
    align-items: center;
}

.content-wrap.not-collapsed .collapse-button {
    transform: rotateX(180deg);
}

.content-wrap .title {
    font-family: 'Inter-Bold', sans-serif;
    font-size: 20px;
    display: block;
    margin-bottom: 16px;
    color: #000;
    text-align: left;
}

.icons {
    display: flex;
    align-items: center;
    margin-right: 60px;
    font-size: 14px;
    font-family: 'Inter', sans-serif;
    color: #7B838B;
}

.icons img {
    width: 23px;
    height: 23px;
    margin-right: 16px;
}

.white-bg {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: #fff;
    opacity: .5;
}

.content-wrap .wrap {
    display: flex;
}

.collapse-button {
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
}

.collapse-button:active {
    background-color: transparent;
    border: none;
    box-shadow: none;
}

.collapse-button:focus {
    background-color: transparent;
    border: none;
    box-shadow: none;
}

.wrap-rigth {
    display: flex;
}

.wrap-rigth .status {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #414247;
    font-family: 'Inter', sans-serif;
    margin-right: 40px;
}

.wrap-rigth .status img {
    margin-right: 8px;
}

.lessons-list {
    border-top: 1px solid #F1F2F2;
    margin-bottom: 0px;
}

.lessons-list li{
    opacity: .7;
    pointer-events: none;
}
.lessons-list li a {
    padding: 22px 26px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #F1F2F2;
}

.lessons-list li:last-child {
    border-bottom: none;
}

.lesson_title {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: #414247;
}

.lesson_title b {
    margin-right: 20px;
}

.fasts {
    display: flex;
    align-items: center;
}

.fasts .icons:first-child {
    min-width: 120px;
    margin: 0px;
}

.icons:last-child {
    margin: 0px;
}

.lessons-list li.active {
    /*background: linear-gradient(269.61deg, #0B55FF -0.41%, rgba(12, 75, 220, 0.863663) 17.86%, rgba(13, 62, 175, 0.690452) 37.18%, rgba(16, 21, 32, 0.136305) 59.8%, rgba(165, 181, 217, 0.0676675) 71.9%, rgba(177, 189, 216, 0) 82.5%), #003ECB;*/
    opacity: 1;
    pointer-events: auto;
}

/*.lessons-list li.active .lesson_title {
    color: #fff;
}

.lessons-list li.active .fasts .icons {
    color: #fff;
}*/

@media only screen and (max-width: 768px) {
    .content-wrap .wrap {
        flex-direction: column;
    }

    .content-wrap .wrap .icons {
        margin: 0px;
        margin-bottom: 12px;
    }

    .content-wrap .wrap .icons:last-child {
        margin-bottom: 0px;
    }

    .content-wrap {
        padding: 20px 16px 28px;
        align-items: flex-start;
    }

    .lessons-list li a {
        flex-direction: column;
        align-items: flex-start;
    }

    .wrap-rigth .status {
        margin-right: 15px;
    }

    .lesson_title {
        margin-bottom: 10px;
    }
}
</style>
