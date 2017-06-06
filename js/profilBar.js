/*exported profilBar */
"use strict";

window.onclick = function (event) {
    var div = document.getElementById("profilButton");
    if (div !== null) {
        if(event.target !== div && event.target.parentNode !== div) {
            closeBar(div);
        }
    }
};
function closeBar(div) {
    if (document.getElementById("profilButton") !== null) {
        var arrow = div.querySelector(".arrow");
        arrow.classList.remove("arrow-down");
        arrow.classList.add("arrow-up");
        document.getElementById("profilContent").classList.add("hidden");
    }
}
function profilBar(div) {
    if (document.getElementById("profilButton") !== null) {
        var arrow = div.querySelector(".arrow");
        if(arrow.classList.contains("arrow-up")) {
            arrow.classList.remove("arrow-up");
            arrow.classList.add("arrow-down");
            document.getElementById("profilContent").classList.remove("hidden");
        } else {
            closeBar(div);
        }
    }

}
