/*exported profilBar */
"use strict";

window.onclick = function (event) {
    var div = document.getElementById("profilButton");
    if(event.target !== div ) {
        closeBar(div);
    }
};
function closeBar(div) {
    div.classList.add("menuButtonClosed");
    div.classList.remove("menuButtonOpened");
    div.classList.add("menuContentClosed");
    div.classList.remove("menuContentOpened");

}
function profilBar(div) {
    if(div.classList.contains("menuButtonClosed")) {
        div.classList.add("menuButtonOpened");
        div.classList.remove("menuButtonClosed");
        div.classList.add("menuContentOpened");
        div.classList.remove("menuContentClosed");
    } else {
        closeBar(div);
    }
}
