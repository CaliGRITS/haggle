var geocoder;

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
}

function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Unable to trace your location. Please enter yourself");
}

function initialize() {
    geocoder = new google.maps.Geocoder();
}

function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                for (var i=0; i<results[0].address_components.length; i++) {
                    for (var b=0;b<results[0].address_components[i].types.length;b++) {
                        if (results[0].address_components[i].types[b] === "country") {                    
                            var country = results[0].address_components[i] || "";
                            $('#country').val(country.long_name || "");
                            $('#country-code').val(country.short_name || "");
                            break;
                        }
                
                        if (results[0].address_components[i].types[b] === "postal_code") {
                            var postal_code= results[0].address_components[i] || "";
                            $('#pincode').val(postal_code.long_name || "");
                            break;
                        }

                        if (results[0].address_components[i].types[b] === "administrative_area_level_1") {
                            var state = results[0].address_components[i] || "";
                            $('#state').val(state.long_name || "");
                            break;
                        }

                        if (results[0].address_components[i].types[b] === "administrative_area_level_2") {
                            var city= results[0].address_components[i];
                            break;
                        }
                        if (results[0].address_components[i].types[b] === "locality") {
                            var add2= results[0].address_components[i];
                            break;
                        }
                        if (results[0].address_components[i].types[b] === "sublocality_level_1") {
                            var add1= results[0].address_components[i];
                            break;
                        }
                    }
                }
                var address1 = (add1) ? add1.long_name : "";
                var address2 = (add2) ? add2.long_name : "";
                var cityO = (city) ? city.long_name : "";
                var addressFull = address1 + ", " + address2 + ", " + cityO;
                $('#address').val(addressFull);

            } else {
                alert("Unable to trace your location. Please enter yourself");
            }
        } else {
          alert("Unable to trace your location. Please enter yourself");
          alert("Geocoder failed due to: " + status);
        }
    });
}