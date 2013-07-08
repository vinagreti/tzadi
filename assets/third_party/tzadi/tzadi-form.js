/*!
 * Tzadi Form Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-form
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.form = new function(){


  this.checkMask = new function() {

    this.email = function( input, message ) {

      if( $tzd.string.checkMask.email( input.val() ) ) {

        input.parent().removeClass("error");

        return true;

      } else {

        $tzd.alert.error( message )

        input.parent().addClass("error");

        return false;

      }

    }

    this.range = function( input, min, max, message ) {

      if( $tzd.string.checkMask.range( input.val(), min, max, message) )  {

        input.parent().removeClass("error");

        return true;

      } else {

        $tzd.alert.error( message )

        input.parent().addClass("error");

        return false;

      }

    }

  }

}