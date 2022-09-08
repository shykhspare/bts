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
                paid: 1,
                explanation: '',
                test_id: '',

            },
            mediaCollections: ['question', 'answer_attachment'],
            mediaWysiwygConfig: {
                autogrow: true,
                semantic: false,
                imageWidthModalEdit: true,
                btnsDef: {
                    image: {
                        dropdown: ['insertImage', 'upload', 'base64'],
                        ico: 'insertImage'
                    },
                    align: {
                        dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                        ico: 'justifyLeft'
                    }
                },
                btns: [
                    ['fontfamily'],
                    ['formatting'],
                    ['fontsize'],
                    ['undo', 'redo'],
                    ['strong', 'em', 'del', 'underline'],
                    ['align'],
                    ['unorderedList', 'orderedList', 'table'],
                    ['foreColor', 'backColor'],
                    ['link', 'noembed', 'image'],
                    ['preformatted'],
                    ['template'],
                    ['fullscreen', 'viewHTML'],
                    ['horizontalRule'],
                    ['removeformat'],
                ],


                plugins: {
                    fontfamily: {
                        fontList: [
                            { name: 'Arial', family: 'Arial, Helvetica, sans-serif' },
                            { name: 'Arial Black', family: 'Arial Black, Gadget, sans-serif' },
                            { name: 'Comic Sans', family: 'Comic Sans MS, Textile, cursive, sans-serif' },
                            { name: 'Courier New', family: 'Courier New, Courier, monospace' },
                            { name: 'Georgia', family: 'Georgia, serif' },
                            { name: 'Impact', family: 'Impact, Charcoal, sans-serif' },
                            { name: 'Lucida Console', family: 'Lucida Console, Monaco, monospace' },
                            { name: 'Lucida Sans', family: 'Lucida Sans Uncide, Lucida Grande, sans-serif' },
                            { name: 'Palatino', family: 'Palatino Linotype, Book Antiqua, Palatino, serif' },
                            { name: 'Tahoma', family: 'Tahoma, Geneva, sans-serif' },
                            { name: 'Times New Roman', family: 'Times New Roman, Times, serif' },
                            { name: 'Trebuchet', family: 'Trebuchet MS, Helvetica, sans-serif' },
                            { name: 'Verdana', family: 'Verdana, Geneva, sans-serif' },
                            { name: 'جمیل  نورانی ', family: 'JJameel Noori Kasheeda Regular' },
                        ]
                    }
                }


            },
        }
    },
    props: [
        'units',

    ],
});