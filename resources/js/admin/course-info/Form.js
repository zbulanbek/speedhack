import AppForm from '../app-components/Form/AppForm';

Vue.component('course-info-form', {
    mixins: [AppForm],
    props:[
        'courses',
    ],
    data: function() {
        return {
            form: {
                title:  '' ,
                body:  '' ,
                image:  '' ,
                course_id:  '' ,
                
            }
        }
    }

});