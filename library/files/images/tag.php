<?php
    function kb_images($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $class = isset($att['class']) ? $att['class'] : '';
        $wraptag = isset($att['wraptag']) ? $att['wraptag'] : 'div';
        $exclude = isset($att['exclude']) ? $att['exclude'] : '';

        $images = page()->images();

        if ($exclude) {
            $images = $images->filterBy('filename', '!*=', $att['exclude']);
        }

        $html = '';
        foreach ($images as $image) {
         $img = '<img src="' . $image->url().'"'. 'alt="'. $image->alt().'">';

         $html .= Html::tag($wraptag, [$img], ["class" => $class]). PHP_EOL;
        }
        return  $html ;
    }
