<?php
/**
 * Demo paginator.
 */

namespace atkdemo\panels\components;


use atkwp\components\PanelComponent;

class PaginatorPanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        // Dynamically reloading paginator
        $this->add(['Header', 'Dynamic reloading']);
        $seg = $this->add(['View', 'ui' => 'blue segment']);
        $label = $seg->add(['Label']);
        $bb = $seg->add(['Paginator', 'total' => 50, 'range' => 2, 'reload' => $seg]);
        $label->addClass('blue ribbon');
        $label->set('Current page: '.$bb->page);
    }
}