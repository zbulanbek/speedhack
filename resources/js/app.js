import InvalidFeedbackInertia from "@/Speedhack/Components/InvalidFeedbackInertia";

require('./bootstrap');

require('moment');

import Vue from 'vue';
import Vuelidate from "vuelidate";
import {InertiaApp, plugin} from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import LaravelValidator from './plugins/laravel-validator';
import {BootstrapVue} from 'bootstrap-vue';
import Helpers from './plugins/Helpers';
import VModal from 'vue-js-modal';
import VueTheMask from 'vue-the-mask';
import store from './store';

import VuePlyr from 'vue-plyr';
import 'vue-plyr/dist/vue-plyr.css';
import ModalSuccess from "@/Speedhack/Components/Details/ModalSuccess";
import Icon from "@/Speedhack/Components/Icon";

const app = document.getElementById('app');


Vue.use(Vuelidate);
Vue.use(plugin);
Vue.use(PortalVue);
Vue.use(BootstrapVue);
Vue.use(VModal);
Vue.use(VueTheMask);
Vue.use(LaravelValidator);
Vue.use(VuePlyr);
Vue.use(Helpers);

Vue.mixin({
    methods: {
        route,
        $openSuccessModal(text) {
            this.$modal.show(ModalSuccess, {
                text: text
            }, {
                width: 450,
                height: 366,
                adaptive: true,
            });
        }
    }
});

Vue.component('video-webinar', require('./Speedhack/Components/VideoWebinar').default);
Vue.component('welcome-layout', require('./Layouts/WelcomeLayout.vue').default);
Vue.component('account-layout', require('./Layouts/AccountLayout.vue').default);
Vue.component('student-layout', require('./Layouts/StudentLayout.vue').default);
Vue.component('teacher-layout', require('./Layouts/TeacherLayout.vue').default);
Vue.component('metodist-layout', require('./Layouts/MetodistLayout.vue').default);
Vue.component('trial-lesson-layout', require('./Layouts/TrialLessonLayout.vue').default);
Vue.component('get-trial-lesson', require('./Speedhack/Components/Details/GetTrialLesson').default);
Vue.component('modal-success', require('./Speedhack/Components/Details/ModalSuccess').default);
Vue.component('modal-form-teacher', require('./Speedhack/Components/Details/ModalFormTeacher').default);
Vue.component('invalid-feedback-inertia', InvalidFeedbackInertia);
Vue.component('icon', Icon);

window.moment = require('moment');
window.moment.locale('ru');

Vue.filter('two_digits', (value) => {
    if (value < 0) {
        return '00';
    }
    if (value.toString().length <= 1) {
        return `0${value}`;
    }
    return value;
});

new Vue({
    store,
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
