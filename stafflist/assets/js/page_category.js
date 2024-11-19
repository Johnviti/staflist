$(document).ready(function () {
	toastr.options = {              
      "closeButton": true,
      "positionClass": "toast-top-center",
      "timeOut": "2000"
    };
	setCategoryList();
	$('body').on('click','.delete-category a',function(){
		var category_id = $(this).attr('category-id');
		var strParam = "deleteCategory=deleting&category_id=" + category_id;
		jQuery.ajax({
		    url: plugin_dir_url + "page_category_server.php",
		    async:false,
		    data: strParam,
		    type: 'post',
		    success: function(result) {
		    	if(result == 'success')
		    		toastr.success("Successfully deleted.");
		    	else
		    		toastr.warning('6Failed.');
		    	setCategoryList();
		    }
		});
	});
	$("#new-category").keydown(function(e){
		if(e.which == 13)
			addCategory();
	});
	$("#add-category-btn").click(function(){
		addCategory();
	});
});
function addCategory()
{
	var category = $("#new-category").val();
	if(category == "")
	{
		toastr.warning("Fill in the blank.");
		return;
	}
	var strParam = "addCategory=adding&category=" + category;
	jQuery.ajax({
	    url: plugin_dir_url + "page_category_server.php",
	    async:false,
	    data: strParam,
	    type: 'post',
	    success: function(result) {
	    	if(result == "failed")
	    		toastr.warning("5Failed.");
	    	else if (result == 'double')
	    		toastr.warning("You entered category is already existing.");
	    	else
	    	{
	    		toastr.success("Added Successfully.");
	    		setCategoryList();
	    	}
	    }
	});
}
function setCategoryList()
{
	$("#category-list tbody").html('');
	var strParam = "getStaffCategory=getting";
    jQuery.ajax({
	    url: plugin_dir_url + "page_stafflist_server.php",
	    async:false,
	    data: strParam,
	    type: 'post',
	    success: function(result) {
	    	var data = JSON.parse(result);
	    	for (var i = 0; i < data.length; i++) {
	    		$("#category-list tbody").append($('<tr><td>'+data[i]["name"]+'</td><td class="delete-category"><a category-id="'+data[i]['category_id']+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>'));
	    	}
	    }
	});
}