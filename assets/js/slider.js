/**
 * Created by Juscelino Jr on 29/04/2016.
 */
jQuery(document).ready(function ($) {

    var jssor_1_options = {
        $AutoPlay: true,
        $ArrowNavigatorOptions: {
            $Class: $JssorArrowNavigator$
        },
        $ThumbnailNavigatorOptions: {
            $Class: $JssorThumbnailNavigator$,
            $Cols: 6,
            $SpacingX: 4,
            $SpacingY: 10,
            $Orientation: 2,
            $Align: 0
        }
    };

    var jssor_1_slider = new $JssorSlider$("slider_secundario", jssor_1_options);

    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizing
    function ScaleSlider() {
        const padding = 30;
        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth - padding;
        if (refSize) {
            jssor_1_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider, 30);
        }
    }

    ScaleSlider();
    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
    //responsive code end
});