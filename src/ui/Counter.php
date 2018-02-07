<?php
/**
 * Counter view uses in demo.
 */

namespace atkdemo\ui;

use atk4\ui\Button;
use atk4\ui\FormField\Line;
use atk4\ui\jsExpression;

class Counter extends Line
{
    public $content = 20; // default

    public function init()
    {
        parent::init();

        $this->actionLeft = new Button(['icon' => 'minus']);
        $this->action = new Button(['icon' => 'plus']);

        $this->actionLeft->js('click', $this->jsInput()->val(new jsExpression('parseInt([])-1', [$this->jsInput()->val()])));
        $this->action->js('click', $this->jsInput()->val(new jsExpression('parseInt([])+1', [$this->jsInput()->val()])));
    }
}
