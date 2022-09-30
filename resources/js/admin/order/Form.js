import AppForm from '../app-components/Form/AppForm';

Vue.component('order-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                number:  '' ,
                user_id:  '' ,
                paid:  false ,
                status:  '' ,
                total:  '' ,
                
            }
        }
    }

});