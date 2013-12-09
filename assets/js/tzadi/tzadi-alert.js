/*!
 * Tzadi Alert Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-alert
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.alert = new function(){

  this.error = function( message, alertDiv ) {

    var content = $("<div></div>")
      .addClass("alertItem alert alert-error")
      .append($('<button type="button" class="close" data-dismiss="alert">&times;</button>'))
      .append(message);

    this.alert( content, alertDiv );

  };

  this.success = function( message, alertDiv ) {

    var content = $("<div></div>")
      .addClass("alertItem alert alert-success")
      .append($('<button type="button" class="close" data-dismiss="alert">&times;</button>'))
      .append(message);

    this.alert( content, alertDiv );

  };

  this.warning = function( message, alertDiv ) {

    var content = $("<div></div>")
      .addClass("alertItem alert alert-warning")
      .append($('<button type="button" class="close" data-dismiss="alert">&times;</button>'))
      .append(message);

    this.alert( content, alertDiv );

  };

  this.info = function( message, alertDiv ) {

    var content = $("<div></div>")
      .addClass("alertItem alert alert-info")
      .append($('<button type="button" class="close" data-dismiss="alert">&times;</button>'))
      .append(message);

    this.alert( content, alertDiv );

  };

  this.alert = function( content, alertDiv ){

    if ( ! alertDiv ) var alertDiv = '.globalAlert';

    $(alertDiv).html( content );

    $(alertDiv).find(".alertItem").fadeIn('slow');

    var callback = function() { $(alertDiv).find(".alertItem").fadeOut('slow'); };

    $tzd.counter.program(5, callback);

  }

};