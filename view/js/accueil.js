let marqueur; 
let inGame = false;
let listCountry;
let randomElement;
var popup = L.popup();
let answer;
let score;
let playedCoutry;
let life;
let border;

let countriesList_EU = "http://localhost/PWEB-Map/map/countries-EU.json"
let countriesList_Monde = "http://localhost/PWEB-Map/map/countries-FR.json";
let choosenList = countriesList_Monde;

function init(){
    map = L.map('mapDiv').setView([42.607752 , -13.542906],2);
    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}{r}.png',{ maxZoom: 15, noWrap: true }).addTo(map);
    map.doubleClickZoom.disable();
    const doc =  document.getElementById("nvlPartie");
    doc.innerText = "Commencer une nouvelle partie"
    doc.addEventListener('click', btnPlay);
    score = 0;
    life = 3;
    playedCoutry = ['aa', 'bb'];
    doc.addEventListener('click', nextBtn); 
    selecteCountries();
    
    /*let tab = equipements.features[15].geometry.coordinates  ------
    tab.forEach(function(e) { e.forEach( function(f) { 
        var polygonPoint = f; 
        var poly = L.polygon(polygonPoint).addTo(map);
        console.log(poly);
    }) });

   var polygonPoints = [
        [37.786617, -122.404654],
        [37.797843, -122.407057],
        [37.798962, -122.398260],
        [37.794299, -122.395234]];
      var poly = L.polygon(equipements.features[15].geometry.coordinates).addTo(map); -------
*/  
      
      //equipements.features[15].geometry.coordinates
}

function nextBtn() {
    document.getElementById("play").innerHTML+= "<button type=\"button\" class=\"btn btn-info\" id=\"passe\">Next</button>"
    document.getElementById("passe").addEventListener("click", function(){
        nextCountry(true);
    }, false);
    
    document.getElementById("nvlPartie").addEventListener("click", restart)
    //doc.removeEventListener('click', nextBtn);
}

function selecteCountries() {
    //doc.getElementById("choix").addEventListener("")

    const radios = document.querySelectorAll('input[name="drone"]')
    
    for (const radio of radios) {
        radio.onclick = (e) => {
            
            switch(radio.value) {
                case 'monde':
                    choosenList = countriesList_Monde;
                    break;
                case 'europe':
                    choosenList = countriesList_EU;
                    console.log('eu')
                    break;
                default:
                    choosenList = countriesList_Monde;
            }           

            restart()

        }
      }
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
                let success;
                if (answer == randomElement || answer.includes(randomElement) || randomElement.includes(answer))  {
                    success = true;
                    setScore(success)
                    nextCountry(false);
                    console.log(score)
                    
                } else {
                    success = false;
                   setScore(success);
                }
            }
        });    
}

function setScore(success) {

    if (success) {
        score++;
        life = 3;
    } else {
        mistake(); 
    }

    console.log(answer)
    console.log(randomElement)
    let number = document.getElementById("scc")
    const para = document.createElement("p");
    para.setAttribute('id','scc');
    para.style.textAlign= "center"; 
    para.innerText = "score: " + score + "    vie restante: " + life;

    if (number != undefined) {
        let score = document.getElementById("score")
        score.removeChild(number);
    }
    
    const element = document.getElementById("score");
    
    element.appendChild(para);
    
}

function restart() {
    
    

    score = -1;
    setScore(true);
    let number = document.getElementById("scc");
    document.getElementById("ques").innerText = "";

    if (number != null) {
        number.remove()
    }
    nextCountry(false);
    playedCoutry = ['aa', 'bb']
}

function btnPlay() {
    
    document.getElementById("nvlPartie").innerText = "Recommencer une partie"
    nextCountry(false);

    map.on('click', onMapClick);
    document.getElementById("nvlPartie").removeEventListener('click', btnPlay)
    

    
    
}

function mistake() {
    
    if (life <= 0) {
        restart();
    } else {
        life--
    }
}

function nextCountry(passed) {
    
    if (passed) {
        setScore(false)
    }
    
    do {
        $.ajax({
            type: "GET",
            url: choosenList,
            async: false,
            success : function(result) {
                listCountry = result
            randomElement = listCountry[Math.floor(Math.random() * listCountry.length)].name.trim();
            }
        });
    } while (playedCoutry.includes(randomElement))
    
    /*$.ajax({
        type: "GET",
        url: "http://localhost/PWEB-Map/map/countries.geojson",
        async: false,
        success : function(result) {
            border = result
            polCollection = L.polygon(border)
            console.log(polCollection)

            for (layer of polCollection) {
                bounds = layer.getBounds()
            }

        }
    });*/

    playedCoutry.push(randomElement);
    document.getElementById("ques").innerText = "Essayer de placer le pays suivant sur la carte " + randomElement;
    randomElement = randomElement.toUpperCase()
    
}