<?php
/**
 * Simple table ui view.
 */

namespace atkdemo\ui;

use atk4\ui\View;

class Box extends View
{
    public $ui = 'segment';
    public $content = false;

    public function init()
    {
        parent::init();
        $this->add(['Table', 'header' => false])
             ->setSource(['One', 'Two', 'Three', 'Four']);
    }
}
