/*!
 * Tzadi Alert Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * Thanks to http://dense13.com/blog/2009/05/03/converting-string-to-slug-javascript/
 * https://github.com/tzadiinc/tzadi-counter
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.counter = new function(){

  this.timer;

  this.callback;

  this.program = function( seconds, callback ) {

    if(callback) this.callback = callback;

    if(seconds) this.timer = seconds;

    if(this.timer <= 0) this.callback();

    else {

      this.timer--;

      var self = this;

      var amount = 1000;

      if(this.timer < 1) amount = 1000 * this.timer;

      setTimeout(function() { self.program( ); }, amount );

    }

  }

  this.set = function( seconds ) {

    if(this.timer == 0) this.program( seconds );

    else this.timer = seconds;

  }

  this.increase = function( seconds ) {

    this.timer += seconds;

  }

  this.decrease = function( seconds ) {

    this.timer -= seconds;

  }

  this.stop = function( ) {

    this.timer = 0;

  }

};