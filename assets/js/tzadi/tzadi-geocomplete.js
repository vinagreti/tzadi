/*!
 * Tzadi Geocomplete Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-geocomplete
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.geocomplete = function( element, callback ){

	$("#campusAddress")
	  .geocomplete()
	  .bind("geocode:result", function(event, result){
	    var addressData = tzdGeocodeGetAddressData(result);
	    callback(addressData);
	  });


	// gets the data from the geocode data object returned from google api
	function tzdGeocodeGetAddressData( result ){
	    var address = {};
	    address.formatted_address = result.formatted_address;

	    $.each(result.address_components, function (i, address_component) {
	      switch(address_component.types[0]){
	        case "sublocality":
	        address.sublocality = address_component.long_name;
	        break;
	        case "locality":
	        address.city = address_component.long_name;
	        break;
	        case "administrative_area_level_2":
	        address.state = address_component.long_name;
	        break;
	        case "administrative_area_level_1":
	        if(!address.state) address.state = address_component.long_name;
	        break;
	        case "country":
	        address.country = address_component.long_name;
	        break;
	        case "postal_code":
	        address.postal_code = address_component.long_name;
	        break;
	      }      
	    });

    return address;
  }

}