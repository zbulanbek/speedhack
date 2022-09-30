import AppForm from '../app-components/Form/AppForm';
import ModeUpdate from '@/admin/mode/Components/ModeUpdate';
import ModeCreate from '@/admin/mode/Components/ModeCreate';

Vue.component('mode-form', {
    mixins: [AppForm],
    components: { 
        ModeUpdate,
        ModeCreate
    },
    data: function() {
        return {
            form: {
                user_id:  '' ,
                monday:  '' ,
                tuesday:  '' ,
                wednesday:  '' ,
                thursday:  '' ,
                friday:  '' ,
                saturday:  '' ,
                sunday:  '' ,
             },
           
        }
    },
});