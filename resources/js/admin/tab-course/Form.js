import AppForm from '../app-components/Form/AppForm';

Vue.component('tab-course-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                title_image:  '' ,
                body:  '' ,
                image:  '' ,
                
            }
        }
    }

});