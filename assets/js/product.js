$(document).ready(function(){
  var table = function( ) {
    this.body = $(".tzdTable");
    this.brief = this.body.find(".tzdTableBrief").clone();
    this.body.find(".tzdTableBrief").remove();
    this.campus = this.body.find(".campus").clone();
    this.body.find(".campusForm").remove();
    this.accommodationForm = this.body.find(".accommodationForm").clone();
    this.body.find(".accommodationForm").remove();
    this.passForm = this.body.find(".passForm").clone();
    this.body.find(".passForm").remove();
    this.workForm = this.body.find(".workForm").clone();
    this.body.find(".workForm").remove();
    this.courseForm = this.body.find(".courseForm").clone();
    this.body.find(".courseForm").remove();
    this.ensuranceForm = this.body.find(".ensuranceForm").clone();
    this.body.find(".ensuranceForm").remove();
    this.detail = this.body.find(".tzdTableDetail").clone();
    this.body.find(".tzdTableDetail").remove();
    this.line = this.body.find(".tzdTableLine").clone();
    this.line.show();
    this.body.find(".tzdTableLine").remove();
    this.status = "active";
    this.order = "name";

    this.createBrief = function( id ){
      var objProduct = products.all[id];
      var brief = this.brief.clone();
      if(objProduct.status == "active") brief.find(".productStatus").addClass("btn-success").removeClass("btn-danger").html($(".pdt_activate").html());
      else brief.find(".productStatus").addClass("btn-danger").removeClass("btn-success").html($(".pdt_inactivate").html());
      brief.find(".name").html(objProduct.name);

      brief.find(".productKind").html($("#"+objProduct.kind).html());

      var supplier = products.suppliers.filter(function ( supplier ) {
        return supplier._id == objProduct.supplier;
      });
      if(supplier[0] && supplier[0] != "0") brief.find(".productSupplier").html(supplier[0].name);
      else  brief.find(".productSupplier").html($(".pdt_ownProduct").html());
      return brief;
    };
    this.emptyBrief = function( id ){
      var line = this.body.find("#"+id);
      line.find(".openDetail").remove();
    };
    this.addLine = function( id, position ){
      var objProduct = products.all[id];
      if(this.status == "all" || objProduct.status == this.status){
        var brief = this.createBrief( id );
        var line = this.line.clone();
        line.attr("id", id)
        line.children().html(brief);
        if(position && position == "before") this.body.children().prepend(line);
        else this.body.children().append(line);
      }
    };
    this.openDetails = function( id ){
      var line = this.body.find("#"+id);
      var objProduct = products.all[id];
      var detail = this.detail.clone();
      line.children().html(detail);
      line.find(".productKind").html(objProduct.kind);
      line.find(".purchase").val(objProduct.purchase);
      line.find(".detail").val(objProduct.detail);
      line.find(".currency").select2();
      line.find('.currency').select2("val", objProduct.currency);
      line.find(".supplier").select2({
        formatNoMatches: function( term ){
          var link = "<a class='addPartner btn btn-success btn-mini' onclick='products.addSupplier("+'"'+term+'"'+", "+'"'+id+'"'+")'>"+$(".add").html()+"</a> "+term;
          return link;
        }
      });
      line.find('.supplier').select2("val", objProduct.supplier);
      this.showCampi( id );
      line.find('.supplier_campus').select2("val", objProduct.supplier_campus);
      if(objProduct.status == "active") line.find(".productStatus").addClass("btn-success").removeClass("btn-danger").html($(".pdt_activate").html());
      else line.find(".productStatus").addClass("btn-danger").removeClass("btn-success").html($(".pdt_inactivate").html());
      if(objProduct.img) line.find(".changeImg").attr("src", base_url+"file/open/"+objProduct.img);
      line.find(".name").val(objProduct.name);
      this.showKindForm( id );
    };
    this.showKindForm = function( id ){
      var objProduct = products.all[id];
      var line = this.body.find("#"+id);
      line.find(".kindForm").empty();
      switch(objProduct.kind) {
        case "course":
          var courseForm = this.courseForm.clone();
          line.find(".kindForm").html(courseForm);
          line.find(".courseDurationValue").val(objProduct.courseDurationValue);
          line.find(".courseDurationScale").select2();
          line.find(".courseDurationScale").select2("val", objProduct.courseDurationScale);
          line.find(".courseKind").select2();
          line.find(".courseKind").select2("val", objProduct.courseKind);
          line.find(".courseLanguage").val(objProduct.courseLanguage);
          line.find(".courseModality").select2();
          line.find(".courseModality").select2("val", objProduct.courseModality);
          line.find(".coursePeriod").select2();
          line.find(".coursePeriod").select2("val", objProduct.coursePeriod);
          line.find(".courseEnrollmentFees").val(objProduct.courseEnrollmentFees);
          line.find(".courseAdministrativeFees").val(objProduct.courseAdministrativeFees);
          line.find(".courseBook").val(objProduct.courseBook);
          line.find(".courseRequirements").val(objProduct.courseRequirements);
        break;
        case "ensurance":
          var ensuranceForm = this.ensuranceForm.clone();
          line.find(".kindForm").html(ensuranceForm);
          line.find(".ensuranceDurationValue").val(objProduct.ensuranceDurationValue);
          line.find(".ensuranceDurationScale").select2();
          line.find(".ensuranceDurationScale").select2("val", objProduct.ensuranceDurationScale);
        break;
        case "accommodation":
          var accommodationForm = this.accommodationForm.clone();
          line.find(".kindForm").html(accommodationForm);
          line.find(".accommodationKind").select2();
          line.find(".accommodationKind").select2("val", objProduct.accommodationKind);
          line.find(".accommodationPeopleNumber").val(objProduct.accommodationPeopleNumber);
          line.find(".accommodationDurationValue").val(objProduct.accommodationDurationValue);
          line.find(".accommodationDurationScale").select2();
          line.find(".accommodationDurationScale").select2("val", objProduct.accommodationDurationScale);
          line.find(".accommodationFood").select2();
          line.find(".accommodationFood").select2("val", objProduct.accommodationFood);
        break;
        case "pass":
          var passForm = this.passForm.clone();
          line.find(".kindForm").html(passForm);
          line.find(".passTransportKind").select2();
          line.find(".passTransportKind").select2("val", objProduct.passTransportKind);
          line.find(".passFrom").val(objProduct.passFrom);
          line.find(".passTo").val(objProduct.passTo);
        break;
        case "work":
          var workForm = this.workForm.clone();
          line.find(".kindForm").html(workForm);
          line.find(".workKind").select2();
          line.find(".workKind").select2("val", objProduct.workKind);
        break;
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
    this.active = function( id ){
      var line = this.body.find("#"+id);
      var objProduct = products.all[id];
      if(objProduct.status == "active") line.find(".productStatus").addClass("btn-success").removeClass("btn-danger").html($(".pdt_activate").html());
      else line.find(".productStatus").addClass("btn-danger").removeClass("btn-success").html($(".pdt_inactivate").html());
    };
    this.changePhoto = function( id ){
      var line = this.body.find("#"+id);
      var objProduct = products.all[id];
      line.find(".changeImg").attr("src", base_url+"file/open/"+objProduct.img);
    };
    this.addSupplier = function( supplier, id, index ){
      var tableSupplierSelect = this.detail.find(".supplier");
      tableSupplierSelect.append(
        $("<option></option>")
          .html(supplier.name)
          .val(supplier._id)
      );

      var supplierSelects = this.body.find(".supplier");
      supplierSelects.append(
        $("<option></option>")
          .html(supplier.name)
          .val(supplier._id)
      );

      products.table.body.find("#"+id).find('.supplier').select2("val", supplier._id);
      products.table.body.find("#"+id).find('.supplier').select2("close");
      this.showCampi( id );
    };
    this.addCampi = function( newCampus, id ){
      var campiSelects = products.table.body.find("#"+id).find(".supplier_campus");
      campiSelects.append(
        $("<option></option>")
          .html(newCampus.name)
          .val(newCampus._id)
      );
      campiSelects.select2("val", newCampus._id);
      campiSelects.select2("close");
    };
    this.refreshSuppliers = function(){
      var supplierSelect = this.detail.find(".supplier");
      // remove os fornecedores carregados no refresh anterior,
      // sem remover o primeiro que eh produto proprio
      for(var i = supplierSelect[0].length; i > 1; i = supplierSelect[0].length){
        supplierSelect[0][1].remove();
      }
      // adiciona os novos fornecedores
      $.each(products.suppliers, function( index, supplier ){
        supplierSelect.append(
          $("<option></option>")
            .html(supplier.name)
            .val(supplier._id)
        );
      });
    };
    this.showCampi = function( productIndex ){
      var supplierIndex = products.table.body.find("#"+productIndex).find('.supplier').select2('data').id;
      var line = products.table.body.find("#"+productIndex);
      line.find('.campus').remove();
      if(supplierIndex != 0) {
        var supplierDiv = line.find(".supplier");
        this.campus.clone().insertAfter(supplierDiv[0]);
        var campiSelect = line.find(".supplier_campus");
        var supplier = products.suppliers.filter(function ( supplier ) {
          return supplier._id == supplierIndex;
        });
        var objProduct = products.all[productIndex];
        $.each(supplier[0].campi, function(index, campus){
          campiSelect.append(
            $("<option></option>")
              .html(campus.name)
              .val(campus._id)
          );
        });
        campiSelect.select2({
          formatNoMatches: function( term ){
            var link = "<a class='btn btn-success btn-mini addCampi' onclick='products.addCampi("+'"'+term+'"'+", "+'"'+productIndex+'"'+", "+'"'+supplierIndex+'"'+")'>"+$(".add").html()+"</a> "+term;
            return link;
          }
        });
      }
    };
    this.getFormData = function( id ){
      var formData = {};
      var objProduct = products.all[id];
      var line = products.table.body.find("#"+id);
      if(objProduct.name != line.find(".nameInput").val()) formData.name = line.find(".nameInput").val();
      if(objProduct.purchase != line.find(".purchase").val()) formData.purchase = line.find(".purchase").val();
      if(objProduct.currency != line.find(".currency").select2('data').id) formData.currency = line.find(".currency").select2('data').id;
      if(objProduct.supplier != line.find(".supplier").select2('data').id) formData.supplier = line.find(".supplier").select2('data').id;
      if(line.find(".supplier_campus").select2('data').id && objProduct.supplier_campus != line.find(".supplier_campus").select2('data').id) formData.supplier_campus = line.find(".supplier_campus").select2('data').id;
      if(objProduct.detail != line.find(".detail").val()) formData.detail = line.find(".detail").val();
      if(line.find(".courseDurationValue").val() && objProduct.courseDurationValue != line.find(".courseDurationValue").val()) formData.courseDurationValue = line.find(".courseDurationValue").val();
      if(line.find(".courseDurationScale").select2('data').id && objProduct.courseDurationScale != line.find(".courseDurationScale").select2('data').id) formData.courseDurationScale = line.find(".courseDurationScale").select2('data').id;
      if(line.find(".courseKind").select2('data').id && objProduct.courseKind != line.find(".courseKind").select2('data').id) formData.courseKind = line.find(".courseKind").select2('data').id;
      if(line.find(".coursePeriod").select2('data').id && objProduct.coursePeriod != line.find(".coursePeriod").select2('data').id) formData.coursePeriod = line.find(".coursePeriod").select2('data').id;
      if(line.find(".courseModality").select2('data').id && objProduct.courseModality != line.find(".courseModality").select2('data').id) formData.courseModality = line.find(".courseModality").select2('data').id;
      if(line.find(".courseLanguage").val() && objProduct.courseLanguage != line.find(".courseLanguage").val()) formData.courseLanguage = line.find(".courseLanguage").val();
      if(line.find(".courseEnrollmentFees").val() && objProduct.courseEnrollmentFees != line.find(".courseEnrollmentFees").val()) formData.courseEnrollmentFees = line.find(".courseEnrollmentFees").val();
      if(line.find(".courseAdministrativeFees").val() && objProduct.courseAdministrativeFees != line.find(".courseAdministrativeFees").val()) formData.courseAdministrativeFees = line.find(".courseAdministrativeFees").val();
      if(line.find(".courseBook").val() && objProduct.courseBook != line.find(".courseBook").val()) formData.courseBook = line.find(".courseBook").val();
      if(line.find(".courseRequirements").val() && objProduct.courseRequirements != line.find(".courseRequirements").val()) formData.courseRequirements = line.find(".courseRequirements").val();
      if(line.find(".ensuranceDurationValue").val() && objProduct.ensuranceDurationValue != line.find(".ensuranceDurationValue").val()) formData.ensuranceDurationValue = line.find(".ensuranceDurationValue").val();
      if(line.find(".ensuranceDurationScale").select2('data').id && objProduct.ensuranceDurationScale != line.find(".ensuranceDurationScale").select2('data').id) formData.ensuranceDurationScale = line.find(".ensuranceDurationScale").select2('data').id;
      if(line.find(".accommodationKind").select2('data').id && objProduct.accommodationKind != line.find(".accommodationKind").select2('data').id) formData.accommodationKind = line.find(".accommodationKind").select2('data').id;
      if(line.find(".accommodationPeopleNumber").val() && objProduct.accommodationPeopleNumber != line.find(".accommodationPeopleNumber").val()) formData.accommodationPeopleNumber = line.find(".accommodationPeopleNumber").val();
      if(line.find(".accommodationDurationValue").val() && objProduct.accommodationDurationValue != line.find(".accommodationDurationValue").val()) formData.accommodationDurationValue = line.find(".accommodationDurationValue").val();
      if(line.find(".accommodationDurationScale").select2('data').id && objProduct.accommodationDurationScale != line.find(".accommodationDurationScale").select2('data').id) formData.accommodationDurationScale = line.find(".accommodationDurationScale").select2('data').id;
      if(line.find(".accommodationFood").select2('data').id && objProduct.accommodationFood != line.find(".accommodationFood").select2('data').id) formData.accommodationFood = line.find(".accommodationFood").select2('data').id;
      if(line.find(".passTransportKind").select2('data').id && objProduct.passTransportKind != line.find(".passTransportKind").select2('data').id) formData.passTransportKind = line.find(".passTransportKind").select2('data').id;
      if(line.find(".passFrom").val() && objProduct.passFrom != line.find(".passFrom").val()) formData.passFrom = line.find(".passFrom").val();
      if(line.find(".passTo").val() && objProduct.passTo != line.find(".passTo").val()) formData.passTo = line.find(".passTo").val();
      if(line.find(".workKind").select2('data').id && objProduct.workKind != line.find(".workKind").select2('data').id) formData.workKind = line.find(".workKind").select2('data').id;
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
      var totalRows = products.table.body.find(".tzdTableRow").length;
      $(".totalRows").html(totalRows);
    };
  };

  products = {
    all : []
    ,suppliers : []
    ,table : new table()
    ,add : function( kind ){
      var url = base_url+'product/add';
      var data = {
        tzadiToken : tzadiToken
        ,name : $('#search-query').val()
        ,kind : kind
      };
      var callback = function( e ){
        var id = products.all.length;
        products.all[id] = e;
        products.table.addLine( id, 'before' );
        products.table.reCalc();
      };
      var ajax = new tzdAjaxCall();
      ajax.post(url, data, callback);
    }
    ,active : function( id ){
      var objProduct = this.all[id];
      if(objProduct.status == "active") objProduct.status = "inactive";
      else objProduct.status = "active";
      var url = base_url+'product/set';
      var data = {
        tzadiToken : tzadiToken,
        _id : objProduct._id,
        status : objProduct.status
      };
      var callback = function( e ){
        products.all[id].status = objProduct.status;
        products.table.active( id );
      };
      var ajax = new tzdAjaxCall();
      ajax.post(url, data, callback);
    }
    ,update : function( id, data ){
      this.all[id] = data;
      this.table.refresh(id);
    }
    ,openDetails : function( id ){
      this.table.openDetails( id );
    }
    ,closeDetails : function( id ){
      this.table.closeDetails( id );
    }
    ,drop : function( id ){
      if(globalConfirmAction($(".pdt_removeProduct").html()+"?")){
        var url = base_url+'product/drop';
        var data = {
          tzadiToken : tzadiToken,
          _id : products.all[id]._id
        };
        var callback = function( e ){
          products.all[id] = "null";
          products.table.dropLine( id );
          products.table.reCalc();
        };
        var ajax = new tzdAjaxCall();
        ajax.post(url, data, callback);
      }
    }
    ,refresh : function( local ) {
      this.refreshSuppliers();
      var url = base_url+'product/getAll';
      var data = {
        tzadiToken : tzadiToken
      };
      var callback = function( e ){
        products.all = e;
        products.all = tzdOrderBy(products.table.order, products.all);
        products.search( $('#search-query').val() );
      };
      var ajax = new tzdAjaxCall();
      ajax.post(url, data, callback);
    }
    ,refreshSuppliers : function(){
      var url = base_url+'supplier/getAllActive';
      var data = {
        tzadiToken : tzadiToken
      };
      var callback = function( e ){
        products.suppliers = e;
        products.table.refreshSuppliers();
      };
      var ajax = new tzdAjaxCall();
      ajax.post(url, data, callback);
    },
    addSupplier : function( term, id ){
      var url = base_url+'supplier/add';
      var data = {
        tzadiToken : tzadiToken
        ,name : term
      };
      var callback = function( e ){
        var index = products.suppliers.length;
        products.suppliers[index] = e;
        products.table.addSupplier( e, id, index );
      };
      var ajax = new tzdAjaxCall();
      ajax.post(url, data, callback)
    },
    addCampi : function( term, id, supplier_id ){
      var url = base_url+'supplier/addCampi';
      var data = {
        tzadiToken : tzadiToken
        ,name : term
        ,supplier : supplier_id
      };
      var callback = function( campus_id ){
        var supplier = products.suppliers.filter(function ( supplier ) {
          return supplier._id == supplier_id;
        });
        var supplierIndex = products.suppliers.indexOf(supplier[0]);
        var newCampus = {_id : campus_id, name : term};
        products.suppliers[supplierIndex].campi.push(newCampus);
        products.table.addCampi( newCampus, id );
      };
      var ajax = new tzdAjaxCall();
      ajax.post(url, data, callback)
    }
    ,changePhoto : function( id, files ) {
      var url = base_url+'product/changePhoto';
      var data = {
        tzadiToken : tzadiToken,
        files : files,
        _id : products.all[id]._id
      };
      var callback = function( e ){
        if(e){
          products.all[id].img = e;
          products.table.changePhoto( id );
        }
        else console.log(e.error);
      };
      var ajax = new tzdAjaxCall();
      ajax.upload(url, data, callback);
    }
    ,set : function( id ){
      var url = base_url+'product/set';
      var formData = this.table.getFormData( id );
      if(formData){
        formData.tzadiToken = tzadiToken;
        formData._id = products.all[id]._id;
        var callback = function( e ){
          globalAlert('alert-success', $(".ptd_saved").html());
          products.all[id] = e;
        };
        var ajax = new tzdAjaxCall();
        ajax.post(url, formData, callback);
      } else {
        globalAlert('alert-success', $(".ptd_noChanges").html());
      }
    },
    search : function( searchString ){
      if( searchString == "") {
        $('#search-query').val("");
        products.table.empty();
        $.each(products.all, function( id, objProduct ){
          if(objProduct != "null") products.table.addLine( id );
        });
        products.table.reCalc();
      } else {
        var foundProducts = products.all.filter(function ( product ) {
          var contain = contain || product.name.search(new RegExp(searchString, "i")) >= 0;
          return contain;
        });
        products.table.empty();
        $.each(foundProducts, function( id, objProduct ){
          $.each(products.all, function( id, product ){
            if(product._id == objProduct._id) products.table.addLine( id );
          });
        });
        products.table.reCalc();
      }
    },
    order : function(){
      products.all = tzdOrderBy(products.table.order, products.all);
    }
  };

  products.refresh();

  $(".openDetail").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.emptyBrief( id );
    products.openDetails( id );
  });
  $(".closeDetail").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.closeDetails( id );
  });
  $(".productDrop").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.drop( id );
  });
  $(".productAdd").live("click", function(){
    var kind = $(this).attr("id");
    products.add( kind );
  });
  $(".tzdTableRefresh").live("click", function(){
    $(".orderDiv").find("#"+products.table.order).find("i").removeClass();
    $(".orderDiv").find("#"+products.table.order).find("i").addClass("icon-chevron-down");
    $(".orderDivOpen").find("i").removeClass();
    $(".orderDivOpen").find("i").addClass("icon-chevron-down");
    products.refresh();
  });
  $(".productStatus").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.active( id );
  });
  $('.changeImg').live("click", function() {
    $(this).parents(".tzdTableLine").find('.productImg').click();
  });
  $(".productImg").live("change propertychange", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.changePhoto( id, this.files );
  });
  $(".supplier").live("change propertychange", function(){
    var productIndex = $(this).parents(".tzdTableLine").attr("id");
    products.table.showCampi( productIndex );
  });
  $('.productSave').live("click", function() {
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.set(id);
  });
  $('#search-query').live('keyup propertychange', function(){
    var searchString = $(this).val();
    products.search( searchString );      
  });
  $(".clearSearch").live("click", function(){
    if($('#search-query').val() != "") products.search( "" ); 
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
      products.table.status = $(this).attr("id");
      products.search( $('#search-query').val() );
    } else {
      products.search( $('#search-query').val() );
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
      products.all.reverse();
      products.search( $('#search-query').val() );
      $(".orderDivOpen").html($(this).html());
    } else {
      $(this).parent().find(".order").find("i").removeClass();
      $(this).find("i").addClass("icon-chevron-down");
      $(".order").addClass("text-success").removeClass("label label-success");
      $(".orderDivOpen").html($(this).html());
      $(this).removeClass("text-success").addClass("label label-success");
      products.table.order = $(this).attr("id");
      products.order();
      products.search( $('#search-query').val() );
    }

  });
});