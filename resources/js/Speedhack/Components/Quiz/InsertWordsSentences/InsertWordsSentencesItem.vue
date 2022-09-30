<template>
    <span>
        <template v-for="(text_item, index) in text">
            <span v-if="!correct_options.includes(index)" style="margin-left: 5px;">{{ text_item }}</span>
            <div class="input-wrap" v-else style="display: inline;">
                <input type="text"
                       v-model="user_answer[index]"
                       :id="`input_task-${question.id}-${index}`"
                       :class="{'correct' : correct[index].correct, 'not-correct': !correct[index].correct && correct[index].correct !== null}"
                       @change="event => log(event, text_item, index)">
            </div>
        </template>
    </span>
</template>

<script>
import api from "@/api";
import {mapActions} from "vuex";

export default {
    name: "InsertWordsSentences",
    props: {
        question: Object
    },
    data() {
        return {
            text: [],
            correct_options: [],
            correct: [],
            correct_user_answers: [],
            user_answer: [],
        }
    },
    mounted() {
        this.text = this.question.question.split(' ');
        this.correct_options = this.question.correct_options.map(a => Number(a.removed_index));
        console.log("ds " + this.correct_options);
        this.text.map((item, index) => {
            if (this.correct_options.includes(index)) {
                this.correct[index] = {
                    name: item,
                    correct: null
                };

                this.user_answer[index] = '';
            }
        });

        if (this.question.correct_user_answers.length > 0) {
            this.correct_user_answers = this.question.correct_user_answers;
            this.correct_user_answers.forEach((item) => {
                let event = {
                    target: {
                        value: item.question_option.option_text,
                    }
                }

                this.$set(this.user_answer, Number(item.question_option.removed_index), item.question_option.option_text);
                this.log(event, item.question_option.option_text, Number(item.question_option.removed_index));
            })
        }
    },
    methods: {
        ...mapActions(['getHomeWorkTasks']),
        async log(event, text_item, index) {
            let correctUserAnswers = _.map(this.correct_user_answers, 'answer');
            if (!correctUserAnswers.includes(event.target.value)) {
                await api.saveTaskQuestionUserAnswer(this.question.id, {
                    answer: event.target.value
                });

                const {homeWork} = route().params;
                if (homeWork) {
                    this.getHomeWorkTasks({id: homeWork})
                }
            }
            console.log(text_item + " " + event.target.value);
            if (text_item === event.target.value) {
                this.$set(this.correct, index, {
                    name: text_item,
                    correct: true
                });
                this.$playAudio('/audios/right_audio.mp3');
            } else {
                this.$set(this.correct, index, {
                    name: text_item,
                    correct: false
                });
                this.$playAudio('/audios/error.mp3');
            }
        },
    }
}
</script>
<style scoped>
input[type=text] {
    width: 15%;
    margin: 8px 1rem;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid black;
    caret-color: black;
}

.correct {
    color: green;
    pointer-events: none;
    background: transparent;
    border: none;
}

.not-correct {
    color: red;
}

</style>
