/*!
 * Tzadi Loading Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-loading
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.loading = new function(){

  this.start = function(){

    $(".loading").show();

  };

  this.stop = function(){

    $(".loading").hide();

  };

};