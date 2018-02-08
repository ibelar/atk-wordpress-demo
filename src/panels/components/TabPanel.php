<?php
/**
 * Demo tabs.
 */

namespace atkdemo\panels\components;

use atkwp\components\PanelComponent;

class TabPanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        $t = $this->add('Tabs');

        // static tab
        $t->addTab('Hello')->add('HelloWorld');
        $t->addTab('Static Tab')->add('LoremIpsum');

        // dynamic tab
        $t->addTab('Dynamic Lorem Ipsum', function ($tab) {
            $tab->add(['LoremIpsum', 'size' => 2]);
        });
    }
}
