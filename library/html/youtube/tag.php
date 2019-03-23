<?php
    function kb_youtube($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $frame	= isset($att['url']) ? $att['url'] : '';

        $width	= isset($att['width']) ? $att['width'] : null;
        $height	= isset($att['height']) ? $att['height'] : null;

        $class 	  = isset($att['class']) ? $att['class'] : '';

        $wraptag = isset($att['wraptag']) ? $att['wraptag'] : null;

        $autoplay = isset($att['autoplay']) ? $att['autoplay'] : null;
        $loop = isset($att['loop']) ? $att['loop'] : null;


        $iframeembed = Html::youtube($frame, ["autoplay" => $autoplay, "loop" => $loop], ["width" => $width, "height" => $height]);

        $wrapme = isset($wraptag) ? Html::tag($wraptag, [$iframeembed], ["class" => $class]) : $iframeembed;


        return $wrapme ;
    }
