<?php
/**
 * Simple UI welcome view.
 */

namespace atkdemo\ui;

use atk4\ui\View;

class Welcome extends View
{
    public function init()
    {
        parent::init();

        $this->add(new \atk4\ui\Message(['content' => 'Agile Toolkit for Wordpress!']));

        $this->add('Text')->addParagraph('Please feel free to look at any of the panel showing Agile Toolkit UI in Wordpress.');
    }
}