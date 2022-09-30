import Vue from 'vue';
export default {
    state: {
        methodist_statuses: []
    },
    mutations: {
        SET_METHODIST_STATUSES(state, { methodist_statuses }) {
            state.methodist_statuses = methodist_statuses;
        },

    },
    actions: {
        async getMethodistStatuses ({ commit }) {
            const { data } = await window.axios.get(route('api.list.methodist-statuses'))
            commit('SET_METHODIST_STATUSES', data);
        },

    },
    getters: {
        methodist_statuses(state) {
            return state.methodist_statuses;
        },
    },
};
