<template>
    <section>
        <div class="tasks-wrapper row">
            <div v-for="(option, index) in question.variants" :key="option.id" class="task-wrapper col-sm-6 col-md-4">
                <img
                    :class="{'right': selected[index], 'false': typeof selected[index] === 'boolean' && !selected[index]}"
                    :src="option.image_url"
                    alt="task-image"
                    class="task-img"
                    @click="selectImage(index)">
            </div>
        </div>
    </section>
</template>

<script>
import api from "@/api";
import {mapActions} from "vuex";

export default {
    name: "SelectImagesItem",
    props: {
        question: Object,
    },
    data() {
        return {
            selected: [],
            room_name: null,
        }
    },
    mounted() {
        const {trial_lesson} = route().params;
        this.room_name = trial_lesson;
        console.log()
        if (this.question.correct_user_answers.length > 0) {
            this.correct_user_answers = this.question.correct_user_answers;
            this.correct_user_answers.forEach((item) => {
                let index = this.question.variants.findIndex((variant) => variant.id === item.question_option_id)
                if (index !== -1) {
                    this.checkAnswer(item.question_option, index);
                }
            });
        }
    },
    methods: {
        ...mapActions(['getHomeWorkTasks']),
        selectImage(index) {
            if (typeof this.selected[index] !== 'boolean') {
                let element = this.question.variants[index];
                element.newIndex = index;
                this.checkAnswer(element, index)
                this.interactive(element)
            }

        },
        interactive(element) {
            if (this.room_name) {
                let payload = {
                    trial_lesson: this.room_name,
                    question_id: this.question.id,
                    element
                }
                this.$emit('handle-interactive-control', payload);
            }
        },
        checkAnswer(element, index) {
            let correctUserAnswers = _.map(this.correct_user_answers, 'question_option_id')
            if (!correctUserAnswers.includes(element.id)) {
                api.saveTaskQuestionUserAnswer(element.question_id, {
                    question_option_id: element.id
                });

                const {homeWork} = route().params;
                if (homeWork) {
                    this.getHomeWorkTasks({id: homeWork})
                }
            }

            if (this.question.correct_options.length >= correctUserAnswers.length) {
                if (element.correct) {
                    this.$set(this.selected, index, true);
                    this.$playAudio('/audios/right_audio.mp3')
                } else {
                    this.$set(this.selected, index, false);
                    this.$playAudio('/audios/error.mp3')
                }
            }
        },
        setLaravelEcho() {
            window.Echo.private(`trial.lesson.handle.interactive.${this.room_name}.${this.question.id}`)
                .listen('.trial.lesson.handle.interactive', ({element}) => {
                    this.checkAnswer(element, element.newIndex);
                });
        },
    },
    watch: {
        room_name(value) {
            if (value) this.setLaravelEcho()
        }
    }
}
</script>

<style scoped>
.task-img {
    width: 100%;
    height: 20rem;
    object-fit: cover;
}

.task-wrapper {
    margin-bottom: 1rem;
}

.right {
    border: 0.5rem solid green;
    border-radius: 1rem;
}

.false {
    border: 0.5rem solid red;
    border-radius: 1rem;
}

</style>
