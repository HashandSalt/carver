<?php
    function kb_image($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        // Deal with the attributes
        $file = isset($att['file']) ? page()->image($att['file'])->url() : page()->images()->first()->url();

        $class = isset($att['class']) ? $att['class'] : '';

        return Html::img($file, ["class" => $class]);
    }
