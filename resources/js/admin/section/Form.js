import AppForm from '../app-components/Form/AppForm';

Vue.component('section-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                title: '',
                slug: '',
                description: '',
                language: 'English',
                enabled: false,
                mcqs: '',
                author_id: '',
                category_id: '',
                book: '',
                section: '',
                hassection: 0,
            },
            mediaCollections: ['sections'],
        }
    },
    props: [
        'books',
        'sections',
    ]

});