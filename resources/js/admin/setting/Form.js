import AppForm from '../app-components/Form/AppForm';

Vue.component('setting-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                name: '',
                logo: '',
                footerlogo: '',
                address: '',
                email: '',
                phone: '',
                facebook: '',
                youtube: '',
                instagram: '',
                twitter: '',
                pinterest: '',
                footer: '',
                copyright: '',
                map: '',

            },
            mediaCollections: ['settings'],
        }
    }

});