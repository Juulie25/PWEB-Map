let marqueur; 
let inGame = false;
let listCountry;
let randomElement;

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