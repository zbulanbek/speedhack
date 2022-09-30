<template>
    <section>
        <div class="anwers-wrap">
            <span class="info">Выберите слова и перетащите к нужному предложению</span>
            <div class="anwers" style="display: flex;">
                <draggable
                    class="dragArea list-group"
                    :list="answers"
                    :group="{ name: 'drag-fill-empty-space' }"
                    @change="handleChange">
                    <div v-for="(answer, index) in answers"
                         :key="`${task.id}-${answer.id}-${index}`"
                         class="item-anwer"
                         :class="[ typeof answer.correct === 'boolean' ? (answer.correct ? 'true' : 'false') : '']">
                        <div>{{ answer.name }}</div>
                    </div>
                </draggable>
            </div>
        </div>

        <template v-for="(item, key) in task.questions">
            <div class="wrap-question">
                <span class="key">{{ ++key }}.</span>
                <drag-fill-empty-space-item
                    :question="item"
                    :task_id="task.id"
                    @handle-interactive-control="handleInteractiveControl"
                    @remove-element="removeElement">
                </drag-fill-empty-space-item>
            </div>
        </template>

    </section>
</template>

<script>
import draggable from "vuedraggable";
import Modal from "@/Pages/Speedhack/Test/Modal";
import DragFillEmptySpaceItem from "@/Speedhack/Components/Quiz/DragFillEmptySpace/DragFillEmptySpaceItem";
import {mapActions} from "vuex";

import api from '@/api'

export default {
    name: "DragFillEmptySpace",
    props: {
        task: Object
    },
    components: {
        draggable,
        DragFillEmptySpaceItem,
        Modal
    },
    data() {
        return {
            answers: [],
            room_name: null,
        }
    },
    mounted() {
        this.getAnswers();
        const {trial_lesson} = route().params;
        if (trial_lesson) {
            this.room_name = trial_lesson;
        }
    },
    methods: {
        ...mapActions(['handleInteractiveControl', 'taskAnswersHandleChange']),
        async getAnswers() {
            const { correct_options } = await api.getTaskQuestionsCorrectAnswers([this.task.id]);
            this.setAnswers(correct_options);
        },
        setAnswers(answers) {
            let tmp_answers = [];
            answers.forEach((answer) => {
                tmp_answers.push({
                    id: answer.id,
                    name: answer.option_text,
                    correct: null,
                });
            });
            this.answers = tmp_answers;
        },
        handleChange(event) {
            if (event.added) {
                if (this.room_name) {
                    let element = event.added.element;
                    let payload = {
                        trial_lesson: this.room_name,
                        task_id: this.task.id,
                        element
                    };
                    this.taskAnswersHandleChange(payload);
                }
            }
        },
        removeElement(element) {
            let index = this.getIndex(this.answers, 'id', element.id);
            if (index !== -1) {
                this.answers.splice(index, 1);
            }
        },
        setLaravelEcho() {
            window.Echo.private(`task.answers.handle.change.${this.room_name}.${this.task.id}`)
                .listen('.task.answers.handle.change', ({roomName, element}) => {
                    let foundElement = this.answers.findIndex((item) => item.id === element.id);
                    if (foundElement === -1) {
                        this.answers.push(element)
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
.anwers-wrap {
    border: 2px solid rgba(0, 62, 203, 0.69);
    border-radius: 10px;
    padding: 20px 40px 10px;
    margin-bottom: 40px;
}

.anwers-wrap .info {
    font-family: 'Inter', sans-serif;
    color: #979797;
    font-size: 14px;
    display: inline-block;
    margin-bottom: 16px;
}

.anwers .list-group {
    flex-direction: row;
    flex-wrap: wrap;
}

.item-anwer {
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgba(110, 120, 130, 0.12);
    border-radius: 4px;
    margin-right: 20px;
    margin-bottom: 10px;
    padding: 6px 12px;
}

.item-anwer:hover {
    cursor: pointer;
}

.item-anwer div:hover {
    cursor: pointer;
}

.true {
    pointer-events: none;
    opacity: 0.2;
}

.false {
    /*background-color: red;*/
    border: 1px solid #EEA5A5;
}

.wrap-question {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.wrap-question .key {
    margin-right: 16px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #050A1C;
}

@media only screen and (max-width: 768px) {
    .item-anwer {
        margin-bottom: 16px;
    }
}
</style>
