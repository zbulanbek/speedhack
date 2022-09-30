import AppForm from '../app-components/Form/AppForm';

Vue.component('feedback-form', {
    mixins: [AppForm],
    props:[
        'courses',
    ],
    data: function() {
        return {
            form: {
                name:  '' ,
                image:  '' ,
                rate:  '' ,
                text:  '' ,
                course_id:  '' ,
                
            }
        }
    }

});