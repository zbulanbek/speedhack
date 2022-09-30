<template>
    <div>
        <div class="row mine-row">
            <template v-for="(question, index) in task.questions">
                <div class="col-md-4 col-lg-4 col-12 mine-col">
                    <div class="wrap-test-item">
                        <ImageSelectItem :question="question"  @handle-interactive-control="handleInteractiveControl"></ImageSelectItem>
                    </div>
                </div>
            </template>
        </div>
    </div>
</template>
<script>
import ImageSelectItem from "@/Speedhack/Components/Quiz/ImageSelect/ImageSelectItem";
import {mapActions} from "vuex";

export default {
    props: {
        task: Object,
    },
    components: {
        ImageSelectItem,
    },
    methods: {
        ...mapActions(['handleInteractiveControl']),
    }
}
</script>
<style scoped>
 .mine-col{
        padding-left: 8px;
        padding-right: 8px;
    }
    .mine-row{
        margin-right: -8px;
        margin-left: -8px;
    }
</style>
