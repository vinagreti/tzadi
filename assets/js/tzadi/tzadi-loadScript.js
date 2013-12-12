/*!
 * Tzadi loadScript Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-loadScript
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.loadScript = function( file ){

    var scr  = document.createElement('script'),
        head = document.head || document.getElementsByTagName('head')[0];
        scr.src = base_url + 'assets/js/' + file + ".js";
        scr.async = false; // optionally

    head.insertBefore(scr, head.firstChild);

}