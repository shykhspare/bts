import AppForm from '../app-components/Form/AppForm';

Vue.component('user-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                email:  '' ,
                phone:  '' ,
                cnic:  '' ,
                gender:  '' ,
                country:  '' ,
                province:  '' ,
                district:  '' ,
                professional:  '' ,
                address:  '' ,
                email_verified_at:  '' ,
                password:  '' ,
                active:  false ,
                
            }
        }
    }

});