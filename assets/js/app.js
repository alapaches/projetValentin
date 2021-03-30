// assets/js/app.js
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

import 'bootstrap/dist/css/bootstrap.min.css';

import 'font-awesome/css/font-awesome.min.css';

import 'jquery-ui/themes/base/all.css';


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';


// loads the jquery package from node_modules
var $ = require('jquery');
require('jquery-ui/ui/widgets/autocomplete.js');


$(function() {
    $("#search-produit").autocomplete({
        
    });
});