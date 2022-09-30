import AppForm from '../app-components/Form/AppForm';

Vue.component('lesson-form', {
    mixins: [AppForm],
    props: {
        courseSections: Array,
    },
    data: function() {
        return {
            form: {
                course_section_id:  '' ,
                description:  '' ,
                duration_minute:  '' ,
                level:  '' ,
                title:  '' ,
            },
            mediaCollections: ['materials','video'],
        }
    }

});
