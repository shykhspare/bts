import AppForm from '../app-components/Form/AppForm';

Vue.component('book-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                title: '',
                description: '',
                publisher: '',
                language: 'English',
                author: '',
                enabled: false,
                price: '0.0',
                category: '',
                is_hard: true,
                status: '1',
                online_amount: '0.0',
                ship_amount: '0.0',
                orderNo: 99999,
            },
            mediaCollections: ['books', 'pdf'],
        }
    },
    props: [
        'categories',
        'authors',
    ]

});