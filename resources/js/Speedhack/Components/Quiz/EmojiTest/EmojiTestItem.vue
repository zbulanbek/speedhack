<template>
    <div class="emoji-select-wrap" 
    :class="typeof correct[0] === 'boolean' ? 'right' : typeof correct[1] === 'boolean' ? 'error' : '' ">
        <div class="img-wrap">
            <img :src="question.image_url">
        </div>
        <p class="question">{{question.question}}</p>
        <p class="emoji-correct_option" v-if="$page.props.user.role_id === '4'">{{question.correct_options[0].option_text}}</p>
        <div class="wrap-btns" v-if="$page.props.user.role_id === '4'">
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
                    :class="{'green': index == 0}"
                    :for="`${index}-${value.id}-${question.id}`">
                    <template v-if="index == 0">
                        right
                    </template>
                    <template v-else>
                        wrong
                    </template>
                </label>
            </div>
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
            check: null
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

        // if (this.question.correct_user_answers.length > 0) {
        //     this.correct_user_answer = this.question.correct_user_answers[0]
        //     this.answer = this.correct_user_answer.question_option_id
        // }
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

.question{
    color: #333;
    font-size: 18px;
    word-wrap: break-word;
    margin-bottom: 0px;
    text-align: center;
    font-size: 16px;
}

.emoji-correct_option{
    margin-top: 5px;
    text-align: center;
    color: #3BA972;
    margin-bottom: 3px;
    font-size: 16px;
    border: 2px solid transparent;
}

.wrap-btns{
    display: flex;
    align-items: center;
    padding-top: 10px;
    width: 100%;
    justify-content: center;
  
}
.img-wrap{
    width: 100%;
    height: 115px;
    overflow: hidden;
    border-radius: 15px;
}
.img-wrap img{
    width: 110%;
    height: 133%;
    object-fit: cover;
    object-position: center;
    margin-left: -5px
}
.emoji-select-wrap{
    margin-bottom: 16px;
    border-radius: 9px;
    padding-bottom: 10px;
    box-shadow: 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%), 0 2px 4px -1px rgb(0 0 0 / 20%);
}
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
    background: red;
    color: #fff;
    border-radius: 10px;
    padding: 5px 17px;
}

.custom-control-label.green{
    background: #3BA972;
}

.custom-control-label::before,
.custom-control-label::after {
    top: 0.45rem;
    display: none;
}

.custom-control-input:checked ~ .custom-control-label.question-wrong::before {
    border-color: red;
    background-color: red;
}

.emoji-select-wrap .custom-control{
    padding-left: 14px;
}

.wrap-btns .custom-control:first-child{
    padding-left: 0px;
}
.emoji-select-wrap .custom-control-input[disabled] ~ .custom-control-label, .custom-control-input:disabled ~ .custom-control-label{
    opacity: .8;
    color: #fff;
}

.emoji-select-wrap.right{
    border: 2px solid #3BA972;
}

.emoji-select-wrap.error{
    border: 2px solid red;
}

/*.meto.not-active .desk-wrap .emoji-select-wrap .wrap-btns{
    display: flex;
}*/


</style>
