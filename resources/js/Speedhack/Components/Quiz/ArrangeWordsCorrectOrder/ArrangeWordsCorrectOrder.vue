<template>
    <div>
        <div class="wrap-test">
            <template v-for="(item, index) in task.questions">
                <div class="wrap-item"> <b>{{ index + 1 }}.</b>
                    <ArrangeWordsCorrectOrderItem :id="item.id" :task_id="task.id" :question="item"></ArrangeWordsCorrectOrderItem>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
import ArrangeWordsCorrectOrderItem
    from "@/Speedhack/Components/Quiz/ArrangeWordsCorrectOrder/ArrangeWordsCorrectOrderItem";

export default {
    name: "ArrangeWordsCorrectOrder",
    props: {
        task: Object
    },
    components: {
        ArrangeWordsCorrectOrderItem
    }
}
</script>

<style scoped>

</style>
