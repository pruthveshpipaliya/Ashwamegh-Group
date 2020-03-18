jQuery(function($) {'use strict',
	
	//Initiat WOW JS
	new WOW().init();
	
	// Login form
	var loginform = $('#login-contact-form');
	loginform.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
            data: loginform.serialize(),
			beforeSend: function(){
				loginform.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Loggin you in...</p>').fadeIn() );
			}
		}).done(function(data){
			
			if( data.type == 'CaptchaError' 
				|| data.type == 'InvalidUsername'
				|| data.type == 'InvalidPassword' )
			{
				form_status.html('<p class="text-success">' + data.message + '</p>').delay(3000).fadeOut();
			}
			else
			{
				window.location.replace("adminpanel.php");	
			}
		});
	});
});


$( document ).ready(function() {

var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

/* manage data list */
function manageData() {
	
    $.ajax({
        dataType: 'json',
        url: 'libs/getData.php',
        data: {page:page}
    }).done(function(data){
		
		if(data.type == 'Session_Expire' )
		{
			toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
			window.location.replace("admin_login.php");	
		}
		else
		{		
			total_page = Math.ceil(data.total/5);
			current_page = page;
			
			if($('.pagination').data("twbs-pagination")){
                    $('.pagination').twbsPagination('destroy');
                }
			
			$('#pagination').twbsPagination({
				totalPages: total_page,
				visiblePages: 5,
				onPageClick: function (event, pageL) {
					page = pageL;
					if(is_ajax_fire != 0){
					  getPageData();
					}
				}
			});
			
			manageRow(data.data);
			is_ajax_fire = 1;
		}
    });

}

$('.menu-tab-item-catalouge').on('click', function() {
	manageData();
})

/* Get Page Data*/
function getPageData() {
	$.ajax({
    	dataType: 'json',
    	url: 'libs/getData.php',
    	data: {page:page}
	}).done(function(data){
		manageRow(data.data);
	});
}

/* Add new Item table row */
function manageRow(data) {
	var	rows = '';
	var srno = 1 ;
	$.each( data, function( key, value ) {
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+(((page-1)*5)+srno)+'</td>';
	  	rows = rows + '<td>'+value.catalouge_name+'</td>';
		rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn edit-item">Edit</button> ';
		rows = rows + '<button class="btn remove-item">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
		srno++ ;
	});

	$("#catalouge_table").html(rows);
}

/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var catalouge = $("#create-item").find("input[name='title']").val();
    
    if(catalouge != '' ){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            data:{title:catalouge}
        }).done(function(data){
			if(data.type == 'Session_Expire' )
			{
				toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
				window.location.replace("admin_login.php");	
			}
			else
			{
				$("#create-item").find("input[name='title']").val('');
				manageData();
				$(".modal").modal('hide');
				toastr.success('Catalouge Created Successfully.', 'Success Alert', {timeOut: 5000});
			}
        });
    }else{
        alert('You are missing Catalouge Name.')
    }

});

/* Remove Item */
$("body").on("click",".remove-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
	
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: 'libs/delete.php',
        data:{id:id}
    }).done(function(data){
		if(data.type == 'Session_Expire' )
		{
			toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
			window.location.replace("admin_login.php");	
		}
		else
		{
			c_obj.remove();
			toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
			manageData();
		}
    });

});

/* Edit Item */
$("body").on("click",".edit-item",function(){

    var id = $(this).parent("td").data('id');
    var catalouge = $(this).parent("td").prev("td").text();
	$("#edit-item").find("input[name='title']").val(catalouge);
    $("#edit-item").find(".edit-id").val(id);

});

/* Updated new Item */
$(".crud-submit-edit").click(function(e){

    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var catalouge = $("#edit-item").find("input[name='title']").val();

    var id = $("#edit-item").find(".edit-id").val();

    if(catalouge != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            data:{title:catalouge,id:id}
        }).done(function(data){
			if(data.type == 'Session_Expire' )
			{
				toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
				window.location.replace("admin_login.php");	
			}
			else
			{
				manageData();
				$(".modal").modal('hide');
				toastr.success('Catalouge Updated Successfully.', 'Success Alert', {timeOut: 5000});
			}
        });
    }else{
        alert('You are missing Catalouge Name.')
    }

});






var image_page = 1;
var current_image_page = 1;
var total_image_page = 0;
var is_ajax_fire_for_image = 0;

/* manage data list */
function manageImageData() {
	
	var SelectedCatalouge = $('#catalouge_name').find('option:selected').text();
	
    $.ajax({
        dataType: 'json',
        url: 'libs/getImageData.php',
        data: {image_page:image_page , catalouge:SelectedCatalouge}
    }).done(function(data){
		
		if(data.type == 'Session_Expire' )
		{
			toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
			window.location.replace("admin_login.php");	
		}
		else
		{	
			total_image_page = Math.ceil(data.total/5);
			current_image_page = image_page;
			
			$("#image_table").html('');
			
			if($('.pagination').data("twbs-pagination")){
                    $('.pagination').twbsPagination('destroy');
                }
			
			$('#pagination').twbsPagination({
				totalPages: total_image_page,
				visiblePages: 5,
				onPageClick: function (event, pageL) {
					image_page = pageL;
					if(is_ajax_fire_for_image != 0){
					  getImagePageData();
					}
				}
			});
			
			manageImageRow(data.data);
			is_ajax_fire_for_image = 1;
		}
    });

}


$('.menu-tab-item-image').on('click', function() {

	var	rows = '';
	$("#catalouge_name").html(rows);
	$.ajax({
        dataType: 'json',
        url: 'libs/getData.php',
        data: {page:-1}
    }).done(function(data){
		if(data.type == 'Session_Expire' )
		{
			toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
			window.location.replace("admin_login.php");	
		}
		else
		{	
			$.each( data.data, function( key, value ) {
				rows = rows + '<option value="'+value.catalouge_name+'" >'+value.catalouge_name+'</option>' ;
			});
			$("#catalouge_name").html(rows);
			manageImageData();
		}
    });
})

$( "#catalouge_name" ).change(function() {
  manageImageData() ;
});

/* Get Page Data*/
function getImagePageData() {
	
	var SelectedCatalouge = $('#catalouge_name').find('option:selected').text();
	
	$.ajax({
    	dataType: 'json',
    	url: 'libs/getImageData.php',
    	data: {image_page:image_page , catalouge:SelectedCatalouge}
	}).done(function(data){
		manageImageRow(data.data);
	});
}

/* Add new Item table row */
function manageImageRow(data) {
	var	rows = '';
	var srno = 1 ;
	$.each( data, function( key, value ) {
		
	  	rows = rows + '<tr>';
	  	rows = rows + '<td>'+(((page-1)*5)+srno)+'</td>';
	  	rows = rows + '<td>';
		rows = rows + '<div itemscope itemtype="http://schema.org/Product" >' ;
		rows = rows + '<div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3 ">' ;
		rows = rows + '<div class="thumbnail">' ;
		rows = rows + '<div class="recent-work-wrap">' ;
		rows = rows + '<img itemprop="image" class="img-responsive" src="'+value.image_path+'" alt="" >' ;
		rows = rows + '<div class="overlay">' ;
		rows = rows + '<div class="recent-work-inner">' ;
		rows = rows + '<a class="preview" href="'+value.image_path+'" rel="prettyPhoto['+value.id+']"><i class="fa fa-eye"></i> View</a>' ;
		rows = rows + '</div>' ;
		rows = rows + '</div>' ;
		rows = rows + '</div>' ;
		rows = rows + '</div>' ;
		rows = rows + '</div>' ;
		rows = rows + '</td>' ;
		rows = rows + '<td data-id="'+value.id+'">';
		rows = rows + '<button class="btn remove-image-item">Delete</button>';
        rows = rows + '</td>';
	  	rows = rows + '</tr>';
		srno++ ;
	});
	$("#image_table").html(rows);
	
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools: false
	});
}

// Variable to store your files
var files;

// Add events
$('input[type=file]').on('change', prepareUpload);

// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
}

/* Create new Item */
$(".crud-image-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#add-image").find("form").attr("action");
    var SelectedCatalouge = $('#catalouge_name').find('option:selected').text();
	
	// Create a formdata object and add the files
    var data = new FormData();
    $.each(files, function(key, value)
    {
        data.append(key, value);
    });
	
	data.append('catalouge_name', SelectedCatalouge);
	
    if(SelectedCatalouge != '' ){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            data:data,
			cache: false,
			processData: false, // Don't process the files
			contentType: false // Set content type to false as jQuery will tell the server its a query string request
        }).done(function(data){
			if(data.type == 'Session_Valid' )
			{
				$("#add-image").find("input[name='title']").val('');
				manageImageData();
				$(".modal").modal('hide');
				toastr.success('Image Added Successfully.', 'Success Alert', {timeOut: 5000});
			}
			else if(data.type == 'Session_Expire' )
			{
				toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
				window.location.replace("admin_login.php");	
			}
			else
			{
				$(".modal").modal('hide');
				toastr.error('Error while uploading image. ' + data.message , 'Upload Error', {timeOut: 3000});
			}
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
			if (textStatus == 'Unauthorized') {
				alert('custom message. Error: ' + errorThrown);
			} else {
				alert(' message. Error: ' + errorThrown);
		}});
    }else{
        alert('You are missing Catalouge Name.')
    }

});

/* Remove Item */
$("body").on("click",".remove-image-item",function(){
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");
	
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: 'libs/delete_image.php',
        data:{id:id}
    }).done(function(data){
		if(data.type == 'Session_Expire' )
		{
			toastr.error('Session Expired. Please Login Again.', 'Session Expired', {timeOut: 3000});
			window.location.replace("admin_login.php");	
		}
		else
		{
			c_obj.remove();
			toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
			manageImageData();
		}
    });

});

});