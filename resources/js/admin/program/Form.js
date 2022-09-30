import AppForm from '../app-components/Form/AppForm';

Vue.component('program-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                homeworks:  '' ,
                course_id:  '' ,
                
            }
        }
    }

});