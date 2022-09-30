<template>
    <section>
        <div v-for="question in task.questions">
            <SelectImagesItem :question="question" @handle-interactive-control="handleInteractiveControl"></SelectImagesItem>
        </div>
    </section>
</template>

<script>
import SelectImagesItem from "@/Speedhack/Components/Quiz/SelectImages/SelectImagesItem";
import {mapActions} from "vuex";

export default {
    name: "SelectImages",
    props: {
        task: Object,
    },
    components: {
        SelectImagesItem
    },
    methods: {
        ...mapActions(['handleInteractiveControl']),
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
