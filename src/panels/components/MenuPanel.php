<?php
/**
 * Demo menu.
 */

namespace atkdemo\panels\components;

use atkwp\components\PanelComponent;

class MenuPanel extends PanelComponent
{
    public function init()
    {
        parent::init();
        $m = $this->add('Menu');
        $m->addItem('foo', 'foo.php');
        $m->addItem('bar');
        $m->addItem('baz');
        $m->add(['DropDown', 'huhhuh', 'js' => ['on' => 'hover']])->setSource(['a', 'b', 'c']);

        $sm = $m->addMenu('Sub-menu');
        $sm->addItem('one', 'one.php');
        $sm->addItem(['two', 'label' => 'VIP', 'disabled']);

        $sm = $sm->addMenu('Sub-menu');
        $sm->addItem('one');
        $sm->addItem('two');

        $m = $this->add(['Menu', 'vertical pointing']);
        $m->addItem(['Inbox', 'label' => ['123', 'teal left pointing']]);
        $m->addItem('Spam');
        $m->addItem()->add(new \atk4\ui\FormField\Input(['placeholder' => 'Search', 'icon' => 'search']))->addClass('transparent');

        $m = $this->add(['Menu', 'secondary vertical pointing']);
        $m->addItem(['Inbox', 'label' => ['123', 'teal left pointing']]);
        $m->addItem('Spam');
        $m->addItem()->add(new \atk4\ui\FormField\Input(['placeholder' => 'Search', 'icon' => 'search']))->addClass('transparent');
        $m = $this->add(['Menu', 'vertical']);
        $gr = $m->addGroup('Products');
        $gr->addItem('Enterprise');
        $gr->addItem('Consumer');

        $gr = $m->addGroup('Hosting');
        $gr->addItem('Shared');
        $gr->addItem('Dedicated');

        $m = $this->add(['Menu', 'vertical']);
        $i = $m->addItem();
        $i->add(['Header', 'size' => 4])->set('Promotions');
        $i->add(['View', 'element' => 'P'])->set('Check out our promotions');
    }
}
