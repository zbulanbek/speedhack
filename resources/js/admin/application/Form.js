import AppForm from '../app-components/Form/AppForm';

Vue.component('application-form', {
    props: {
        applicationStatuses: Array,
        applicationMethodistStatuses: Array,
    },
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                name: '',
                phone: '',
                email: '',
                status_id: '',
                start_time: '',
                methodist_status_id: '',
            }
        }
    },
});
