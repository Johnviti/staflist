var pagination_above;
var pagination_bellow;
var package_size = 10;
var selected_page = 1;
var staff_added = false;
var added_staff_id;
var timer;
$(document).ready(function () {
	toastr.options = {
		"closeButton": true,
		"positionClass": "toast-top-center",
		"timeOut": "2000"
	};
	pagination_above = new Pagination({
		container: $("#pagination-above"),
		pageClickCallback: setTableContent,
		maxVisibleElements: 9,
	});
	pagination_bellow = new Pagination({
		container: $("#pagination-bellow"),
		pageClickCallback: setTableContent,
		maxVisibleElements: 9,
	});
	setTableContent(1);
	$('body').on('click', '#tabmenu-first', function () {
		setTableContent(selected_page);
	});
	$('#staff-search').keyup(function () {
		if (this.value.length > 1) {
	        if (timer) clearTimeout(timer);
	        timer = setTimeout(function(){
	            setTableContent(selected_page);
	        }, 900);
	    }
	});
	$("#staff-category").change(function () {
		if ($(this).val() == "Associates") {
			$("#staff-personType").append($("<option class='person-option'>Natural Person</option><option class='person-option'>Legal Person</option>"));
		}
		else {
			$(".person-option").remove();
		}
	});
	$("#edit-staff-category").change(function () {
		if ($(this).val() == "Associates") {
			$("#edit-staff-personType").append($("<option class='edit-person-option'>Natural Person</option><option class='edit-person-option'>Legal Person</option>"));
		}
		else {
			$(".edit-person-option").remove();
		}
	});
	$('body').on('click', '.delete-staff', function () {

		if (!confirm("Want to delete?")) return;

		var staff_id = $(this).parent().attr('staff-id');
		var strParam = "deleteStaff=deleting&staff_id=" + staff_id;
		jQuery.ajax({
			url: plugin_dir_url + "page_stafflist_server.php",
			async: false,
			data: strParam,
			type: 'post',
			success: function (result) {
				if (result == 'success')
					toastr.success("Successfully deleted.");
				else
					toastr.warning('Failed.');
				setTableContent(selected_page);
			}
		});
	});
	$("#search-staff-category").change(function () {
		setTableContent(selected_page);
	});
	setStaffCategory();
	setStaffSection();
	$('#staff-nationality').select2();
	$('#staff-languages').select2();
	$('#vitae-language').select2();
	$('#staff-licensed').select2();
	$('#staff-personType').select2();
	$('#staff-section').select2();
	$('#edit-staff-nationality').select2();
	$('#edit-staff-languages').select2();
	$('#edit-vitae-language').select2();
	$('#edit-staff-licensed').select2();
	$('#edit-staff-personType').select2();
	$('#edit-staff-section').select2();
	$("#vitae-file").fileinput({
		showPreview: false,
		allowedFileExtensions: ['pdf'],
		maxFileSize: 100 * 1024,
		maxFileCount: 1,
		uploadUrl: plugin_dir_url + "page_stafflist_server.php",
		uploadAsync: false,
		uploadExtraData: function () {
			return {
				vitae_lang: $("#vitae-language").val(),
				staff_id: added_staff_id
			};
		}
	});
	$("#edit-vitae-file").fileinput({
		showPreview: false,
		allowedFileExtensions: ['pdf'],
		maxFileSize: 100 * 1024,
		maxFileCount: 1,
		uploadUrl: plugin_dir_url + "page_stafflist_server.php",
		uploadAsync: false,
		uploadExtraData: function () {
			return {
				vitae_lang: $("#edit-vitae-language").val(),
				staff_id: $("#edit-staff-modal").attr("staff-id")
			};
		}
	});
	$('#vitae-file').on('filebatchuploaderror', function (event, data, previewId, index) {
		var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
		toastr.warning("Upload failed. Retry.");
	});
	$('#vitae-file').on('filebatchuploadsuccess', function (event, data, previewId, index) {
		var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
		if (response.uploaded == "OK")
			toastr.success("Upload success.");
		else
			toastr.warning("Upload failed. Retry.");
	});
	$('#edit-vitae-file').on('filebatchuploaderror', function (event, data, previewId, index) {
		var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
		toastr.warning("Upload failed. Retry.");
	});
	$('#edit-vitae-file').on('filebatchuploadsuccess', function (event, data, previewId, index) {
		var form = data.form, files = data.files, extra = data.extra, response = data.response, reader = data.reader;
		if (response.uploaded == "OK") {
			toastr.success("Upload success.");
			setTableContent(selected_page);
			$("#edit-staff-modal #edit-vitae-table tbody").append($('<tr><td><a href="' + pdf_url + response.url + '" target="_blank">' + response.lang + '</a></td><td><a class="edit-delete-vitae" vitae-id="' + response.vitae_id + '"><i class="fa fa-trash" aria-hidden="true"></i></a></tr>'));
		}
		else
			toastr.warning("Upload failed. Retry.");
	});
	$("#vitae-file").prop("disabled", true);

	var placeholder_img = $('#image-preview').attr('src');

	$("#add-staff").click(function (e) {
		e.preventDefault();

		if (staff_added == true) {
			$(".disable-item").prop("disabled", false);
			$('.disable-item[id!="staff-category"]').val('');
			$("#add-staff").text("Register");
			$("#vitae-file").prop("disabled", true);
			$('#staff-nationality').select2();
			$('#staff-languages').select2();
			$('#vitae-language').select2();
			$('#staff-licensed').select2();
			$('#staff-personType').select2();
			$('#staff-section').select2();

			staff_added = false;
			return;
		}
		var category = $("#staff-category").val();
		var name = $("#staff-name").val();
		var address = $("#staff-address").val();
		var phone = $("#staff-phone").val();
		var phone2 = $("#staff-phone2").val();
		var fax = $("#staff-fax").val();
		var email = $("#staff-email").val();
		var nationality = $("#staff-nationality").val();
		var languages = $("#staff-languages").val();
		var licensed = $("#staff-licensed").val();
		var instagram = $("#staff-instagram").val();
		var facebook = $("#staff-facebook").val();
		var linkedin = $("#staff-linkedin").val();
		var personType = $("#staff-personType").val();
		var section = $("#staff-section").val();
		var image = $('#staff-image').val();
		var site = $('#staff-site').val();

		if (name == "") {
			toastr.warning("You should enter name.");
			return;
		}

		var formData = new FormData();

		formData.append('insertStaff', 'writing');
		formData.append('category', category);
		formData.append('name', name);
		formData.append('address', address);
		formData.append('phone', phone);
		formData.append('phone2', phone2);
		formData.append('fax', fax);
		formData.append('email', email);
		formData.append('nationality', nationality);
		formData.append('languages', languages);
		formData.append('licensed', licensed);
		formData.append('instagram', instagram);
		formData.append('facebook', facebook);
		formData.append('linkedin', linkedin);
		$("textarea[id^='company-description-']").each((idx, elem) => {
			const id = $(elem).attr('id').replace(/\D/g, '');
			formData.append(`description${id}`, $(elem).val());
		});
		formData.append('personType', personType);
		formData.append('section', section);
		formData.append('image', image);
		formData.append('site', site);

		jQuery.ajax({
			url: plugin_dir_url + "page_stafflist_server.php",
			async: false,
			data: formData,
			type: 'post',
			processData: false,  // tell jQuery not to process the data
			contentType: false,   // tell jQuery not to set contentType
			success: function (result) {
				if (result == "failed") {
					toastr.warning("Failed.");
				}
				else if (result == "exist") {
					toastr.warning("This entry has already been registered");
				}
				else {
					toastr.success("Added Successfully.");
					$("#vitae-file").prop("disabled", false);
					$("#add-staff").text("Add new");
					$(".disable-item").prop("disabled", true);
					added_staff_id = result;
					staff_added = true;
					$("#staff-image").val(null);
					$("#image-preview").attr('src', placeholder_img);
					$("#btn-remove-image").css('visibility', 'hidden');
				}
			}
		});
	});
	$('body').on('click', '.edit-staff', function () {
		var staff_id = $(this).parent().attr("staff-id");
		$("#edit-staff-modal").attr("staff-id", staff_id);
		var strParam = "getStaff=getting&staff_id=" + staff_id;
		jQuery.ajax({
			url: plugin_dir_url + "page_stafflist_server.php",
			async: false,
			data: strParam,
			type: 'post',
			success: function (result) {
				var data = JSON.parse(result);
				$(".edit-person-option").remove();
				if (data.category == "Associates") {
					$("#edit-staff-personType").append($("<option class='edit-person-option'>Natural Person</option><option class='edit-person-option'>Legal Person</option>"));
				}
				$("#edit-staff-category").val(data.category);
				$("#edit-staff-name").val(data.name);
				$("#edit-staff-address").val(data.address);
				$("#edit-staff-phone").val(data.phone);
				$("#edit-staff-phone2").val(data.phone2);
				$("#edit-staff-fax").val(data.fax);
				$("#edit-staff-email").val(data.email);
				$("#edit-staff-nationality").val(data.nationality.split(",")).trigger('change');
				$("#edit-staff-languages").val(data.languages.split(",")).trigger('change');
				$("#edit-staff-licensed").val(data.countries_licensed.split(",")).trigger('change');
				$("#edit-staff-personType").val(data.personType).trigger('change');
				$("#edit-staff-section").val(data.section).trigger('change');
				$("#edit-staff-facebook").val(data.facebook_link);
				$("#edit-staff-instagram").val(data.instagram_link);
				$("#edit-staff-linkedin").val(data.linkedin_link);
				$("textarea[id^='edit-company-description-']").val('');
				$("#edit-staff-image").val(data.image);
				$("#edit-staff-site").val(data.site);
				$("#edit-image-preview").attr('src', data.image_url);
				$('#btn-edit-remove-image').css('visibility', data.image ? 'visible' : 'hidden');
				try {
					const description = JSON.parse(data.description);
					$("textarea[id^='edit-company-description-']").each((idx, elem) => {
						const id = $(elem).attr('id').replace(/\D/g, '');
						$(elem).val(description[id] || '');
					});
				} catch (e) { }
				$("#edit-staff-modal #edit-vitae-table tbody").html('');
				if (data.vitae_ids != null) {
					var vitae_ids = data.vitae_ids.split(',');
					var vitae_lang = data.vitae_language.split(',');
					var vitae_url = data.vitae_url.split(',');
					for (var j = 0; j < vitae_lang.length; j++) {
						$("#edit-staff-modal #edit-vitae-table tbody").append($('<tr><td><a href="' + pdf_url + vitae_url[j] + '" target="_blank">' + vitae_lang[j] + '</a></td><td><a class="edit-delete-vitae" vitae-id="' + vitae_ids[j] + '"><i class="fa fa-trash" aria-hidden="true"></i></a></tr>'));
					}
				}
				$("#edit-staff-modal").modal("show");

				
			}
		});
	});
	$('body').on("click", ".edit-delete-vitae", function () {
		var row = $(this).parent().parent();
		var strParam = "deleteVitae=deleting&vitae_id=" + $(this).attr("vitae-id");
		jQuery.ajax({
			url: plugin_dir_url + "page_stafflist_server.php",
			async: false,
			data: strParam,
			type: 'post',
			success: function (result) {
				if (result == 'success') {
					toastr.success("Deleted");
					row.remove();
					setTableContent(selected_page);
				}
				else
					toastr.warning("Failed");
			}
		});
	});
	$("#edit-change-staff").click(function () {
		var staff_id = $("#edit-staff-modal").attr("staff-id");
		var category = $("#edit-staff-category").val();
		var section = $("#edit-staff-section").val();
		var name = $("#edit-staff-name").val();
		var address = $("#edit-staff-address").val();
		var phone = $("#edit-staff-phone").val();
		var phone2 = $("#edit-staff-phone2").val();
		var fax = $("#edit-staff-fax").val();
		var email = $("#edit-staff-email").val();
		var nationality = $("#edit-staff-nationality").val();
		var languages = $("#edit-staff-languages").val();
		var licensed = $("#edit-staff-licensed").val();
		var instagram = $("#edit-staff-instagram").val();
		var facebook = $("#edit-staff-facebook").val();
		var linkedin = $("#edit-staff-linkedin").val();
		var personType = $("#edit-staff-personType").val();
		var image = $('#edit-staff-image').val();
		var site = $('#edit-staff-site').val();

		if (name == "") {
			toastr.warning("You should enter name.");
			return;
		}

		var formData = new FormData();

		formData.append('updateStaff', 'updating');
		formData.append('staff_id', staff_id);
		formData.append('category', category);
		formData.append('section', section);
		formData.append('name', name);
		formData.append('address', address);
		formData.append('phone', phone);
		formData.append('phone2', phone2);
		formData.append('fax', fax);
		formData.append('email', email);
		formData.append('nationality', nationality);
		formData.append('languages', languages);
		formData.append('licensed', licensed);
		formData.append('instagram', instagram);
		formData.append('facebook', facebook);
		formData.append('linkedin', linkedin);
		formData.append('personType', personType);
		formData.append('image', image);
		formData.append('site', site);

		$("textarea[id^='edit-company-description-']").each((idx, elem) => {
			const id = $(elem).attr('id').replace(/\D/g, '');
			formData.append(`description${id}`, $(elem).val());
		});

		jQuery.ajax({
			url: plugin_dir_url + "page_stafflist_server.php",
			async: false,
			data: formData,
			type: 'post',
			processData: false,  // tell jQuery not to process the data
			contentType: false,   // tell jQuery not to set contentType
			success: function (result) {
				if (result == "success") {
					toastr.success("Changed Successfully.");
					setTableContent(selected_page);
				} else {
					toastr.warning("Failed." + result);
				}
			}
		});
	});
});
function setTableContent(page_id) {
	var staff_search_name = $("#staff-search").val();
	var staff_search_category = $('#search-staff-category').val();

	var strParam = "getStaffList=getting&staff_search_name=" + staff_search_name + "&page_id=" + page_id + "&staff_search_category=" + staff_search_category + '&package_size=' + package_size;
	selected_page = page_id;
	jQuery.ajax({
		url: plugin_dir_url + "page_stafflist_server.php",
		async: false,
		data: strParam,
		type: 'post',
		success: function (result) {
			$("#tab-list-content tbody").html('');
			var data = JSON.parse(result)["data"];
			var page_count = JSON.parse(result)["page_count"];
			pagination_above.make(page_count, 1, page_id);
			pagination_bellow.make(page_count, 1, page_id);
			if (page_count == 0)
				return;
			var index = package_size * (page_id - 1);
			for (var i = 0; i < data.length; i++) {
				var row_data = data[i];
				if (row_data.nationality != null) {
					var array_nationality = row_data.nationality.split(',');
					var licensed_nationality = array_nationality[0];
					for (var j = 1; j < array_nationality.length; j++) {
						licensed_nationality = licensed_nationality + "," + " " + array_nationality[j];
					}
				}

				if (row_data.languages != null) {
					var array_languages = row_data.languages.split(',');
					var licensed_lang = array_languages[0];
					for (var k = 1; k < array_languages.length; k++) {
						licensed_lang = licensed_lang + "," + " " + array_languages[k];
					}
				}

				if (row_data.countries_licensed != null) {
					var array_countries = row_data.countries_licensed.split(',');
					var licensed_countries = array_countries[0];
					for (var h = 1; h < array_countries.length; h++) {
						licensed_countries = licensed_countries + "," + " " + array_countries[h];
					}
				}

				// var row = $('<tr><td>'+(index + i + 1)+'</td><td>'+row_data.name+'</td><td>'+row_data.category+'</td><td>'+row_data.address+'</td><td>'+row_data.phone+'</td><td>'+row_data.phone2+'</td><td>'+row_data.fax+'</td><td>'+(row_data.email == null ? '' : row_data.email)+'</td><td>'+(row_data.nationality == 'null' ? '' : licensed_nationality)+'</td><td>'+(row_data.languages == 'null' ? '' : licensed_lang)+'</td><td>'+(row_data.countries_licensed == 'null' ? '' : licensed_countries)+'</td></tr>');
				var row = $('<tr><td>' + row_data.name + '</td><td>' + row_data.category + '</td><td>' + row_data.address + '</td><td>' + row_data.phone + '</td><td>' + row_data.phone2 + '</td><td>' + row_data.fax + '</td><td>' + (row_data.email == null ? '' : row_data.email) + '</td><td>' + (row_data.nationality == 'null' ? '' : licensed_nationality) + '</td><td>' + (row_data.languages == 'null' ? '' : licensed_lang) + '</td><td>' + (row_data.countries_licensed == 'null' ? '' : licensed_countries) + '</td></tr>');
				var vitae = $('<td class="vitae-link">');
				if (row_data.vitae_language != null) {
					var vitae_lang = row_data.vitae_language.split(',');
					var vitae_url = row_data.vitae_url.split(',');
					for (var j = 0; j < vitae_lang.length; j++) {
						vitae.append($('<a href="' + pdf_url + vitae_url[j] + '" target="_blank">' + vitae_lang[j] + '</a>'));
					}
				}
				var social_link = $('<td class="social-link">');
				if (row_data.instagram_link != '')
					social_link.append($('<a href="' + row_data.instagram_link + '" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>'));
				if (row_data.facebook_link != '')
					social_link.append($('<a href="' + row_data.facebook_link + '" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>'));
				if (row_data.linkedin_link != '')
					social_link.append($('<a href="' + row_data.linkedin_link + '" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>'));
				row.append(vitae);
				row.append(social_link);
				row.append($('<td>' + (row_data.personType == 'null' ? '' : row_data.personType) + '</td>'));
				row.append($('<td>' + (row_data.section_name_en == null ? '' : row_data.section_name_en) + '</td>'));
				row.append($('<td class="staff-manage" staff-id="' + row_data.staff_id + '"><a class="edit-staff"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="delete-staff"><i class="fa fa-trash" aria-hidden="true"></i></a></td>'));
				$("#tab-list-content tbody").append(row);
			}
		}
	});
}

function log(d) {
	console.log(d);
}

function setStaffCategory() {
	var strParam = "getStaffCategory=getting";
	jQuery.ajax({
		url: plugin_dir_url + "page_stafflist_server.php",
		async: false,
		data: strParam,
		type: 'post',
		success: function (result) {
			var data = JSON.parse(result);
			for (var i = 0; i < data.length; i++) {
				$("#staff-category").append($("<option value='" + data[i]["name"] + "'>" + data[i]["name"] + '</option>'));
				$("#edit-staff-category").append($('<option>' + data[i]["name"] + '</option>'));
				$("#search-staff-category").append($('<option>' + data[i]["name"] + '</option>'));
			}
		}
	});
}

function setStaffSection() {
	var strParam = "getStaffSection=getting";
	jQuery.ajax({
		url: plugin_dir_url + "page_stafflist_server.php",
		async: false,
		data: strParam,
		type: 'post',
		success: function (result) {
			var data = JSON.parse(result);
			for (var i = 0; i < data.length; i++) {
				$("#staff-section").append($("<option value='" + data[i]["section_id"] + "'>" + data[i]["name_en"] + '</option>'));
				$("#edit-staff-section").append($("<option value='" + data[i]["section_id"] + "'>" + data[i]["name_en"] + '</option>'));
			}
		}
	});
}