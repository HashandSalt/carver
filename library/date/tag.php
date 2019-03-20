<?php
    function kb_date($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        // Deal with the attributes
        $format 	= isset($att['format']) ? $att['format'] : 'd/m/Y';
        $wraptag 	= isset($att['wraptag']) ? $att['wraptag'] : 'p';
        $class 		= isset($att['class']) ? $att['class'] : '';

        // Get the field date or use todays date if its not set or cant be found
        $dateval = isset($att['field']) ? page()->{$att['field']}()->toDate($format) : date($format);

        return Html::tag($wraptag, $dateval, ["class" => $class]);
    }
