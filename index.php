<?php
/**
 *
 * Carver Plugin for Kirby 3
 *
 * @version   0.0.3
 * @author    James Steel <https://hashandsalt.com>
 * @copyright James Steel <https://hashandsalt.com>
 * @link      https://github.com/HashandSalt/carver
 * @license   MIT <http://opensource.org/licenses/MIT>
 */

@include_once __DIR__ . '/vendor/autoload.php';

require('lib/CustomTags/CustomTags.php');

$ct = new CustomTags(array(
    'tag_name'              => 'kb',
    'tag_callback_prefix'   => 'kb_',
    'parse_on_shutdown'     => true,
    'tag_directory'         => [$kirby->root('site').'/carver/', $kirby->root('plugins').'/carver/library/fields/', $kirby->root('plugins').'/carver/library/files/', $kirby->root('plugins').'/carver/library/html/'],
    'sniff_for_buried_tags' => true,
    'hash_tags'             => true,
));
