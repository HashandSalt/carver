<?php
    function kb_kt($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $field  = isset($att['field']) ? page()->{$att['field']}()->kt() : '';

        return $field;
    }
