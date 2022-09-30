<template>
    <account-layout>
        <section class="bg-account">
            <menu-aside :tasks="tasks" @select-task="selectTask" :selected-task="selected_task"></menu-aside>

            <section class="content-wrap">
                <div class="account-title">
                    <a :href="route('account.home-works.index')">
                        <icon icon-name="arrow-left-blue"></icon>
                    </a>
                    <span>{{ homeWork.name }}</span>
                </div>

                <div v-if="!result">
                    <section class="tab-wrap">
                        <div class="item active">Homework</div>
                        <!-- <div class="item">Grammar</div> -->
                    </section>
                    <div class="container">
                        <div class="col-11">
                            <template v-for="(task, index) in tasks">
                                <component v-show="selected_task === index" :is="task.type" :task="task"></component>
                            </template>
                        </div>
                    </div>
                </div>

                <template v-if="result">
                    <result></result>
                </template>

                <div class="buttons-wrap" v-if="!result">
                    <button @click="nextTest" class="btn-next">
                        Next
                        <img src="/images/icons/arr-black.svg">
                    </button>
                </div>

            </section>
        </section>
    </account-layout>
</template>
<script>
import {mapGetters, mapActions} from 'vuex';
import MenuAside from '@/Speedhack/Components/HomeWork/AsideMenu';
import Result from '@/Speedhack/Components/Test/Result';
import CommonTest from "@/Speedhack/Components/Quiz/CommonTest/CommonTest";
import DragFillEmptySpace from "@/Speedhack/Components/Quiz/DragFillEmptySpace/DragFillEmptySpace";
import InsertWordsSentences from "@/Speedhack/Components/Quiz/InsertWordsSentences/InsertWordsSentences";
import SelectImages from "@/Speedhack/Components/Quiz/SelectImages/SelectImages";
import ArrangeWordsCorrectOrder from "@/Speedhack/Components/Quiz/ArrangeWordsCorrectOrder/ArrangeWordsCorrectOrder";
import JoinTwoHalves from "@/Speedhack/Components/Quiz/JoinTwoHalves/JoinTwoHalves";
import DropDownTest from "@/Speedhack/Components/Quiz/DropDownTest/DropDownTest";
import InlineDropDownTest from "@/Speedhack/Components/Quiz/InlineDropDownTest/InlineDropDownTest";
import DragWordToPictures from "@/Speedhack/Components/Quiz/DragWordToPictures/DragWordToPictures";

export default {
    props: {
        homeWork: Object,
        tasks: Array,
    },
    components: {
        MenuAside,
        Result,
        CommonTest,
        DragFillEmptySpace,
        InsertWordsSentences,
        SelectImages,
        ArrangeWordsCorrectOrder,
        JoinTwoHalves,
        DropDownTest,
        InlineDropDownTest,
        DragWordToPictures,
    },
    data() {
        return {
            option_index: 0,
            selected_task: 0,
            result: false,
            lesson: {
                title: 'sad'
            }
        }
    },
    mounted() {
        this.getHomeWorkTasks(this.homeWork)
    },
    methods: {
        ...mapActions([
            'getHomeWorkTasks'
        ]),
        selectTask(index) {
            this.selected_task = index;
        },
        nextTest() {
            if (this.selected_task < this.tasks.length - 1) {
                this.selected_task = this.selected_task + 1;
            } else {
                this.result = true;
            }
        }
    },
}
</script>
<style scoped>
.bg-account {
    background: #F5F7F8;
    width: 100%;
    height: 100%;
    display: flex;
}

.content-wrap {
    width: 100%;
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
    margin-right: 60px;
    margin-bottom: -1px;
}

.tab-wrap .item.active {
    color: #003ECB;
    border-bottom: 1px solid #003ECB;
}

.wrap-test {
    padding-left: 40px;
    padding-right: 40px;
    margin-bottom: 60px;
}

.wrap-item {
    display: flex;
    margin-bottom: 16px;
    align-items: center;
}

.wrap-item b {
    font-family: 'Inter', sans-serif;
    color: #050A1C;
    font-size: 18px;
    margin-right: 16px;
    font-weight: normal;
}

.text-test {
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 24px;
    color: #003ECB;
    margin-left: 40px;
    margin-bottom: 20px;
}

.buttons-wrap {
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
    padding-right: 40px;
    font-size: 14px;
    color: #fff;
}

.btn-prev img {
    margin-right: 10px;
}

.btn-prev {
    background-color: #F2994A;
    border-radius: 12px;
    margin-right: 24px;
    padding: 6px 20px;
    color: #fff;

}

.btn-next img {
    margin-left: 10px;
}

.btn-next {
    background-color: rgba(208, 208, 208, 0.56);
    border-radius: 12px;
    margin-left: 24px;
    padding: 6px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 118px;
}

@media only screen and (max-width: 768px) {
    .tab-wrap {
        padding-right: 20px;
        padding-left: 20px;
    }

    .tab-wrap .item:last-child {
        margin: 0px;
    }

    .text-test {
        margin-right: 20px;
        margin-left: 20px;
    }

    .wrap-test {
        padding-left: 20px;
        padding-right: 20px;
    }

    .content-wrap {
        margin-bottom: 100px;
    }

    .bg-account {
        flex-direction: column;
    }

}
</style>

