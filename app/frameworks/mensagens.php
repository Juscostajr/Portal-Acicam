<?php
/**
 * Created by PhpStorm.
 * User: Juscelino Jr
 * Date: 08/09/2016
 * Time: 16:12
 */


define("GREEN","alert alert-success");
define("BLUE","alert alert-info");
define("RED","alert alert-danger");
define("YELLOW","alert alert-warning");

function alert($cor = BLUE,$msg){
    if($cor != GREEN && $cor != YELLOW && $cor != BLUE && $cor != RED){
        throw new TypeError("Parâmetro de cor inválido, valores aceitos: const GREEN, const BLUE, const RED, const YELLOW");
    } else {
    return "<div class='$cor'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>$msg</div>";
    }
}
