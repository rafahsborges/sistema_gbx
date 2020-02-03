import AppForm from '../app-components/Form/AppForm';

Vue.component('status-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nome:  '' ,
                
            }
        }
    }

});