<?php
/**
 *
 * Carver Plugin for Kirby 3
 *
 * @version   0.0.1
 * @author    James Steel <https://hashandsalt.com>
 * @copyright James Steel <https://hashandsalt.com>
 * @link      https://github.com/HashandSalt/carver
 * @license   MIT <http://opensource.org/licenses/MIT>
 */

require('lib/CustomTags/CustomTags.php');

Kirby::plugin('hashandsalt/carver', [

  $ct = new CustomTags(array(
      'tag_name'              => 'kb',
      'tag_callback_prefix'   => 'kb_',
      'parse_on_shutdown'     => true,
      'tag_directory'         => $kirby->root('site').'/carver/',
      'sniff_for_buried_tags' => false
  ))


]);
