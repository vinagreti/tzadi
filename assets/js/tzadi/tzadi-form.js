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

      var string = input.val();

      if( input.attr("contentEditable") ){

        string = input.html();

        if( string == "<br>") string = "";

      }

      if( $tzd.string.checkMask.email( string ) ) {

        input.parent().removeClass("error");

        return true;

      } else {

        $tzd.alert.error( message )

        input.parent().addClass("error");

        return false;

      }

    }

    this.float = function( input, message ) {

      var string = input.val();

      if( input.attr("contentEditable") ){

        string = input.html();

        if( string == "<br>") string = "";

      }

      if( $tzd.string.checkMask.float( string ) ) {

        input.parent().removeClass("error");

        return true;

      } else {

        $tzd.alert.error( message )

        input.parent().addClass("error");

        return false;

      }

    }

    this.range = function( input, min, max, message ) {

      var string = input.val();

      if( input.attr("contentEditable") ){

        string = input.html();

        if( string == "<br>") string = "";

      }

      if( $tzd.string.checkMask.range( string, min, max) )  {

        input.parent().removeClass("error");

        return true;

      } else {

        $tzd.alert.error( message )

        input.parent().addClass("error");

        return false;

      }

    }

    this.cep = function( input, message ) {

      var string = input.val();

      if( input.attr("contentEditable") ){

        string = input.html();

        if( string == "<br>") string = "";

      }

      if( $tzd.string.checkMask.cep( string ) )  {

        input.parent().removeClass("error");

        return true;

      } else {

        $tzd.alert.error( message )

        input.parent().addClass("error");

        return false;

      }

    }

    this.identity = function( input, message ) {

      var string = input.val();

      if( input.attr("contentEditable") ){

        string = input.html();

        if( string == "<br>") string = "";

      }

      if( $tzd.string.checkMask.identity( string ) )  {

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