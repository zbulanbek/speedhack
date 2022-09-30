<template>
    <div class="programs">
        <div class="row">
            <template v-for="item in block.classes">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <course-class-item :item="item" :column="false"></course-class-item>
                </div>
            </template>
        </div>
    </div>
</template>
<script>
import CourseClassItem from "@/Speedhack/Components/Courses/CourseClassItem";

export default {
    props: {
        block: Object,
    },
    components: {
        CourseClassItem
    },
}
</script>
<style scoped>
.programs {
    padding: 0px 25px;
}
</style>
