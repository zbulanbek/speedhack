<template>
    <trial-lesson-layout>
        <section class="bg-account">
            <section class="lesson-modal-wrap">
                <div class="col-lg-6" style="padding-right: 0;">
                    <div class="title-page">
                        <div class="white-background">
                            <template v-if="$page.props.user.role_id === '4'">
                                <a :href="route('home')" style="margin-bottom: 16px;">
                                    <img src="/images/icons/arrow-left-blue.svg" width="16" alt="">
                                    Вернуться назад в личный кабинет
                                </a>
                            </template>
                            <template v-else>
                                <a :href="route('home')" style="margin-bottom: 16px;">
                                    <img src="/images/icons/arrow-left-blue.svg" width="16" alt="">
                                    Вернуться назад в личный кабинет
                                </a>
                            </template>
                          <div class = "trial-lesson ">
                              <span>
                                  {{$page.props.user.role_id === '4'? 'Урок:': 'Урок'}}
                                      <b v-if="$page.props.user.role_id === '4' || $page.props.user.role_id === '3'">{{ trial_lesson.student ? trial_lesson.student.full_name : '' }}</b>
                              </span>
                              
                          </div>
                           <template v-if="$page.props.user.role_id === '4'">
                                <comment-teacher :trial_lesson="trial_lesson"></comment-teacher>
                            </template>
                        </div>
                    </div>
                    <video-chat :room_name="room_name" :access-token="access_token"></video-chat>
                    <div class="wrap-tabb" style="padding: 10px 53px 17px 11px;">
                        <template v-if="$page.props.user.role_id === '4'">
                            <div class="plans-wrap">
                                <b-button v-b-toggle.collapse-1>
                                    {{ lesson.title }}
                                    <img src="/images/icons/black-arr-down.svg">
                                </b-button>
                                <b-collapse id="collapse-1">
                                    <ul class="plan-lists">
                                        <template v-for='(item, index) in tabs'>
                                            <li :class="{'active': activeTab === index}" @click="changeTab(index)">
                                                {{ item.type ? item.title : `Тарифы "${item.title}"` }}
                                            </li>
                                        </template>
                                    </ul>
                                </b-collapse>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="col-lg-6 scroll meto" style="padding-left: 0;" :class="{'not-active': $page.props.user.role_id === '4'}">
                    <div class="desk-wrap">
                        <template v-for="(item, index) in tabs">
                            <lesson-blocks :lesson_id="lesson.id" v-show="activeTab === 0 && item.type"></lesson-blocks>
                            <div class="text-wrap" v-show="activeTab === index">
                                <div class="title">{{ item.title }}</div>
                                <rates :block="item"></rates>
                            </div>
                        </template>
                    </div>
                </div>
            </section>

        </section>
    </trial-lesson-layout>
</template>
<script>
import VideoChat from '@/Speedhack/Components/VideoChat';
import ShowText from '@/Speedhack/Components/Metodist/ShowText';
import CommentTeacher from '@/Speedhack/Components/Metodist/CommentTeacher';
import rates from '@/Speedhack/Components/Metodist/Blocks/Rates';
import LessonBlocks from "@/Speedhack/Components/Trial/LessonBlocks";

export default {
    props: {
        room_name: String,
        trial_lesson: Object,
        lesson: Object,
        tabs: Array,
        access_token: String,
    },
    components: {
        VideoChat,
        ShowText,
        CommentTeacher,
        LessonBlocks,
        rates
    },
    data() {
        return {
            activeTab: 0,
        }
    },
    mounted() {
        this.handleChangeTab()
        
        //setTimeout(() => this.updateWindow, 6000);
        console.log(localStorage.getItem('reloaded'));
        if (localStorage.getItem('reloaded')) {
            localStorage.removeItem('reloaded');
        } else {
            localStorage.setItem('reloaded', '1');
            setTimeout(() => this.updateWindow(), 6000);
        }
    },
    methods: {
        updateWindow(){
            console.log('dsds');
            window.location.reload();
            window.location.href=window.location.href;
        },
        async changeTab(key) {
            try {
                this.activeTab = key;
                await window.axios.post(this.route('trial-lessons.tabs.change', this.room_name), {key});
            } catch (e) {
                throw e;
            }
        },
        handleChangeTab() {
            let that = this;
            window.Echo.private('trial.lesson.tabs.change.' + this.room_name)
                .listen('.trial.lesson.tabs.change', function ({key}) {
                    that.activeTab = key;
                });
        }
    }
}
</script>
<style scoped>
.meto.not-active .desk-wrap{
/*pointer-events: none;*/
}
.bg-account {
    background: #F5F7F8;
    width: 100%;
    height: 100%;
}

.lesson-modal-wrap {
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
}

.lesson-modal-wrap .col-main {
    width: 30%;
}

.lesson-modal-wrap .col-desk {
    width: 70%;
}

.desk-wrap {
    background-color: #fff;
    border-radius: 8px;
    padding-bottom: 32px;
}

.white-background{
    /*max-width: 1057px;*/
    width: 102%;
    background: #fff;
    /*height: 111px;*/
    display: flex;
    padding: 1.85rem 16px;
    flex-direction: column;
    margin-left: -32px;
}



.title-page {
    display: flex;
    justify-content: space-between;
    padding: 0;
}

.title-page span {
    font-size: 18px;
    font-family: "Inter-Bold", sans-serif;
    color: #050A1C;
}

.title-page span b {
    color: #F2994A;
    font-weight: normal;
}

.lesson-modal-wrap {
    padding: 0 20px;
}

.col-main:first-child {
    padding-right: 10px;
}

.col-main:last-child {
    padding-left: 10px;
}

.lesson-modal-wrap b {
    color: #F2994A;
    font-weight: normal;
}


.plans-wrap {
    border-radius: 8px;
    overflow: hidden;
    background-color: #fff;
    margin-top: 10px;
}

.plans-wrap .btn {
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 16px 18px;
    align-items: center;
    background: #FFFFFF;
    color: #050A1C !important;
    font-size: 15px;
    border: none;
    box-shadow: none !important;
}

.plans-wrap .btn:active {
    background-color: #fff;
}

.plan-lists {
    border-top: 1px solid #E0E3EB;
    padding-top: 15px;
    padding-bottom: 6px;
    margin-bottom: 0px;
}

.plan-lists li {
    display: block;
    padding: 9px 24px;
    color: #050A1C;
    font-size: 15px;
    font-family: Inter;
}

.plan-lists li.active {
    background: rgba(169, 211, 251, 0.24);
}


.title-page {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.pg-wrap {
    padding-left: 16px;
    padding-right: 16px;
}

.title-man {
    display: flex;
    align-items: center;
    font-family: "Inter-Bold", sans-serif;
    font-size: 18px;
    color: #050A1C;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
}

.title-man b {
    color: #F2994A;
    font-size: 24px;
    display: block;
    padding-right: 8px;
}

.title-man img {
    margin-right: 6px;
}

.text-wrap .title {
    background: #F2994A;
    border-radius: 8px;
    border-bottom-left-radius: 0px;
    display: inline-flex;
    font-family: "Inter", sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    color: #FFFFFF;
    padding: 20px;
    padding-right: 40px;
    margin-bottom: 20px;
}


/*Test*/
.wrap-test {
    padding-left: 40px;
    padding-right: 40px;
    margin-bottom: 60px;
}

.wrap-test .wrap-item {
    display: flex;
    margin-bottom: 16px;
    align-items: center;
}

.wrap-test .wrap-item b {
    font-family: 'Inter', sans-serif;
    color: #050A1C;
    font-size: 18px;
    margin-right: 16px;
    font-weight: normal;
}


.buttons-wrap {
    width: 100%;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    padding-right: 40px;
    font-size: 14px;
    color: #fff;
    padding: 0px;
    margin: 0px;
    margin-bottom: 100px;
    margin-top: 32px;
}

.btn-prev img {
    margin-right: 10px;
    transform: rotate(180deg);
    margin-bottom: 2px;
}

.btn-prev {
    background-color: rgba(208, 208, 208, 0.56);
    border-radius: 12px;
    margin-right: auto;
    padding: 6px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 118px;
}

.btn-next img {
    margin-left: 10px;
    transform: rotate(180deg);
    margin-bottom: 2px;
}

.btn-next {
    background-color: #F2994A;
    border-radius: 12px;
    margin-left: auto;
    padding: 6px 20px;
    color: #fff;
    width: 118px;
}

.scroll{
    overflow-y: scroll;
    height: 100vh;
    padding-right: 0px;
}

.scroll::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3);
    border-radius: 10px;
    background-color: #F5F5F5;
}

.scroll::-webkit-scrollbar
{
    width: 9px;
    background-color: #F5F5F5;
}

.scroll::-webkit-scrollbar-thumb
{
    border-radius: 9px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,.3);
    background-color: #979797;
}

@media (max-width: 550px) {
    .white-background{
        padding: 0.5rem 0 0 0.5rem;
    }
}

@media only screen and (max-width: 768px) {
   .white-background{
    margin-left: 0px;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    margin-left: -18px;
    margin-right: -18px;
    width: 110%;
    padding-bottom: 10px;
    padding-top: 16px;
   } 

    .white-background a{
        font-size: 0;
        display: flex;
        align-items: center;
        margin: 0px !important;
        width: 50px;
    }

    .title-page span{
        font-size: 14px;
    }

    .lesson-modal-wrap .col-lg-6{
        padding-left: 0px;
    }

    .wrap-tabb{
        padding-left: 0px !important;
        padding-right: 0px !important; 
    }

    .plans-wrap .btn{
        padding: 15px 24px;
        font-size: 14px;
    }

    .plan-lists li{
        font-size: 16px;
    }
}
</style>
