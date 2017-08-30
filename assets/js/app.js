/**
 * Created by Juscelino Jr on 16/12/2016.
 */


$(document).ready(function(){
    if ($('#ajax_noticia').length){
    var altura = $('#noticia').height();
    $.get("/noticia/ajax/" + altura, function(data){
        $('#ajax_noticia').html(data);
    });   }
    

});



