<?php
    function kb_images($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $class = isset($att['class']) ? $att['class'] : '';
        $wraptag = isset($att['wraptag']) ? $att['wraptag'] : 'ul';
        $breaktag = isset($att['breaktag']) ? $att['breaktag'] : 'li';
        $field = isset($att['field']) ? $att['field'] : '';

        // Get images from a field or from the page if no field
        $images = isset($att['field']) ? page()->{$att['field']}()->toFiles() : page()->images();

        // Build up the list
        $html = '';
        foreach ($images as $image) {
         $img = '<img src="' . $image->url().'"'. 'alt="'. $image->alt().'">';
         $html .= Html::tag($breaktag, [$img]). PHP_EOL;
        }

        $imageset = Html::tag($wraptag, [$html], ["class" => $class]). PHP_EOL;

        return $imageset;
    }
