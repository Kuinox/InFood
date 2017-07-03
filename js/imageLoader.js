/*exported init*/
"use strict";
window.window.imageLoader = {};
function getProductId() {
    var get = window.location.href;
    get = get.split("/");
    get.shift();
    get.shift();
    get.shift();
    get.shift();
    get = get[0].split("#")[0].split("?");
    if (get.length > 1) {
        get = get[1].split("&");
        for (var i = 0; i<get.length; i++) {
            if (get[i].indexOf("id") > -1) {
                return get[i].split("=")[1];
            }
        }
    }
    return false;
}

function displayImage(json) {
    var product = JSON.parse(json).product;
    try {
        var images = product.selected_images;
        for (var image in images) {
            var divs = document.getElementsByClassName(image+"_image");
            for (var i=0; i<divs.length; i++) {
                var image_lang = images[image].display;
                for(var lang in image_lang) {
                    divs[i].src = image_lang[lang];
                }
            }
        }
        var imgs = document.getElementsByTagName("img");
        var elem;
        var to_remove = [];
        for (var y=0; y<imgs.length; y++) {
            elem = imgs[y];
            if(elem.src.indexOf("default.svg") >-1) {
                to_remove.push(elem);
            }
        }
        for (y=0; y<to_remove.length; y++) {
            to_remove[y].parentNode.removeChild(to_remove[y]);
        }

    } catch(e) {
        console.log(e);
    }
}

function loadJSONData(url) {
    var xhr = new XMLHttpRequest(); //instancie l'objet xhr
    xhr.onreadystatechange = function() {//Call a function when the state changes.
        if(xhr.readyState === 4 && xhr.status === 200) {
            displayImage(xhr.responseText);
        } else if (xhr.status !== 200){
            console.log("Communication Error"+xhr.status);
        }
    };
    xhr.open("GET", url); //ouvre la connexion
    xhr.send(); //envoie
}
function init() {
    var api;
    var product_id = getProductId();
    if (product_id === false) {
        var imgs = document.getElementsByTagName("img");
        var elem;
        for (var y=0; y<imgs.length; y++) {
            elem = imgs[y];
            if(elem.src.indexOf("default.svg") >-1) {
                api = "http://world.openfoodfacts.org/api/v0/product/"+elem.id+".json";
            }
        }
    } else {
        api = "http://world.openfoodfacts.org/api/v0/product/"+product_id+".json";
        loadJSONData(api);
    }

}