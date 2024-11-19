$(document).ready(function () {
	toastr.options = {              
      "closeButton": true,
      "positionClass": "toast-top-center",
      "timeOut": "2000"
    };
	setSectionList();
	$('body').on('click','.delete-section a',function(){
		var section_id = $(this).attr('section-id');
		var strParam = "deleteSection=deleting&section_id=" + section_id;
		jQuery.ajax({
		    url: plugin_dir_url + "page_section_server.php",
		    async:false,
		    data: strParam,
		    type: 'post',
		    success: function(result) {
		    	if(result == 'success')
		    		toastr.success("Successfully deleted.");
		    	else
		    		toastr.warning(result);
		    	setSectionList();
		    }
		});
	});
	$("#new-section").keydown(function(e){
		if(e.which == 13)
			addSection();
	});
	$("#add-section-btn").click(function(){
		addSection();
	});
});
function addSection()
{
	var section_en = $("#new-section-en").val();
	var section_pt = $("#new-section-pt").val();
	var section_es = $("#new-section-es").val();
	var section_fr = $("#new-section-fr").val();

	if(section_en == "")
	{
		toastr.warning("Fill in the blank.");
		return;
	}
	var strParam = "addSection=adding&section_en=" + section_en + "&section_pt=" + section_pt + "&section_es=" + section_es + "&section_fr=" + section_fr;
	jQuery.ajax({
	    url: plugin_dir_url + "page_section_server.php",
	    async:false,
	    data: strParam,
	    type: 'post',
	    success: function(result) {
	    	if(result == "failed")
	    		toastr.warning("5Failed.");
	    	else if (result == 'double')
	    		toastr.warning("You entered section is already existing.");
	    	else
	    	{
	    		toastr.success("Added Successfully.");
	    		section_en = $("#new-section-en").val('');
				section_pt = $("#new-section-pt").val('');
				section_es = $("#new-section-es").val('');
				section_fr = $("#new-section-fr").val('');
	    		setSectionList();
	    	}
	    }
	});
}
function setSectionList()
{
	$("#section-list tbody").html('');
	var strParam = "getStaffSection=getting";
    jQuery.ajax({
	    url: plugin_dir_url + "page_stafflist_server.php",
	    async:false,
	    data: strParam,
	    type: 'post',
	    success: function(result) {
	    	var data = JSON.parse(result);
	    	for (var i = 0; i < data.length; i++) {
	    		$("#section-list tbody").append($(
								'<tr><td>'+data[i]["name_en"]+'</td><td>' + data[i]["name_pt"] + '</td><td>' + data[i]["name_es"] + '</td><td>' + data[i]["name_fr"] + '</td>' +
								'<td class="delete-section"><a section-id="'+data[i]['section_id']+'"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>'));
	    	}
	    }
	});
}