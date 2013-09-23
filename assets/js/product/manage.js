$(document).ready(function(){
  var table = function( ) {
    this.body = $(".tzdTable");
    this.brief = this.body.find(".tzdTableBrief").clone();
    this.body.find(".tzdTableBrief").remove();
    this.campus = this.body.find(".campus").clone();
    this.body.find(".campusForm").remove();
    this.attachment = this.body.find(".attachment").clone();
    this.body.find(".attachment").remove();
    this.accommodationForm = this.body.find(".accommodationForm").clone();
    this.body.find(".accommodationForm").remove();
    this.passForm = this.body.find(".passForm").clone();
    this.body.find(".passForm").remove();
    this.workForm = this.body.find(".workForm").clone();
    this.body.find(".workForm").remove();
    this.packageItem = this.body.find(".packageItem").clone();
    this.body.find(".packageItem").remove();
    this.packageForm = this.body.find(".packageForm").clone();
    this.body.find(".packageForm").remove();
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
    this.kind = "all";

    this.createBrief = function( id ){
      var objProduct = products.all[id];
      var brief = this.brief.clone();
      if(objProduct.status == "active") brief.find(".productStatus").addClass("btn-success").removeClass("btn-danger").html($(".pdt_inactivate").html());
      else brief.find(".productStatus").addClass("btn-danger").removeClass("btn-success").html($(".pdt_activate").html());
      brief.find(".name").html(objProduct.name);
      brief.find(".openView").attr( "href" , base_url+objProduct._id+"/"+$tzd.string.makeURL( objProduct.name ) );
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
    this.addLine = function( id, position, open ){
      var objProduct = products.all[id];
      if(this.status == "all" || objProduct.status == this.status && this.kind == "all" || this.kind == objProduct.kind){
        var brief = this.createBrief( id );
        var line = this.line.clone();
        line.attr("id", id)
        line.children().html(brief);
        if(position && position == "before") line.insertAfter(this.body.find(".tzdTableHeader"));
        else this.body.children().append(line);
      }
      if(open && open == true) this.openDetails( id );
    };
    this.openDetails = function( id ){
      var line = this.body.find("#"+id);
      var objProduct = products.all[id];
      var detail = this.detail.clone();
      line.children().html(detail);
      line.find(".openView").attr( "href" , base_url+objProduct._id+"/"+$tzd.string.makeURL( objProduct.name ) );
      line.find(".productKind").html($("#"+objProduct.kind).html());
      line.find(".purchase").val(objProduct.purchase);
      line.find(".purchase").mask('000000000000000.00', {reverse: true});
      line.find(".price").val(objProduct.price);
      line.find(".price").mask('000000000000000.00', {reverse: true});
      line.find(".gain").mask('000000000000000.00', {reverse: true});
      line.find(".percent").mask('00000', {reverse: true});
      line.find(".discount").val(objProduct.discount);
      line.find(".discount").mask('000000000000000.00', {reverse: true});
      line.find(".discountCurrency").select2("enable", false);
      line.find(".discountCurrency").select2("val", $(".currencyCode").html());
      line.find(".detail").val(objProduct.detail);
      line.find(".discountCurrency").select2();
      var discountCurrencyVal = objProduct.discountCurrency ? objProduct.discountCurrency : $(".currencyCode").html();
      line.find('.discountCurrency').select2("val", discountCurrencyVal);
      line.find(".currency").select2();
      var currencyVal = objProduct.currency ? objProduct.currency : $(".currencyCode").html();
      line.find('.currency').select2("val", currencyVal);
      line.find(".vitrine").select2({ minimumResultsForSearch: '-1' });
      line.find('.vitrine').select2("val", objProduct.vitrine);
      line.find(".supplier").select2({
        formatNoMatches: function( term ){
          var link = "<a class='addPartner btn btn-success btn-mini' onclick='products.addSupplier("+'"'+term+'"'+", "+'"'+id+'"'+")'>"+$(".add").html()+"</a> "+term;
          return link;
        }
      });
      line.find('.supplier').select2("val", objProduct.supplier);
      this.showCampi( id );
      line.find('.supplier_campus').select2("val", objProduct.supplier_campus);
      if(objProduct.status == "active") line.find(".productStatus").addClass("btn-success").removeClass("btn-danger").html($(".pdt_inactivate").html());
      else line.find(".productStatus").addClass("btn-danger").removeClass("btn-success").html($(".pdt_activate").html());
      if(objProduct.img) {
        line.find(".img").attr("src", base_url+"file/open/"+objProduct.img[0]).attr("name", 0);
        line.find(".imgAmount").html(objProduct.img.length);
        line.find(".imgNumber").html(1);
      }
      line.find(".name").val(objProduct.name);
      this.reCalcValues(id, "price");
      this.showKindForm( id );
    };
    this.reCalcValues = function (id, calcBase){
      var line = this.body.find("#"+id);
      var objProduct = products.all[id];
      var purchase = Number(line.find(".purchase").val());
      var price = Number(line.find(".price").val());
      var discount = Number(line.find(".discount").val());
      discount = discount ? discount : 0;
      var discountCurrency = line.find(".discountCurrency").select2('data').id;
      var currency = line.find(".currency").select2('data').id;
      var priceWithDiscount = price - $tzd.currency.convertTo( discount, discountCurrency, currency );
      line.find(".priceWithDiscount").val( currency + " " + priceWithDiscount.toFixed(2) );

      gainWithDiscount = price - purchase;
      if(priceWithDiscount == 0 && purchase == 0 || priceWithDiscount == purchase){
        percent = 0;
        gain = 0;
      } else {
        gainWithDiscount = priceWithDiscount - purchase;
        percentWithDiscount = gainWithDiscount / ( purchase / 100 );
      }
      line.find(".gainWithDiscount").val( currency + " " + gainWithDiscount.toFixed(2) );
      line.find(".percentWithDiscount").val(percentWithDiscount.toFixed(2));

      if(line.find(".purchase").val() != "" || line.find(".price").val() != "") {
        var gain = Number(line.find(".gain").val());
        var percent = Number(line.find(".percent").val());

        switch(calcBase){
          case "gain" :
            if(gain == 0){
              percent = 0;
              price = purchase;
            } else {
              price = purchase + gain;
              percent = gain / ( purchase / 100 );
            }
            line.find(".price").val(price.toFixed(2));
            line.find(".percent").val(percent.toFixed(2));
          break;
          case "percent" :
            if(percent == 0){
              gain = 0;
              price = purchase;
            } else {
              gain = purchase * (percent/100);
              price = purchase + gain;
            }
            line.find(".price").val(price.toFixed(2));
            line.find(".gain").val(gain.toFixed(2));
          break;
          case "price" :
            gain = price - purchase;
            if(price == 0 && purchase == 0 || price == purchase){
              percent = 0;
              gain = 0;
            } else {
              gain = price - purchase;
              percent = gain / ( purchase / 100 );
            }
            line.find(".gain").val(gain.toFixed(2));
            line.find(".percent").val(percent.toFixed(2));
          break;
          case "purchase" :
            gain = price - purchase;
            percent = gain / ( purchase / 100 );
            line.find(".gain").val(gain.toFixed(2));
            line.find(".percent").val(percent.toFixed(2));
          break;
        };
      }
    };
    this.showKindForm = function( id ){
      var objProduct = products.all[id];
      var line = this.body.find("#"+id);
      var self = this;
      line.find(".kindForm").empty();
      switch(objProduct.kind) {
        case "course":
          var courseForm = this.courseForm.clone();
          line.find(".kindForm").html(courseForm);
          line.find(".courseDurationValue").val(objProduct.courseDurationValue);
          line.find(".courseDurationValue").mask("000");
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
          line.find(".courseEnrollmentFees").mask('000000000000000.00', {reverse: true});
          line.find(".courseAdministrativeFees").val(objProduct.courseAdministrativeFees);
          line.find(".courseAdministrativeFees").mask('000000000000000.00', {reverse: true});
          line.find(".courseBook").val(objProduct.courseBook);
          line.find(".courseBook").mask('000000000000000.00', {reverse: true});
          line.find(".courseRequirements").val(objProduct.courseRequirements);
        break;
        case "ensurance":
          var ensuranceForm = this.ensuranceForm.clone();
          line.find(".kindForm").html(ensuranceForm);
          line.find(".ensuranceDurationValue").val(objProduct.ensuranceDurationValue);
          line.find(".ensuranceDurationValue").mask("000");
          line.find(".ensuranceDurationScale").select2();
          line.find(".ensuranceDurationScale").select2("val", objProduct.ensuranceDurationScale);
        break;
        case "accommodation":
          var accommodationForm = this.accommodationForm.clone();
          line.find(".kindForm").html(accommodationForm);
          line.find(".accommodationKind").select2();
          line.find(".accommodationKind").select2("val", objProduct.accommodationKind);
          line.find(".accommodationPeopleNumber").val(objProduct.accommodationPeopleNumber);
          line.find(".accommodationPeopleNumber").mask("000");
          line.find(".accommodationDurationValue").val(objProduct.accommodationDurationValue);
          line.find(".accommodationDurationValue").mask("000");
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
          line.find(".passTransportWays").select2();
          line.find(".passTransportWays").select2("val", objProduct.passTransportWays);
          line.find(".passFrom").val(objProduct.passFrom);
          line.find(".passTo").val(objProduct.passTo);
        break;
        case "package":
          var packageForm = this.packageForm.clone();
          var foundProducts = products.all.filter(function ( product ) {
            var contain = contain || product.status == "active";
            return contain;
          });
          line.find(".price").prop("disabled", true);
          line.find(".purchase").prop("disabled", true);
          line.find(".gain").prop("disabled", true);
          line.find(".percent").prop("disabled", true);
          line.find(".currency").select2("enable", false);
          line.find(".currency").select2("val", $(".currencyCode").html());
          line.find(".kindForm").html(packageForm);
          line.find('.addPackageProduct').typeahead({
            source: foundProducts
            , property: "name"
            , onselect: function(obj) {
              if(products.all[id]._id != obj._id) products.addPackageProduct( id, obj._id );
              else $tzd.alert.error($(".pdt_canotAddSamePackage").html());
              line.find('.addPackageProduct').val("");
            }
          })
          if(objProduct.itens) {
            $.each(objProduct.itens, function( index, amount ){
              var packageItem = products.table.packageItem.clone();
              var product = $tzd.list.getBy(products.all, "_id", index)[0];
              product.purchase = product.purchase ? product.purchase : 0;
              product.price = product.price ? product.price : 0;
              packageItem.attr("id", index);
              packageItem.find(".packageProductPrice").html(product.price);
              packageItem.find(".packageProductPurchase").html(product.purchase);
              packageItem.find(".packageProductTotalPurchase").html(product.purchase*amount);
              packageItem.find(".packageProductTotalPrice").html(product.price*amount);
              packageItem.find(".packageProductTotalPriceCurrency").html(product.currency);
              packageItem.find(".packageProductQtd").val(amount);
              packageItem.find(".productKind").html($("#"+product.kind).html());
              packageItem.find(".packageProductName").html(product.name).attr("href", product._id).attr("target", "_blank");
              line.find(".packageItens").prepend(packageItem);
            });
            products.reCalcPackageTotal(id);
          }
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
      if(objProduct.status == "active") line.find(".productStatus").addClass("btn-success").removeClass("btn-danger").html($(".pdt_inactivate").html());
      else line.find(".productStatus").addClass("btn-danger").removeClass("btn-success").html($(".pdt_activate").html());
    };
    this.attachImg = function( id, img ){
      var line = this.body.find("#"+id);
      var objProduct = products.all[id];
      var index = objProduct.img.indexOf( img );
      line.find(".img").attr("src", base_url+"file/open/"+img).attr("name", index);
      if(index == 0) line.find(".cover").find("i").attr("class", "icon-check");
      else line.find(".cover").find("i").attr("class", "icon-check-empty");
      line.find(".imgAmount").html(objProduct.img.length);
      line.find(".imgNumber").html(index+1);
    };
    this.addSupplier = function( supplier, id, index ){

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
    this.addCampus = function( newCampus, id ){
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
            var link = "<a class='btn btn-success btn-mini addCampus' onclick='products.addCampus("+'"'+term+'"'+", "+'"'+productIndex+'"'+", "+'"'+supplierIndex+'"'+")'>"+$(".add").html()+"</a> "+term;
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
      if(objProduct.price != line.find(".price").val()) formData.price = line.find(".price").val();
      if(objProduct.currency != line.find(".currency").select2('data').id) formData.currency = line.find(".currency").select2('data').id;
      if(objProduct.discount != line.find(".discount").val()) formData.discount = line.find(".discount").val();
      if(objProduct.discountCurrency != line.find(".discountCurrency").select2('data').id) formData.discountCurrency = line.find(".discountCurrency").select2('data').id;
      if(objProduct.vitrine != line.find(".vitrine").select2('data').id) formData.vitrine = line.find(".vitrine").select2('data').id;
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
      if(line.find(".passTransportWays").select2('data').id && objProduct.passTransportWays != line.find(".passTransportWays").select2('data').id) formData.passTransportWays = line.find(".passTransportWays").select2('data').id;
      if(line.find(".passFrom").val() && objProduct.passFrom != line.find(".passFrom").val()) formData.passFrom = line.find(".passFrom").val();
      if(line.find(".passTo").val() && objProduct.passTo != line.find(".passTo").val()) formData.passTo = line.find(".passTo").val();
      if(line.find(".workKind").select2('data').id && objProduct.workKind != line.find(".workKind").select2('data').id) formData.workKind = line.find(".workKind").select2('data').id;
      formData.itens = objProduct.itens;
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
    this.reCalc = function( productList ){
      $(".filterKind").find(".found").html("0");
      $(".filterKind").hide();
      $("#all").show();

      $.each(productList, function( id, objProduct ){
        var total = parseInt($(".filterKind#"+objProduct.kind).find(".found").html()) + 1;
        $(".filterKind#"+objProduct.kind).find(".found").html(total);
        var all = parseInt($("#all").find(".found").html()) + 1;
        $("#all").find(".found").html(all);
      });

      if( $(".filterKind#accommodation").find(".found").html() > 0 ) $(".filterKind#accommodation").show();
      if( $(".filterKind#course").find(".found").html() > 0 ) $(".filterKind#course").show();
      if( $(".filterKind#pass").find(".found").html() > 0 ) $(".filterKind#pass").show();
      if( $(".filterKind#ensurance").find(".found").html() > 0 ) $(".filterKind#ensurance").show();
      if( $(".filterKind#tourism").find(".found").html() > 0 ) $(".filterKind#tourism").show();
      if( $(".filterKind#transfer").find(".found").html() > 0 ) $(".filterKind#transfer").show();
      if( $(".filterKind#work").find(".found").html() > 0 ) $(".filterKind#work").show();
      if( $(".filterKind#regularProduct").find(".found").html() > 0 ) $(".filterKind#regularProduct").show();
      if( $(".filterKind#package").find(".found").html() > 0 ) $(".filterKind#package").show();
      if( $(".filterKind#service").find(".found").html() > 0 ) $(".filterKind#service").show();

      var totalRows = products.table.body.find(".tzdTableRow").length;
      $(".totalRows").html(totalRows);
    };
    this.addPackageProduct = function( productID, item ){
      var line = this.body.find("#"+productID);
      var product = $tzd.list.getBy(products.all, "_id", item)[0];
      var packageItem = this.packageItem.clone();
      packageItem.attr("id", item);
      packageItem.find(".productKind").html($("#"+product.kind).html());
      packageItem.find(".packageProductTotalPriceCurrency").html(product.currency);
      packageItem.find(".packageProductPrice").html( product.price ? product.price : 0 );
      packageItem.find(".packageProductTotalPrice").html( product.price ? product.price : 0 );
      packageItem.find(".packageProductTotalPurchase").html( product.purchase ? product.purchase : 0 );
      packageItem.find(".packageProductPurchase").html( product.purchase ? product.purchase : 0 );
      packageItem.find(".packageProductQtd").val(1);
      packageItem.find(".packageProductName").html(product.name).attr("href", product._id).attr("target", "_blank");
      line.find(".packageItens").prepend(packageItem);
    };
    this.setPackageItemQtd = function(productID, item, amount){
      var line = this.body.find("#"+productID);
      var product = $tzd.list.getBy(products.all, "_id", item)[0];
      line.find("#"+item).find(".packageProductQtd").val(amount);
      line.find("#"+item).find(".packageProductTotalPrice").html(amount*product.price);
      line.find("#"+item).find(".packageProductTotalPurchase").html(amount*product.purchase);
    };
    this.setPackageTotal = function(productID, totalPrice, totalPurchase){
      var line = this.body.find("#"+productID);
      line.find(".price").val(totalPrice.toFixed(2));
      line.find(".purchase").val(totalPurchase.toFixed(2));
      this.reCalcValues(productID, "price");
    };
    this.removePackageProduct = function( productID, item ){
      this.body.find("#"+productID).find(".packageItens").find("#"+item).remove();
    };
    this.dropAttachment = function( supplierID, attachmentID ){
      var line = this.body.find("#"+supplierID);
      line.find(".attachments").find("#"+attachmentID).remove();
    };
    this.prevImg = function( productID ){
      var product = products.all[productID];
      if(product.img){
        var line = this.body.find("#"+productID);
        var imgID = Number(line.find("img").attr("name")) - 1;
        if( product.img.length == 1 ) imgID = 0;
        if( imgID < 0 ) imgID = product.img.length - 1;
        line.find(".img").attr("src", base_url+"file/open/"+product.img[imgID]).attr("name", imgID);
        if( imgID == 0 ) line.find(".cover").find("i").attr("class", "icon-check");
        else line.find(".cover").find("i").attr("class", "icon-check-empty");
        line.find(".imgAmount").html(product.img.length);
        line.find(".imgNumber").html(imgID+1);
      }
    };
    this.nextImg = function( productID ){
      var product = products.all[productID];
      if(product.img && product.img.length > 1){
        var line = this.body.find("#"+productID);
        var imgID = Number(line.find("img").attr("name")) + 1;
        if( imgID >= product.img.length ) imgID = 0;
        line.find(".img").attr("src", base_url+"file/open/"+product.img[imgID]).attr("name", imgID);
        if( imgID == 0 ) line.find(".cover").find("i").attr("class", "icon-check");
        else line.find(".cover").find("i").attr("class", "icon-check-empty");
        line.find(".imgAmount").html(product.img.length);
        line.find(".imgNumber").html(imgID+1);
      }
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
        products.table.addLine( id, 'before', true );
        products.table.reCalc( products.all );
      };
      $tzd.ajax.post(url, data, callback);
    }
    ,clone : function( id ){
      var url = base_url+'product/makeClone';
      var data = {
        tzadiToken : tzadiToken
        ,productID : products.all[id]._id
      };
      var callback = function( e ){
        var id = products.all.length;
        products.all[id] = e;
        products.table.addLine( id, 'before', true );
        products.table.reCalc( products.all );
      };
      $tzd.ajax.post(url, data, callback);
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
      var callback = function( error ){
        if( error ){
          $tzd.alert.error( error );
        } else {
          products.all[id].status = objProduct.status;
          products.table.active( id );
        }
      };
      $tzd.ajax.post(url, data, callback);
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
      if($tzd.confirm($(".pdt_removeProduct").html()+"?")){
        var url = base_url+'product/drop';
        var data = {
          tzadiToken : tzadiToken,
          _id : products.all[id]._id
        };
        var callback = function( error ){
          if( error ) $tzd.alert.error(error);
          else {
            products.all[id] = "null";
            products.table.dropLine( id );
            products.table.reCalc( products.all );
          }

        };
        $tzd.ajax.post(url, data, callback);
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
        products.all = $tzd.list.orderBy(products.table.order, products.all);
        products.search( $('#search-query').val() );
      };
      $tzd.ajax.post(url, data, callback);
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
      $tzd.ajax.post(url, data, callback);
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
      $tzd.ajax.post(url, data, callback)
    },
    addCampus : function( term, id, supplier_id ){
      var url = base_url+'supplier/addCampus';
      var data = {
        tzadiToken : tzadiToken
        ,name : term
        ,supplier : supplier_id
      };
      var callback = function( e ){
        var supplier = products.suppliers.filter(function ( supplier ) {
          return supplier._id == supplier_id;
        });
        var supplierIndex = products.suppliers.indexOf(supplier[0]);
        products.suppliers[supplierIndex].campi.push(e);
        products.table.addCampus( e, id );
      };
      $tzd.ajax.post(url, data, callback)
    }
    ,attachImg : function( id, files ) {
      var url = base_url+'product/attachImg';
      var data = {
        tzadiToken : tzadiToken,
        files : files,
        _id : products.all[id]._id
      };
      var callback = function( e ){
        if(e){
          if( products.all[id].img ) products.all[id].img.push( e );
          else products.all[id].img = [e];
          products.table.attachImg( id, e );
        }
        else $tzd.alert.error(e.error);
      };
      $tzd.ajax.upload(url, data, callback);
    }
    ,set : function( id ){
      var url = base_url+'product/set';
      var newData = this.table.getFormData( id );
      if(newData){
        formData = newData;
        formData.tzadiToken = tzadiToken;
        formData._id = products.all[id]._id;
        var callback = function( error ){
          if( error ) $tzd.alert.error(error);
          else {
            for (var attrname in newData) { products.all[id][attrname] = newData[attrname]; }

            $tzd.alert.success($(".pdt_saved").html());
          }

        };
        $tzd.ajax.post(url, formData, callback);
      } else {
        $tzd.alert.success($(".pdt_saved").html());
      }
    },
    search : function( searchString ){

      var foundProducts;

      if( searchString == "") {

        $('#search-query').val("");

        products.table.empty();

        $.each(products.all, function( id, objProduct ){

          if(objProduct != "null") products.table.addLine( id );

        });

        products.table.reCalc( products.all );


      } else {

        foundProducts = products.all.filter(function ( product ) {

          var contain = contain || product.name.search(new RegExp(searchString, "i")) >= 0 && ( products.table.kind == "all" || products.table.kind == product.kind );

          return contain;

        });

        products.table.empty();

        $.each(foundProducts, function( id, objProduct ){

          $.each(products.all, function( id, product ){

            if(product._id == objProduct._id) products.table.addLine( id );

          });

        });

        products.table.reCalc( foundProducts );

      }

    },
    order : function(){
      products.all = $tzd.list.orderBy(products.table.order, products.all);
    }
    , addPackageProduct : function( productID, item ){
      if(!this.all[productID].itens) this.all[productID].itens = {};
      if(this.all[productID].itens[item]) {
        this.all[productID].itens[item]++;
        this.table.setPackageItemQtd(productID, item, this.all[productID].itens[item]);
      } else {
        this.all[productID].itens[item] = 1;
        this.table.addPackageProduct( productID, item );        
      }
      this.reCalcPackageTotal(productID);
    }
    , dropPackageItem : function( productID, item ){
      var self = this;
      if($.map(self.all[productID].itens, function(n, i) { return i; }).length > 1){
        delete self.all[productID].itens[item];
        this.table.removePackageProduct(productID, item);
        this.reCalcPackageTotal(productID);
      } else {
        $tzd.alert.error($(".pdt_packageNeedsAtLeast1Product").html());
        self.table.setPackageItemQtd(productID, item, 1);
        self.reCalcPackageTotal(productID);
      }
    }
    , setPackageItemQtd : function(productID, item, amount){
      this.all[productID].itens[item] = amount;
      this.table.setPackageItemQtd(productID, item, amount);
      this.reCalcPackageTotal(productID);
    }
    , reCalcPackageTotal : function(productID){
      var totalPrice = 0;
      var totalPurchase = 0;
      var self = this;
      $.each(self.all[productID].itens, function(item, amount){
        var product = $tzd.list.getBy(self.all, "_id", item)[0];
        totalPrice += $tzd.currency.convert(product.price, product.currency) * amount;
        totalPurchase += $tzd.currency.convert(product.purchase, product.currency) * amount;
      });
      this.table.setPackageTotal(productID, totalPrice, totalPurchase);
    }
    , removeImg : function( productID, imgID ) {
      if( this.all[productID].img.length > 1 ) {
        var index = this.all[productID].img.indexOf( imgID );
        this.all[productID].img.splice(index, 1);
        var url = base_url+'product/set';
        var data = {
          tzadiToken : tzadiToken
          , _id : this.all[productID]._id
          , img : this.all[productID].img
        };
        var callback = function(){
          $("#"+productID).find(".prevImg").click();
        };
        $tzd.ajax.post(url, data, callback);
      } 
      else $tzd.alert.error($(".pdt_cannotRemoveOnlyImg").html());
    }
    , cover : function( productID, imgID ) {
      var img = this.all[productID].img[imgID];
      this.all[productID].img[imgID] = this.all[productID].img[0];
      this.all[productID].img[0] = img;
      var url = base_url+'product/set';
      var data = {
        tzadiToken : tzadiToken
        , _id : this.all[productID]._id
        , img : this.all[productID].img
      };
      var callback = function(){};
      $tzd.ajax.post(url, data, callback);
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
  $(".productClone").live("click", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.clone( id );
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
  $('.attachImg').live("click", function() {
    $(this).parents(".tzdTableLine").find('.productImg').click();
  });
  $(".productImg").live("change propertychange", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.attachImg( id, this.files );
  });
  $('.prevImg').live("click", function() {
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.prevImg( id );
  });
  $('.nextImg').live("click", function() {
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.nextImg( id );
  });
  $('.cover').live("click", function() {
    var line = $(this).parents(".tzdTableLine");
    var id = line.attr("id");
    var imgID = line.find(".img").attr("name");
    products.cover( id, imgID );
    $(this).find("i").attr("class", "icon-check");
    line.find("img").attr("name", 0);
    line.find(".imgNumber").html(1);
  });
  $('.removeImg').live("click", function() {
    if($tzd.confirm($(".pdt_removeImg").html())){
      var id = $(this).parents(".tzdTableLine").attr("id");
      var attachmentID = $(this).parents(".attachment").attr("id");
      products.removeImg(id, attachmentID);
    }
  });
  $(".supplier").live("change propertychange", function(){
    var productIndex = $(this).parents(".tzdTableLine").attr("id");
    products.table.showCampi( productIndex );
  });
  $('.productSave').live("click", function() {
    var line = $(this).parents(".tzdTableLine");
    var valid = true;
    if(line.find(".nameInput").val()) valid = valid && $tzd.form.checkMask.range(line.find(".nameInput"), 1, 512, $(".pdt_invalidTitle").html());
    if(line.find(".detail").val()) valid = valid && $tzd.form.checkMask.range(line.find(".detail"), 0, 65535, $(".pdt_invalidDetail").html());
    if(line.find(".courseRequirements").val()) valid = valid && $tzd.form.checkMask.range(line.find(".courseRequirements"), 0, 1024, $(".pdt_invalidRequirements").html());
    if(line.find(".passFrom").val()) valid = valid && $tzd.form.checkMask.range(line.find(".passFrom"), 0, 512, $(".pdt_invalidFrom").html());
    if(line.find(".passTo").val()) valid = valid && $tzd.form.checkMask.range(line.find(".passTo"), 0, 512, $(".pdt_invalidTo").html());
    if(line.find(".courseLanguage").val()) valid = valid && $tzd.form.checkMask.range(line.find(".courseLanguage"), 0, 32, $(".pdt_invalidCourseLanguage").html());
    if(line.find(".purchase").val()) valid = valid && $tzd.form.checkMask.float(line.find(".purchase"), $(".pdt_invalidPurchase").html());
    if(line.find(".price").val()) valid = valid && $tzd.form.checkMask.float(line.find(".price"), $(".pdt_invalidPrice").html());
    if(line.find(".courseDurationValue").val()) valid = valid && $tzd.form.checkMask.float(line.find(".courseDurationValue"), $(".pdt_invalidCourseDurationValue").html());
    if(line.find(".courseEnrollmentFees").val()) valid = valid && $tzd.form.checkMask.float(line.find(".courseEnrollmentFees"), $(".pdt_invalidCourseEnrollmentFees").html());
    if(line.find(".courseAdministrativeFees").val()) valid = valid && $tzd.form.checkMask.float(line.find(".courseAdministrativeFees"), $(".pdt_invalidCourseAdministrativeFees").html());
    if(line.find(".courseBook").val()) valid = valid && $tzd.form.checkMask.float(line.find(".courseBook"), $(".pdt_invalidCourseBook").html());
    if(line.find(".ensuranceDurationValue").val()) valid = valid && $tzd.form.checkMask.float(line.find(".ensuranceDurationValue"), $(".pdt_invalidEnsuranceDurationValue").html());
    if(line.find(".accommodationPeopleNumber").val()) valid = valid && $tzd.form.checkMask.float(line.find(".accommodationPeopleNumber"), $(".pdt_invalidAccommodationPeopleNumber").html());
    if(line.find(".accommodationDurationValue").val()) valid = valid && $tzd.form.checkMask.float(line.find(".accommodationDurationValue"), $(".pdt_invalidAccommodationDurationValue").html());

    if( valid ){
      var id = $(this).parents(".tzdTableLine").attr("id");
      products.set(id);
    }
  });
  $('#search-query').live('keyup propertychange', function(){
    var searchString = $(this).val();
    if( products.all != [] ) products.search( searchString );      
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
  $(".currency").live("change propertychange", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.reCalcValues(id, "price");
  });
  $(".discountCurrency").live("change propertychange", function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.reCalcValues(id, "price");
  });
  $('.price').live('blur', function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.reCalcValues(id, "price");
  });
  $('.gain').live('blur', function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.reCalcValues(id, "gain");
  });
  $('.percent').live('blur', function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.reCalcValues(id, "percent");
  });
  $('.purchase').live('blur', function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.reCalcValues(id, "purchase");
  });
  $('.discount').live('blur', function(){
    var id = $(this).parents(".tzdTableLine").attr("id");
    products.table.reCalcValues(id, "discount");
  });
  $('.dropPackageItem').live("click", function() {
    var productID = $(this).parents(".tzdTableLine").attr("id");
    var item = $(this).parents(".packageItem").attr("id");
    products.dropPackageItem( productID, item );
  });
  $('.packageProductQtd').live('change propertychange', function(){
    var productID = $(this).parents(".tzdTableLine").attr("id");
    var item = $(this).parents(".packageItem").attr("id");
    var amount = $(this).val();
    if(amount <= 0 || isNaN(amount)) $(this).parents(".packageItem").find('.dropPackageItem').click();
    else products.setPackageItemQtd(productID, item, amount);
  });
  $(".filterKind").live("click", function(){
    $(".filterKind").removeClass("active");
    $(this).addClass("active");
    products.table.kind = $(this).attr("id");
    products.search( $('#search-query').val() );
  });
});