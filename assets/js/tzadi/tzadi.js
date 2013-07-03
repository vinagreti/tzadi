var TzadiJS = function(){
  this.creator = "Bruno da Silva João";
  this.version = "1.0";
};

var $tzd = new TzadiJS;







// abstrair as funcionalidades abaixo
// criando seus respectivos plugins e extendendo a classe TzadJS
var tzadiToken = $('input[name=tzadiToken]').val();

jQuery.fn.reset = function () {
  $(this).each (function() { this.reset(); });
}

function globalAlert(kind, message, alertDiv){

  $('.globalModalAlert').empty();
  $('.globalAlert').empty();

  var alert = $("<div></div>")
    .addClass("alertItem")
    .addClass("alert")
    .addClass(kind)
    .append($('<button type="button" class="close" data-dismiss="alert">&times;</button>'))
    .append(message);


  if ( ! alertDiv ) {
    if($('.globalModalAlert').length > 0) alertDiv = '.globalModalAlert';
    else {
      alertDiv = '.globalAlert';
    }
  }

  $(alertDiv).append(alert);
  $(alertDiv).find(".alertItem").fadeIn('slow');

  setTimeout(function() {
    $(alertDiv).find(".alertItem").fadeOut('slow');
  }, 5000 );
}

function globalValidateInput(kind, input, message){
  switch(kind) {
    case "time":
      maskRE = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;
    break;
    case "date":
      maskRE = /^(\d{1,2})-(\d{1,2})-(\d{4})$/;
    break;
    case "email":
      maskRE = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
    break;
  };

  if(maskRE.test(input)) return true;
  else {
    globalAlert('alert-error', message);
    return false;
  }
}

function globalValidateLenght( min, max, input, message ){

  var error = false;
  if( input.length<min ) error = true;
  if( input.length>max ) error = true;

  if( error ) {
    globalAlert('alert-error', message);
    return false;
  } else {
    return true;
  }
}

function globalConfirmAction(message){
   var retVal = confirm(message);
   if( retVal == true ){
    return true;
   }else{
    return false;
   }
}

$( "#translate_en" ).live("click", function() {
  $.ajax({
    url: base_url + "user/changeLang/english"
  })
  .done(function() {
    location.reload();
  });
});

$( "#translate_pt-BR" ).live("click", function() {
  $.ajax(base_url + "user/changeLang/pt-BR", function( e ) {
    location.reload();
  })
  .done(function() {
    location.reload();
  });
});

var loading = {
  start : function(){
    $(".loading").show();
  },
  stop : function(){
    $(".loading").hide();
  }
};

// method that get objects from server
var tzdGetObj = function(method, callBack){
  var list;
  $.ajax({
    url: base_url+method,
    beforeSend : function(){
      loading.start();
    },
    success: function( e ) {
      list = e.institutions;
    },
    dataType: 'json'
  }).done(function( e ){
    callBack(e);
    loading.stop();
  });
}

// classe responsável pelas chamadas ajax d aaplicação
var tzdAjaxCall = function(){
  this.post = function(url, data, callback){
    $.ajax({
      url : url,
      beforeSend : function(){
        loading.start();
      },
      type: "POST",
      data : data,
      dataType: 'json'
    }).done(function( e ){
      callback( e );
      loading.stop();
    });
  };
  this.upload = function( url, data, callback ){
    $.each(data.files, function( index, file ){
      var name = file.name.replace(/C:\\fakepath\\/i, '');
      formdata = new FormData(); 
      formdata.append("file", file);
      formdata.append("_id", data._id);
      formdata.append("tzadiToken", data.tzadiToken);
      $.ajax({
        url : url,
        beforeSend : function(){
          loading.start();
        },
        type: "POST",
        data: formdata,  
        processData: false,
        contentType: false,
        dataType: 'json'
      }).done(function( e ){
        callback( e );
        loading.stop();
      });
    });
  };
}

// manipula datas
var tzdDate = function (date){
  var d = new Date(date*1000);
  this.day = d.getDate();
  this.month = d.getMonth();
  this.year = d.getFullYear();
  this.shortYear = this.year.toString().substr(2,2);
  this.hour = d.getHours();
  this.millisecond = d.getMilliseconds();
  this.minute = d.getMinutes();
  this.second = d.getSeconds();
  this.date = this.day+"/"+this.month+"/"+this.year;
  this.shortDate = this.day+"/"+this.month+"/"+this.shortYear;
  this.time = this.hour+":"+this.minute+":"+this.second+":"+this.millisecond;
  this.shortTime = this.hour+":"+this.minute;
  this.dateTime = this.date+" "+this.time;
  this.shortDateTime = this.shortDate+" "+this.shortTime;
}


// manipula listas
var tzdList = {
  // sort list by attribute
  orderBy : function(attribute, list){
    var reorder = function compare(a,b) {
      if (a[attribute].toLowerCase() > b[attribute].toLowerCase())
         return -1;
      if (a[attribute].toLowerCase() < b[attribute].toLowerCase())
        return 1;
      return 0;
    }
    return list.sort(reorder).reverse();
  }
  // get match list
  ,getBy : function( list, attribute, value ){
    var found = list.filter(function ( item ) {
      return item[attribute] == value;
    });
    return found;
  }
};

// work around to fix ie7 and 8 onkeyup event
if (!Array.prototype.filter)
{
  Array.prototype.filter = function(fun /*, thisp */)
  {
    "use strict";

    if (this === void 0 || this === null)
      throw new TypeError();

    var t = Object(this);
    var len = t.length >>> 0;
    if (typeof fun !== "function")
      throw new TypeError();

    var res = [];
    var thisp = arguments[1];
    for (var i = 0; i < len; i++)
    {
      if (i in t)
      {
        var val = t[i]; // in case fun mutates this
        if (fun.call(thisp, val, i, t))
          res.push(val);
      }
    }

    return res;
  };

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
        address.locality = address_component.long_name;
        break;
        case "administrative_area_level_2":
        address.administrative_area_level_2 = address_component.long_name;
        break;
        case "administrative_area_level_1":
        address.administrative_area_level_1 = address_component.long_name;
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