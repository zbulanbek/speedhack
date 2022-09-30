import AppForm from '../app-components/Form/AppForm';

Vue.component('course-case-form', {
    mixins: [AppForm],
    props:[
        'courses',
    ],
    data: function() {
        return {
            form: {
                title:  '' ,
                subtitle:  '' ,
                course_id:  '' ,
                
            }
        }
    }

});