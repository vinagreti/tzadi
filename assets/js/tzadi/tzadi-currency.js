/*!
* Tzadi Confirm Plugin v1.0
* Extends TzadiJS Plugin v1.0
* https://github.com/tzadiinc/tzadi-confirm
*
* Copyright 2013 Bruno da Silva Joao
* Released under the MIT license
*/
TzadiJS.prototype.currency = new function( ){

	var self = this;

	var cookieName = "tzd_currency";

	this.change = function( ) {

		var self = this;

		var url = base_url+'currency/change';

		var data = {

			tzadiToken : tzadiToken

		};

		var callback = function( modal ){

			self.modal = modal;

			$('#tzadiDialogs').html( modal );

			$('#tzadiDialogs').find(".selectCurrency").select2();

			$('#tzadiDialogs').modal('show');

		};

		$tzd.ajax.post(url, data, callback);

	};

	this.convert = function( amount, base ) {

		$.cookie.json = true;

		var currency = $.cookie( cookieName );

		var euros = amount / currency[base];

		var total = euros * currency[currency["base"]];

		return total;

	}

	this.convertTo = function( amount, base, to ) {

		$.cookie.json = true;

		var currency = $.cookie( cookieName );

		var euros = amount / currency[base];

		var total = euros * currency[to];

		return total;

	}

	$(".changeCurrency").live("click", function(){

		self.change();

	});

	$(".selectCurrency").live("change propertychange", function(){

		var base = $(this).select2('data').id;

		self.setCookie( base );

		$.cookie.json = true;

		var currency = $.cookie( cookieName );

		var url = base_url+'currency/change';

		var data = {

			tzadiToken : tzadiToken

			, currencyBase : base

		};

		var callback = function( res ){

			location.reload();

		};

		$tzd.ajax.post(url, data, callback);
		

	});

	this.setCookie = function( base ){


		$.cookie.json = true;

		var currency = $.cookie( cookieName );

		currency["base"] = base;

		var separate = location.host.split('.');

		separate.shift();

		var currentdomain = separate.join('.');

		$.cookie("tzdCurrency", currency, { path: '/', domain  : currentdomain } );

	}

	this.resetCode = function( ) {

		$.cookie.json = true;

		var currency = $.cookie( cookieName );

		$(".currencyCode").html( currency["base"] );

		$(".closeModal").click();

	}

	this.resetCode();
}