/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function readUrl(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var imgData = e.target.result;
            var imgName = input.files[0].name;
            input.setAttribute("data-title", imgName);
            console.log(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
