$(document).ready(function(){

  $("#addModal").find(".org_resp").select2();

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

    this.getCollaborators = function() {

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

        self.appendToList( collaborator );

      });

    }

    this.appendToList = function( collaborator ){

      var newCollaboratorHTML = self.createCollaboratorObj( collaborator );

      var newBranchHTML = self.selectBranchHTML( collaborator );

      newBranchHTML.find(".collaborators").append( newCollaboratorHTML );

    };

    this.prependToList = function( collaborator ){

      var newCollaboratorHTML = self.createCollaboratorObj( collaborator );

      var newBranchHTML = self.selectBranchHTML( collaborator );

      newBranchHTML.find(".collaborators").prepend( newCollaboratorHTML );

    };

    this.createCollaboratorObj = function( collaborator ){

      var branch = $tzd.list.getBy( self.branches, "_id", collaborator.org_branch )[0];

      var newCollaboratorHTML = collaboratorHTML.clone();

      newCollaboratorHTML.find("._id").html(collaborator._id);

      newCollaboratorHTML.find(".org_resp").html(collaborator.org_resp);

      newCollaboratorHTML.find(".org_branch").html( branch._id+ " - " +branch.name );

      newCollaboratorHTML.find(".email").html(collaborator.email);

      if(collaborator.facebook_id) newCollaboratorHTML.find(".facebook_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".facebook_id").attr("href")+collaborator.facebook_id);
      
      if(collaborator.google_id) newCollaboratorHTML.find(".google_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".google_id").attr("href")+collaborator.google_id);
      
      if(collaborator.linkedin_id) newCollaboratorHTML.find(".linkedin_id").removeClass("hide").attr("href", newCollaboratorHTML.find(".linkedin_id").attr("href")+collaborator.linkedin_id);
     
      newCollaboratorHTML.find(".identity").html(collaborator.identity);
     
      newCollaboratorHTML.find("img").attr("src", collaborator.img);
      
      newCollaboratorHTML.find(".status").html(collaborator.status);

      var creator_name = collaborator.creator_id ? $tzd.list.getBy( self.collaborators, "_id", collaborator.creator_id )[0].name : "sys";

      newCollaboratorHTML.find(".creator_name").html( creator_name );
      
      newCollaboratorHTML.find(".name").html(collaborator.name);
     
      newCollaboratorHTML.find(".password").html(collaborator.password);
      
      newCollaboratorHTML.find(".register").html(new $tzd.date(collaborator.register).shortDateTime);

      return newCollaboratorHTML;

    }

    this.selectBranchHTML = function( collaborator ){

      var branch = $tzd.list.getBy( self.branches, "_id", collaborator.org_branch );

      branch = branch[0];

      var newBranchHTML = $(".branch#" + collaborator.org_branch );

      if( ! newBranchHTML.length > 0 ){

        newBranchHTML = branchHTML.clone();

        newBranchHTML.attr("id", branch._id);

        newBranchHTML.find(".openAddModal").attr("id", branch._id);

        newBranchHTML.find(".branch_id").html( branch._id );

        newBranchHTML.find(".branch_name").html( branch.name );

        $(".branchs").append( newBranchHTML );

      }

      return newBranchHTML;

    }

    this.sendNewCollaboratorData = function(){

      var url = base_url+'collaborator/add';

      var data = {

        tzadiToken : tzadiToken

        , "org_branch" : addModalHTML.find(".org_branch").html()
 
        , "name" : addModalHTML.find(".name").val()
 
        , "email" : addModalHTML.find(".email").val()
 
        , "org_resp" : addModalHTML.find(".org_resp").select2('data').id

      };

      var callback = function( e ){

        if( e.error )
          $tzd.alert.error( e.error );

        else {

          $tzd.alert.success( e.success );

          self.prependToList( e.collaborator[0] );

          addModalHTML.find(".name").html("");

          addModalHTML.find(".email").html("");

          addModalHTML.modal("hide");

        }
          
        
      };

      $tzd.ajax.post(url, data, callback);

    }

  };

  branchList.refresh();

  $(".openAddModal").live("click", function(){

    var branch_id = $(this).attr("id");

    var branch = $tzd.list.getBy( branchList.branches, "_id", branch_id )[0];

    addModalHTML.find(".org_branch").html( branch._id );

    addModalHTML.find(".branch_name").html( branch.name );

    addModalHTML.modal("show");

  });

  $(".addCollaborator").live("click", function(){

    var valid = true;

    valid = valid && $tzd.form.checkMask.range(addModalHTML.find(".name"), 1, 255, "informe um nome valido");

    valid = valid && $tzd.form.checkMask.email(addModalHTML.find(".email"), "informe um e-mail válido");

    if( valid ){

      branchList.sendNewCollaboratorData();

    }

  });

});