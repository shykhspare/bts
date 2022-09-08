import AppListing from '../app-components/Listing/AppListing';

Vue.component('question-listing', {
    mixins: [AppListing],
    data() {
        return {
            showUnitFilter: false,
            unitsMultiselect: {},

            filters: {
                units: [],

            },
        }
    },

    watch: {
        showunitsFilter: function (newVal, oldVal) {
            this.unitsMultiselect = [];
        },
        unitsMultiselect: function (newVal, oldVal) {
            this.filters.units = newVal.map(function (object) { return object['key']; });
            this.filter('units', this.filters.units);
        },


    }
});