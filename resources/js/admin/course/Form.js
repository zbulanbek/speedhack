import AppForm from '../app-components/Form/AppForm';

Vue.component('course-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                author_id:  '' ,
                title:  '' ,
                slug:  '' ,
                text:  '' ,
                image:  '' ,
                body:  '' ,
                duration:  '' ,
                price:  '' ,
                is_visible:  false ,
                course_category_id:  '' ,
                
            }
        }
    }

});