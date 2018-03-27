<?php
if(file_exists('../uploaded_circulars/logo.jpg')){
    echo '<img id="logo" src="../uploaded_circulars/logo.jpg" style="height:3em;width:6em;margin-top:-18px;" alt="logo" ></a>';
}

?>
          <div data-provides="fileinput">
            <span class="btn btn-default btn-file"><input class="file" name="sortpic" id="sortpicture" type="file"></span>
            <input class="btn btn-primary" id="upload" name="upload" value="Change Logo" onclick="uploadlogo();" type="button" style="margin-right:8px;">
            <input class="btn btn-primary" id="resetupload" name="resetupload" value="Reset" onclick="uploadlogo();" type="button" style="margin-right:8px;">
           </div>
		  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function uploadlogo() {
        var file_data = $('#sortpicture').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: 'upload.php', // point to server-side PHP script
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(php_script_response){
                location.reload();
            }
        });
    }
</script>

