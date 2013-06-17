$(document).ready(function(){
  /*
  *
  * Table Class
  *
  */

  // Create the table object
  var table = {
    // define the table html structure
    html : $(".tzdTableBody"),
    // define the table row html structure
    row : $(".tzdTableRow"),
    // define the campus html sctructure
    campus : $(".tzdTableCampus"),
    // define the navTab
    nav : $(".nav"),    
    // define the navTab
    navTab : $(".navTabItem"),
    // define the table rows order
    order : "orderByDateLast",
    // Insert the institutions object in the table html structure
    insertRow : function( institution ) {
      // If it's single row insertion
      if(institution.institutionID){
        var row = this.row.clone();
        row.attr("id", "institution"+institution.institutionID);
        row.find(".navTabHeadquarters").attr("id", "campusNav"+institution.campusID);
        row.find(".tzdTableCampus").attr("id", "campus"+institution.campusID);
        this.fillRow( row, institution );
        this.html.prepend( row );
        row.show();
        this.recalcRows();
      }
      // If it's a multiple rows insertion 
      else {
        table.html.empty();

        institution = institutions.reorder( institution )

        var campi = institutions.all.filter(function ( institution ) {
          return institution.campusHeadquarter == 0;
        });

        for (var i = 0; i < institution.length; i++) {
          var row = this.row.clone();
          row.attr("id", "institution"+institution[i].institutionID);
          row.find(".tzdTableCampus").attr("id", "campus"+institution[i].campusID);
          this.fillRow( row, institution[i] );
          this.html.append( row );
          row.show();

          for (var i2 = 0; i2 < campi.length; i2++) {
            if( campi[i2].campusHeadquarter == 0 && campi[i2].institutionID == institution[i].institutionID) {
              var institutionRow = this.html.find("#institution"+campi[i2].institutionID);
              var nav = institutionRow.find(".nav");

              var navTab = this.navTab.clone();
              navTab.attr("id", "campusNav"+campi[i2].campusID);
              navTab.removeClass("hide");
              navTab.insertBefore(nav.find(".newNavTab"));

              var campus = this.campus.clone();
              campus.attr("id", "campus"+campi[i2].campusID);
              campus.insertBefore(institutionRow.find(".tzdTableAttach"));
              this.campusUpdate( campi[i2] );
            }
          }
        }

        /*
        for (var i = 0; i < institution.length; i++) {
          if( this.html.find("#institution"+institution[i].institutionID).length == 0 ){

          } else {

          }
        }
        */

        this.recalcRows();
      }
    },
    insertCampus : function( row, campusObj ){
      var institutionID = row.attr("id").replace("institution", "");

      var navTab = this.navTab.clone();
      navTab.attr("id", "campusNav"+campusObj.campusID);
      navTab.removeClass("hide");
      navTab.addClass("active");
      row.find(".navTab").removeClass("active");
      navTab.removeClass("hide");
      navTab.insertBefore(row.find(".newNavTab"));

      var campusDiv = this.campus.clone();
      campusDiv.attr("id", "campus"+campusObj.campusID);
      row.find(".tzdTableCampus").hide();
      campusDiv.insertBefore(row.find(".tzdTableAttach"));
      this.campusUpdate( campusObj );
      campusDiv.show();
    },
    // remove the institution row from the table
    dropCampus : function( campusID ) {
      this.html.find("#campus"+campusID).parent().find(".tzdTableCampus").first().show();
      this.html.find("#campus"+campusID).parent().find("#navTabHeadquarters").parent().addClass("active");
      this.html.find("#campus"+campusID).remove();
      this.html.find("#campusNav"+campusID).remove();
    },
    // remove the institution row from the table
    dropRow : function( institutionID ) {
      var row = this.html.find("#institution"+institutionID);
      var row2 = $("#institution"+institutionID);
      row.remove();
      row2.remove();
      table.recalcRows();
    },
    // update the institution data inside the table
    changeInstitutionStatus : function( id, newStatus ) {
      var row = $("#institution"+id);
      if(newStatus == "active"){
        row.find(".institutionChangeStatus").find("i").removeClass("icon-check-empty").addClass("icon-check");
        row.find(".institutionChangeStatus").removeClass("btn-danger").addClass("btn-success");
      }
      else {
        row.find(".institutionChangeStatus").find("i").removeClass("icon-check").addClass("icon-check-empty");
        row.find(".institutionChangeStatus").removeClass("btn-success").addClass("btn-danger");
      }
    },
    // update the institution row in the table
    campusUpdate : function( e ) {
      var row = $("#institution"+e.institutionID);
      var campus = $("#campus"+e.campusID);
      
      if( e.campusHeadquarter == 1 ){
        row.find("#headSpan1").html(e.institutionName+" - "+e.campusCountry+" - "+e.campusCity);
        row.find("#headSpan2").html(e.campusContactName);
        row.find("#headSpan2").attr("title", e.campusContactEmail);
        row.find("#headSpan3").html(e.campusContactPhone+" / "+e.campusContactMobile);
      }

      $("#campusNav"+e.campusID).find("a").find(".navTabName").html(e.campusName);
      campus.find("#institutionName").val(e.institutionName);
      campus.find("#institutionID").val(e.institutionID);
      campus.find("#institutionKind").val(e.institutionKind);
      campus.find("#campusID").val(e.campusID);
      campus.find("#campusName").val(e.campusName);
      campus.find("#campusDetails").val(e.campusDetails);
      campus.find("#campusEmail").val(e.campusEmail);
      campus.find("#campusAddress").val(e.campusAddress);
      campus.find("#campusPhone").val(e.campusPhone);
      campus.find("#campusMobile").val(e.campusMobile);
      campus.find("#campusCep").val(e.campusCep);
      campus.find("#campusCity").val(e.campusCity);
      campus.find("#campusState").val(e.campusState);
      campus.find("#campusCountry").val(e.campusCountry);
      campus.find("#campusContactName").val(e.campusContactName);
      campus.find("#campusContactEmail").val(e.campusContactEmail);
      campus.find("#campusContactPhone").val(e.campusContactPhone);
      campus.find("#campusContactMobile").val(e.campusContactMobile);
      campus.find("#campusAddress")
        .geocomplete()
        .bind("geocode:result", function(event, result){
          var addressData = tzdGeocodeGetAddressData(result);
          var campus = $(this).parents(".tzdTableCampus");
          table.completeAddress(campus, addressData);
        });
      campus.find("#campusAddress").attr("placeholder", "");
    },
    // fill the row with the object content that are inside the institutions.all array.
    fillRow : function( row, institution ) {
      row.find("#headSpan1").html(institution.institutionName+" - "+institution.campusCountry+" - "+institution.campusCity);
      row.find("#headSpan2").html(institution.campusContactName);
      row.find("#headSpan2").attr("title", institution.campusContactEmail);
      row.find("#headSpan3").html(institution.campusContactPhone+" / "+institution.campusContactMobile);
      row.find("#institutionName").val(institution.institutionName);
      row.find("#institutionKind").val(institution.institutionKind);
      row.find("#institutionID").val(institution.institutionID);
      row.find("#campusID").val(institution.campusID);
      row.find("#navTabHeadquarters").parent().attr("id", "campusNav"+institution.campusID);
      row.find("#navTabHeadquarters").find(".navTabName").html(institution.campusName);
      row.find("#campusName").val(institution.campusName);
      row.find("#campusDetails").val(institution.campusDetails);
      row.find("#campusEmail").val(institution.campusEmail);
      row.find("#campusAddress").val(institution.campusAddress);
      row.find("#campusPhone").val(institution.campusPhone);
      row.find("#campusMobile").val(institution.campusMobile);
      row.find("#campusCep").val(institution.campusCep);
      row.find("#campusCity").val(institution.campusCity);
      row.find("#campusState").val(institution.campusState);
      row.find("#campusCountry").val(institution.campusCountry);
      row.find("#campusContactName").val(institution.campusContactName);
      row.find("#campusContactEmail").val(institution.campusContactEmail);
      row.find("#campusContactPhone").val(institution.campusContactPhone);
      row.find("#campusContactMobile").val(institution.campusContactMobile);
      if(institution.institutionStatus == "active"){
        row.find(".institutionChangeStatus").find("i").removeClass("icon-check-empty").addClass("icon-check");
        row.find(".institutionChangeStatus").removeClass("btn-danger").addClass("btn-success");
      }
      else {
        row.find(".institutionChangeStatus").find("i").removeClass("icon-check").addClass("icon-check-empty");
        row.find(".institutionChangeStatus").removeClass("btn-success").addClass("btn-danger");
      }
      row.find("#campusAddress")
        .geocomplete()
        .bind("geocode:result", function(event, result){
          var addressData = tzdGeocodeGetAddressData(result);
          var campus = $(this).parents(".tzdTableCampus");
          table.completeAddress(campus, addressData);
        });
      row.find("#campusAddress").attr("placeholder", "");
    },
    recalcRows : function(){
      $(".totalRows").html(this.html.children().length);
    },
    addAttach : function( attach ){
      var row = $("#institution"+attach.institutionID);
      var attachDiv = row.find(".tzdTableAttach");
      var fileLink = $("<p></p>")
        .append($("<a></a>")
          .html(attach.attachName)
          .attr("href", base_url+"file/download/"+attach.attachFile)
          .attr("target", "blank")
        )
        .append($("<a></a>")
          .attr("id", "attach"+attach.attachID)
          .html('&nbsp; <i class="icon-remove"></i>')
          .addClass("dropAttach")
          .css("text-decoration", "none")
        )
      fileLink.insertAfter(attachDiv.find("h3").first());
    },
    completeAddress : function(campus, addressData) {
      campus.find("#campusCep").val(addressData.postal_code);
      campus.find("#campusCity").val(addressData.locality);
      campus.find("#campusState").val(addressData.administrative_area_level_1);
      campus.find("#campusCountry").val(addressData.country);
    }
  }

  /*
  *
  * Institutions Class
  *
  */

  // callBack to manipulates the ajax call async data only after loaded
  var institutionsStart = function( e ){
    // populate the table for the first time
    institutions.all = e.institutions;
    institutions.result = e.institutions;
    var headquarters = institutions.result.filter(function ( institution ) {
      return institution.campusHeadquarter == 1;
    });
    table.insertRow( headquarters );  
  };

  // create the array of institutions objects
  var institutions = {
    // get the Institutions objects from the database
    all : new tzdGetObj("institution/getAll", institutionsStart),
    // var that receive the result of the search. Its used to populate the table
    result : [],
    // change the institution active attribute on the database
    changeInstitutionStatus : function(id) {
      var institution = institutions.all.filter(function ( institution ) {
        return institution.institutionID == id;
      });
      var result = institutions.result.filter(function ( institution ) {
        return institution.institutionID == id;
      });
      if(institution[0].institutionStatus == "active"){
        var newStatus = "inactive";
      } else {
        var newStatus = "active";
      }
      $.ajax({  
        type: "POST",
        url: base_url+"institution/update",  
          data : {
            tzadiToken : $('input[name=tzadiToken]').val(),
            institutionID : id,
            institutionStatus : newStatus
          },
        success: function( e )  
        {
          institution[0].institutionStatus = newStatus;
          result[0].institutionStatus = newStatus;
          table.changeInstitutionStatus( id, newStatus );
        },
          dataType: 'json'
      });
    },
    // create new institution object on the database
    create : function( name ){
      var valid = true;
      valid = valid && globalValidateLenght(1, 65535, name, $("#inst_PleaseInsertName").val());

      if ( valid ) {
        $.ajax({
          type : 'POST',
          url : base_url+'institution/insert',
          data : {
            tzadiToken : $('input[name=tzadiToken]').val(),
            institutionName : name
          },
          success: function( institution ) {
            institutions.all.push(institution);
            institutions.result.push(institution);
            table.insertRow( institution );
          },
          dataType: 'json'
        });
      }
    },
    // search for objects that have the searchString
    search : function( searchString ){
      if( searchString == "") {
        this.result = this.all;
      } else {
        institutions.result = institutions.result.filter(function ( institution ) {
          var exist = false;
          for(var prop in institution) {
            exist = exist || (institution[prop]) && (institution[prop].search(new RegExp(searchString, "i"))) >= 0;
          }
          return exist;
        });
      }
      var headquarters = institutions.result.filter(function ( institution ) {
        return institution.campusHeadquarter == 1;
      });
      table.insertRow( headquarters );
    },
    // update the institution on the database and in the institutions object array
    campusUpdate : function(data){
      $.ajax({
        type: "POST",
        url: base_url+"institution/campusUpdate",  
        data: data,
        success: function( e )  
        {
          var message = $(".saved").html();
          globalAlert('alert-success', message);
          for (var i = 0; i < institutions.all.length; i++){
            if(institutions.all[i].institutionID == e.institutionID){
              institutions.all[i].institutionName = e.institutionName;
            }
          }
          for (var i = 0; i < institutions.result.length; i++){
            if(institutions.result[i].institutionID == e.institutionID){
              institutions.result[i].institutionName = e.institutionName;
            }
          }
          for (var i = 0; i < institutions.all.length; i++){
            if(institutions.all[i].campusID == e.campusID){
              institutions.all[i] = e;
              table.campusUpdate( e );
            }
          }
          for (var i = 0; i < institutions.result.length; i++){
            if(institutions.result[i].campusID == e.campusID){
              institutions.result[i] = e;
            }
          }
        },
          dataType: 'json'
      });


    },
    // drop the institution on the database and remove from the institutions object array
    drop : function( id ){
      var message = $(".excludeInstitution").html();
      if(globalConfirmAction(message + '?')){
        $.ajax({  
          type: "POST",
          url: base_url+"institution/drop",  
          data: {
            institutionID : id,
            tzadiToken : $('input[name=tzadiToken]').val()
          },
          success: function( e ) {
            for (var i = 0; i < institutions.all.length; i++){
              if(institutions.all[i].institutionID == id){
                table.dropRow( id );
                institutions.all.splice(i, 1);
              }
            }
            for (var i = 0; i < institutions.result.length; i++){
              if(institutions.result[i].institutionID == id){
                institutions.result.splice(i, 1);
              }
            }
          },
            dataType: 'json'
        });        
      }
    },
    reorder : function( headquarters ){
      switch( table.order ){
        case 'orderByNameAsc':
          var reorder = function compare(a,b) {
            if (a.institutionName < b.institutionName)
               return -1;
            if (a.institutionName > b.institutionName)
              return 1;
            return 0;
          }
          break;
        case 'orderByNameDesc':
          var reorder = function compare(a,b) {
            if (a.institutionName > b.institutionName)
               return -1;
            if (a.institutionName < b.institutionName)
              return 1;
            return 0;
          }
          break;
        case 'orderByDateFirst':
          var reorder = function compare(a,b) {
            if (a.institutionID < b.institutionID)
               return -1;
            if (a.institutionID > b.institutionID)
              return 1;
            return 0;
          }
          break;
        case 'orderByDateLast':
          var reorder = function compare(a,b) {
            if (a.institutionID > b.institutionID)
               return -1;
            if (a.institutionID < b.institutionID)
              return 1;
            return 0;
          }
          break;
        case 'orderByCountryAsc':
          var reorder = function compare(a,b) {
            if (a.campusCountry < b.campusCountry)
               return -1;
            if (a.campusCountry > b.campusCountry)
              return 1;
            return 0;
          }
          break;
        case 'orderByCountryDesc':
          var reorder = function compare(a,b) {
            if (a.campusCountry > b.campusCountry)
               return -1;
            if (a.campusCountry < b.campusCountry)
              return 1;
            return 0;
          }
          break;
        default:
          alert("nao tem no switch");
      }

      headquarters.sort(reorder);
      return headquarters;
    },
    getAttachs : function( institutionID, attach ){
      $.ajax({  
        url: base_url+"institution/getAttachs",
        type: "POST",  
        data: {
          institutionID : institutionID,
          tzadiToken : $('input[name=tzadiToken]').val()
        },
        success: function( attachs ) {
          for( var i = 0; i < attachs.length; i++){
            var data = {};
            data.attachID = attachs[i].attachID;
            data.attachName = attachs[i].attachName;
            data.attachFile = attachs[i].attachFile;
            data.institutionID = institutionID;
            table.addAttach( data );
          }
          attach.find(".totalAttach").html(attachs.length);
        },
        dataType: 'json',
        async: false
      }); 
    },
    dropAttach : function( attachID ){
      var message = $(".excludeAttach").html();
      if(globalConfirmAction(message + '?')){
        $.ajax({  
          url: base_url+"institution/dropAttach",
          type: "POST",  
          data: {
            attachID : attachID,
            tzadiToken : $('input[name=tzadiToken]').val()
          },
          dataType: 'json'
        });
      }
    },
    addAttach : function( id, files ){
      for(var i = 0; i < files.length; i++){
        var file = files[i];
        var name = file.name.replace(/C:\\fakepath\\/i, '');

        if(file.size > 2097000) {
          var error = name+" possui mais que 2Mb";
          globalAlert('alert-error', error);
        } else {
          function appendAttach( attach ){
            if ( window.FileReader ) {
              var reader = new FileReader();  
              reader.onloadend = function (e) {
                var attachData = {};
                attachData.institutionID = id;
                attachData.attachName = name;
                attachData.attachHash = attach.attachHash;
                attachData.attachID = attach.attachID;
                table.addAttach( attachData ); 
              };
              reader.readAsDataURL(file);
            };
          }

          if (window.FormData) {
            formdata = new FormData(); 
            formdata.append("userfile", file);
            formdata.append("id", id);
            formdata.append("tzadiToken", $('input[name=tzadiToken]').val());

            $.ajax({  
              url: base_url+"institution/attach",
              beforeSend : function(){
                loading.start();
              },
              type: "POST",  
              data: formdata,  
              processData: false,  
              contentType: false,  
              success: function ( e ) {
                if( e ) appendAttach( e );
                else globalAlert('alert-error', e.error);
              },
              dataType: 'json'
            }).done(function( e ){
              loading.stop();
            });
          };
        }
      };
    },
    createCampus : function( row, institutionID ){
      $.ajax({  
        url: base_url+"institution/createCampus",  
        type: "POST",  
        data : {
          institutionID: institutionID,
          tzadiToken : $('input[name=tzadiToken]').val()
        }, 
        success: function ( campus ) {
          institutions.all.push(campus);
          table.insertCampus( row, campus );
        },
        dataType: 'json',
        async: false
      });
    },
    dropCampus : function( campusID ) {
      var message = $(".excludeCampus").html();
      if(globalConfirmAction(message + '?')){
        $.ajax({  
          type: "POST",
          url: base_url+"institution/dropCampus",  
          data: {
            campusID : campusID,
            tzadiToken : $('input[name=tzadiToken]').val()
          },  
          success: function( ) {

            for (var i = 0; i < institutions.all.length; i++){
              if(institutions.all[i].campusID == campusID){
                institutions.all.splice(i, 1);
                table.dropCampus( campusID );
              }
            }
            for (var i = 0; i < institutions.result.length; i++){
              if(institutions.result[i].campusID == campusID){
                institutions.result.splice(i, 1);
              }
            }
          },
            dataType: 'json'
        });      
      }
    }
  }

  /* 
  * Events that manipulates the institutions and table objects
  */


  // activate the institution
  $(".institutionChangeStatus").live("click", function(){
    var id = $(this).parents(".tzdTableRow").attr("id").replace("institution", "");
    institutions.changeInstitutionStatus( id );
  });

  // search institutions array by string and disply in the table
  $('#search-query').live('keyup propertychange', function(){
    var searchString = $(this).val();
    institutions.search( searchString );      
  });

  $('.form-search').submit(function(e) {
    e.preventDefault();
    $(".create").click();
  });

  // create a new institution
  $(".create").live("click", function(){
    var name = $('#search-query').val();
    if(name != "") institutions.create( name );
    else {
      var message = $(".inst_PleaseInsertName").html();
      globalAlert('alert-error', message);
    }
  });

  // show the details form
  $(".tzdTableBriefContent").live("click", function(){
    var row = $(this).parents(".tzdTableRow");
    row.find(".tzdTableBrief").hide();
    row.find(".tzdTableCampusNav").show();
    row.find(".tzdTableCampus").first().show();
    row.find(".tzdTableCampusName").show();
    row.find(".tableDetail").show();
  });

  // show the selected campus
  $(".tzdTableCampusNav .navTab").live("click", function(){
    var row = $(this).parents(".tzdTableRow");
    var campus = $(this).attr("id").replace("campusNav", "campus");
    row.find(".tzdTableCampus").hide();
    row.find(".navTab").removeClass("active");
    $(this).addClass("active");
    row.find("#"+campus).show();
  });

  // create new campus
  $(".newNavTab").live("click", function(){
    var row = $(this).parents(".tzdTableRow");
    var institutionID = row.attr("id").replace("institution", "");
    institutions.createCampus( row, institutionID );
  });

  // create new campus
  $(".removeCampus").live("click", function(){
    var campusID = $(this).parents(".navTab").attr("id").replace("campusNav", "");
    institutions.dropCampus( campusID );
  });

  // Cancel the edition and remove the unsaved content from the form
  $(".tableCancelButton").live("click", function(){
    var id = $(this).parents(".tzdTableRow").attr("id").replace("institution", "");
    var row = $(this).parents(".tzdTableRow");
    row.find(".tzdTableBrief").show();
    row.find(".tzdTableCampusNav").hide();
    row.find(".tzdTableCampus").hide();
    row.find(".tzdTableCampusName").hide();
    row.find(".tableDetail").hide();
    row.find(".tzdTableAttach").hide();
  });

  // save the new institution data
  $(".tableDetailSaveButton").live("click", function(){
    var institutionName = $(this).parents(".tzdTableRow").find("#institutionName").val();
    $(this).parents(".campusForm").find("#institutionNameField").val(institutionName);
    var institutionKind = $(this).parents(".tzdTableRow").find("#institutionKind").val();
    $(this).parents(".campusForm").find("#institutionKindField").val(institutionKind);
    var id = $(this).parents(".tzdTableRow").attr("id").replace("institution", "");
    $(this).parents(".campusForm").find("#institutionIdField").val(id);
    var data = $(this).parents(".campusForm").serialize();
    institutions.campusUpdate( data )
  });

  // Remove the institutions from the database (logically)
  $(".tableDetailDropButton").live("click", function(){
    var id = $(this).parents(".tzdTableRow").attr("id").replace("institution", "");
    institutions.drop( id );
  });

  // show the attach form
  $(".tzdTableRowAttachButton").live("click", function(){
    var row = $(this).parents(".tzdTableRow");
    var id = row.attr("id").replace("institution", "");
    var attach = row.find(".tzdTableAttach");
    if(attach.find(".totalAttach").html().length == 0) institutions.getAttachs( id, attach );
    attach.toggle();    
  });

  $(".userfile").live("change propertychange", function(){
    var id = $(this).parents(".tzdTableRow").attr("id").replace("institution", "");
    institutions.addAttach( id, this.files );
    $(this).val("");
  });

  $(".dropAttach").live("click", function(){
    institutions.dropAttach($(this).attr("id").replace("attach", ""));
    $(this).parent().remove();
  });
  // ordering the list
  $(".reorder").live("click", function(){
    $(this).parents(".btn-group").find("button").html($(this).html());
    table.order = $(this).attr("id");
    var headquarters = institutions.result.filter(function ( institution ) {
      return institution.campusHeadquarter == 1;
    });
    table.insertRow( headquarters );
  });

  // clear the searchString
  $(".clearSearch").live("click", function(){
    $("#showActives").addClass("label-info");
    $("#showInactives").addClass("label-info");
    $("#showKindSchool").addClass("active");
    $("#showKindOther").addClass("active");
    $('#search-query').val("");
    institutions.result = institutions.all;
    var headquarters = institutions.result.filter(function ( institution ) {
      return institution.campusHeadquarter == 1;
    });
    table.insertRow( headquarters );
  });

  // filter table by status
  $(".institutionFilter").live("click", function(){

    var filter = $(this).attr("id");
    if (filter == "showKindSchool" || filter == "showKindOther") {
      if($(this).hasClass("active")) $(this).removeClass("active");
      else $(this).addClass("active");
    }
    if (filter == "showActives" || filter == "showInactives") {
      if($(this).hasClass("label-info")) $(this).removeClass("label-info");
      else $(this).addClass("label-info");
    }

    var statusActive = $("#showActives").hasClass("label-info");
    var statusInactive = $("#showInactives").hasClass("label-info");
    var kindSchool = $("#showKindSchool").hasClass("active");
    var kindOther = $("#showKindOther").hasClass("active");

    var filtered = institutions.result.filter(function ( institution ) {
      var match = true;

      if(statusActive && statusInactive);
      else if(statusActive) match = match && institution.institutionStatus == "active";
      else if(statusInactive) match = match && institution.institutionStatus == "inactive";
      
      if(kindSchool && kindOther);
      else if(kindSchool) match = match && institution.institutionKind == 1;
      else if(kindOther) match = match && institution.institutionKind == 2;

      return match;
    });
    var headquarters = filtered.filter(function ( institution ) {
      return institution.campusHeadquarter == 1;
    });
    table.insertRow( headquarters );

  });
});