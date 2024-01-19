ymaps.ready(initMap);
var myMap;
var userLatitude;
var userLongitude;


function initMap() {
    myMap = new ymaps.Map("map", {
        center: [55.73453, 37.63573],
        zoom: 10,
        controls: ["geolocationControl"]
    }, {
        searchControlProvider: 'yandex#search'
    });

    getUserLocation();
    addLowPoints(myMap);
    addMidPoints(myMap);
    addMaxPoints(myMap);

    console.log("-------Hints added-------")
}


function addLowPoints(map) {
    var element = document.getElementById("1");
    if (element != null) {
        var jsonData = document.getElementById("1").getAttribute("data");
        var data = JSON.parse(jsonData);
        data.forEach(function (item) {
            var capacity = item.Name.split(",")[1];
            var number = item.Name.split(",")[0];
            var placemark = new ymaps.Placemark([item.Latitude, item.Longitude], {
                balloonContentHeader: number,
                balloonContentBody: "<img src=\"img/lowCharger.png\" alt=\"\" class=\"img\"> <br> Мощность: " + capacity,
                balloonContentFooter: "Административный округ: " + item.AdmArea + "<br>Район: " + item.District + "<br><b>Адрес:</b> <br>" + item.Address + "<br><button id=\"getRoute\" onclick=\" getRoute(" + item.Latitude + "," + item.Longitude + ")\"class=\"applyBtn btn btn-sm btn-success\">Построить маршрут</button>",
                hintContent: item.Name,
            }, {
                preset: 'islands#yellowAutoCircleIcon',
                hideIconOnBalloonOpen: false
            });
            placemark.events.add('mouseenter', function (e) {

                e.get('target').options.set('preset', 'islands#greenAutoCircleIcon');
            })
                .add('mouseleave', function (e) {
                    e.get('target').options.set('preset', 'islands#yellowAutoCircleIcon');
                });
            map.geoObjects.add(placemark);
        });
    }
    else {
        return;
    }
}

function addMidPoints(map) {
    var element = document.getElementById("2");
    if (element != null) {
        var jsonData = document.getElementById("2").getAttribute("data");
        var data = JSON.parse(jsonData);
        data.forEach(function (item) {
            var capacity = item.Name.split(",")[1];
            var number = item.Name.split(",")[0];
            var placemark = new ymaps.Placemark([item.Latitude, item.Longitude], {
                balloonContentHeader: number,
                balloonContentBody: "<img src=\"img/midCharger.png\" alt=\"\" class=\"img\"> <br><b>Мощность: " + capacity + "</b>",
                balloonContentFooter: "Административный округ: " + item.AdmArea + "<br>Район: " + item.District + "<br><b>Адрес:</b> <br>" + item.Address + "<br><button id=\"getRoute\" onclick=\" getRoute(" + item.Latitude + "," + item.Longitude + ")\"class=\"applyBtn btn btn-sm btn-success\">Построить маршрут</button>",
                hintContent: item.Name,
            }, {
                preset: 'islands#orangeAutoCircleIcon',
                hideIconOnBalloonOpen: false
            });
            placemark.events.add('mouseenter', function (e) {

                e.get('target').options.set('preset', 'islands#greenAutoCircleIcon');
            })
                .add('mouseleave', function (e) {
                    e.get('target').options.set('preset', 'islands#orangeAutoCircleIcon');
                });
            map.geoObjects.add(placemark);
        });
    }
    else {
        return;
    }
}

function addMaxPoints(map) {
    var element = document.getElementById("3");
    if (element != null) {
        var jsonData = document.getElementById("3").getAttribute("data");
        var data = JSON.parse(jsonData);

        data.forEach(function (item) {
            var capacity = item.Name.split(",")[1];
            var number = item.Name.split(",")[0];
            var placemark = new ymaps.Placemark([item.Latitude, item.Longitude], {
                balloonContentHeader: number,
                balloonContentBody: "<img src=\"img/fastCharger.png\" alt=\"\" class=\"img\"> <br>Мощность: " + capacity,
                balloonContentFooter: "Административный округ: " + item.AdmArea + "<br>Район: " + item.District + "<br><b>Адрес:</b> <br>" + item.Address + "<br><button id=\"getRoute\" onclick=\" getRoute(" + item.Latitude + "," + item.Longitude + ")\"class=\"applyBtn btn btn-sm btn-success\">Построить маршрут</button>",
                hintContent: item.Name,
            }, {
                preset: 'islands#redAutoCircleIcon',
                hideIconOnBalloonOpen: false
            });
            placemark.events.add('mouseenter', function (e) {

                e.get('target').options.set('preset', 'islands#greenAutoCircleIcon');
            })
                .add('mouseleave', function (e) {
                    e.get('target').options.set('preset', 'islands#redAutoCircleIcon');
                });
            map.geoObjects.add(placemark);
        });
    }
    else {
        return;
    }
}

function getRoute(Latitude, Longitude) {
    myMap.destroy();
    initRoute(userLatitude, userLongitude, Latitude, Longitude);
}

function getUserLocation() {
    var location = ymaps.geolocation;
    location.get({
        mapStateAutoApply: true
    })
        .then(
            function (result) {
                var userCoordinates = result.geoObjects.get(0).geometry.getCoordinates();
                userLatitude = userCoordinates[0];
                userLongitude = userCoordinates[1];
            },
            function (err) {
                console.log('Ошибка: ' + err)
            }
        );

}