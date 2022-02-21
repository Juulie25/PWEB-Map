let marqueur; 
let inGame = false;

function init(){
    map = L.map('mapDiv').setView([42.607752 , -13.542906],2);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
    map.doubleClickZoom.disable();

    let doc =  document.getElementById("nvlPartie");
    doc.addEventListener("click", btnPlay);
}

function btnPlay() {
    inGame = true
    document.getElementById("nvlPartie").innerText = "Recommencer une partie"

    document.getElementById("ques").innerText = "Essayer de placer le pays suivant sur la carte "+ getCountryName()
    let data;
    $.getJSON("http://localhost/chezmoi/countries-FR.json", function(result) {
        console.log(result)
    });
    console.log(data)
}

function getCountryName() {

}