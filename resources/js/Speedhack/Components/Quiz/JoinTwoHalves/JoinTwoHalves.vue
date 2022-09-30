<template>
    <div>
        <section class="wrap-test">
            <ul class="wrap-static">
                <template v-for="(item, key) in questions">
                    <li class="item" :class="{ green_full: correct_answers[item.id]}">
                        {{ item.question }}
                    </li>
                </template>
            </ul>

            <div class="drag-wrap" :class="{'green': correct }">
                <draggable v-model="answers" :move="checkMove" @change="handleDragChange">
                    <transition-group :key="task.id">
                        <div v-for="(answer, key) in answers" :key="answer.id"
                             class="item"
                             :class="{
                                green_full: correct_answers[answer.question_id],
                                error: correct_answers[answer.question_id] !== null && !correct_answers[answer.question_id]
                            }">
                            <div class="item-drag">
                                {{ answer.option_text }}
                            </div>
                            <div class="progress">
                                <div class="procent" :style="{height: 0+ '%' }"></div>
                            </div>
                        </div>
                    </transition-group>
                </draggable>
            </div>
        </section>
    </div>
</template>
<script>
import {mapActions} from 'vuex';
import draggable from 'vuedraggable';
import api from "@/api";

export default {
    name: "JoinTwoHalves",
    props: {
        task: Object,
    },
    components: {
        draggable
    },
    data() {
        return {
            answers: [],
            questions: [],
            correct_answers: [],
            correct_user_answers: [],
            room_name: null,
            all_count: 0,
            correct: true,
            count: 0,
        }
    },
    beforeMount() {
        let {trial_lesson} = route().params;
        if (trial_lesson) this.room_name = trial_lesson;
    },
    async mounted() {
        this.questions = this.task.questions;
        this.all_count = this.questions.length - 1;
        await this.setAnswers();

    },
    methods: {
        ...mapActions(['handleInteractiveControl', 'getHomeWorkTasks']),
        async setAnswers() {
            let answers = []
            this.questions.forEach((item) => {
                if (item.correct_user_answers.length > 0) {
                    this.correct_user_answers.push(item.correct_user_answers[0]);
                }
                this.correct_answers[item.id] = null;
                answers.push(item.correct_options[0])
            })
            this.answers = _.orderBy(answers, ['id'], ['desc']);

            if (this.correct_user_answers.length > 0) {
                this.correct_user_answers.forEach(item => {
                    let oldIndex = this.answers.findIndex((answer) => answer.id === item.question_option_id)
                    let newIndex = this.questions.findIndex((question) => question.id === item.question_id)
                    let element = {
                        ...item.question_option,
                        newIndex,
                        oldIndex
                    }
                    this.drag(element);
                    this.checkAnswer(element);
                })
            }
        },
        checkMove(e) {
            return this.isDraggable(e.draggedContext);
        },
        isDraggable(context) {
            const {index, futureIndex} = context
            return !(this.answers[index].fixed || this.answers[futureIndex].fixed);
        },
        handleDragChange(e) {
            const {newIndex, oldIndex, element} = e.moved;
            element.newIndex = newIndex;
            element.oldIndex = oldIndex;
            this.checkAnswer(element);

            const {trial_lesson} = route().params;
            if (trial_lesson) {
                let payload = {
                    trial_lesson,
                    question_id: element.question_id,
                    element
                }
                this.handleInteractiveControl(payload);
            }
        },
        checkAnswer(element) {
            this.saveAnswer(element);
            if (this.questions[element.newIndex].id === element.question_id) {
                element.fixed = true;
                this.$set(this.correct_answers, element.question_id, true);
                this.unshiftCorrectAnswer(element.newIndex);
                this.$playAudio('/audios/right_audio.mp3');
            } else {
                this.$set(this.correct_answers, element.question_id, false);
                this.$playAudio('/audios/error.mp3');
            }
        },
        saveAnswer(element) {
            let correctUserAnswers = _.map(this.correct_user_answers, 'question_option_id')
            if (!correctUserAnswers.includes(element.id)) {
                api.saveTaskQuestionUserAnswer(element.question_id, {
                    question_option_id: element.id,
                });
                const {homeWork} = route().params;
                if (homeWork) {
                    this.getHomeWorkTasks({id: homeWork})
                }
            }
        },
        unshiftCorrectAnswer(newIndex) {
            this.count = this.count + 1;

            let answer = this.answers[newIndex];
            this.answers.splice(newIndex, 1);
            this.answers.unshift(answer);

            let question = this.questions[newIndex];
            this.questions.splice(newIndex, 1);
            this.questions.unshift(question);

            if (this.count === this.all_count) {
                this.$set(this.correct_answers, this.questions[this.questions.length - 1].id, true);
                let element = this.answers[this.answers.length - 1];
                if (element) {
                    this.saveAnswer(element);
                }
            }
        },
        setLaravelEcho() {
            this.questions.forEach((question) => {
                window.Echo.private(`trial.lesson.handle.interactive.${this.room_name}.${question.id}`)
                    .listen('.trial.lesson.handle.interactive', ({element}) => {
                        this.drag(element)
                        this.checkAnswer(element);
                    });
            });
        },
        drag(element) {
            this.answers.splice(element.oldIndex, 1)
            this.answers.splice(element.newIndex, 0, element);
        }

    },
    watch: {
        room_name(value) {
            if (value) {
                this.setLaravelEcho();
            }
        }
    }
}
</script>
<style scoped>
.account-title {
    font-family: "Inter-Bold", sans-serif;
    padding: 30px 20px;
    font-weight: 600;
    color: #050A1C;
    font-size: 28px;
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

.bg-account {
    background: #F5F7F8;
    width: 100%;
    height: 100%;
    display: flex;
}

.content-wrap {
    width: 100%;
}

.text-test {
    font-family: 'Inter', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: #003ECB;
    margin-left: 60px;
    margin-bottom: 20px;
}

.wrap-test {
    display: flex;
}

.wrap-static {
    padding-right: 20px;
    width: 100%;
}

.drag-wrap {
    padding-left: 20px;
    width: 100%;
}

.wrap-static .item {
    padding: 15px 16px;
    font-size: 14px;
    line-height: 18px;
    margin-bottom: 20px;
    border-radius: 8px;
    background-color: #fff;
    color: #050A1C;
    position: relative;
    border: 2px solid #fff;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    font-family: "Inter", sans-serif;
}

.wrap-static .item:after {
    content: '';
    display: block;
    width: 12px;
    height: 12px;
    border-radius: 2px;
    background-color: #fff;
    position: absolute;
    top: 50%;
    right: -7px;
    border-top: 2px solid #fff;
    border-right: 2px solid #fff;
    transform: rotate(45deg) translate(-40%, -50%);
}

.wrap-static .item.green_border {
    border: 2px solid #D5F0B0;
}

.wrap-static .item.green_border:after {
    border-top: 2px solid #D5F0B0;
    border-right: 2px solid #D5F0B0;
}

.wrap-static .item.green_full {
    background: #D5F0B0;
    border: 2px solid #D5F0B0;
}

.wrap-static .item.green_full:after {
    background: #D5F0B0;
    border-top: 2px solid #D5F0B0;
    border-right: 2px solid #D5F0B0;
}

.wrap-static .item:hover {
    cursor: pointer;
}

.drag-wrap .item {
    display: flex;
    align-content: center;
    justify-content: space-between;
}

.drag-wrap .item .item-drag {
    padding: 15px 16px;
    width: 100%;
    margin-right: 8px;
    font-size: 14px;
    line-height: 18px;
    margin-bottom: 20px;
    border-radius: 8px;
    background-color: #fff;
    color: #050A1C;
    position: relative;
    border: 2px solid #fff;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    font-family: "Inter", sans-serif;
}

.drag-wrap .item .item-drag:before {
    content: '';
    display: block;
    width: 12px;
    height: 12px;
    border-radius: 2px;
    background-color: #fff;
    position: absolute;
    top: 50%;
    left: -8px;
    border-bottom: 2px solid #fff;
    border-left: 2px solid #fff;
    transform: rotate(45deg) translate(-40%, -50%);
}

.drag-wrap .item.green_border .item-drag {
    border: 2px solid #D5F0B0;
}

.drag-wrap .item.green_border .item-drag:before {
    border-bottom: 2px solid #D5F0B0;
    border-left: 2px solid #D5F0B0;
}

.drag-wrap .item.green_full .item-drag {
    background: #D5F0B0;
    border: 2px solid #D5F0B0;
    pointer-events: none;
}

.drag-wrap .item.green_full .progress {
    background: #28a745;
}

.drag-wrap .item.error .progress {
    background: red;
}

.drag-wrap .item.green_full .item-drag:before {
    background: #D5F0B0;
    border-bottom: 2px solid #D5F0B0;
    border-left: 2px solid #D5F0B0;
}

.drag-wrap .item.error .item-drag {
    border: 2px solid #EEA5A5;
}

.drag-wrap .item.error .item-drag:before {
    border-bottom: 2px solid #EEA5A5;
    border-left: 2px solid #EEA5A5;
}

.drag-wrap .item:hover {
    cursor: pointer;
}

.progress {
    width: 6px;
    height: 100%;
    background: #BAC9DF;
    border-radius: 8px;
    height: 40px;
    margin-top: 8px;
    display: flex;
    justify-content: space-between;
}

.progress .procent {
    display: block;
    width: 100%;
    background: #E46E67;
    margin-top: auto;
}

.btn-wrap-end {
    display: flex;
    justify-content: flex-end;
    padding-left: 60px;
    padding-right: 60px;
    margin-bottom: 40px;
    margin-top: 20px;
}

.btn-main.check {
    padding: 12px 30px;
    font-size: 16px;
    line-height: 16px;
}

.item.green_full {
    /*pointer-events: none;*/
}

@media only screen and (max-width: 768px) {
    .drag-wrap {
        padding-left: 10px;
    }

    .wrap-static {
        padding-right: 10px;
    }

    .wrap-static .item {
        padding: 15px 15px;
        font-size: 14px;
        line-height: 18px;
    }

    .drag-wrap .item .item-drag {
        padding: 15px 15px;
        font-size: 14px;
        line-height: 18px;
    }
}
</style>
