let marqueur; 
let inGame = false;
let listCountry;
let randomElement;
var popup = L.popup();
let answer;
let score;
let playedCoutry;

function init(){
    map = L.map('mapDiv').setView([42.607752 , -13.542906],2);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}{r}.png',{ maxZoom: 15 }).addTo(map);
    map.doubleClickZoom.disable();
    let doc =  document.getElementById("nvlPartie");
    doc.addEventListener("click", btnPlay);
    score = 0;
    playedCoutry = ['aa', 'bb'];
}

function onMapClick(e) {
    //recherche le pays sur lequel on a clické
    //Requete AJAX pour récupérer les infos du pays sur le point où on a cliqué (lati, longi)
        $.ajax({
            type: 'GET',
            url: "http://nominatim.openstreetmap.org/reverse?&accept-language=en",
            dataType: 'jsonp',
            jsonpCallback: 'data',
            data: { format: "json", limit: 1,lat: e.latlng.lat,lon: e.latlng.lng,json_callback: 'data' },
            error: function(xhr, status, error) {
                alert("ERROR "+error);
            },
            success: function(data){
                //récupérer les coordonnées (lati, longi) du pays dans les données json provenant du serveur
                
                answer = data.address.country.trim().toUpperCase();
                if (answer == randomElement)  {
                    
                    score++;
                    let number = document.getElementById("scc")
                    const para = document.createElement("p");
                    para.setAttribute('id','scc');
                    para.style.textAlign= "center"; 
                    para.innerText = score;
                    console.log(number)

                    if (number != undefined) {
                        let score = document.getElementById("score")
                        score.removeChild(number);
                    }
                    
                    const element = document.getElementById("score");
                    
                    element.appendChild(para);

                    nextCountry();
                    console.log(score)
                } else {
                    console.log("Essaie encore")
                    console.log(answer)
                    console.log(randomElement)
                }
            }
        });    
}



function btnPlay() {
    inGame = true
    document.getElementById("nvlPartie").innerText = "Recommencer une partie"
    nextCountry();

    map.on('click', onMapClick);
    //console.log(listCountry)
}

function nextCountry() {
    do {
        $.ajax({
            type: "GET",
            url: "http://localhost/PWEB-Map/map/countries-FR.json",
            async: false,
            success : function(result) {
                listCountry = result
            randomElement = listCountry[Math.floor(Math.random() * listCountry.length)].name.trim();
            }
        });
    } while (playedCoutry.includes(randomElement))
    playedCoutry.push(randomElement);
    document.getElementById("ques").innerText = "Essayer de placer le pays suivant sur la carte " + randomElement;
    randomElement = randomElement.toUpperCase()
    
    
}