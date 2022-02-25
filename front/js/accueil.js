let marqueur; 
let inGame = false;
let listCountry;
let randomElement;
var popup = L.popup();

function init(){
    map = L.map('mapDiv').setView([42.607752 , -13.542906],2);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}{r}.png',{ maxZoom: 15 }).addTo(map);
    map.doubleClickZoom.disable();
    let doc =  document.getElementById("nvlPartie");
    doc.addEventListener("click", btnPlay);
}

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Vous avez cliqué au coordonées: " + e.latlng.toString())
        .openOn(map);
} 



function btnPlay() {
    inGame = true
    document.getElementById("nvlPartie").innerText = "Recommencer une partie"

    document.getElementById("ques").innerText = "Essayer de placer le pays suivant sur la carte "+ getCountryName()
    map.on('click', onMapClick);
    //console.log(listCountry)
}

function getCountryName() {
    return getCountryAll()

}

function getCountryAll() {
    $.getJSON("http://localhost/chezmoi/countries-FR.json", function(result) {
        listCountry = result
        
        randomElement = listCountry[Math.floor(Math.random() * listCountry.length)];

        
    });
    return randomElement.name
}