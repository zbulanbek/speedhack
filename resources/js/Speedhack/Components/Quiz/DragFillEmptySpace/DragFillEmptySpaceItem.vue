<template>
    <div class="drag-item">
        <template v-for="(text_item, index) in text">
            <div class="break" v-if="text_item === '<br>'" style="display: block"></div>
            <span v-else-if="!correct_options.includes(index)" style="margin-left: 5px;">{{ text_item }}</span>
            <div class="wrap-drag"  v-else>
                <div class="input-wrap">
                    <draggable  class="dragArea list-group"
                            :list="list[index]"
                            :options="draggableOptions"
                            @change="event => handleChange(event, index)">
                        <div
                            v-for="answer in list[index]"
                            class="drag-item"
                            :class="{correct_word: correct[index] !== null && correct[index], not_correct: correct[index] == false }"
                        >
                            {{ answer ? answer.name : '' }}
                        </div>
                    </draggable>
                </div>

                <div class="progress" :class="{ active: correct[index], error:  correct[index] == false && correct[index] !== null}">
                    <div class="percentage"></div>
                </div>
            </div>
        </template>
    </div>
</template>
<script>
import draggable from 'vuedraggable';
import api from "@/api";
import {mapActions} from "vuex";

export default {
    name: 'DragFillEmptySpaceItem',
    props: {
        question: Object,
    },
    components: {
        draggable,
    },
    data() {
        return {
            room_name: null,
            text: [],
            correct: [],
            list: [],
            correct_options: [],
            correct_user_answers: [],
            progress: null,
            draggableOptions: {
                group: {
                    name: 'drag-fill-empty-space',
                    put: function (to) {
                        return to.el.children.length < 1;
                    }
               },
            },
        }
    },
    mounted() {
        this.text = this.question.question.split(' ');
        this.correct_options = this.question.correct_options.map(a => Number(a.removed_index))
        this.text.map((item, index) => {
            if (this.correct_options.includes(index)) {
                this.correct[index] = null;
                this.list[index] = [];
            }
        })
        const {trial_lesson} = route().params;
        if (trial_lesson) this.room_name = trial_lesson;

        if (this.question.correct_user_answers.length > 0) {
            this.correct_user_answers = this.question.correct_user_answers
            this.correct_user_answers.forEach((item) => {
                let element = {
                    added: {
                        element: {
                            name: item.question_option.option_text,
                        }
                    }
                }
                this.handleChange(element, Number(item.question_option.removed_index));
            })

        }
    },
    methods: {
        ...mapActions(['getHomeWorkTasks']),
        handleChange(event, index) {
            let element = null;
            if (event.removed) {
                element = event.removed.element
                this.$set(element, 'event', 'removed');
            } else {
                element = event.added.element
                this.$set(element, 'event', 'added');
                this.$set(this.list, index, [element]);
            }

            if (element) {
                this.$set(element, 'newIndex', index);
                this.checkAnswer(element);
                if (this.room_name) {
                    let payload = {
                        trial_lesson: this.room_name,
                        question_id: this.question.id,
                        element
                    }
                    this.$emit('handle-interactive-control', payload);
                }
            }

        },
        checkAnswer(element) {
            let finded = this.question.correct_options.find((item) => Number(item.removed_index) === element.newIndex);
            let correctUserAnswers = _.map(this.correct_user_answers, 'question_option_id')
            if (finded && !correctUserAnswers.includes(finded.id)) {
                api.saveTaskQuestionUserAnswer(this.question.id, {
                    question_option_id: finded.id
                });
                const {homeWork} = route().params;
                if (homeWork) {
                    this.getHomeWorkTasks({id: homeWork})
                }
            }
            if (finded && finded.question_id === this.question.id && finded.option_text === element.name) {
                this.$set(this.correct, element.newIndex, true);
                this.progress = true;
                this.$playAudio('/audios/right_audio.mp3');
            } else if (element.event !== 'removed') {
                this.$set(this.correct, element.newIndex, false);
                this.progress = false;
                this.$playAudio('/audios/error.mp3');
            } else {
                this.$set(this.correct, element.newIndex, null);
                this.progress = null;
            }
        },
        setLaravelEcho() {
            window.Echo.private(`trial.lesson.handle.interactive.${this.room_name}.${this.question.id}`)
                .listen('.trial.lesson.handle.interactive', ({roomName, element}) => {
                    this.checkAnswer(element);
                    if (element.event === 'added') {
                        this.$emit('remove-element', element);
                        this.$set(this.list, element.newIndex, [element]);
                    } else {
                        this.list.splice(element.newIndex, 1)
                    }
                });
        },

    },
    watch: {
        room_name(value) {
            if (value) {
                this.setLaravelEcho()
            }
        },
    }
}
</script>
<style scoped>
.input-wrap {
    background-color: transparent;
    min-width: 100px;
    max-height: 28px;
    padding-left: 6px;
    border-bottom: 1px solid rgba(196, 196, 196, 0.61);
    margin-left: 4px;
    margin-right: 4px;
}

.drag-item {
    display: flex;
    color: #050A1C;
    font-family: 'Inter', sans-serif;
    line-height: 24px;
    font-size: 16px;
    flex-wrap: wrap;
}

.correct_word {
    font-family: 'Inter', sans-serif;
    color: #3BA972;
    pointer-events: none;
}

.not_correct{
    color: red;
}

.progress {
    width: 5px;
    height: 100%;
    background: #BAC9DF;
    border-radius: 8px;
    height: 31px;
    display: flex;
    justify-content: space-between;
    margin-left: 5px;
    margin-left: auto;
}

.progress .percentage {
    display: block;
    width: 100%;
    background: #28a745;
    margin-top: auto;
}

.progress.error {
    background: red;
}

.progress.active {
    background: #28a745;
}
.wrap-drag{
    display: flex;
}
</style>
