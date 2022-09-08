import AppForm from '../app-components/Form/AppForm';

Vue.component('comment-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                comment:  '' ,
                user_id:  '' ,
                status:  '' ,
                question_id:  '' ,
                
            }
        }
    }

});