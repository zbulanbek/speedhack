<template>
    <section>
        <div class="anwers-wrap">
            <span class="info">Выберите слова и перетащите к нужному предложению</span>
            <div class="anwers" style="display: flex;">
                <draggable
                    class="dragArea list-group"
                    :list="answers"
                    :group="`dragWordToPictures-${task.id}`"
                    @change="handleChange">
                    <div v-for="answer in answers"
                         :key="`${task.id}-${answer.id}`"
                         class="item-anwer"
                         :class="[ typeof answer.correct === 'boolean' ? (answer.correct ? 'true' : 'false') : '']"
                        >
                        <div>{{ answer.name }}</div>
                    </div>
                </draggable>
            </div>
        </div>

        <div class="row">
            <div v-for="(question, index) in task.questions" class="col-4">
                <DraggingWordToPicturesItem
                    :question="question"
                    :number="index"
                    :id="task.id"
                    :groupName="`dragWordToPictures-${task.id}`"
                    @remove-element="removeElement"
                    @handle-interactive-control="handleInteractiveControl" />
            </div>
        </div>
    </section>
</template>

<script>
import DraggingWordToPicturesItem from "@/Speedhack/Components/Quiz/DragWordToPictures/DragWordToPicturesItem";
import draggable from "vuedraggable";
import {mapActions} from "vuex";
import api from "@/api";

export default {
    props: {
        task: Object,
    },
    components: {
        DraggingWordToPicturesItem,
        draggable,
    },
    data() {
        return {
            answers: [],
            indexItem: null,
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
        ...mapActions([
            'handleInteractiveControl',
            'taskAnswersHandleChange',
        ]),
        async getAnswers() {
            const { correct_options } = await api.getTaskQuestionsCorrectAnswers([this.task.id]);
            this.setAnswers(correct_options);
        },
        setAnswers(correct_options) {
            let tmp_answers = [];
            correct_options.forEach((answer) => {
                tmp_answers.push({
                    id: answer.id,
                    name: answer.option_text,
                    question_id: answer.question_id,
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
    padding: 20px 40px 20px;
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
    margin-bottom: 12px;
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
.drag-wrap {
    margin-bottom: 20px;
}

.drag-wrap .img {
    width: 100%;
    height: 160px;
    overflow: hidden;
    position: relative;
}

.drag-wrap .img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.drag-wrap .img .index {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: rgba(0, 0, 0, .5);
    color: #fff;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2px 12px;
    border-radius: 5px;
}

.drag-wrap .wrap {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 20px;
    margin-bottom: 20px;
    padding: 0px 5px;

}

.drag-wrap .wrap .words {
    text-align: center;
    margin: 0px 10px;
    width: 100%;
    min-height: 31px;
    font-size: 18px;
    color: #333333;
    font-family: 'Inter', sans-serif;
    border-bottom: 1px solid #E0E3EB;
}

.drag-wrap.green .wrap .words {
    color: #A5C579;
    border-bottom: none;
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

.progress .procent {
    display: block;
    width: 100%;
    background: #E46E67;
    margin-top: auto;
}

.drag-wrap.green .progress {
    background: #A5C579;
}

.drag-wrap.green .progress .procent {
    background: #A5C579;
}

.drag-item{
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgb(110 120 130 / 12%);
    border-radius: 4px;
    padding: 6px 12px;
}
</style>
