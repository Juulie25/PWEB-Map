let marqueur; 
let inGame = false;
let listCountry;
let randomElement;
var popup = L.popup();
let answer;
let score;
let playedCoutry;
let life;

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

}

function nextBtn() {
    document.getElementById("play").innerHTML+= "<button type=\"button\" class=\"btn btn-info\" id=\"passe\">Next</button>"
    document.getElementById("passe").addEventListener("click", function(){
        nextCountry(true);
    }, false);
    console.log("----------init--------------")
    console.log(document.getElementById("passe"))
    document.getElementById("nvlPartie").addEventListener("click", restart)
    //doc.removeEventListener('click', nextBtn);
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
    console.log("azertyuiop")
    map.on('click', onMapClick);
    document.getElementById("nvlPartie").removeEventListener('click', btnPlay)
    
    console.log(listCountry)
    
    
}

function mistake() {
    
    if (life <= 0) {
        console.log("looooose");
        
        restart();
    } else {
        life--
    }
}

function nextCountry(passed) {
    
    if (passed) {
        console.log('next')
        setScore(false)
    }
    
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
    console.log('al')
    
}