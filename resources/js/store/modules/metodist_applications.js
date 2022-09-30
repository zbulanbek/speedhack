export default {
    state: {
        application: {},
        applications: {},
    },
    mutations: {
        SET_APPLICATION(state, payload) {
            state.application = payload;
        },
        SET_APPLICATIONS(state, {applications}) {
            state.applications = applications;
        },
    },
    actions: {
        setApplication({commit}, value) {
            commit('SET_APPLICATION', value);
        },
        async getMethodistApplications({commit}) {
            const {data} = await window.axios.get(route('api.methodist.applications.index'));
            commit('SET_APPLICATIONS', data);
        },
        async acceptMethodistApplication({commit}, {id}) {
            try {
                await window.axios.patch(route('api.methodist.applications.accept', id));
            } catch (e) {
                throw e
            }
        },
        async updateApplicationMethodistStatus({commit}, {id,methodist_status_id}) {
            try {
                await window.axios.patch(route('api.methodist.applications.update_status', id), {methodist_status_id});
            } catch (e) {
                throw e
            }
        },
    },
    getters: {
        application(state) {
            return state.application;
        },
        applications(state) {
            return state.applications;
        },
    },
};
