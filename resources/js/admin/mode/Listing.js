import AppListing from '../app-components/Listing/AppListing';
import Notice from '@/admin/mode/Components/Notice';

Vue.component('mode-listing', {
    mixins: [AppListing],
    components: { 
        Notice,
    },
});