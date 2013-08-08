$(document).ready(function(){

  var table = function( ) {
    // iniciando o objeto tabela
    this.body = $(".tzdTable");
    this.header = this.body.find(".tzdTableHeader");
    this.brief = this.body.find(".tzdTableBrief").clone();
    this.body.find(".tzdTableBrief").remove();
    this.attachment = this.body.find(".attachment").clone();
    this.body.find(".attachment").remove();
    this.detail = this.body.find(".tzdTableDetail").clone();
    this.detail.removeClass("hide");
    this.body.find(".tzdTableDetail").remove();
    this.line = this.body.find(".tzdTableLine").clone();
    this.line.show();
    this.body.find(".tzdTableLine").remove();
    this.status = "active";
    this.order = "name";


    this.createDetail = function( id ){
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      var detail = this.detail.clone();
      detail.find("#name").val(objCustomer.name);
      detail.find("#customerEmail").val(objCustomer.email);
      detail.find("#phone").val(objCustomer.phone);
      detail.find("#cellphone").val(objCustomer.cellphone);
      detail.find("#birth").val(objCustomer.birth);
      detail.find("#birth").mask('00/00/0000');
      detail.find("#address").val(objCustomer.address);
      detail.find("#city").val(objCustomer.city);
      detail.find("#state").val(objCustomer.state);
      detail.find("#country").val(objCustomer.country);
      detail.find("#details").val(objCustomer.details);
      if(objCustomer.status == "active") detail.find(".customerActive").addClass("btn-success").removeClass("btn-danger").html($(".ctm_inactivate").html());
      else detail.find(".customerActive").addClass("btn-danger").removeClass("btn-success").html($(".ctm_activate").html());
      if(objCustomer.img) detail.find(".changeImg").attr("src", base_url+"file/open/"+objCustomer.img);
      return detail;
    };

    this.addLine = function( id, position, open ){
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      //console.log(objCustomer.status);
      if(this.status == "all" || objCustomer.status == this.status){
        var brief = this.createBrief( id );
        var line = this.line.clone();
        line.attr("id", objCustomer._id);
        line.children().html(brief);
        this.body.children().append(line);
        if(position && position == "append") this.body.children().append(line);
        else this.body.children().prepend(line);
      }
      if(open && open == true) this.openDetails( id );
    };

    this.createBrief = function( id ){
      // copiamos o objeto cliente dentro do array de objetos
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      // criamos uma nova div do tipo brief
      var brief = this.brief.clone();
      // preenchemos a div com os dados do objeto
      brief.find(".customerID").html(objCustomer._id);
      brief.find(".name").html(objCustomer.name);
      brief.find(".customerEmail").html(objCustomer.email);
      if(objCustomer.status == "active") brief.find(".customerActive").addClass("btn-success").removeClass("btn-danger").html($(".ctm_inactivate").html());
      else brief.find(".customerActive").addClass("btn-danger").removeClass("btn-success").html($(".ctm_activate").html());
      return brief;
    };

    this.openDetails = function( id ){
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      var line = this.body.find("#"+id);
      var detail = this.createDetail( id );
      line.children().html(detail);
      for (var i = 0; i < objCustomer.attachment.length; i++) {
        this.attach( id, objCustomer.attachment[i] );
      }
    };

    this.closeDetails = function( id ){
      var brief = this.createBrief( id );
      var line = this.body.find("#"+id);
      line.children().html(brief);
    };

    this.dropLine = function( id ){
      var line = this.body.find("#"+id);
      line.remove();
    };

    this.empty = function(){
      $(".tzdTableLine").remove();
    };

    this.changeImg = function( id ){
      console.log(id);
      var line = this.body.find("#"+id);
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      line.find(".changeImg").attr("src", base_url+"file/open/"+objCustomer.img);
    };

    this.attach = function( id, objAttachment ){
      var line = this.body.find("#"+id);
      var attachment = this.attachment.clone();
      attachment.attr("id", objAttachment._id);
      attachment.find("a").attr("href", base_url+"file/download/"+objAttachment._id)
      attachment.find("a").attr("title", objAttachment.name)
      attachment.find("a").html(objAttachment.name.split("", 23))
      line.find(".attachments").prepend(attachment);
    };

    this.dropAttachment = function( id, attachmentID ){
      var line = this.body.find("#"+id);
      line.find(".attachments").find("#"+attachmentID).remove();
    };

    this.active = function( id ){
      var line = this.body.find("#"+id);
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      if(objCustomer.status == "active") line.find(".customerActive").addClass("btn-success").removeClass("btn-danger").html($(".ctm_inactivate").html());
      else line.find(".customerActive").addClass("btn-danger").removeClass("btn-success").html($(".ctm_activate").html());
      };
    this.getFormData = function( id ){
      var formData = {};
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      var line = customers.table.body.find("#"+id);
      if(objCustomer.name != line.find("#name").val()) formData.name = line.find("#name").val();
      if(objCustomer.email != line.find("#customerEmail").val()) formData.email = line.find("#customerEmail").val();
      if(objCustomer.phone != line.find("#phone").val()) formData.phone = line.find("#phone").val();
      if(objCustomer.cellphone != line.find("#cellphone").val()) formData.cellphone = line.find("#cellphone").val();
      if(objCustomer.birth != line.find("#birth").val()) formData.birth = line.find("#birth").val();
      if(objCustomer.address != line.find("#address").val()) formData.address = line.find("#address").val();
      if(objCustomer.city != line.find("#city").val()) formData.city = line.find("#city").val();
      if(objCustomer.state != line.find("#state").val()) formData.state = line.find("#state").val();
      if(objCustomer.country != line.find("#country").val()) formData.country = line.find("#country").val();
      if(objCustomer.details != line.find("#details").val()) formData.details = line.find("#details").val();
      var count = 0;
      var i;
      for (i in formData) {
          if (formData.hasOwnProperty(i)) {
              count++;
          }
      }
      if(count > 0) return formData;
      else return false;
    };
    this.reCalc = function(){
      var totalRows = customers.table.body.find(".tzdTableRow").length;
      $(".totalRows").html(totalRows);
    };
  };


  var customers = {
    all : []
    ,table : new table()
    ,add : function( ){
      var url = base_url+'customer/add';
      var data = {
        tzadiToken : $('input[name=tzadiToken]').val()
        ,name : $('#search-query').val()
      };
      var callback = function( e ){
        customers.all.push(e);
        customers.table.addLine( e._id );
        customers.table.openDetails( e._id );
        customers.table.reCalc();
      };

      $tzd.ajax.post(url, data, callback);
    }
    ,active : function( id ){
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      if(objCustomer.status == 'active') objCustomer.status = 'inactive';
      else objCustomer.status = 'active';
      var url = base_url+'customer/set';
      var data = {
        tzadiToken : tzadiToken,
        _id : objCustomer._id,
        status : objCustomer.status
      };
      var callback = function( e ){
        var index = customers.all.indexOf( objCustomer );
        customers.all[index]["status"] = objCustomer.status;
        customers.table.active( id );
      };
      $tzd.ajax.post(url, data, callback);
    }
    ,openDetails : function( id ){
      this.table.openDetails( id );
    }
    ,closeDetails : function( id ){
      this.table.closeDetails( id );
    }
    ,set : function( id ){
      var url = base_url+'customer/set';
      var formData = this.table.getFormData( id );
      if(formData){
        formData.tzadiToken = tzadiToken;
        var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
        formData._id = objCustomer._id;
        var callback = function( e ){
          $tzd.alert.success($(".ctm_saved").html());
          var index = customers.all.indexOf( objCustomer );
          customers.all[index] = e;
        };
        $tzd.ajax.post(url, formData, callback);
      } else {
        $tzd.alert.error($(".ctm_noChanges").html());
      }
    }
    ,drop : function( id ){
      var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
      if($tzd.confirm($(".ctm_removeCustomer").html()+"?")){
        var url = base_url+'customer/drop';
        var data = {
          tzadiToken : $('input[name=tzadiToken]').val(),
          _id : objCustomer._id
        };
        var callback = function( e ){
          customers.all[id] = "null";
          customers.table.dropLine( id );
          customers.table.reCalc();
        };
        $tzd.ajax.post(url, data, callback);
      }
    }
    ,refresh : function( ) {
      var url = base_url+'customer/getAll';
      var data = {
        tzadiToken : tzadiToken
      };
      var callback = function( e ){
        customers.all = e;
        customers.all = $tzd.list.orderBy(customers.table.order, customers.all);
        customers.search( $('#search-query').val() );
      };
      $tzd.ajax.post(url, data, callback);
    }
    , changeImg : function( id, files ) {
      var url = base_url+'customer/changeImg';
      var data = {
        tzadiToken : tzadiToken,
        files : files,
        _id : id
      };
      var callback = function( imgID ){
        if( imgID ){
          var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
          var cdid = customers.all.indexOf(objCustomer);
          customers.all[cdid].img = imgID;
          customers.table.changeImg( id );
          console.log(cdid);
        }
        else $tzd.alert.error( "falha ao trocar imagem" );
      };
      $tzd.ajax.upload(url, data, callback);
    }

    , attach : function( id, files ) {
      var url = base_url+'customer/attach';
      var data = {
        tzadiToken : tzadiToken,
        files : files,
        _id : id
      };
      var callback = function( e ){
        if(e.newFile){
          var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
          var id2 = customers.all.indexOf(objCustomer);
          customers.all[id2].attachment.push(e.newFile);
          customers.table.attach( id, e.newFile );
        }
        else $tzd.alert.error(e.error);
      };
      $tzd.ajax.upload(url, data, callback);
    }

    , dropAttachment : function( id, attachmentID ) {
      var url = base_url+'customer/dropAttachment';
      var data = {
        tzadiToken : tzadiToken
        , customer_id :id
        , attachment_id : attachmentID
      };
      var callback = function( e ){
        if(e){
          var objCustomer = $tzd.list.getBy(customers.all, "_id", id)[0];
          var id2 = customers.all.indexOf(objCustomer);
          var attachments = customers.all[id2].attachment;
          var id3 = attachments.indexOf(attachmentID);
          attachments.splice(id3, 1);
          customers.all[id2].attachment[id3] = attachments;
          customers.table.dropAttachment( id, attachmentID );
        }
        else $tzd.alert.error(e.error);
      };
      $tzd.ajax.post(url, data, callback);
    }

    ,search : function( searchString ){
      if( searchString == "") {
        customers.table.empty();
        $.each(customers.all, function( id, objCustomer ){
          if(objCustomer != "null") customers.table.addLine( objCustomer._id, false, false );
        });
        customers.table.reCalc();
      } else {
        var foundCustomers = customers.all.filter(function ( customer ) {
          var contain = contain || customer.name.search(new RegExp(searchString, "i")) >= 0;
          return contain;
        });
        customers.table.empty();
        $.each(foundCustomers, function( id, objCustomer ){
          customers.table.addLine( objCustomer._id, false, false );
        });
        customers.table.reCalc();
      }
    }
    ,order : function(){
      customers.all = $tzd.list.orderBy(customers.table.order, customers.all);
    }

  };
  if(!list) {
    var list = {
    // sort list by attribute
    orderBy : function(attribute, list){
      var reorder = function compare(a,b) {
        if (a[attribute].toLowerCase() > b[attribute].toLowerCase())
           return -1;
        if (a[attribute].toLowerCase() < b[attribute].toLowerCase())
          return 1;
        return 0;
      }
      return list.sort(reorder).reverse();
    }
    // get match list
    ,getBy : function( list, attribute, value ){
      var found = list.filter(function ( item ) {
        return item[attribute] == value;
      });
      return found;
    }
  }
};


  // esse comando força o carregamento inicial dos clientes na tabela
  customers.refresh();

  // eventos para manipulação da tabela
  $(".openDetail").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    customers.openDetails( id );
  });

  $('.customerSave').live("click", function() {
    var id = $(this).parents(".tzdTableLine").attr("id");
    var line = $(this).parents(".tzdTableLine");
    var valid = true;

    valid = valid && $tzd.form.checkMask.range(line.find(".name"), 1, 512, $(".ctm_pleaseFillName").html());
    valid = valid && $tzd.form.checkMask.email($('#customerEmail'), $(".ctm_pleaseFillValidEmail").html() );
    valid = valid && $tzd.form.checkMask.range($('#phone'), 0, 32, $(".ctm_pleaseFillValidPhone").html() );
    valid = valid && $tzd.form.checkMask.range($('#cellphone'), 0, 32, $(".ctm_pleaseFillValidCellphone").html() );
    valid = valid && $tzd.form.checkMask.range($('#birth'), 0, 10, $(".ctm_pleaseFillValidBirth").html() );
    valid = valid && $tzd.form.checkMask.range($('#address'), 0, 255, $(".ctm_pleaseFillValidAddress").html() );
    valid = valid && $tzd.form.checkMask.range($('#city'), 0, 255, $(".ctm_pleaseFillValidCity").html() );
    valid = valid && $tzd.form.checkMask.range($('#state'), 0, 128, $(".ctm_pleaseFillValidState").html() );
    valid = valid && $tzd.form.checkMask.range($('#country'), 0, 128, $(".ctm_pleaseFillValidCountry").html() );
    valid = valid && $tzd.form.checkMask.range($('#details'), 0, 1024, $(".ctm_pleaseFillValiDetails").html() );
    if ( valid ) 
      customers.set(id);
  });

  $(".tableCancelButton").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    customers.closeDetails( id );
  });

  $(".customerDrop").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    customers.drop( id );
  });

  $(".customerActive").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    customers.active( id );
  });
  $(".customerAdd").live("click", function(){
    customers.add();
  });
  $(".tzdTableRefresh").live("click", function(){
    $(".orderDiv").find("#"+customers.table.order).find("i").removeClass();
    $(".orderDiv").find("#"+customers.table.order).find("i").addClass("icon-chevron-down");
    $(".orderDivOpen").find("i").removeClass();
    $(".orderDivOpen").find("i").addClass("icon-chevron-down");
    customers.refresh();
  });
  $('#search-query').live('keyup propertychange', function(){
    var searchString = $(this).val();
    customers.search( searchString );      
  });  
  $(".clearSearch").live("click", function(){
    $('#search-query').val("");
    customers.search( "" ); 
  });
  $('.changeImg').live("click", function() {
    $(this).parents(".tzdTableLine").find('.customerImg').click();
  });
  $(".customerImg").live("change propertychange", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    customers.changeImg( id, this.files );
  });
  $('.attach').live("click", function() {
    $(this).parents(".tzdTableLine").find('.selectFile').click();
  });
  $(".selectFile").live("change propertychange", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    customers.attach( id, this.files );
  });
  $('.dropAttachment').live("click", function() {
    if($tzd.confirm($(".ctm_removeAttachment").html())){
      var id = $(this).parents(".tzdTableLine").attr("id");
      var attachmentID = $(this).parents(".attachment").attr("id");
      customers.dropAttachment(id, attachmentID);
    }
  });
  $(".statusDivOpen").live("click", function(){
    $(".statusDiv").toggle();
  });
  $(".statusDivClose").live("click", function(){
    $(".statusDiv").hide();
  });
$(".statusFilter").live("click", function(){
    if(!$(this).hasClass("label label-success")){
      $(".statusFilter").addClass("text-success").removeClass("label label-success");
      $(".statusDivOpen").html($(this).html());
      $(this).removeClass("text-success").addClass("label label-success");
      customers.table.status = $(this).attr("id");
      customers.search( $('#search-query').val() );
    } else {
      customers.search( $('#search-query').val() );
    }
  });
  $(".orderDivOpen").live("click", function(){
    $(".orderDiv").toggle();
  });
  $(".orderDivClose").live("click", function(){
    $(".orderDiv").hide();
  });
  $(".order").live("click", function(){
    if($(this).hasClass("label label-success")){
      if($(this).find("i").hasClass("icon-chevron-down"))
        $(this).find("i").removeClass("icon-chevron-down").addClass("icon-chevron-up");
      else
        $(this).find("i").removeClass("icon-chevron-up").addClass("icon-chevron-down");
      customers.all.reverse();
      customers.search( $('#search-query').val() );
      $(".orderDivOpen").html($(this).html());
    } else {
      $(this).parent().find(".order").find("i").removeClass();
      $(this).find("i").addClass("icon-chevron-down");
      $(".order").addClass("text-success").removeClass("label label-success");
      $(".orderDivOpen").html($(this).html());
      $(this).removeClass("text-success").addClass("label label-success");
      customers.table.order = $(this).attr("id");
      customers.order();
      customers.search( $('#search-query').val() );
    }
  });
});