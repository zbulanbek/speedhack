import Vue from 'vue';
import Vuex from 'vuex';

import test from './modules/test';
import list from './modules/list';
import metodist_applications from './modules/metodist_applications';
import trial_lessons from './modules/trial_lessons';
import home_works from './modules/home_works';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        list,
        test,
        home_works,
        trial_lessons,
        metodist_applications,
    },
});
