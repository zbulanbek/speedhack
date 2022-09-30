<template>
    <section>
        <template v-for="(question, index) in task.questions">
           <div class="item"><b>{{ ++index }}.</b> <insert-words-sentences-item :question="question"></insert-words-sentences-item></div>
        </template>
    </section>
</template>

<script>
import InsertWordsSentencesItem from "@/Speedhack/Components/Quiz/InsertWordsSentences/InsertWordsSentencesItem";

export default {
    name: "InsertWordsSentences",
    props: {
        task: Object,
    },
    components: {
        InsertWordsSentencesItem
    },
}
</script>

