import AppForm from '../app-components/Form/AppForm';

Vue.component('course-fact-form', {
    mixins: [AppForm],
    props:[
        'courses',
    ],
    data: function() {
        return {
            form: {
                body:  '' ,
                course_id:  '' ,
                
            }
        }
    }

});