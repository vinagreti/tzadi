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

		var currency = $.cookie("tzdCurrency");

		var euros = amount / currency[base];

		var total = euros * currency[currency["base"]];

		return total;

	}

	this.convertTo = function( amount, base, to ) {

		console.log(amount);
		console.log(base);
		console.log(to);

		$.cookie.json = true;

		var currency = $.cookie("tzdCurrency");

		var euros = amount / currency[base];

		var total = euros * currency[to];

		console.log(currency[to]);

		return total;

	}

	$(".changeCurrency").live("click", function(){

		self.change();

	});

	$(".selectCurrency").live("change propertychange", function(){

		var base = $(this).select2('data').id;

		self.setCookie( base );

		$.cookie.json = true;

		var currency = $.cookie("tzdCurrency");

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

		var currency = $.cookie("tzdCurrency");

		currency["base"] = base;

		var separate = location.host.split('.');

		separate.shift();

		var currentdomain = separate.join('.');

		$.cookie("tzdCurrency", currency, { path: '/', domain  : currentdomain } );

	}

	this.resetCode = function( ) {

		$.cookie.json = true;

		var currency = $.cookie("tzdCurrency");

		$(".currencyCode").html( currency["base"] );

		$(".closeModal").click();

	}

	this.resetCode();
}