require('./bootstrap');

var Turbolinks = require("turbolinks")
Turbolinks.start()

$(document).on('turbolinks:load', function (){
  //dropdown menu
  $('.dropdown-toggle').dropdown();

});