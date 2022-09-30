async function getTaskQuestionsCorrectAnswers(ids) {
    const {data} = await window.axios.get(window.route('api.tasks.questions.correct-options'), {
        params: {
            ids
        }
    });
    return data;
}

async function saveTaskQuestionUserAnswer(question, payload) {
    await window.axios.post(window.route('api.tasks.questions.user-answer', question), payload);
}

export default {
    getTaskQuestionsCorrectAnswers,
    saveTaskQuestionUserAnswer
}
