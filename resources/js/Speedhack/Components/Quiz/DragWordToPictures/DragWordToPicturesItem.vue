<template>
    <div class="drag-wrap green">
        <div class="img">
            <img :src="question.image_url" height="250">
            <div class="index">{{ number + 1 }}</div>
        </div>
        <div class="wrap">
            <div class="input-wrap col-11">
                <draggable class="dragArea list-group"
                           :group="groupName"
                           :list="list"
                           @change="event => handleChange(event)"
                           draggable=".drag-item"
                           v-if="!correct">
                    <div v-for="answer in list" class="drag-item">
                        {{ answer.name }}
                    </div>
                </draggable>
                <div class="correct_word">
                    {{ correct ? text : null }}
                </div>
            </div>
            <div class="col-1">
                <div class="progress" :class="[typeof progress === 'boolean' ? (progress ? 'active': 'error') : 'asd']">
                    <div class="percentage" :style="{height: percent + '%' }"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import api from "@/api";
import {mapActions} from "vuex";

export default {
    components: {
        draggable,
    },
    props: {
        question: Object,
        id: Number,
        number: Number,
        groupName: String
    },
    data() {
        return {
            percent: 0,
            correct: false,
            text: '',
            list: [],
            progress: null,
            room_name: null,
            correct_user_answer: null,
            draggableOptions: {
                group: {
                    name: this.groupName,
                    put: function (to) {
                        return to.el.children.length < 1;
                    }
                },
            },
        }
    },
    mounted() {
        let {trial_lesson} = route().params;
        if (trial_lesson) this.room_name = trial_lesson;

        if (this.question.correct_user_answers.length > 0) {
            this.correct_user_answer = this.question.correct_user_answers[0]
            let element = {
                name: this.correct_user_answer.question_option.option_text,
            }
            this.checkAnswer(element);
        }
    },
    methods: {
        ...mapActions(['getHomeWorkTasks']),
        handleChange(event) {
            let element = null;
            if (event.added) {
                element = event.added.element
            } else {
                element = event.removed.element
                element.event = 'removed';
            }
            this.checkAnswer(element);
            this.interactiveControl(element);
        },
        async checkAnswer(element) {
            let foundOption = this.question.correct_options.find(item => {
                return item.option_text === element.name;
            });

            if (!this.correct_user_answer) {
                await api.saveTaskQuestionUserAnswer(this.question.id, {
                    question_option_id: element.id
                });
                const {homeWork} = route().params;
                if (homeWork) {
                    this.getHomeWorkTasks({id: homeWork})
                }
            }



            if (foundOption) {
                this.correct = true;
                this.text = foundOption.option_text;
                this.progress = true;
                
                await this.$playAudio('/audios/right_audio.mp3');
            } else if (this.list.length === 0) {
                this.progress = null;
            } else {
                
                this.progress = false;
                await this.$playAudio('/audios/error.mp3');
            }
        },
        interactiveControl(element) {
            if (this.room_name) {
                let payload = {
                    trial_lesson: this.room_name,
                    question_id: this.question.id,
                    element
                }
                this.$emit('handle-interactive-control', payload);
            }
        },

        setLaravelEcho() {
            Echo.private(`trial.lesson.handle.interactive.${this.room_name}.${this.question.id}`)
                .listen('.trial.lesson.handle.interactive', ({element}) => {
                    if (this.list[0] && this.list[0].id === element.id) {
                        this.list.splice(0,1);
                    } else {
                        this.list.push(element)
                        this.checkAnswer(element)
                        this.$emit('remove-element', element);
                    }

                });
        }
    },
    watch: {
        room_name(value) {
            if (value) this.setLaravelEcho();
        },
    }

}
</script>

<style scoped>
.input-wrap {
    background-color: transparent;
    min-width: 100px;
    height: 31px;
    padding-left: 6px;
    border-bottom: 1px solid rgba(196, 196, 196, 0.61);
}

.drag-wrap {
    margin-bottom: 20px;
}

.correct_word {
    font-family: 'Inter', sans-serif;
    color: #3BA972;
}

.drag-wrap .img {
    width: 100%;
    max-height: 200px;
    height: 200px;
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

.drag-item:hover {
    cursor: pointer;
}

.progress .percentage {
    background: #BAC9DF;
}

.progress.error {
    background: red;
}

.progress.active {
    background: #28a745;
}

.drag-item {
    background: #FFFFFF;
    box-shadow: 0px 4px 16px rgb(110 120 130 / 12%);
    border-radius: 4px;
    padding: 3px 12px;
    /* border: 1px solid red;*/
}
</style>
