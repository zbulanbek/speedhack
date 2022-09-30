<template>
    <div class="test-item" :class="[typeof all_values_true === 'boolean' ? (all_values_true ? 'success' : 'failed'): '']">
        <template v-for="(text_item, index) in text">
            <span class="first_word" v-if="!correct_options.includes(index)"> {{ text_item }} </span>
            <div class="wrap-form" v-else>
                <div class="input_wrap">
                    <div class="form-group">
                        <select class="form-control" v-model="selected_option[index]" @change="handleChange(index)">
                            <option v-for="(option, oindex) in questionOptions(index)" :value="oindex" :key="option.id">
                                {{ option.option_text }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="progress">
                    <div class="percentage"
                         :style="[typeof correct[index] === 'boolean' ? (correct[index] ? 'height: 100%': 'height: 0%'): '']"></div>
                </div>
            </div>
        </template>
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
            text: '',
            correct: {},
            selected_option: {},
            correct_options: [],
            all_values_true: null,
            room_name: null,
        }
    },
    computed: {
        questionOptions() {
            return index => this.question.variants.filter((item) => Number(item.removed_index) === index);
        },
        allValuesTrue() {
            return this.$checkAllValuesTrue(this.correct);
        }
    },
    beforeMount() {
        this.text = this.question.question.split(' ')
        this.correct_options = this.question.correct_options.map(a => Number(a.removed_index))
        this.correct_options.forEach((item) => {
            this.correct[item] = null;
        });
    },
    mounted() {
        let {trial_lesson} = route().params;
        if (trial_lesson) this.room_name = trial_lesson;

        if (this.question.correct_user_answers.length > 0) {
            this.correct_user_answers = this.question.correct_user_answers;
            this.correct_user_answers.forEach((item) => {
                if  (item.question_option_id) {
                    this.setUserQuestionOption(item.question_option);
                }
            })
        }
    },
    methods: {
        ...mapActions([
            'getHomeWorkTasks'
        ]),
        setLaravelEcho() {
            window.Echo.private(`trial.lesson.handle.interactive.${this.room_name}.${this.question.id}`)
                .listen('.trial.lesson.handle.interactive', ({element}) => {
                    this.setUserQuestionOption(element);
                });
        },
        setUserQuestionOption(element) {
            const { id, removed_index } = element
            let questions = this.questionOptions(Number(removed_index));
            if (questions) {
                let index = this.getIndex(questions, 'id', id)
                if (index !== -1 && Number(removed_index) !== -1) {
                    this.$set(this.selected_option, Number(removed_index), index);
                    this.checkAnswer(removed_index);
                }
            }
        },
        handleChange(index) {
            let options = this.questionOptions(Number(index));
            let element = options[this.selected_option[index]];
            this.checkAnswer(index);
            if (this.room_name) {
                let payload = {
                    trial_lesson: this.room_name,
                    question_id: this.question.id,
                    element
                }
                this.$emit('handle-interactive-control', payload);
            }
        },
        checkAnswer(index) {
            let options = this.questionOptions(Number(index));
            let selected = options[this.selected_option[index]];
            if (selected) {
                let correctUserAnswers = _.map(this.correct_user_answers, 'question_option_id')
                if (!correctUserAnswers.includes(selected.id)) {
                    api.saveTaskQuestionUserAnswer(selected.question_id, {
                        question_option_id: selected.id
                    });
                    const {homeWork} = route().params;
                    if (homeWork) {
                        this.getHomeWorkTasks({id: homeWork})
                    }
                }

                if (selected.correct) {
                    this.$set(this.correct, index, true);
                    this.$playAudio('/audios/right_audio.mp3');
                } else {
                    this.$set(this.correct, index, false);
                    this.$playAudio('/audios/error.mp3');
                }
            }
        }
    },
    watch: {
        room_name(value) {
            if (value) {
                this.setLaravelEcho()
            }
        },
        selected_option: {
            handler(value) {
                this.all_values_true = this.$checkAllValuesTrue(this.correct);
            },
            deep: true,
        }
    }
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
    flex-wrap: wrap;
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

.progress {
    margin-right: 5px;
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
