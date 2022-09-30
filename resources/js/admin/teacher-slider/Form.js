import AppForm from '../app-components/Form/AppForm';

Vue.component('teacher-slider-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                category:  '' ,
                color:  '' ,
                image:  '' ,
                course:  '' ,
                name:  '' ,
                
            }
        }
    }

});