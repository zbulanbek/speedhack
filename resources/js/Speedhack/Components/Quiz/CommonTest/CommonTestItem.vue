<template>
    <div>
        <div class="custom-control custom-radio" v-for="(value, index) in question.variants">
            <input
                class="custom-control-input input_one"
                :id="`${index}-${value.id}-${question.id}`"
                type="radio"
                :name="'q-'+question.id"
                :value="value.id"
                :disabled="correct_user_answer"
                v-model="answer"
                @change="handleChange(index)"
            >
            <label
                class="answer_label custom-control-label"
                :class="typeof correct[index] === 'boolean' ? (correct[index] ? 'question-right' : 'question-wrong') : ''"
                :for="`${index}-${value.id}-${question.id}`">
                {{ value.option_text }}
            </label>
        </div>
    </div>
</template>

<script>
import api from '@/api';
import {mapActions} from "vuex";

export default {
    name: "CommonTestItem",
    props: {
        question: Object
    },
    data() {
        return {
            answer: null,
            correct: [],
            correct_user_answer: null,
        }
    },
    beforeMount() {
        this.question.variants.forEach((item, index) => {
            this.correct[index] = null;
        });
    },
    mounted() {
        let {trial_lesson} = route().params;
        if (trial_lesson) this.setLaravelEcho(trial_lesson);

        if (this.question.correct_user_answers.length > 0) {
            this.correct_user_answer = this.question.correct_user_answers[0]
            this.answer = this.correct_user_answer.question_option_id
        }
    },
    methods: {
      ...mapActions(['getHomeWorkTasks']),
        setLaravelEcho(roomName) {
            window.Echo.private(`trial.lesson.handle.interactive.${roomName}.${this.question.id}`)
                .listen('.trial.lesson.handle.interactive', ({roomName, element}) => {
                    this.answer = element.id;
                });
        },
        handleChange(index) {
            let element = this.question.variants[index];
            const {trial_lesson} = route().params;
            if (trial_lesson) {
                let payload = {
                    trial_lesson,
                    question_id: this.question.id,
                    element
                }
                this.$emit('handle-interactive-control', payload);
            }
        }
    },
    watch: {
        answer(value) {
            if (!this.correct_user_answer) {
                api.saveTaskQuestionUserAnswer(this.question.id, {
                    question_option_id: value
                });

                const {homeWork} = route().params;
                if (homeWork) {
                  this.getHomeWorkTasks({id: homeWork})
                }
            }
            let index = this.getIndex(this.question.variants, 'id', value);
            if (this.question.variants[index].correct) {
                this.$set(this.correct, index, true);
                this.correct_user_answer = this.question.variants[index];
                this.$playAudio('/audios/right_audio.mp3');
            } else {
                this.$set(this.correct, index, false);
                this.$playAudio('/audios/error.mp3');
            }

        }
    }
}
</script>

<style scoped>

.custom-control-input[disabled] ~ .question-right, .custom-control-input:disabled ~ .question-right, .question-right{
    color: green!important;
}

.question-wrong {
    color: red;
}

.question-inputs div {
    display: block;
}

.custom-radio {
    font-family: "Inter", sans-serif;
}

.custom-control-label {
    font-family: "Inter", sans-serif;
    font-size: 16px;
    margin-bottom: 6px;
}

.custom-control-label::before,
.custom-control-label::after {
    top: 0.45rem;
}

.custom-control-input:checked ~ .custom-control-label.question-wrong::before {
    border-color: red;
    background-color: red;
}
</style>
