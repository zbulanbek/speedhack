import AppForm from '../app-components/Form/AppForm';

Vue.component('certificate-form', {
    mixins: [AppForm],
    props:[
        'courses',
    ],
    data: function() {
        return {
            form: {
                title:  '' ,
                image:  '' ,
                body:  '' ,
                course_id:  '' ,
                
            }
        }
    }

});