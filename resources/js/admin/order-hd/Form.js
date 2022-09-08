import AppForm from '../app-components/Form/AppForm';

Vue.component('order-hd-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                session_id:  '' ,
                status:  '' ,
                user_id:  '' ,
                name:  '' ,
                email:  '' ,
                phoneno:  '' ,
                address:  '' ,
                company:  '' ,
                amount:  '' ,
                orderNo:  '' ,
                expired_at:  '' ,
                city:  '' ,
                state:  '' ,
                zip:  '' ,
                note:  '' ,
                paid:  false ,
                payment_method:  '' ,
                transaction_no:  '' ,
                transaction_attachment:  '' ,
                
            }
        }
    }

});