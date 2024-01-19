var myMap;



function initRoute(userLatitude, userLongitude, Latitude, Longitude) {
    alert("Маршрут успешно построен.")
    var multiRoute = new ymaps.multiRouter.MultiRoute({
        referencePoints: [
            [userLatitude, userLongitude],
            [Latitude, Longitude]
        ],
        params: {
            results: 2
        }
    }, {
        boundsAutoApply: true
    });

    var trafficButton = new ymaps.control.Button({
        data: { content: "Назад" },
        options: { selectOnClick: true }
    });

    trafficButton.events.add('select', function () {
        goBack();
    });


    myMap = new ymaps.Map('map', {
        center: [55.750625, 37.626],
        zoom: 10,
        controls: [trafficButton]
    }, {
        buttonMaxWidth: 300
    });

    myMap.geoObjects.add(multiRoute);
}

function goBack() {
    myMap.destroy();
    alert("Общая карта точек открыта");
    initMap();
}


