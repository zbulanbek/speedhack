import Vue from "vue";

export default {
    state: {
        homeWork: {},
        homeWorkScore: 0,
        homeWorkTasks: [],
        homeWorkTaskScore: [],
        homeWorkTaskCorrectAnswersCount: [],
    },
    mutations: {
        SET_HOME_WORK_TASK_CORRECT_ANSWERS_COUNT({homeWorkTaskCorrectAnswersCount}, {tasks}) {
            tasks.forEach((task) => {
                Vue.set(homeWorkTaskCorrectAnswersCount, task.id, task.correct_user_question_answers.length);
            });
        },
        SET_HOME_WORK_TASK_SCORE({homeWorkTaskScore}, {tasks}) {
            tasks.forEach((task) => {
                Vue.set(homeWorkTaskScore, task.id, task.score);
            });
        },
        SET_HOME_WORK_SCORE(state, {tasks}) {
            state.homeWorkScore = _.sumBy(tasks, 'score');
        }
    },
    actions: {
        async getHomeWorkTasks({commit}, {id}) {
            const {data} = await window.axios.get(route('account.home-works.tasks', id));
            commit('SET_HOME_WORK_TASK_CORRECT_ANSWERS_COUNT', data);
            commit('SET_HOME_WORK_TASK_SCORE', data);
            commit('SET_HOME_WORK_SCORE', data);
        },
    },
    getters: {
        homeWorkTaskCorrectAnswersCount(state) {
            return state.homeWorkTaskCorrectAnswersCount;
        },
        homeWorkScore(state) {
            return state.homeWorkScore;
        },
        homeWorkTaskScore(state) {
            return state.homeWorkTaskScore;
        },
    },
};
