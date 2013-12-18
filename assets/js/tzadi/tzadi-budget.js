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

  this.printElement = ".printBudget";

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

  this.print = function(){

    var href = JSON.stringify( this.getCookie() );

    window.open(base_url+"budget/printing/?products="+href,null,"status=yes,toolbar=no,menubar=no,location=no");

  };

  this.empty = function(){

    this.setCookie({});

  };

  this.refreshTotal();

  // share budget by e-mail
  this.share = new function() {

    this.shareBudgetModal = false;

    this.eventsApplied = false;

    this.open = function() {

      if( this.shareBudgetModal ) {

        this.showModal();

      } else {

        var self = this;

        var url = base_url+'budget/share';

        var data = {

          tzadiToken : tzadiToken

        };

        var callback = function( modal ){

          self.shareBudgetModal = modal;

          self.showModal();

        };

        $tzd.ajax.post(url, data, callback);        
      }

    };

    this.showModal = function (){

      $('#tzadiDialogs').html( this.shareBudgetModal );

      $('#tzadiDialogs').modal('show');

      if( ! this.eventsApplied ) {

        this.eventsApplied = true;

        var self = this;

        $(".shareBudget").live("click", function(){

          self.send();
          
        });

      }

    }
    this.send = function(){

      var valid = true;

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".mailYourName"), 1, 255, $("#pdt_fillName").html());

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".mailEmail"), 1, 512, $("#pdt_fillAtLeastOneEmail").html());

      if( valid ){

        var url = base_url+'product/shareBudget';
        
        var data = {

          tzadiToken : tzadiToken

          , name : $('#tzadiDialogs').find(".mailYourName").val()

          , message : $('#tzadiDialogs').find(".mailMessage").val()
        
          , addresses : $('#tzadiDialogs').find(".mailEmail").val()

        };
        
        var callback = function( e ){

          if(e.error) $tzd.alert.error( e.error );

          if(e.success){

            $('#tzadiDialogs').find(".closeModal").click();

            $tzd.alert.success( e.success );

          }

        };
        
        $tzd.ajax.post(url, data, callback);

      }

    };

  }

  // ask for more info about a budget
  this.knowMore = new function() {

    this.knowMoreBudgetModal = false;

    this.eventsApplied = false;

    this.open = function( product_id ) {

      if( this.knowMoreBudgetModal ) {

        this.showModal( product_id );

      } else {

        var self = this;

        var url = base_url+'budget/knowMore';

        var data = {

          tzadiToken : tzadiToken

          , product_id : product_id

        };

        var callback = function( modal ){

          self.knowMoreBudgetModal = modal;

          self.showModal( product_id );

        };

        $tzd.ajax.post(url, data, callback);        
      }

    };

    this.showModal = function ( product_id ){

      $('#tzadiDialogs').html( this.knowMoreBudgetModal );

      $('#tzadiDialogs').modal('show');

      if( ! this.eventsApplied ) {

        this.eventsApplied = true;

        var self = this;

        $(".knowMoreBudget").live("click", function(){

          self.send(product_id);
          
        });

      }

    }
    this.send = function( product_id ){

      var valid = true;

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".knowMoreYourName"), 1, 255, $("#pdt_fillName").html());

      valid = valid && $tzd.form.checkMask.email($('#tzadiDialogs').find(".knowMoreEmail"), $("#pdt_fillValidEmail").html());

      valid = valid && $tzd.form.checkMask.range($('#tzadiDialogs').find(".knowMoreQuestions"), 1, 255, $("#pdt_fillQuestions").html());

      if( valid ){

        var url = base_url+'product/knowMoreBudget';
        
        var data = {

          tzadiToken : tzadiToken

          , name : $('#tzadiDialogs').find(".knowMoreYourName").val()

          , questions : $('#tzadiDialogs').find(".knowMoreQuestions").val()
        
          , product_id : product_id
        
          , address : $('#tzadiDialogs').find(".knowMoreEmail").val()

        };
        
        var callback = function( e ){

          if(e.error) $tzd.alert.error( e.error );

          if(e.success){

            $('#tzadiDialogs').find(".closeModal").click();

            $tzd.alert.success( e.success );

          }

        };
        
        $tzd.ajax.post(url, data, callback);

      }

    };

  }

}