import AppForm from '../app-components/Form/AppForm';

Vue.component('course-class-form', {
    mixins: [AppForm],
    props:[
        'courses',
    ],
    data: function() {
        return {
            form: {
                count:  '' ,
                course_id:  '' ,
                price:  '' ,
                sale:  '' ,
                class_price:  '' ,
                title:  '' ,
                percent:  '' ,
                text:  '' ,
                
            }
        }
    }

});