/**********************Obtener registros de google maps*****/

google.maps.event.addDomListener(window, "load", function () {
        var search_input = document.getElementById("direccion");
        var autocomplete = new google.maps.places.Autocomplete(search_input);

        google.maps.event.addListener(autocomplete, "place_changed", function () {
            var place = autocomplete.getPlace();

        });

});
