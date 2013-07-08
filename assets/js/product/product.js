/*!
 * Tzadi Product Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-product
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.product = new function(){

  this.like = function( _id ){

    var url = base_url+'product/like';

    var data = { tzadiToken : tzadiToken, _id : _id };

    var callback = function( likes ){ return likes; };

    $tzd.ajax.post(url, data, callback);

  };

  this.sendByMail = function( productID, adresses ){

    var url = base_url+'product/sendByMail';

    var data = { tzadiToken : tzadiToken, productID : productID, adresses : adresses };

    var callback = function( res ){ return res; };

    $tzd.ajax.post(url, data, callback);

  };

}