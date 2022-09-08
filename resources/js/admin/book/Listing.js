import AppListing from '../app-components/Listing/AppListing';

Vue.component('book-listing', {
    mixins: [AppListing],
    data() {
        return {
            showCategorieFilter: false,
            categorieMultiselect: {},
            showAuthorsFilter: false,
            authorsMultiselect: {},
            filters: {
                categories: [],
                authors: [],
            },
        }
    },

    watch: {
        showCategorieFilter: function (newVal, oldVal) {
            this.categoriesMultiselect = [];
        },
        categoriesMultiselect: function (newVal, oldVal) {
            this.filters.categories = newVal.map(function (object) { return object['key']; });
            this.filter('categories', this.filters.categories);
        },

        showAuthorsFilter: function (newVal, oldVal) {
            this.authorsMultiselect = [];
        },
        authorsMultiselect: function (newVal, oldVal) {
            this.filters.authors = newVal.map(function (object) { return object['key']; });
            this.filter('authors', this.filters.authors);
        }
    }
});