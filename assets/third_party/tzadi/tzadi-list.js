/*!
 * Tzadi List Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-list
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.list = new function(){

  this.orderBy = function(attribute, list){

    var reorder = function compare(a,b) {

      if (a[attribute].toLowerCase() > b[attribute].toLowerCase())

         return -1;

      if (a[attribute].toLowerCase() < b[attribute].toLowerCase())

        return 1;

      return 0;

    }

    return list.sort(reorder).reverse();

  };

  this.getBy = function( list, attribute, value ){

    var found = list.filter(function ( item ) {

      return item[attribute] == value;

    });

    return found;

  };

};