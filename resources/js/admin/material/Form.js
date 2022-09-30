import AppForm from '../app-components/Form/AppForm';

Vue.component('material-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                
            }
        }
    }

});