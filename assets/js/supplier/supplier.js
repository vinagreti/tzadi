$(document).ready(function(){
  var table = function( tableElement ) {
    this.body = tableElement;
    this.brief = this.body.find(".tzdTableBrief").clone();
    this.body.find(".tzdTableBrief").remove();
    this.campusNavTab = this.body.find(".campusNavTab").clone();
    this.body.find(".campusNavTab").remove();
    this.campus = this.body.find(".tzdTableCampus").clone();
    this.body.find(".tzdTableCampus").remove();
    this.attachment = this.body.find(".attachment").clone();
    this.body.find(".attachment").remove();
    this.detail = this.body.find(".tzdTableDetail").clone();
    this.body.find(".tzdTableDetail").remove();
    this.line = this.body.find(".tzdTableLine").clone();
    this.line.show();
    this.body.find(".tzdTableLine").remove();
    this.status = "active";
    this.order = "name";
    this.empty = function(){
      this.body.find(".tzdTableLine").remove();
    };
    this.addLine = function( id, position, open ){
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", id)[0];
      if(this.status == "all" || objSupplier.status == this.status){
        var brief = this.createBrief( id );
        var line = this.line.clone();
        line.attr("id", objSupplier._id);
        line.children().html(brief);
        this.body.children().append(line);
        if(position && position == "before") this.body.children().prepend(line);
        else this.body.children().append(line);
      }
      if(open && open == true) this.openDetails( id );
    };
    this.createBrief = function( id ){
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", id)[0];
      var brief = this.brief.clone();
      if(objSupplier.status == "active") brief.find(".supplierStatus").addClass("btn-success").removeClass("btn-danger").html($(".splr_active").html());
      else brief.find(".supplierStatus").addClass("btn-danger").removeClass("btn-success").html($(".splr_inactive").html());
      brief.find(".name").html(objSupplier.name);
      return brief;
    };
    this.reCalc = function(){
      var totalRows = suppliers.table.body.find(".tzdTableRow").length;
      $(".totalRows").html(totalRows);
    };
    this.createCampus = function( supplierID, campusID ){
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
      var objCampus = $tzd.list.getBy(objSupplier.campi, "_id", campusID)[0];
      var campus = this.campus.clone();
      campus.attr("id", objCampus._id);
      campus.find(".campusName").val(objCampus.name);
      campus.find(".address").val(objCampus.address);
      campus.find(".cep").val(objCampus.cep);
      campus.find(".cep").mask('99999-999');
      campus.find(".city").val(objCampus.city);
      campus.find(".state").val(objCampus.state);
      campus.find(".country").val(objCampus.country);
      campus.find(".email").val(objCampus.email);
      campus.find(".phone").val(objCampus.phone);
      campus.find(".mobile").val(objCampus.mobile);
      campus.find(".details").val(objCampus.details);
      return campus;
    };
    this.openDetails = function( supplierID ){
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
      var line = this.body.find("#"+objSupplier._id);
      var detail = this.detail.clone();
      if(objSupplier.status == "active") detail.find(".supplierStatus").addClass("btn-success").removeClass("btn-danger").html($(".splr_active").html());
      else detail.find(".supplierStatus").addClass("btn-danger").removeClass("btn-success").html($(".splr_inactive").html());
      if(objSupplier.img) detail.find(".changeImg").attr("src", base_url+"file/open/"+objSupplier.img);
      detail.find(".name").val(objSupplier.name);
      line.children().html(detail);
      // somente depois de inserir a linha
      for (var i = 0; i < objSupplier.attachment.length; i++) {
        this.attach( supplierID, objSupplier.attachment[i] );
      }
      for (var i = 0; i < objSupplier.campi.length; i++) {
        this.addCampus( supplierID, objSupplier.campi[i] );
        if(objSupplier.campi[i]._id == objSupplier.headquarter) {
          line.find("#"+objSupplier.campi[i]._id).addClass("active");
          line.find("#"+objSupplier.campi[i]._id).find("i").remove();
        }
      }
      this.openCampus( objSupplier.headquarter );
    };
    this.addCampus = function( supplierID, campus ){
      var line = this.body.find("#"+supplierID);
      var campusNavTab = this.campusNavTab.clone();
      campusNavTab.find(".name").html(campus.name)
      campusNavTab.attr("id", campus._id);
      campusNavTab.insertBefore(line.find(".campusNavAdd"));
      return campusNavTab;
    };
    this.openCampus = function( campusID ) {
      var line = this.body.find("#"+campusID).parents(".tzdTableLine");
      line.find(".tzdTableCampus").remove();
      supplierID = line.attr("id");
      var campus = this.createCampus( supplierID, campusID );
      campus.insertAfter(line.find(".tzdTableCampusNav"));
      line.find(".campusNavTab").removeClass("active");
      line.find(".tzdTableCampusNav").find("#"+campusID).addClass("active");
    };
    this.closeDetails = function( supplierID ){
      var line = this.body.find("#"+supplierID);
      var brief = this.createBrief( supplierID );
      line.children().html(brief);
    };
    this.drop = function( supplierID ){
      var line = this.body.find("#"+supplierID);
      line.remove();
    };
    this.active = function( supplierID ){
      var line = this.body.find("#"+supplierID);
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
      if(objSupplier.status == "active") line.find(".supplierStatus").addClass("btn-success").removeClass("btn-danger").html($(".splr_active").html());
      else line.find(".supplierStatus").addClass("btn-danger").removeClass("btn-success").html($(".splr_inactive").html());
    };
    this.dropCampus = function( campusID ){
      var line = this.body.find("#"+campusID).parents(".tzdTableLine");
      line.find(".tzdTableCampusNav").find("#"+campusID).remove();
      if(line.find(".tzdTableCampus").attr("id") == campusID) {
        var supplierID = line.attr("id");
        var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
        this.openCampus( objSupplier.headquarter );
      }
    };
    this.changeImg = function( supplierID ){
      var line = this.body.find("#"+supplierID);
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
      line.find(".changeImg").attr("src", base_url+"file/open/"+objSupplier.img);
    };
    this.attach = function( supplierID, objAttachment ){
      var line = this.body.find("#"+supplierID);
      var attachment = this.attachment.clone();
      attachment.attr("id", objAttachment._id);
      attachment.find("a").attr("href", base_url+"file/download/"+objAttachment._id)
      attachment.find("a").attr("title", objAttachment.name)
      attachment.find("a").html(objAttachment.name.split("", 23))
      line.find(".attachments").prepend(attachment);
    };
    this.dropAttachment = function( supplierID, attachmentID ){
      var line = this.body.find("#"+supplierID);
      line.find(".attachments").find("#"+attachmentID).remove();
    };
    this.getFormData = function( supplierID, campusID ){
      var formData = {};
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
      var objCampus = $tzd.list.getBy(objSupplier.campi, "_id", campusID)[0];
      var line = this.body.find("#"+supplierID);
      if(objSupplier.name != line.find(".name").val())
        formData.name = line.find(".name").val();
      if(objCampus.campusName != line.find(".campusName").val())
        formData.campusName = line.find(".campusName").val();
      if(objCampus.address != line.find(".address").val())
        formData.address = line.find(".address").val();
      if(objCampus.cep != line.find(".cep").val())
        formData.cep = line.find(".cep").val();
      if(objCampus.city != line.find(".city").val())
        formData.city = line.find(".city").val();
      if(objCampus.state != line.find(".state").val())
        formData.state = line.find(".state").val();
      if(objCampus.country != line.find(".country").val())
        formData.country = line.find(".country").val();
      if(objCampus.email != line.find(".email").val())
        formData.email = line.find(".email").val();
      if(objCampus.phone != line.find(".phone").val())
        formData.phone = line.find(".phone").val();
      if(objCampus.mobile != line.find(".mobile").val())
        formData.mobile = line.find(".mobile").val();
      if(objCampus.details != line.find(".details").val())
        formData.details = line.find(".details").val();

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
    this.changeCampusNavName = function( campusID, name ){
      var line = this.body.find("#"+campusID).parents(".tzdTableLine");
      line.find(".tzdTableCampusNav").find("#"+campusID).find(".name").html(name);
    }
  };

  suppliers = {
    all : []
    , table : new table( $(".tzdTable") )
    , reload : function(){
      var url = base_url+'supplier/getAll';
      var data = {
        tzadiToken : tzadiToken
      };
      var callback = function( e ){
        suppliers.all = e;
        suppliers.all = $tzd.list.orderBy(suppliers.table.order, suppliers.all);
        suppliers.search( $('#search-query').val() );
      };
      $tzd.ajax.post(url, data, callback);
    }
    , search : function( searchString ){
      if( searchString == "") {
        $('#search-query').val("");
        suppliers.table.empty();
        $.each(suppliers.all, function( id, objSupplier ){
          if(objSupplier != "null") suppliers.table.addLine( objSupplier._id, false, false );
        });
        suppliers.table.reCalc();
      } else {
        var foundSuppliers = suppliers.all.filter(function ( supplier ) {
          var contain = contain || supplier.name.search(new RegExp(searchString, "i")) >= 0;
          return contain;
        });
        suppliers.table.empty();
        $.each(foundSuppliers, function( id, objSupplier ){
          $.each(suppliers.all, function( id, supplier ){
            if(supplier._id == objSupplier._id) suppliers.table.addLine( objSupplier._id, false, false );
          });
        });
        suppliers.table.reCalc();
      }
    }
    , order : function(){
      this.all = tzdOrderBy(this.table.order, this.all);
    }
    , add : function( name ){
      var url = base_url+'supplier/add';
      var data = {
        tzadiToken : tzadiToken
        ,name : name
      };
      var callback = function( e ){
        var id = suppliers.all.length;
        suppliers.all[id] = e;
        suppliers.table.addLine( e._id, "before", true );
      };
      $tzd.ajax.post(url, data, callback)
    }
    , clone : function( supplierID ){
      var url = base_url+'supplier/makeClone';
      var data = {
        tzadiToken : tzadiToken
        ,supplierID : supplierID
      };
      var callback = function( e ){
        var id = suppliers.all.length;
        suppliers.all[id] = e;
        suppliers.table.addLine( e._id, "before", true );
      };
      $tzd.ajax.post(url, data, callback)
    }
    , drop : function( supplierID ){
      var url = base_url+'supplier/drop';
      var data = {
        tzadiToken : tzadiToken
        , _id : supplierID
      };
      var callback = function( e ){
        if( e == true ){
          var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
          var id = suppliers.all.indexOf(objSupplier);
          suppliers.all.splice(id, 1);
          suppliers.table.drop( supplierID );
        } else $tzd.alert.error(e);
      };
      $tzd.ajax.post(url, data, callback);
    }
    , active : function( supplierID ){
      var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
      if(objSupplier.status == "active") newStatus = "inactive";
      else var newStatus = "active";
      var url = base_url+'supplier/activate';
      var data = {
        tzadiToken : tzadiToken
        , _id : supplierID
        , status : newStatus
      };
      var callback = function( e ){
        if(e == true) {
          var id = suppliers.all.indexOf(objSupplier);
          suppliers.all[id].status = newStatus;
          suppliers.table.active( supplierID );          
        } else  $tzd.alert.error(e);

      };
      $tzd.ajax.post(url, data, callback);
    }
    , addCampus : function( supplierID ){
      var url = base_url+'supplier/addCampus';
      var data = {
        tzadiToken : tzadiToken
        , supplier : supplierID
      };
      var callback = function( e ){
        var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
        objSupplier.campi.push( e );
        suppliers.table.addCampus( supplierID, e );
        suppliers.table.openCampus( e._id );
      };
      $tzd.ajax.post(url, data, callback)
    }
    , dropCampus : function( supplierID, campusID ){
      var url = base_url+'supplier/dropCampus';
      var data = {
        tzadiToken : tzadiToken
        , supplier_id : supplierID
        , campus_id : campusID
      };
      var callback = function( e ){
        if( e == true ){
          var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
          var objCampus = $tzd.list.getBy(objSupplier.campi, "_id", campusID)[0];
          var id = objSupplier.campi.indexOf(objCampus);
          objSupplier.campi.splice(id, 1);
          suppliers.table.dropCampus( campusID );
        }
        else $tzd.alert.error(e);
      };
      $tzd.ajax.post(url, data, callback)
    }
    , changeImg : function( supplierID, files ) {
      var url = base_url+'supplier/changeImg';
      var data = {
        tzadiToken : tzadiToken,
        files : files,
        _id : supplierID
      };
      var callback = function( e ){
        if(e.imgID){
          var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
          var id = suppliers.all.indexOf(objSupplier);
          suppliers.all[id].img = e.imgID;
          suppliers.table.changeImg( supplierID );
        }
        else $tzd.alert.error(e.error);
      };
      $tzd.ajax.upload(url, data, callback);
    }
    , attach : function( supplierID, files ) {
      var url = base_url+'supplier/attach';
      var data = {
        tzadiToken : tzadiToken,
        files : files,
        _id : supplierID
      };
      var callback = function( e ){
        if(e.newFile){
          var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
          var id = suppliers.all.indexOf(objSupplier);
          suppliers.all[id].attachment.push(e.newFile);
          suppliers.table.attach( supplierID, e.newFile );
        }
        else $tzd.alert.error(e.error);
      };
      $tzd.ajax.upload(url, data, callback);
    }
    , dropAttachment : function( supplierID, attachmentID ) {
      var url = base_url+'supplier/dropAttachment';
      var data = {
        tzadiToken : tzadiToken
        , supplier_id :supplierID
        , attachment_id : attachmentID
      };
      var callback = function( e ){
        if(e){
          suppliers.table.dropAttachment( supplierID, attachmentID );
        }
        else $tzd.alert.error(e.error);
      };
      $tzd.ajax.post(url, data, callback);
    }
    , update : function( supplierID, campusID ){
      var newData = this.table.getFormData(supplierID, campusID);
      if(newData){
        var url = base_url+'supplier/update';
        var data = {
          tzadiToken : tzadiToken
          , supplier_id :supplierID
          , campus_id : campusID
          , newData : newData
        };
        var callback = function( e ){
          e._id = supplierID;
          var objSupplier = $tzd.list.getBy(suppliers.all, "_id", supplierID)[0];
          var id = suppliers.all.indexOf(objSupplier);
          suppliers.all[id] = e;
          if(newData.campusName) suppliers.table.changeCampusNavName( campusID, newData.campusName );
          $tzd.alert.success($(".tmpt_changesSaved").html());
        };
        $tzd.ajax.post(url, data, callback);
      } else {
        $tzd.alert.error($(".splr_noChange").html());
      }
    }
  }

  suppliers.reload();

  $('#search-query').live('keyup propertychange', function(){
    var searchString = $(this).val();
    suppliers.search( searchString );      
  });
  $(".clearSearch").live("click", function(){
    if($('#search-query').val() != "") suppliers.search( "" ); 
  });
  $(".addSupplier").live("click", function(){
    suppliers.add( $('#search-query').val());
  });
  $(".clone").live("click", function(){
    var supplierID = $(this).parents(".tzdTableLine").attr("id");
    suppliers.clone( supplierID );
  });
  $(".reload").live("click", function(){
    suppliers.reload();
  });
  $(".campusNavTab").live("click", function(){
    suppliers.table.openCampus($(this).attr("id"));
  });
  $(".closeDetail").live("click", function(){
    var supplierID = $(this).parents(".tzdTableLine").attr("id");
    suppliers.table.closeDetails( supplierID );
  });
  $(".openDetail").live("click", function(){
    var supplierID = $(this).parents(".tzdTableLine").attr("id");
    suppliers.table.openDetails( supplierID );
  });
  $(".drop").live("click", function(){
    if($tzd.confirm($(".splr_removeSupplier").html())){
      var supplierID = $(this).parents(".tzdTableLine").attr("id");
      suppliers.drop( supplierID );
    }
  });
  $(".supplierStatus").live("click", function(){
    var supplierID = $(this).parents(".tzdTableLine").attr("id");
    suppliers.active( supplierID );
  });
  $(".campusNavAdd").live("click", function(){
    var supplierID = $(this).parents(".tzdTableLine").attr("id");
    suppliers.addCampus( supplierID );
  });
  $(".campusRemove").live("click", function(){
    if($tzd.confirm($(".splr_removeCampus").html())){
      var campusID = $(this).parents(".campusNavTab").attr("id");
      var supplierID = $(this).parents(".tzdTableLine").attr("id");
      suppliers.dropCampus( supplierID, campusID );
    }
  });
  $('.changeImg').live("click", function() {
    $(this).parents(".tzdTableLine").find('.supplierImg').click();
  });
  $(".supplierImg").live("change propertychange", function(){
    var supplierID = $(this).parents(".tzdTableLine").attr("id");
    suppliers.changeImg( supplierID, this.files );
  });
  $('.attach').live("click", function() {
    $(this).parents(".tzdTableLine").find('.selectFile').click();
  });
  $(".selectFile").live("change propertychange", function(){
    var supplierID = $(this).parents(".tzdTableLine").attr("id");
    suppliers.attach( supplierID, this.files );
  });
  $('.dropAttachment').live("click", function() {
    if($tzd.confirm($(".splr_removeAttachment").html())){
      var supplierID = $(this).parents(".tzdTableLine").attr("id");
      var attachmentID = $(this).parents(".attachment").attr("id");
      suppliers.dropAttachment(supplierID, attachmentID);
    }
  });
  $('.save').live("click", function() {
    var line = $(this).parents(".tzdTableLine");
    var valid = true;

    valid = valid && $tzd.form.checkMask.range(line.find(".name"), 1, 512, $(".splr_invalidName").html());
    valid = valid && $tzd.form.checkMask.range(line.find(".campusName"), 1, 512, $(".splr_invalidCampusName").html());
    valid = valid && $tzd.form.checkMask.cep(line.find(".cep"), $(".splr_invalidCep").html());

    if( valid ) {
      var supplierID = $(this).parents(".tzdTableLine").attr("id");
      var campusID = $(this).parents(".tzdTableLine").find(".tzdTableCampus").attr("id");
      suppliers.update(supplierID, campusID);
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
      suppliers.table.status = $(this).attr("id");
      suppliers.search( $('#search-query').val() );
    } else {
      suppliers.search( $('#search-query').val() );
    }
  });
});