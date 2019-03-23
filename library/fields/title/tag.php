<?php
    function kb_title($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $field 	  = isset($att['field']) ? page()->{$att['field']}()->html() : 'Your Title';
        $class 	  = isset($att['class']) ? $att['class'] : '';
        $wraptag 	= isset($att['wraptag']) ? $att['wraptag'] : 'h1';

        $title = Html::tag($wraptag, $field, ["class" => $class]);

        return $title;
    }
