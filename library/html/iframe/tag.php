<?php
    function kb_iframe($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $frame	= isset($att['url']) ? $att['url'] : '';

        $width	= isset($att['width']) ? $att['width'] : '';
        $height	= isset($att['height']) ? $att['height'] : '';
        $sandbox	= isset($att['sandbox']) ? $att['sandbox'] : '';

        $class 	  = isset($att['class']) ? $att['class'] : '';
        $wrapclass = isset($att['wrapclass']) ? $att['wrapclass'] : '';

        $wraptag = isset($att['wraptag']) ? $att['wraptag'] : null;

        $iframeembed = Html::iframe($frame, ["class" => $class, "width" => $width, "height" => $height, "sandbox" => $sandbox]);

        $wrapme = isset($wraptag) ? Html::tag($wraptag, [$iframeembed], ["class" => $wrapclass]) : $iframeembed;


        return $wrapme ;
    }
