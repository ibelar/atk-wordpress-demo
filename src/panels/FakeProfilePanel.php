<?php
/**
 * Simulate Wp Profile panel for demo user.
 */

namespace atkdemo\panels;

use atkdemo\ui\DemoLister;
use atkwp\components\PanelComponent;

class FakeProfilePanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        $msg = $this->add([
                             'Message',
                             'Welcome to Atk-Worpress Demo plugin!',
                         ]);

        $this->add(['Header', 'Available Demo Pages']);

        $lister = new DemoLister();
        $lister->setSource([
             ['icon'=>'cube', 'title'=>'UI Basic', 'descr'=>'Demonstrate uses of basic UI component in Agile Toolkit.', 'id'=>'basic-view-index'],
             ['icon'=> 'cubes', 'title'=>'UI Component', 'descr'=>'Demonstrate uses of more complex UI component in Agile Toolkit.', 'id'=>'comp-index'],
             ['icon'=> 'toggle on', 'title'=>'UI Interactivity', 'descr'=>'Demonstrate uses of javascript interactivity in Agile Toolkit.', 'id'=>'js-index'],
         ]);

        $this->add([$lister, 'defaultTemplate'=>'lister.html']);
    }
}