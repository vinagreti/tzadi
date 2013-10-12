$(document).ready(function(){

  $(".newKind").select2();
  var addModalHTML = $("#addModal");

	var collaboratorHTML = $(".collaborator").clone();
	$(".collaborator").remove();

  var branchHTML = $(".branch").clone();
  $(".branch").remove();
  branchHTML.removeClass("hide");

  var branchList = new function(){

    var self = this;

    self.branches = [];

    self.collaborators = [];

    self.refresh = function(){

      self.getBranches();

    }

    this.getBranches = function() {

      var url = base_url+'org/getBranches';

      var data = {

        tzadiToken : tzadiToken

      };

      var callback = function( e ){

        if( e.error )
          $tzd.alert.error( e.error );

        else {

          self.branches = e.branches;

          self.getCollaborators();

        }
          
        
      };

      $tzd.ajax.post(url, data, callback);

    };

    this.getCollaborators = function( callback ) {

      var url = base_url+'collaborator/getAll';

      var data = {

        tzadiToken : tzadiToken

      };

      var callback = function( e ){

        if( e.error )
          $tzd.alert.error( e.error );

        else {

          self.collaborators = e.collaborators;

          self.reloadList();

        }
          
        
      };

      $tzd.ajax.post(url, data, callback);

    };


    this.reloadList = function(){

      $.each( self.collaborators, function(index, collaborator){

        var newCollaboratorHTML = collaboratorHTML.clone();

        newCollaboratorHTML.find("._id").html(collaborator._id);

        newCollaboratorHTML.find(".org_resp").html(collaborator.org_resp);

        newCollaboratorHTML.find(".org_branch").html(collaborator.org_branch);

        newCollaboratorHTML.find(".email").html(collaborator.email);

        if(collaborator.facebook_id) newCollaboratorHTML.find(".facebook_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".facebook_id").attr("href")+collaborator.facebook_id);
        
        if(collaborator.google_id) newCollaboratorHTML.find(".google_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".google_id").attr("href")+collaborator.google_id);
        
        if(collaborator.linkedin_id) newCollaboratorHTML.find(".linkedin_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".linkedin_id").attr("href")+collaborator.linkedin_id);
       
        newCollaboratorHTML.find(".identity").html(collaborator.identity);
       
        newCollaboratorHTML.find("img").attr("src", collaborator.img);
        
        newCollaboratorHTML.find(".kind").html(collaborator.kind);
        
        newCollaboratorHTML.find(".name").html(collaborator.name);
       
        newCollaboratorHTML.find(".password").html(collaborator.password);
        
        newCollaboratorHTML.find(".register").html(new $tzd.date(collaborator.register).shortDateTime);

        var branch = $( "#" + collaborator.org_branch );

        if( branch[0] )
          branch.find(".collaborators").append( newCollaboratorHTML );

        else{

          newBranchHTML = branchHTML.clone();

          var branch = $tzd.list.getBy( self.branches, "_id", collaborator.org_branch );

          branch = branch[0];

          console.log('branch');

          console.log(branch);

          newBranchHTML.find(".add_collaborator").attr("id", branch._id);

          newBranchHTML.find(".branch_id").html( branch._id );

          newBranchHTML.find(".branch_name").html( branch.name );

          newBranchHTML.find(".collaborators").append( newCollaboratorHTML );

          $(".branchs").append( newBranchHTML );

        }

      })

    }

  };

  branchList.refresh();

  $(".add_collaborator").live("click", function(){

    var branch_id = $(this).attr("id");

    var branch = $tzd.list.getBy( branchList.branches, "_id", branch_id )[0];

    addModalHTML.find(".branch_id").html( branch._id );

    addModalHTML.find(".branch_name").html( branch.name );

    addModalHTML.modal("show");

  });

});