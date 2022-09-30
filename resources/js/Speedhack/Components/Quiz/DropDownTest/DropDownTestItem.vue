<template>
    <div class="test-item" :class="[typeof correct === 'boolean' ? (correct ? 'success' : 'failed'): '']">
        <span class="first_word"> {{ question.question }} </span>
        <div class="wrap-form">
            <div class="input_wrap">
                <div class="form-group">
                    <select class="form-control" v-model="selected_option" @change="handleChange">
                        <option v-for="(option, index) in question.variants" :value="option.id" :key="option.id">
                            {{ option.option_text }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="progress">
                <div class="percentage" :style="{height: percent + '%' }"></div>
            </div>
        </div>
        <!-- <button class="help-btn"><img src="/images/icons/help.svg"></button> -->
    </div>
</template>
<script>
import api from "@/api";
import {mapActions} from "vuex";

export default {
    props: {
        question: Object,
    },
    data() {
        return {
            selected_option: null,
            correct: null,
            correct_options: [],
            percent: 0,
            room_name: 0,
            correct_user_answer: null,
        }
    },
    mounted() {
        let {trial_lesson} = route().params;
        if (trial_lesson) this.room_name = trial_lesson;
        if (this.question.correct_user_answers.length > 0) {
            this.correct_user_answer = this.question.correct_user_answers[0];
            this.selected_option = this.correct_user_answer.question_option_id;
        }
    },
    methods: {
        ...mapActions(['getHomeWorkTasks']),
        setLaravelEcho() {
            window.Echo.private(`trial.lesson.handle.interactive.${this.room_name}.${this.question.id}`)
                .listen('.trial.lesson.handle.interactive', ({element}) => {
                    this.selected_option = element.id;
                });
        },
        handleChange() {
            let index = this.getIndex(this.question.variants, 'id', this.selected_option)
            let selected_option = this.question.variants[index];
            if (this.room_name) {
                let payload = {
                    trial_lesson: this.room_name,
                    question_id: this.question.id,
                    element: selected_option
                }
                this.$emit('handle-interactive-control', payload);
            }
        }
    },
    watch: {
        selected_option(value) {
            let index = this.getIndex(this.question.variants, 'id', value)
            let selected_option = this.question.variants[index];

            if (!this.correct_user_answer) {
                api.saveTaskQuestionUserAnswer(this.question.id, {
                    question_option_id: value
                });
                const {homeWork} = route().params;
                if (homeWork) {
                    this.getHomeWorkTasks({id: homeWork})
                }
            }

            if (selected_option.correct) {
                this.correct_user_answer = selected_option;
                this.correct = true;
                this.percent = 100;
                this.$playAudio('/audios/right_audio.mp3')
            } else {
                this.correct = false;
                this.percent = 0;
                this.$playAudio('/audios/error.mp3')
            }
        },

        room_name(value) {
            if (value) {
                this.setLaravelEcho()
            }
        }
    },
}
</script>
<style scoped>
.first_word {
    margin-right: 4px;
}

.test-item {
    display: flex;
    align-items: center;
    font-family: "Inter", sans-serif;
    color: #050A1C;
    font-size: 16px;
    line-height: 18px;
    padding: 5px 10px;
    border-radius: 10px;
    overflow: hidden;
}

.test-item.success {
    pointer-events: none;
    background: #EEFADE;
}

.test-item.failed {
    background: #fadede;
}

.test-item .input_wrap {
    display: flex;
    background: #FFFFFF;
    box-shadow: 0px 4px 6px rgba(110, 120, 130, 0.18);
    border-radius: 4px;
    padding: 5px;
    align-items: flex-end;
    margin-right: 6px;
    width: 130px;
}

.test-item .input_wrap input {
    width: 100%;
    border-bottom: 1px solid rgba(196, 196, 196, 0.58);
}

.wrap-form {
    display: flex;
}

.progress {
    width: 5px;
    height: 100%;
    background: #BAC9DF;
    border-radius: 8px;
    height: 31px;
    display: flex;
    justify-content: space-between;
}

.progress .percentage {
    display: block;
    width: 100%;
    background: #28a745;
    margin-top: auto;
}

.help-btn {
    background-color: transparent;
    padding: 0px;
    margin-left: 5px;
}

.help-btn img {
    width: 25px;
    height: 25px;
}

.form-group {
    margin-bottom: 0px;
    width: 100%;
    border: none;
}

.test-item .input_wrap {
    padding: 0px;
}

.form-control {
    border: none;
}

.test-item.failed .wrap-form .progress {
    background: red;
}

.test-item.success .wrap-form .progress {
    background: #28a745;
}

@media only screen and (max-width: 768px) {
    .test-item .input_wrap {
        width: 90px;
    }

    .last_word {
        font-size: 16px;
    }

    .first_word {
        font-size: 16px;
    }
}
</style>
