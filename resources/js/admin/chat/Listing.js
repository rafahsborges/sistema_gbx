import AppListing from '../app-components/Listing/AppListing';

Vue.component('chat-listing', {
    mixins: [AppListing],
    props: ['messages'],
});
