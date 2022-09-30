import AppForm from '../app-components/Form/AppForm';

Vue.component('course-category-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                
            }
        }
    }

});