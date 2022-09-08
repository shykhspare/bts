import AppForm from '../app-components/Form/AppForm';

Vue.component('test-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  '' ,
                slug:  '' ,
                description:  '' ,
                language:  '' ,
                enabled:  false ,
                price:  '' ,
                date:  '' ,
                announce_date:  '' ,
                last_date:  '' ,
                
            }
        }
    }

});