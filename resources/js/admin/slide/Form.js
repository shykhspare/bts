import AppForm from '../app-components/Form/AppForm';

Vue.component('slide-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                description: '',

            },
            mediaCollections: ['slide']
        }
    }

});