import Vue from 'vue';


window.axios = require('axios');

import PerformAssessment from "./PerformAssessment";

new Vue({
    el: '#assessment',
    components: {
        'perform-assessment': PerformAssessment
    }

})
