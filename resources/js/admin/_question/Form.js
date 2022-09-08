import AppForm from '../app-components/Form/AppForm';

Vue.component('question-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                description: '',
                answer: '',
                marks: 1,
                order: 9999,
                type: 'MCQS',
                link: '',
                unit: '',

            },
            mediaCollections: ['question']
        }
    },
    props: [
        'units'
    ],
});