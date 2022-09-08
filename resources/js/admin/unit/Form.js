import AppForm from '../app-components/Form/AppForm';

Vue.component('unit-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                title: '',
                slug: '',
                description: '',
                enabled: false,
                mcqs: '',
                order: '',
                section: '',

            }
        }
    },
    props: [
        'sections',
    ]

});