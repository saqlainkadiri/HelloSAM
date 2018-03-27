/*==========================================
====data table script start 
==========================================*/
$(function () {
    $('.data-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
});
/*==========================================
====data table script ends 
==========================================*/
/*==========================================
====multiselect dropdown script start 
==========================================*/
// $(function () {
// $('.multiselectList').multiselect({
// 		includeSelectAllOption: true
// 	});
// 	$('#btnSelected').click(function () {
// 		var selected = $("#class option:selected");
// 	var message = "";
// 		selected.each(function () {
// 			message += $(this).text() + " " + $(this).val() + "\n";
// 		});
// 		alert(message);
// 	});
// });
/*==========================================
====multiselect dropdown script ends 
==========================================*/
/*==========================================
====admin requests page script start 
==========================================*/
$(function() {
    	$('img.school-img').on('click', function() {
			$('.enlargeImageModalSource').attr('src', $(this).attr('src'));
			$('#enlargeImageModal').modal('show');
		});
});
$(".admin-requests .reqschoolName").click(function(){
    $(".admin-requests").css("display", "none");
	$(".admin-details").css("display", "block");
});
/*==========================================
====admin requests page script ends 
==========================================*/
/*==========================================
====school setup page script start 
==========================================*/
//upload photos of schools
window.onload = function(){
    //Check File API support
    if(window.File && window.FileList && window.FileReader)
    {
        var filesInput = document.getElementById("photo-of-school");        
        filesInput.addEventListener("change", function(event){            
            var files = event.target.files; //FileList object
            var output = document.getElementById("result");            
            for(var i = 0; i< files.length; i++)
            {
                var file = files[i];                
                //Only pics
                if(!file.type.match('image'))
                  continue;                
                var picReader = new FileReader();                
                picReader.addEventListener("load",function(event){                    
                    var picFile = event.target;                    
                    var div = document.createElement("div");                    
                    div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                            "title='" + picFile.name + "'/>";                    
                    output.insertBefore(div,null);
                });
                 //Read the image
                picReader.readAsDataURL(file);
            } 
        });
    }
}
//add android detils
	$("#add-android").click(function(){
	$(".add-android").append('<tr><td>Android</td><td><input type="text" class="text-field" placeholder="Enter Project Name"></td><td><input type="text" class="text-field" placeholder="Enter Password"></td><td><input type="text" class="text-field" placeholder="Enter Website Analytics Code"> </td><td><input type="text" class="text-field" placeholder="Enter Android App Analytics Code"> </td><td><input type="text" class="text-field" placeholder="Enter FCM Key"></td><tr>');
	});
//add ios detils	
	$("#add-ios").click(function(){
	$(".add-ios").append('<tr><td>IOS</td><td><input type="text" class="text-field" placeholder="Enter Project Name"></td><td><input type="text" class="text-field" placeholder="Enter Password"></td><td><input type="text" class="text-field" placeholder="Enter Website Analytics Code"> </td><td><input type="text" class="text-field" placeholder="Enter Android App Analytics Code"> </td><td><input type="text" class="text-field" placeholder="Enter FCM Key"></td><tr>');
	});
	
$(function () {
    $("#juniorClg").click(function(){
        $(".juniorClg").toggle();
    });
	 $("#mainSchool").click(function(){
        $(".mainSchool").toggle();
    });
	 $("#HighSchool").click(function(){
        $(".HighSchool").toggle();
    });
	$("#PrimarySchool").click(function(){
        $(".PrimarySchool").toggle();
    });
	$("#Pre-primary").click(function(){
        $(".Pre-primary").toggle();
    });
	$("#Nursery").click(function(){
        $(".Nursery").toggle();
    });
	$("#Playschool").click(function(){
        $(".Playschool").toggle();
    });
	//select all script
	$("#checkAll").click(function(){
    $('.selectAll input:checkbox').not(this).prop('checked', this.checked);
});
});

/*upload logos script*/
function readURL() {
        var $input = $(this);
        var $newinput =  $(this).parent().parent().parent().find('.portimg ');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                reset($newinput.next('.delbtn'), true);
                $newinput.attr('src', e.target.result).show();
                $newinput.after('<a class="btn btn-danger btn-xs delbtn removebtn"><i class="material-icons">delete</i></a>');
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
    $(".fileUpload").change(readURL);
    $("form").on('click', '.delbtn', function (e) {
        reset($(this));
    });

    function reset(elm, prserveFileName) {
        if (elm && elm.length > 0) {
            var $input = elm;
            $input.prev('.portimg').attr('src', '').hide();
            if (!prserveFileName) {
                $($input).parent().parent().parent().find('input.fileUpload ').val("");
                //input.fileUpload and input#uploadre both need to empty values for particular div
            }
            elm.remove();
        }
    }
/*==========================================
====school setup page script ends 
==========================================*/
/*==========================================
====Human Resources page script start 
==========================================*/
 $(function () {
		$("#employees").click(function(){
			$(".employees").toggle();
		});
		$("#employeeLeaveSummary").click(function(){
			$(".employeeLeaveSummary").toggle();
		});
		$("#assets").click(function(){
			$(".assets").toggle();
		});
		$("#expenses").click(function(){
			$(".expenses").toggle();
		});
	  });
/*==========================================
====Human Resources page script ends 
==========================================*/