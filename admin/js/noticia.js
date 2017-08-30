/**
 * Created by Juscelino Jr on 11/10/2016.
 */

//fileInput
$("#file").fileinput({
    language: "pt-BR",
    showUpload: false,
    allowedFileExtensions: ["jpg", "png", "gif"]
});
//summerNote
$(document).ready(function() {
    $('#summernote').summernote();
});
$('#summernote').summernote({
    height: 200,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
});
$('#submit-btn').click(function(){
    $("#loading").show();
    $('#hospedeira').html(
        $('#summernote').summernote('code')
    );
});



