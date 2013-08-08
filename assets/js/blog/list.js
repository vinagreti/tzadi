$(document).ready(function(){

	var postHtml = $(".post").clone();

	postHtml.show();

	$(".post").remove();

	var pageHtml = $(".page").last().clone();

	pageHtml.removeClass("disabled");

	var pageNum = 0;

	var page = [];

	$.each(posts, function(index, postObj){

		if( index % 5 == 0 ) {

			pageNum++;

			if( pageNum > 1 ) {

				var newPage = pageHtml.clone();

				newPage.attr("id", pageNum);

				newPage.find("a").html( pageNum );

				newPage.insertBefore($(".next"));

			}

		}

		if( page[pageNum] )
			page[pageNum].push(postObj);

		else
			page[pageNum] = [postObj];

	});

	var listPosts = function( posts ){

		$(".post").remove();

		$.each(posts, function(index, postObj){

			var postRow = postHtml.clone();

			postRow.find("#title").html(postObj.title);

			postRow.find("#subtitle").html(postObj.subtitle);

			postRow.find(".openPost").attr("href", postRow.find(".openPost").attr("href")+postObj.url )

			postRow.find(".editPost").attr("href", postRow.find(".editPost").attr("href")+postObj.url )

			postRow.find(".dropPost").attr("id", postObj.url )

			$("#posts").append(postRow);

		});

	}

	listPosts(page[1]);

	$(".page").live("click", function(){

		var id = $(this).attr("id");

		$(".page").removeClass("disabled");

		$(".pager").find("#"+id).addClass("disabled");

		listPosts( page[ id ] );

	})

	$("#prev").live("click", function(){

		var id = $(".page.disabled").attr("id");

		var newID = id - 1;

		if( newID < 1 ) newID = 1;

		$(".page").removeClass("disabled");

		$(".pager").find("#"+newID).addClass("disabled");

		listPosts( page[ newID ] );

	})

	$("#next").live("click", function(){

		var id = $(".page.disabled").attr("id");

		var newID = id + 1;

		if( newID > page.length-1 ) newID = page.length-1;

		$(".page").removeClass("disabled");

		$(".pager").find("#"+newID).addClass("disabled");

		listPosts( page[ newID ] );

	})

});