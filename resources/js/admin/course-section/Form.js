import AppForm from '../app-components/Form/AppForm';

Vue.component('course-section-form', {
    mixins: [AppForm],
    props: {
        courses: Array
    },
    data: function() {
        return {
            form: {
                course_id:  '' ,
                title:  '' ,

            }
        }
    }

});
