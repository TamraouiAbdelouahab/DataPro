import $ from 'jquery';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

import select2 from 'select2';
import 'select2/dist/css/select2.min.css';

select2();

$(document).ready(function() {
    console.log('jQuery et Select2 sont chargés');

    $('#tags').select2({
        placeholder: "Choisissez des options",
        allowClear: true,
        theme: "classic",
        
    });
});
