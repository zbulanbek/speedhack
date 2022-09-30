import AppForm from '../app-components/Form/AppForm';

Vue.component('purchase-course-class-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                user_id:  '' ,
                course_class_id:  '' ,
                is_approved:  false ,
                
            }
        }
    }

});