<?php
    function kb_a($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $linkdest	       = isset($att['href']) ? $att['href'] : $linkdest;
        $linktext 	     = isset($att['text']) ? $att['text'] : $linkdest;
        $target 	       = isset($att['target']) ? $att['target'] : '_self';
        $rel	           = isset($att['rel']) ? $att['rel'] : 'noopeener noreferrer';

        $class 	         = isset($att['class']) ? $att['class'] : '';

        $link = Html::a($linkdest, $linktext, ["class" => $class, "rel" => $rel]);

        return $link;
    }
