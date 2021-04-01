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
import 'bootstrap/dist/js/bootstrap.min.js';

import 'font-awesome/css/font-awesome.min.css';

import 'jquery-ui/themes/base/all.css';
import { get } from 'jquery';


// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';


// loads the jquery package from node_modules
var $ = require('jquery');
require('jquery-ui/ui/widgets/autocomplete.js');


$(function() {
    $(".add-panier").on("click", function(e) {
        e.preventDefault();
        var id = $(this).attr("id");
        var href = $(this).attr("href");
        
        $.ajax({
            url: href,
            type: "GET",
            data: id,
            success: function(response) {
                $("#myToast").toast({
                    delay: 3000
                });
                $("#myToast").toast('show');
            },
            error: function(error) {

            }
        })
    })

    // $("#select-categorie").on("change", function() {
    //     var categorieToFilter = $("#select-categorie option:selected").text();
    //     var testUrl = $(this).data("href");
        
    //     $.get({
    //         url: testUrl,
    //         data: {"filter": categorieToFilter},
    //         success: function(response) {
    //             $(document).load(response);
    //         }, 
    //         error: function(error) {

    //         }
    //     })
    // })
});