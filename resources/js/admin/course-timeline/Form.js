import AppForm from '../app-components/Form/AppForm';

Vue.component('course-timeline-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                course_id:  '' ,
                model_id:  '' ,
                model_type:  '' ,
                sequence:  '' ,
                
            }
        }
    }

});