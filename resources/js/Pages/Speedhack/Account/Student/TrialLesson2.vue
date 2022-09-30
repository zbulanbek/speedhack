<template>
    <section class="bg-account">
        <div class="trial-lesson">
            <lesson-modal></lesson-modal>
        </div>

    </section>
</template>
<script>
import LessonModal from '@/Speedhack/Components/Account/LessonModal2';

export default {
    components: {
        LessonModal
    },
}
</script>
<style scoped>
.bg-account {
    background: #fff;
    width: 100%;
    height: 100%;
}

.trial-lesson {
    /*padding:16px 20px;*/
    height: 100vh;
    background-color: #fff;
}
</style>
