<?php
    function kb_gist($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $gist	= isset($att['url']) ? $att['url'] : '';

        $gistembed = gist($gist);

        return $gistembed;
    }
