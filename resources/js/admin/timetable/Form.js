import AppForm from '../app-components/Form/AppForm';

Vue.component('timetable-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});