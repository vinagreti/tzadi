$(document).ready(function(){

	var collaboratorHTML = $(".collaborator").clone();
	$(".collaborator").remove();

    var refresh = function( local ) {
      var url = base_url+'collaborator/getAll';
      var data = {
        tzadiToken : tzadiToken
      };
      var callback = function( e ){
        
        $.each( e, function(index, value){

        	console.log( value._id );

        	var newCollaboratorHTML = collaboratorHTML.clone();
			newCollaboratorHTML.find("._id").html(value._id);
			newCollaboratorHTML.find(".currencyBase").html(value.currencyBase);
			newCollaboratorHTML.find(".email").html(value.email);
			if(value.facebook_id) newCollaboratorHTML.find(".facebook_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".facebook_id").attr("href")+value.facebook_id);
			if(value.google_id) newCollaboratorHTML.find(".google_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".google_id").attr("href")+value.google_id);
			if(value.linkedin_id) newCollaboratorHTML.find(".linkedin_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".linkedin_id").attr("href")+value.linkedin_id);
			newCollaboratorHTML.find(".identity").html(value.identity);
			newCollaboratorHTML.find("img").attr("src", value.img);
			newCollaboratorHTML.find(".kind").html(value.kind);
			newCollaboratorHTML.find(".name").html(value.name);
			newCollaboratorHTML.find(".password").html(value.password);
			newCollaboratorHTML.find(".register").html(new $tzd.date(value.register).shortDateTime);
        	$(".collaborators").append( newCollaboratorHTML );

        })
      };
      $tzd.ajax.post(url, data, callback);
    };

    refresh();

});