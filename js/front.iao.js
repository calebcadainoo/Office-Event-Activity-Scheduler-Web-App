$(function(){
	// ************NAV BAR***********
	$('.tap_menu').click(function(){
		$('.page_wrapper').toggleClass('slide_it');
	});

	$('.nav-logout').click(function(){
		if (confirm("Are You Sure You Want To Logout?")) {
			window.location.href = "./?view=logout";
		}
	});

	$('.lgt').click(function(){
		if (confirm("Are You Sure You Want To Logout?")) {
			window.location.href = "./?view=logout";
		}
	});

	$('.nav-notify').click(function(){
		$('.notify_bag').slideToggle(300);
	});

	$('.filter-icon').click(function () {
		$('.filterbx').slideToggle(300);
	})

	// ************END OF NAV BAR***********


	// ****** FILE LIST ******
	// $('.del-file').click(function () {
	// 	$objectID = $(this).closest('.del-file').attr("id").substring(4);
	// 	// alert($objectID);
	// 	if (confirm("Are You Sure You Want To Delete This Item?")) {
	// 		// alert("Boya!");
	// 		window.location.href = "php/delete.php?page=filelist&item_id="+$objectID;
	// 	}
	// });

	// $('.edit-file').click(function () {
	// 	$objectID = $(this).closest('.edit-file').attr("id").substring(5);
	// 	// alert($objectID);
	// 	window.location.href = "views/edit-filelist.php?item_id="+$objectID;
	// });
	// ****** END OF FILE LIST ******


	// // ****** SCHOOLS ******
	// $('.del-sch').click(function () {
	// 	$objectID = $(this).closest('.del-sch').attr("id").substring(4);
	// 	// alert($objectID);
	// 	if (confirm("Are You Sure You Want To Delete This Item?")) {
	// 		// alert("Boya!");
	// 		window.location.href = "php/delete.php?page=schools&item_id="+$objectID;
	// 	}
	// });

	// $('.edit-sch').click(function () {
	// 	$objectID = $(this).closest('.edit-sch').attr("id").substring(5);
	// 	// alert($objectID);
	// 	window.location.href = "views/edit-school.php?item_id="+$objectID;
	// });
	// ****** END OF SCHOOLS ******


	// ****** LETTERS ******
	$('.del-item').click(function () {
		$objectID = $(this).closest('.del-item').attr("id").substring(4);
		// alert($objectID);
		if (confirm("Are You Sure You Want To Delete This Item?")) {
			// alert("Boya!");
			window.location.href = "php/delete.php?page=letters&item_id="+$objectID;
		}
	});

	$('.edit-item').click(function () {
		$objectID = $(this).closest('.edit-item').attr("id").substring(5);
		// alert($objectID);
		
		window.location.href = "views/edit-letter.php?item_id="+$objectID;
	});
	// ****** END OF LETTERS ******

	$('.option-mod').click(function () {
		$objectID = $('.mod_opt_bx').closest('.mod_opt_bx').attr("id");//.substring(8);
		$('#'+$objectID).slideToggle();
		alert($objectID);
		
		// window.location.href = "php/delete.php?page=letters&item_id="+$objectID;
	});

	$('.preview-item').click(function () {
		$('.preview_overlay').fadeIn();
		$('.scanned_letter_title').addClass('scale_in');
		$('.scanned_letter_img').addClass('scale_in');
		
		$objectID = $(this).closest('.preview-item').attr("id").substring(8);

		$img_src = $('#scanned_letter-'+$objectID+' img').attr('src');
		$('.scanned_letter_img img').attr('src', $img_src);

		$letterID = 'letter-'+$objectID;
		$('.scanned_letter_title').text($('#'+$letterID).text());
		
		// alert($letterID);
		// $objectID = $(this).closest('.preview-item').attr("id").substring(8);
		// alert($objectID);
		// window.location.href = "php/delete.php?page=letters&item_id="+$objectID;
	});

	$('.scanned_letter img').dblclick(function () {
		$('.preview_overlay').fadeIn();
		$('.scanned_letter_title').addClass('scale_in');
		$('.scanned_letter_img').addClass('scale_in');

		$objectID = $(this).closest('.scanned_letter').attr("id").substring(15);
		
		$img_src = $('#scanned_letter-'+$objectID+'  img').attr('src');
		$('.scanned_letter_img img').attr('src', $img_src);

		$letterID = 'letter-'+$objectID;
		$('.scanned_letter_title').text($('#'+$letterID).text());
		// alert($objectID);
		// window.location.href = "php/delete.php?page=letters&item_id="+$objectID;
	});

	$('.closebtn').click(function(){
		$('.scanned_letter_title').removeClass('scale_in');
		$('.scanned_letter_img').removeClass('scale_in');
		$('.item_overlay').fadeOut().delay(200);
	});

	$('.noti_close').click(function(){
		$('.float_noti').fadeOut();
	});

	$('.fab_create').click(function() {
		$('.create_overlay').fadeIn();
		$('.form_contentbx').addClass('clearout');
	});


	setTimeout(function() {
		$('.app_error_msg').removeClass('vanishIn');
		$('.app_error_msg').addClass('vanishOut');
	}, 10000); // <-- time in milliseconds

	$('.app_error_msg').click(function(){
		$('.app_error_msg').removeClass('vanishIn');
		$('.app_error_msg').addClass('vanishOut');
	});

});