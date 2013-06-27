$(document).ready(function() {

	//Intros for tools

	moveme = $('#block-block-5');
	$('#block-block-5').remove();
	$('#subbody').prepend(moveme);

	moveme = $('#block-block-6');
	$('#block-block-6').remove();
	$('#subbody').prepend(moveme);

	moveme = $('#block-block-7');
	$('#block-block-7').remove();
	$('#subbody').prepend(moveme);

	moveme = $('#block-block-8');
	$('#block-block-8').remove();
	$('#subbody').prepend(moveme);

	//Forum intro
	forumintro = $('#block-block-9');
	$('#block-block-9').remove();
	$('#forum').before(forumintro);

	//blog intro
	blogintro = $('#block-block-10');
	$('#block-block-10').remove();
	$('#subbody').prepend(blogintro);
	//move forum navigation


	forumnav = $('.forum-topic-navigation');
	$('.forum-topic-navigation').remove();
	$('#subbody').prepend(forumnav);

	//move comments into body

	movecomments = $('#comments');
	$('#comments').remove();
	$('#subbody').append(movecomments);


	//
	$('.image-li.forum').click(function(){
		location.href='/about/community/forum';
	});
	$('.image-li.blog').click(function(){
		location.href='/blog';
	});

	//User login box
	userlogin = document.createElement("a");
	$(userlogin).addClass("user-login-switch");
	$(userlogin).text("login");

	$('.block-user').before(userlogin);
	$(".user-login-switch").click(function(){
		$('.block-user').toggle();
		$('.user-login-switch').toggleClass("active");
		if($('.user-login-switch').hasClass("active")) {
			userOn();
		} else {
			userOff();
		}

	});
	$('#navigation, #main-wrapper').click(function(){userOff();});
	$('.nice-menu').mouseover(function(){userOff();});
	function userOn() {
		xoff = document.createElement("span");
		$(xoff).addClass("white-hover");
		$(xoff).text("x");
		$('.user-login-switch').text("close");
		$('.user-login-switch').prepend(xoff);
	}

	function userOff() {
		$('.white-hover').remove();
		$(userlogin).text("login");
		$('.block-user').hide();
		$('.user-login-switch').removeClass("active");

	}
	function resizeIt() {
		rheight = $('.region-sidebar-second').height();
		lheight = $('.leftcolumn').height() - 145;
		if (lheight > rheight || rheight == null) {
			$('.region-sidebar-second').css("height", (lheight) + "px");
		} else {
			$('.leftcolumn').css("height",  lheight + "px");
		}
	}
	resizeIt();

	moveme = $('.section-comment form');
	//$('.section-comment form').remove();
	$('.node #subbody').append(moveme);


	//$('.section-user.logged-in #content').prepend('<div id="subheadbox" style="margin-bottom:40px;"><div id="subheader"><h2 class="title">Welcome</h2></div><div id="headerimage"><img class="imagefield imagefield-field_headimage" width="439" height="109" alt="" src="http://www.carpediemwestacademy.org/sites/carpediemwestacademy.org/files/imagefield_default_images/columbia.jpg?1308602934"></div></div>');

	//$('#comment-form .preview').before(placeholderbox);

	//Toggle Tools

		$('.tool-title').click(function(){
			$(this).next().toggle('slow');
			$(this).toggleClass('down');
			setTimeout(function(){
				adjustHeight();
			}, 1000);
		});

	expandall = document.createElement('a');
	$(expandall).text('expand all').addClass("expandlink").click(function(){
		if($(this).hasClass('clicked')) {
			$('.tool-container').hide('slow');
			$('.tool-title').removeClass('down');
			$(this).removeClass('clicked').text('expand all');
			setTimeout(function(){
				resizeIt();
				adjustHeight();
			}, 1000);
		} else {
			$('.tool-container').show('slow');
			$('.tool-title').addClass('down');
			$(this).addClass('clicked').text('close all');
			setTimeout(function(){
				resizeIt();
				adjustHeight();
			}, 1000);
		}
	});
	$('.view-Tools #subbody .views-row-1').before(expandall);

	//Change forum link text
	$('.topic-next').text("Next Topic >");
	$('.topic-previous').text("< Previous Topic");

	$('.comment .title').each(function(){
			texttosave = $('a',this).text();
			$('a',this).remove();
			$(this).text(texttosave);
	});

	//add link to user page
	text = $('#block-logintoboggan-0 .content').text();
	link = $('#block-logintoboggan-0 .content a');
	newtext = text.substr(0,text.indexOf("|"));
	userlink = document.createElement("a");
	$(userlink).attr("href","/user");
	$(userlink).text(newtext);
	$('#block-logintoboggan-0 .content').html(userlink).append("&nbsp;|&nbsp;").append(link);


	//Tool of the month image
	$('.leftcolumn .view-id-tool_of_the_month .views-row-1 a:first').addClass('showimage');
	$('.region-sidebar-second .view-id-tool_of_the_month .views-row-1 a:first').addClass('showimagesmall');

	/*
//Blog icon
	img = document.createElement("img");
	$(img).attr("src","/sites/all/themes/carpediemacademy/images/blogicon.png").attr("class","blog-icon");
	$('.section-blog #subheader .title:first').prepend($(img));
	//Forum icon
	img2 = document.createElement("img");
	$(img2).attr("src","/sites/all/themes/carpediemacademy/images/forum.png").attr("class","forum-icon");
	if($('.title:first').text() == "Discussion Forum") {
		$('.title:first').prepend($(img2));
		$("#subheader").addClass("forum");
		$("#subheadbox").addClass("forum");
	}
*/

	//DotDotDot Addes ellipses

	function mydotdotdot(){

		$(".breadcrumb").dotdotdot({
	        wrapper : 'div',    /*  The element to wrap the content in. */

	        ellipsis: '... ',   /*  The HTML to add as ellipsis. */

					wrap    : 'word',   /*  How to cut off the text/html:
																	'word'/'letter'/'children' */
	        after   : null,     /*  A jQuery-selector for the element to keep
																	and put after the ellipsis. */
	        watch   : false,    /*  Whether to update the ellipsis:
																	true/'window' */
	        height  : 30,      /*  Optionally set a max-height,
	                                if null, the height will be measured. */
	        tolerance: 0        /*  Deviation for the height-option. */
	    });

		$('.node-type-tool .title').dotdotdot({
	        wrapper : 'div',
	        ellipsis: '... ',   /*  The HTML to add as ellipsis. */
					wrap    : 'word',   /*  'word'/'letter'/'children' */
	        after   : null,     /*  A jQuery-selector for the element to keep and put after */
	        watch   : false,    /*  Whether to update the ellipsis: true/'window' */
	        height  : 80,      /*  Set a max-height - null = height will be measured. */
	        tolerance: 0        /*  Deviation for the height-option. */
			});
		var xtime = 1;
		if($("body").hasClass("time-4")) {
			$("body").removeClass("time-4").removeClass("time-3").removeClass("time-2").removeClass("time-1");
			return;
		} else if($("body").hasClass("time-3")) {
			$("body").addClass("time-4");
			xtime = 10;
		} else if($("body").hasClass("time-2")) {
			$("body").addClass("time-3");
			xtime = 5;
		} else if($("body").hasClass("time-1")) {
			$("body").addClass("time-2");
		} else {
			$("body").addClass("time-1");
		}
		setTimeout(mydotdotdot,(500*xtime));

	}

	setTimeout(mydotdotdot,(50));

	function adjustHeight() {
		rheight = $('.region-sidebar-second').height();
		lheight = $('.leftcolumn').height() - 145;
		if (lheight > rheight || rheight == null) {
			$('.region-sidebar-second').css("height", (lheight) + "px");
		} else {
			$('.leftcolumn .section #content-area').css("height",  rheight + "px");
			$('.leftcolumn #subcontent').css("height",  (rheight - 20) + "px");
		}
	}

	adjustHeight();

});
