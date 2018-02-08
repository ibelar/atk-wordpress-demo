<?php
/**
 * Demo shortcode.
 */

namespace atkdemo\shortcodes;

use atkwp\components\ShortcodeComponent;

class Home extends ShortcodeComponent
{
    public function init()
    {
        parent::init();

        $this->add('View')->set('This is a shortocode view.');
    }
}
