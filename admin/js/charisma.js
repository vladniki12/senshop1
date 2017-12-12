$(document).ready(function () {

	var msie = navigator.userAgent.match(/msie/i);
    $.browser = {};
    $.browser.msie = {};
 

    $('.navbar-toggle').click(function (e) {
        e.preventDefault();
        $('.nav-sm').html($('.navbar-collapse').html());
        $('.sidebar-nav').toggleClass('active');
        $(this).toggleClass('active');
    });

    var $sidebarNav = $('.sidebar-nav');

    // Hide responsive navbar on clicking outside
    $(document).mouseup(function (e) {
        if (!$sidebarNav.is(e.target) // if the target of the click isn't the container...
            && $sidebarNav.has(e.target).length === 0
            && !$('.navbar-toggle').is(e.target)
            && $('.navbar-toggle').has(e.target).length === 0
            && $sidebarNav.hasClass('active')
            )// ... nor a descendant of the container
        {
            e.stopPropagation();
            $('.navbar-toggle').click();
        }
    });

    //ajax menu checkbox
    $('#is-ajax').click(function (e) {
        $.cookie('is-ajax', $(this).prop('checked'), {expires: 365});
    });
    $('#is-ajax').prop('checked', $.cookie('is-ajax') === 'true' ? true : false);

    //disbaling some functions for Internet Explorer
    if (msie) {
        $('#is-ajax').prop('checked', false);
        $('#for-is-ajax').hide();
        $('#toggle-fullscreen').hide();
        $('.login-box').find('.input-large').removeClass('span10');

    }


    //highlight current / active link
    $('ul.main-menu li a').each(function () {
        if ($($(this))[0].href == String(window.location))
            $(this).parent().addClass('active');
    });

    //establish history variables
    var
        History = window.History, // Note: We are using a capital H instead of a lower h
        State = History.getState(),
        $log = $('#log');

    //bind to State Change
    History.Adapter.bind(window, 'statechange', function () { // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        $.ajax({
            url: State.url,
            success: function (msg) {
                $('#content').html($(msg).find('#content').html());
                $('#loading').remove();
                $('#content').fadeIn();
                var newTitle = $(msg).filter('title').text();
                $('title').text(newTitle);
                docReady();
            }
        });
    });

    //ajaxify menus
    $('a.ajax-link').click(function (e) {
        if (msie) e.which = 1;
        if (e.which != 1 || !$('#is-ajax').prop('checked') || $(this).parent().hasClass('active')) return;
        e.preventDefault();
        $('.sidebar-nav').removeClass('active');
        $('.navbar-toggle').removeClass('active');
        $('#loading').remove();
        $('#content').fadeOut().parent().append('<div id="loading" class="center">Loading...<div class="center"></div></div>');
        var $clink = $(this);
        History.pushState(null, null, $clink.attr('href'));
        $('ul.main-menu li.active').removeClass('active');
        $clink.parent('li').addClass('active');
    });

    $('.accordion > a').click(function (e) {
        e.preventDefault();
        var $ul = $(this).siblings('ul');
        var $li = $(this).parent();
        if ($ul.is(':visible')) $li.removeClass('active');
        else                    $li.addClass('active');
        $ul.slideToggle();
    });

    $('.accordion li.active:first').parents('ul').slideDown();


    //other things to do on document ready, separated for ajax calls
    docReady();
});


function docReady() {
    //prevent # links from moving to top
    $('a[href="#"][data-top!=true]').click(function (e) {
        e.preventDefault();
    });

    //notifications
    $('.noty').click(function (e) {
        e.preventDefault();
        var options = $.parseJSON($(this).attr('data-noty-options'));
        noty(options);
    });

    //chosen - improves select
    $('[data-rel="chosen"],[rel="chosen"]').chosen();

    //tabs
    $('#myTab a:first').tab('show');
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });


    //tooltip
    $('[data-toggle="tooltip"]').tooltip();

    //auto grow textarea
    $('textarea.autogrow').autogrow();

    //popover
    $('[data-toggle="popover"]').popover();

    //iOS / iPhone style toggle switch
    $('.iphone-toggle').iphoneStyle();

    //star rating
    $('.raty').raty({
        score: 4 //default stars
    });

    //uploadify - multiple uploads
    $('#file_upload').uploadify({
        'swf': 'misc/uploadify.swf',
        'uploader': 'misc/uploadify.php'
        // Put your options here
    });

    //gallery controls container animation
    $('ul.gallery li').hover(function () {
        $('img', this).fadeToggle(1000);
        $(this).find('.gallery-controls').remove();
        $(this).append('<div class="well gallery-controls">' +
            '<p><a href="#" class="gallery-edit btn"><i class="glyphicon glyphicon-edit"></i></a> <a href="#" class="gallery-delete btn"><i class="glyphicon glyphicon-remove"></i></a></p>' +
            '</div>');
        $(this).find('.gallery-controls').stop().animate({'margin-top': '-1'}, 400);
    }, function () {
        $('img', this).fadeToggle(1000);
        $(this).find('.gallery-controls').stop().animate({'margin-top': '-30'}, 200, function () {
            $(this).remove();
        });
    });


    //gallery image controls example
    //gallery delete
    $('.thumbnails').on('click', '.gallery-delete', function (e) {
        e.preventDefault();
        //get image id
        //alert($(this).parents('.thumbnail').attr('id'));
        $(this).parents('.thumbnail').fadeOut();
    });
    //gallery edit
    $('.thumbnails').on('click', '.gallery-edit', function (e) {
        e.preventDefault();
        //get image id
        //alert($(this).parents('.thumbnail').attr('id'));
    });

    //gallery colorbox
    $('.thumbnail a').colorbox({
        rel: 'thumbnail a',
        transition: "elastic",
        maxWidth: "95%",
        maxHeight: "95%",
        slideshow: true
    });

    //gallery fullscreen
    $('#toggle-fullscreen').button().click(function () {
        var button = $(this), root = document.documentElement;
        if (!button.hasClass('active')) {
            $('#thumbnails').addClass('modal-fullscreen');
            if (root.webkitRequestFullScreen) {
                root.webkitRequestFullScreen(
                    window.Element.ALLOW_KEYBOARD_INPUT
                );
            } else if (root.mozRequestFullScreen) {
                root.mozRequestFullScreen();
            }
        } else {
            $('#thumbnails').removeClass('modal-fullscreen');
            (document.webkitCancelFullScreen ||
                document.mozCancelFullScreen ||
                $.noop).apply(document);
        }
    });

    //tour
    if ($('.tour').length && typeof(tour) == 'undefined') {
        var tour = new Tour();
        tour.addStep({
            element: "#content", /* html element next to which the step popover should be shown */
            placement: "top",
            title: "Custom Tour", /* title of the popover */
            content: "You can create tour like this. Click Next." /* content of the popover */
        });
        tour.addStep({
            element: ".theme-container",
            placement: "left",
            title: "Themes",
            content: "You change your theme from here."
        });
        tour.addStep({
            element: "ul.main-menu a:first",
            title: "Dashboard",
            content: "This is your dashboard from here you will find highlights."
        });
        tour.addStep({
            element: "#for-is-ajax",
            title: "Ajax",
            content: "You can change if pages load with Ajax or not."
        });
        tour.addStep({
            element: ".top-nav a:first",
            placement: "bottom",
            title: "Visit Site",
            content: "Visit your front end from here."
        });

        tour.restart();
    }

    //datatable
    $('.datatable').dataTable({
        "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-12'i><'col-md-12 center-block'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ записей на странице"
        }
    });
    $('.btn-close').click(function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().fadeOut();
    });
    $('.btn-minimize').click(function (e) {
        e.preventDefault();
        var $target = $(this).parent().parent().next('.box-content');
        if ($target.is(':visible')) $('i', $(this)).removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        else                       $('i', $(this)).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        $target.slideToggle();
    });
    $('#add_new_user').click(function (e) {
        e.preventDefault();
		document.getElementById('add_master').reset();
		$('#myModal').modal('show');
    });
	 $('.edit_user').click(function (e) {
         e.preventDefault();
		var cl = $(this);
		var id = $(this).attr("id");
		var teg = document.getElementsByTagName('TR');
		for (var i = 0; i < teg.length; i++)
        {
            if (teg[i].id == id)
            {
                el = teg[i];
            }
        }
		var child = el.childNodes;
		var user_id = el.childNodes[0].innerHTML;
		var type = el.childNodes[1].innerHTML;
		var login = el.childNodes[2].innerHTML;
		var passw = el.childNodes[3].innerHTML;
		var email = el.childNodes[4].innerHTML;
		var phone = el.childNodes[5].innerHTML;
		var name = el.childNodes[6].innerHTML;
		var sername = el.childNodes[7].innerHTML;
		var id_edit = document.getElementById("id");
		id_edit.value = user_id;
		var type_edit = document.getElementById("type_user");
		type_edit.value = type;
		var login_edit = document.getElementById("loginedit");
		login_edit.value = login;
		var password_edit = document.getElementById("passwordedit");
		password_edit.value = passw;
		var email_edit = document.getElementById("emailedit");
		email_edit.value = email;
		var phone_edit = document.getElementById("phoneedit");
		phone_edit.value = phone;
		var name_edit = document.getElementById("nameedit");
		name_edit.value = name;
		var surname_edit = document.getElementById("surnameedit");
		surname_edit.value = sername;
        $('#myModalEdit').modal('show');
    });
	
	$("#submit_add").click( function(){
			sendAjaxForm('add_master', 'add_ajax.php');
			return false; 
		}
	);
	$("#submit_close_add_master").click(function(){ 
	   setTimeout(function() {window.location.reload();}, 500);
	   
	   });
	$("#submit_close_add_user").click(function(){ 
	   setTimeout(function() {window.location.reload();}, 500);
	   
	   });
	$("#edit_user").click( function(){
			sendAjaxFormEdit('edit_master', 'edit_ajax.php');
			return false; 
		}
	);
	$("#submit_close_edit_user").click(function(){ 
	   setTimeout(function() {window.location.reload();}, 500);
	   
	   });
	$('.delete_user').click( function(e){
		var id = $(this).attr("id");
			sendAjaxFormDelete(id, 'delete_ajax.php');
			return false; 
		}
	);
		
	$("#add_master").trigger('reset');
	

	  $('.add_new_product').click(function (e) {
        e.preventDefault();
		document.getElementById('add_product').reset();
		$('#myModalNewProduct').modal('show');
    });
     $("form[name='add_product']").submit(function(e) {
    		var formData = new FormData($(this)[0]);
			AddNewProduct(formData, 'add_product_ajax.php');
			return false; 
		}
	);
      	
	$("#add_product").trigger('reset');
	
	$("#submit_close_add_product").click(function(){ 
	   setTimeout(function() {window.location.reload();}, 500);
	   
	   });
	
	
	$('.edit_photo_product').click(function (e) {
         e.preventDefault();
		var id = $(this).attr("id");
		var teg = document.getElementsByTagName('TR');
		for (var i = 0; i < teg.length; i++)
        {
            if (teg[i].id == id)
            {
                el = teg[i];
            }
        }
		var child = el.childNodes;
		var product_id = el.childNodes[0].innerHTML;
		var id_edit = document.getElementById("id_photo");
		id_edit.value = product_id;
        $('#myModalEditPhotoProduct').modal('show');
    });
    
    $("form[name='edit_photo_product']").submit(function(e) {
    		var formImage = new FormData($(this)[0]);
			EditPhotoProduct(formImage, 'edit_photo_ajax.php');
			return false; 
		}
	);
	$(".edit_photo_product").trigger('reset');
	
	$("#submit_close_photo_product").click(function(){ 
	   setTimeout(function() {window.location.reload();}, 500);
	   
	   });
	
	$('.edit_product').click(function (e) {
         e.preventDefault();
		var cl = $(this);
		var id = $(this).attr("id");
		var teg = document.getElementsByTagName('TR');
		for (var i = 0; i < teg.length; i++)
        {
            if (teg[i].id == id)
            {
                el = teg[i];
            }
        }
		var child = el.childNodes;
		var product_id = el.childNodes[0].innerHTML;
		var name = el.childNodes[2].innerHTML;
		var cost = el.childNodes[3].innerHTML;
		var type_product = el.childNodes[4].innerHTML;
		var material = el.childNodes[5].innerHTML;
		var description = el.childNodes[6].innerHTML;
		var id_edit = document.getElementById("id");
		id_edit.value = product_id;
		var name_edit = document.getElementById("nameedit");
		name_edit.value = name;
		var cost_edit = document.getElementById("costedit");
		cost_edit.value = cost;
		var type_prod_edit = document.getElementsByName('type_prod_edit');
		for (i=0;i<type_prod_edit.length;i++){
    		var str=type_prod_edit[i].value;
    		if(str==type_product) {
    		type_prod_edit[i].checked = true;
    		}
}
		var material_edit = document.getElementById("materialedit");
		material_edit.value = material;
		var description_edit = document.getElementById("descriptionedit");
		description_edit.value = description;
        $('#myModalEditProduct').modal('show');
    });
	
	$("form[name='edit_product']").submit(function(e) {
			EditProduct('edit_product', 'edit_prod_ajax.php');
			return false; 
		}
	);
	$(".edit_product").trigger('reset');
	
	$("#submit_close_edit_product").click(function(){ 
	   setTimeout(function() {window.location.reload();}, 500);
	   
	   });
	
	$('.delete_product').click( function(e){
		var id = $(this).attr("id");
			sendAjaxFormDelete(id, 'delete_product_ajax.php');
			return false; 
		}
	);
	
	$('.delete_order').click( function(e){
		var id = $(this).attr("id");
			sendAjaxFormDelete(id, 'delete_order_ajax.php');
			return false; 
		}
	);
	
	$('.edit_order').click(function (e) {
         e.preventDefault();
		var cl = $(this);
		var id = $(this).attr("id");
		var teg = document.getElementsByTagName('TR');
		for (var i = 0; i < teg.length; i++)
        {
            if (teg[i].id == id)
            {
                el = teg[i];
            }
        }
		var child = el.childNodes;
		var elements = el.childNodes[6].getElementsByClassName("status");
		for( var i = 0; i < elements.length; i++ ) 
			{
   				 var status = elements[i].id;
		}
		var id_edit = document.getElementById("id");
		id_edit.value = id;
		var type_order_edit = document.getElementsByName('type_order_edit');
		for (i=0;i<type_order_edit.length;i++){
    		var str=type_order_edit[i].value;
    		if(str==status) {
    		type_order_edit[i].checked = true;
    		}
}
        $('#myModalEditOrder').modal('show');
    });
	
	$("form[name='edit_order']").submit(function(e) {
			EditOrder('edit_order', 'edit_order_ajax.php');
			return false; 
		}
	);
	
	$("#submit_close_edit_order").click(function(){ 
	   setTimeout(function() {window.location.reload();}, 500);   
	   }); 
	   
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '2014-06-12',
        events: [
            {
                title: 'All Day Event',
                start: '2014-06-01'
            },
            {
                title: 'Long Event',
                start: '2014-06-07',
                end: '2014-06-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-06-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-06-16T16:00:00'
            },
            {
                title: 'Meeting',
                start: '2014-06-12T10:30:00',
                end: '2014-06-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2014-06-12T12:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2014-06-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2014-06-28'
            }
        ]
    });

}
function sendAjaxForm(ajax_form, url) {
    jQuery.ajax({
        url:     url, //url ÒÚ‡ÌËˆ˚ (action_ajax_form.php)
        type:     "POST", //ÏÂÚÓ‰ ÓÚÔ‡‚ÍË
        dataType: false, 
        processData: false,//ÙÓÏ‡Ú ‰‡ÌÌ˚ı
        data: jQuery("#"+ajax_form).serialize(),
		result: null,		// —Â‡ËÎËÁÛÂÏ Ó·˙ÂÍÚ
		success: function(response) { //ƒ‡ÌÌ˚Â ÓÚÔ‡‚ÎÂÌ˚ ÛÒÔÂ¯ÌÓ
			result = response;
			if (result!=0) {
				result_form = "result_form_ok";
        	document.getElementById(result_form).innerHTML = result;
			$('#myModalOk').modal('show');
			}
			else {
				result_form = "result_form_cancel";
				document.getElementById(result_form).innerHTML = "Ошибка. Данные не добавлены.";
				$('#myModalCancel').modal('show');
			}
    	},
				
    	error: function(response) { 
		result_form = "result_form_cancel";
		$('#myModalCancel').modal('show');// ƒ‡ÌÌ˚Â ÌÂ ÓÚÔ‡‚ÎÂÌ˚
    		document.getElementById(result_form).innerHTML = "Ошибка. Данные не добавлены.";
    	}
 	});
}
function sendAjaxFormEdit(ajax_form, url) {
    jQuery.ajax({
        url:     url, //url ÒÚ‡ÌËˆ˚ (action_ajax_form.php)
        type:     "POST", //ÏÂÚÓ‰ ÓÚÔ‡‚ÍË
        dataType: "html", //ÙÓÏ‡Ú ‰‡ÌÌ˚ı
        data: jQuery("#"+ajax_form).serialize(),
		result: null,		// —Â‡ËÎËÁÛÂÏ Ó·˙ÂÍÚ
		success: function(response) { //ƒ‡ÌÌ˚Â ÓÚÔ‡‚ÎÂÌ˚ ÛÒÔÂ¯ÌÓ
			result = response;
			if (result!=0) {
				result_form = "result_form_ok";
        	document.getElementById(result_form).innerHTML = result;
			$('#myModalOk').modal('show');
			}
			else {
				result_form = "result_form_cancel";
				document.getElementById(result_form).innerHTML = "Ошибка. Данные не изменены.";
				$('#myModalCancel').modal('show');
			}
    	},
				
    	error: function(response) {
		result_form = "result_form_cancel";			
		$('#myModalCancel').modal('show');// ƒ‡ÌÌ˚Â ÌÂ ÓÚÔ‡‚ÎÂÌ˚
    		document.getElementById(result_form).innerHTML = "Ошибка. Данные не изменены.";
    	}
 	});
}

function sendAjaxFormDelete(id, url) {
    jQuery.ajax({
        url:     url, //url ÒÚ‡ÌËˆ˚ (action_ajax_form.php)
        type:     "POST", //ÏÂÚÓ‰ ÓÚÔ‡‚ÍË
        dataType: "json", //ÙÓÏ‡Ú ‰‡ÌÌ˚ı
        data: "id=" + id,
		result: null,		// —Â‡ËÎËÁÛÂÏ Ó·˙ÂÍÚ
		success: function(response) { //ƒ‡ÌÌ˚Â ÓÚÔ‡‚ÎÂÌ˚ ÛÒÔÂ¯ÌÓ
			result = response;
			if (result==1) {
				location.reload();
				
			}
			else if(result==0) {
				result_form = "result_form_cancel";
				document.getElementById(result_form).innerHTML = "Ошибка! Запись не удалена.";
				$('#myModalCancel').modal('show');
			}
    	},
				
    	error: function(response) {
		result_form = "result_form_cancel";			
		$('#myModalCancel').modal('show');// ƒ‡ÌÌ˚Â ÌÂ ÓÚÔ‡‚ÎÂÌ˚
    		document.getElementById(result_form).innerHTML = "Ошибка! Запись не удалена.";
    	}
 	});
}
function AddNewProduct(ajax_form, url) {
    jQuery.ajax({
    
    	
        url:     url, //url ÒÚ‡ÌËˆ˚ (action_ajax_form.php)
        type:     "POST",
        //dataType: "json",  //ÏÂÚÓ‰ ÓÚÔ‡‚ÍË
        data: ajax_form,
        async: false, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       // The content type used when sending data to the server.
		cache: false, 
		processData: false,            // To unable request pages to be cached
		result: null,		// —Â‡ËÎËÁÛÂÏ Ó·˙ÂÍÚ
		success: function(response) { //ƒ‡ÌÌ˚Â ÓÚÔ‡‚ÎÂÌ˚ ÛÒÔÂ¯ÌÓ
			result = response;
			if (result==1) {
				result_form = "result_form_ok";
        	document.getElementById(result_form).innerHTML = "Данные в базу данных успешно добавлены!";
			$('#myModalOk').modal('show');
			}
			else {
				result_form = "result_form_cancel";
				document.getElementById(result_form).innerHTML = result;
				$('#myModalCancel').modal('show');
			}
    	},
				
    	error: function(response) { 
		result_form = "result_form_cancel";
		$('#myModalCancel').modal('show');// ƒ‡ÌÌ˚Â ÌÂ ÓÚÔ‡‚ÎÂÌ˚
    		document.getElementById(result_form).innerHTML = "Ошибка добавления в базу данных!";
    	}
 	});
}
function EditPhotoProduct(ajax_form, url) {
    jQuery.ajax({    	
        url:     url, //url ÒÚ‡ÌËˆ˚ (action_ajax_form.php)
        type:     "POST",
        //dataType: "json",  //ÏÂÚÓ‰ ÓÚÔ‡‚ÍË
        data: ajax_form,
        async: false, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false,       // The content type used when sending data to the server.
		cache: false, 
		processData: false,            // To unable request pages to be cached
		result: null,		// —Â‡ËÎËÁÛÂÏ Ó·˙ÂÍÚ
		success: function(response) { //ƒ‡ÌÌ˚Â ÓÚÔ‡‚ÎÂÌ˚ ÛÒÔÂ¯ÌÓ
			result = response;
			if (result==1) {
				result_form = "result_form_ok";
        	document.getElementById(result_form).innerHTML = "Данные в базе данных успешно обновлены!";
			$('#myModalOk').modal('show');
			}
			else {
				result_form = "result_form_cancel";
				document.getElementById(result_form).innerHTML = result;
				$('#myModalCancel').modal('show');
			}
    	},
				
    	error: function(response) { 
		result_form = "result_form_cancel";
		$('#myModalCancel').modal('show');// ƒ‡ÌÌ˚Â ÌÂ ÓÚÔ‡‚ÎÂÌ˚
    		document.getElementById(result_form).innerHTML = "Ошибка изменения данных в базе данных!";
    	}
 	});
}
function EditProduct(ajax_form, url) {
    jQuery.ajax({
        url:     url, //url ÒÚ‡ÌËˆ˚ (action_ajax_form.php)
        type:     "POST", //ÏÂÚÓ‰ ÓÚÔ‡‚ÍË
        dataType: false, 
        processData: false,//ÙÓÏ‡Ú ‰‡ÌÌ˚ı
        data: jQuery("#"+ajax_form).serialize(),
		result: null,	// —Â‡ËÎËÁÛÂÏ Ó·˙ÂÍÚ
		success: function(response) { //ƒ‡ÌÌ˚Â ÓÚÔ‡‚ÎÂÌ˚ ÛÒÔÂ¯ÌÓ
			result = response;
			if (result==1) {
				result_form = "result_form_ok";
        	document.getElementById(result_form).innerHTML = "Данные в базе данных успешно обновлены!";
			$('#myModalOk').modal('show');
			}
			else {
				result_form = "result_form_cancel";
				document.getElementById(result_form).innerHTML = result;
				$('#myModalCancel').modal('show');
			}
    	},
				
    	error: function(response) { 
		result_form = "result_form_cancel";
		$('#myModalCancel').modal('show');// ƒ‡ÌÌ˚Â ÌÂ ÓÚÔ‡‚ÎÂÌ˚
    		document.getElementById(result_form).innerHTML = "Ошибка добавления в базу данных!";
    	}
 	});
}

function EditOrder(ajax_form, url) {
    jQuery.ajax({
        url:     url, //url ÒÚ‡ÌËˆ˚ (action_ajax_form.php)
        type:     "POST", //ÏÂÚÓ‰ ÓÚÔ‡‚ÍË
        dataType: false, 
        processData: false,//ÙÓÏ‡Ú ‰‡ÌÌ˚ı
        data: jQuery("#"+ajax_form).serialize(),
		result: null,	// —Â‡ËÎËÁÛÂÏ Ó·˙ÂÍÚ
		success: function(response) { //ƒ‡ÌÌ˚Â ÓÚÔ‡‚ÎÂÌ˚ ÛÒÔÂ¯ÌÓ
			result = response;
			if (result==1) {
				result_form = "result_form_ok";
        	document.getElementById(result_form).innerHTML = "Данные в базе данных успешно обновлены!";
			$('#myModalOk').modal('show');
			}
			else {
				result_form = "result_form_cancel";
				document.getElementById(result_form).innerHTML = result;
				$('#myModalCancel').modal('show');
			}
    	},
				
    	error: function(response) { 
		result_form = "result_form_cancel";
		$('#myModalCancel').modal('show');// ƒ‡ÌÌ˚Â ÌÂ ÓÚÔ‡‚ÎÂÌ˚
    		document.getElementById(result_form).innerHTML = "Ошибка добавления в базу данных!";
    	}
 	});
}
//additional functions for data table
$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
    return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
}
$.extend($.fn.dataTableExt.oPagination, {
    "bootstrap": {
        "fnInit": function (oSettings, nPaging, fnDraw) {
            var oLang = oSettings.oLanguage.oPaginate;
            var fnClickHandler = function (e) {
                e.preventDefault();
                if (oSettings.oApi._fnPageChange(oSettings, e.data.action)) {
                    fnDraw(oSettings);
                }
            };

            $(nPaging).addClass('pagination').append(
                '<ul class="pagination">' +
                    '<li class="prev disabled"><a href="#">&larr; ' + oLang.sPrevious + '</a></li>' +
                    '<li class="next disabled"><a href="#">' + oLang.sNext + ' &rarr; </a></li>' +
                    '</ul>'
            );
            var els = $('a', nPaging);
            $(els[0]).bind('click.DT', { action: "previous" }, fnClickHandler);
            $(els[1]).bind('click.DT', { action: "next" }, fnClickHandler);
        },

        "fnUpdate": function (oSettings, fnDraw) {
            var iListLength = 5;
            var oPaging = oSettings.oInstance.fnPagingInfo();
            var an = oSettings.aanFeatures.p;
            var i, j, sClass, iStart, iEnd, iHalf = Math.floor(iListLength / 2);

            if (oPaging.iTotalPages < iListLength) {
                iStart = 1;
                iEnd = oPaging.iTotalPages;
            }
            else if (oPaging.iPage <= iHalf) {
                iStart = 1;
                iEnd = iListLength;
            } else if (oPaging.iPage >= (oPaging.iTotalPages - iHalf)) {
                iStart = oPaging.iTotalPages - iListLength + 1;
                iEnd = oPaging.iTotalPages;
            } else {
                iStart = oPaging.iPage - iHalf + 1;
                iEnd = iStart + iListLength - 1;
            }

            for (i = 0, iLen = an.length; i < iLen; i++) {
                // remove the middle elements
                $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                // add the new list items and their event handlers
                for (j = iStart; j <= iEnd; j++) {
                    sClass = (j == oPaging.iPage + 1) ? 'class="active"' : '';
                    $('<li ' + sClass + '><a href="#">' + j + '</a></li>')
                        .insertBefore($('li:last', an[i])[0])
                        .bind('click', function (e) {
                            e.preventDefault();
                            oSettings._iDisplayStart = (parseInt($('a', this).text(), 10) - 1) * oPaging.iLength;
                            fnDraw(oSettings);
                        });
                }

                // add / remove disabled classes from the static elements
                if (oPaging.iPage === 0) {
                    $('li:first', an[i]).addClass('disabled');
                } else {
                    $('li:first', an[i]).removeClass('disabled');
                }

                if (oPaging.iPage === oPaging.iTotalPages - 1 || oPaging.iTotalPages === 0) {
                    $('li:last', an[i]).addClass('disabled');
                } else {
                    $('li:last', an[i]).removeClass('disabled');
                }
            }
        }
    }
});
