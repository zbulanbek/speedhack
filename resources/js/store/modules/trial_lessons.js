export default {
    state: {
        //
    },
    mutations: {
        //
    },
    actions: {
        async handleInteractiveControl({commit}, {trial_lesson, element, question_id}) {
            try {
                await window.axios.post(route('trial-lessons.handle.interactive', trial_lesson), {element, question_id});
            } catch (e) {
                throw e
            }
        },
        async taskAnswersHandleChange({commit}, {trial_lesson, element, task_id}) {
            try {
                await window.axios.post(route('trial-lessons.task.correct-options.handle.change', trial_lesson), {element, task_id});
            } catch (e) {
                throw e
            }
        },
    },
    getters: {
        //
    },
};
