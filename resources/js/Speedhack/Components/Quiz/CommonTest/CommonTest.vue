<template>
    <div class="example">
        <div class="question-wrap" v-for="(question, index) in task.questions">
            <span class="question-title">{{ index + 1 }}. {{ question.question }}</span>
            <common-test-item :question="question" @handle-interactive-control="handleInteractiveControl"></common-test-item>
        </div>
    </div>
</template>

<script>
import CommonTestItem from "@/Speedhack/Components/Quiz/CommonTest/CommonTestItem";
import {mapActions} from "vuex";

export default {
    name: "CommonTest",
    props: {
        task: {
            type: Object,
            required: true,
        },
    },
    components: {
        CommonTestItem
    },
    methods: {
        ...mapActions(['handleInteractiveControl']),
    }
}
</script>

<style scoped>

.question-right {
    color: green;
}

.question-false {
    color: red;
}

.question-wrap {
    margin-bottom: 10px;
}

.question-title {
    display: inline-block;
    margin-bottom: 10px;
    font-size: 16px;
    font-family: "Inter", sans-serif;
}

.question-inputs {
    display: block;
}

.question-inputs div {
    display: block;
}

.custom-radio{
    font-family: "Inter", sans-serif;
}

.custom-control-label{
    font-family: "Inter", sans-serif;
    font-size: 16px;
    margin-bottom: 6px;
}

.custom-control-label::before,
.custom-control-label::after{
    top: 0.45rem;
}

.custom-control-label.question-false{

}

.custom-control-input:checked ~ .custom-control-label.question-false::before{
    border-color: red;
    background-color: red;
}
</style>
