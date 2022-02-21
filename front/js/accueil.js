let marqueur; 


function init(){
    map = L.map('mapDiv').setView([42.607752 , -13.542906],2);
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
    map.doubleClickZoom.disable();
}