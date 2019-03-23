<?php
    function kb_email($tag)
    {
        // Get the attributes
        $att = json_decode(json_encode($tag['attributes']), true);

        $email 	= isset($att['email']) ? $att['email'] : 'you@example.com';
        $field 	= isset($att['field']) ? page()->{$att['field']}() : 'you@example.com';
        $text 	= isset($att['text']) ? $att['text'] : null;
        $class 	= isset($att['class']) ? $att['class'] : '';

        if ($email) {
            $email = Html::email($email, $text, ["class" => $class]);
        }

        if ($field) {
            $email = Html::email($field, $text, ["class" => $class]);
        }

        return $email;
    }
