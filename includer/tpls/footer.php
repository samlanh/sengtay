   </div>
</body>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="layout/js/jquery-1.11.3.min.js" type="text/javascript" data-library="jquery" data-version="1.11.3"></script>
    <script src="layout/js/jssor.slider-22.0.15.mini.js" type="text/javascript" data-library="jssor.slider.mini" data-version="22.0.15"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://arrow.scrolltotop.com/arrow18.js"></script>
    <noscript>Not seeing a <a href="http://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>
 	<script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: true,
              $DragOrientation: 2,
              $PlayOrientation: 2,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 1024);
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
            /*responsive code end*/
        });
    </script>

 </html>