/*!
* Tzadi Confirm Plugin v1.0
* Extends TzadiJS Plugin v1.0
* https://github.com/tzadiinc/tzadi-url
*
* Copyright 2013 Bruno da Silva Joao
* Released under the MIT license
*/
TzadiJS.prototype.url = new function( ){

	this.get = function(param){
	  
	  param = param.replace(/([\[\](){}*?+^$.\\|])/g, "\\$1");
	  
	  var value = [];
	  
	  var regex = new RegExp("[?&]" + param + "=([^&#]*)", "g");
	  
	  var url   = decodeURIComponent(window.location.href);
	  
	  var match = null;
	  
	  while (match = regex.exec(url)) {
	  
	    value.push(match[1]);
	  
	  }    
	  
	  return value;

	}	

}