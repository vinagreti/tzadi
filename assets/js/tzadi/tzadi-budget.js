/*!
 * Tzadi Budget Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-budget
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.budget = new function(){

  this.cookieElement = "tzd_budget_"+ORG_ID;

  this.totalElement = ".budgetTotal";

  this.setCookie = function( value ){

    $.cookie.json = true;

    $.cookie(this.cookieElement, value, { path: '/' });

  }

  this.getCookie = function(){

    $.cookie.json = true;

    if(!$.cookie(this.cookieElement)) this.setCookie({});

    return $.cookie(this.cookieElement);

  };

  this.add = function(item){

    var cookie = this.getCookie();
    
    if(cookie[item]) cookie[item]++;

    else cookie[item] = 1;

    this.setCookie(cookie);

    this.refreshTotal();

  };

  this.drop = function(item){

    var cookie = this.getCookie();

    delete cookie[item];

    this.setCookie(cookie);

    this.refreshTotal();

  }

  this.decrease = function(item){

    var cookie = this.getCookie();

    if(cookie[item] > 0) cookie[item]--;

    this.setCookie(cookie);

    this.refreshTotal();

  }

  this.setAmount = function(item, amount){

    var cookie = this.getCookie();

    cookie[item] = amount;

    this.setCookie(cookie);

    this.refreshTotal();

  }

  this.getAmount = function( item ){

    $.cookie.json = true;

    if(!$.cookie(this.cookieElement)) this.setCookie({});

    var cookie = $.cookie(this.cookieElement);

    return cookie[item];

  };

  this.refreshTotal = function(){

    var seconds = 1.03;
    var total = 0;
    var self = this;

    $.each(this.getCookie(), function(item, amount){ total += amount; });

    $(this.totalElement).html(total);

    var oldSize = $(this.totalElement).css("font-size");

    $(this.totalElement).css("font-size", "50px").css("font-weight","bold");

    var callback = function(){

      $(self.totalElement).css("font-size", oldSize).css("font-weight","normal");

    }

    $tzd.counter.program(seconds, callback);

  };

  this.empty = function(){

    this.setCookie({});

  };

  this.refreshTotal();
};