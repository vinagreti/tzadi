/*!
 * Tzadi Ajax Plugin v1.0
 * Extends TzadiJS Plugin v1.0
 * https://github.com/tzadiinc/tzadi-ajax
 *
 * Copyright 2013 Bruno da Silva Joao
 * Released under the MIT license
 */
TzadiJS.prototype.ajax = new function(){

  this.post = function(url, data, callback){

    $.ajax({

      url : url,

      beforeSend : function(){

        $tzd.loading.start();

      },

      type: "POST",

      data : data,

      dataType: 'json'

    }).done(function( e ){

      callback( e );

      $tzd.loading.stop();

    });

  };

  this.upload = function( url, data, callback ){

    $.each(data.files, function( index, file ){

      var name = file.name.replace(/C:\\fakepath\\/i, '');

      formdata = new FormData();

      formdata.append("file", file);

      formdata.append("_id", data._id);

      formdata.append("tzadiToken", data.tzadiToken);

      $.ajax({

        url : url,

        beforeSend : function(){

          $tzd.loading.start();

        },

        type: "POST",

        data: formdata,

        processData: false,

        contentType: false,

        dataType: 'json'

      }).done(function( e ){

        callback( e );

        $tzd.loading.stop();

      });

    });
    
  };

};