/*!
 * Tzadi String Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * Thanks to http://dense13.com/blog/2009/05/03/converting-string-to-slug-javascript/
 * https://github.com/tzadiinc/tzadi-string
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.string = new function(){

  this.makeURL = function( str ) {

    str = str.replace(/^\s+|\s+$/g, '');

    str = str.toLowerCase();

    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";

    var to   = "aaaaaeeeeeiiiiooooouuuunc------";

    for (var i=0, l=from.length ; i<l ; i++) {

      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));

    }

    str = str.replace(/[^a-z0-9 -]/g, '')

      .replace(/\s+/g, '-')
      
      .replace(/-+/g, '-');

    return str;

  };

  this.checkMask = new function(){

    this.testRe = function( string, maskRE ){

      if(maskRE.test(string)) return true;

      else return false;

    }

    this.email = function( string ){

      var maskRE = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;

      return this.testRe( string, maskRE );

    }

    this.time = function( string ){

      var maskRE = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;

      return this.testRe( string, maskRE );

    }

    this.date = function( string ){

      var maskRE = /^(\d{1,2})-(\d{1,2})-(\d{4})$/;

      return this.testRe( string, maskRE );

    }

    this.range = function( string, min, max ){

      if( string.length < min || string.length > max ) return false;

      else return true;

    }

    this.float = function( string ){

      var maskRE = /[-+]?([0-9]*\.[0-9]+|[0-9]+)/;

      return this.testRe( string, maskRE );

    }

    this.cep = function( string ){

      var maskRE = /^[0-9]{5}-[0-9]{3}$/;

      return this.testRe( string, maskRE );

    }

  }

};