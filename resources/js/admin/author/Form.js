import AppForm from '../app-components/Form/AppForm';

Vue.component('author-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                name: '',
                slug: '',
                description: '',
                enabled: false,

            },
            mediaCollections: ['authors']
        }
    }

});