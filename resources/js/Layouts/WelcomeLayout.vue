<template>
    <section class="page-wrap">
        <slot></slot>
        <footer-main></footer-main>

        <modal name="getTrialLesson"
            :width="450"
            :height="499"
            :adaptive="true">
            <get-trial-lesson></get-trial-lesson>
        </modal>


         <modal name="formReguestTeacher"
            :width="450"
            :height="499"
            :adaptive="true">
            <modal-form-teacher></modal-form-teacher>
        </modal>
    </section>
</template>

<script>
import FooterMain from '@/Speedhack/Components/Details/Footer';

export default {
    components: {
        FooterMain,
    },
    data() {
        return {
            success_text: "Ваша заявка успешно отправлена"
        }
    },
    methods: {

    },
}
</script>
