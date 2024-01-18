ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("map", {
            center: [55.73453, 37.63573],
            zoom: 10
        }, {
            searchControlProvider: 'yandex#search'
        });
    
    addLowPoints(myMap);
    addMidPoints(myMap);
    addMaxPoints(myMap);

    console.log("-------Hints added-------")
}

function addLowPoints(map){
    var element = document.getElementById("1");
    if(element != null){
        var jsonData = document.getElementById("1").getAttribute("data");
        var data = JSON.parse(jsonData);        
        data.forEach(function(item) {
            var placemark = new ymaps.Placemark([item.Latitude, item.Longitude], {
              balloonContentHeader: item.Name,
              balloonContentBody: "Описание:<br>",
              balloonContentFooter: item.Address,
              hintContent: item.Name,
            },{
                preset: 'islands#yellowAutoCircleIcon'
            });
            map.geoObjects.add(placemark);
          });
    }
    else{
        return;
    }
}

function addMidPoints(map){
    var element = document.getElementById("2");
    if(element != null){
        var jsonData = document.getElementById("2").getAttribute("data");
        var data = JSON.parse(jsonData);
        data.forEach(function(item) {
            var placemark = new ymaps.Placemark([item.Latitude, item.Longitude], {
              balloonContentHeader: item.Name,
              balloonContentBody: "Описание:<br>",
              balloonContentFooter: item.Address,
              hintContent: item.Name,
            },{
                preset: 'islands#orangeAutoCircleIcon'
            });
            map.geoObjects.add(placemark);
          });
    }
    else{
        return;
    }
}

function addMaxPoints(map){
    var element = document.getElementById("3");
    if(element != null){
        var jsonData = document.getElementById("3").getAttribute("data");
        var data = JSON.parse(jsonData);
        data.forEach(function(item) {
            var placemark = new ymaps.Placemark([item.Latitude, item.Longitude], {
              balloonContentHeader: item.Name,
              balloonContentBody: "Описание:<br>",
              balloonContentFooter: item.Address,
              hintContent: item.Name,
            },{
                preset: 'islands#redAutoCircleIcon'
            });
            map.geoObjects.add(placemark);
          });
    }
    else{
        return;
    }
}