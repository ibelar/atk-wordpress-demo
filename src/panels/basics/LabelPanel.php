<?php
/**
 * Demo label.
 */

namespace atkdemo\panels\basics;


use atkwp\components\PanelComponent;

class LabelPanel extends PanelComponent
{
    public function init() 
    {
        parent::init();
        $img = 'https://cdn.rawgit.com/atk4/ui/07208a0af84109f0d6e3553e242720d8aeedb784/public/logo.png';

        $this->add(['Header', 'Labels']);
        $this->add(['Label', 'Hot!']);
        $this->add(['Label', '23', 'icon' => 'mail']);
        $this->add(['Label', 'new', 'iconRight' => 'delete']);

        $this->add(['Label', 'Coded in PHP', 'image' => $img]);
        $this->add(['Label', 'Number of lines', 'detail' => '33']);

        $this->add(['Header', 'Combinations and Interraction']);
        $del = $this->add(['Label', 'Zoe', 'image' => 'https://semantic-ui.com/images/avatar/small/ade.jpg', 'iconRight' => 'delete']);
        $del->on('click', '.delete', $del->js()->fadeOut());

        $val = isset($_GET['toggle']) && $_GET['toggle'];
        $toggle = $this->add(['Label', 'icon' => 'toggle '.($val ? 'on' : 'off')])->set('Value: '.$val);
        $toggle->on('click', new \atk4\ui\jsReload($toggle, ['toggle' => $val ? null : 1]));

        $m = $this->add('Menu');
        $m->addItem('Inbox')->add(['Label', '20', 'floating red']);
        $m->addMenu('Others')->addItem('Draft')->add(['Label', '10', 'floating blue']);

        $seg = $this->add(['View', 'ui' => 'segment']);
        $seg->add(['Header', 'Label Group']);
        $labels = $seg->add(['View', false, 'tag', 'ui' => 'labels']);
        $seg->add(['Label', '$9.99']);
        $seg->add(['Label', '$19.99']);
        $seg->add(['Label', '$24.99']);

        $columns = $this->add('Columns');

        $c = $columns->addColumn();
        $seg = $c->add(['View', 'ui' => 'raised segment']);
        $seg->add(['Label', 'Left Column', 'top attached', 'icon' => 'book']);
        $seg->add(['Label', 'Lorem', 'red ribbon', 'icon' => 'cut']);
        $seg->add(['LoremIpsum', 'size' => 1]);

        $c = $columns->addColumn();
        $seg = $c->add(['View', 'ui' => 'raised segment']);
        $seg->add(['Label', 'Right Column', 'top attached', 'icon' => 'book']);
        $seg->add(['LoremIpsum', 'size' => 1]);
        $seg->add(['Label', 'Ipsum', 'orange bottom right attached', 'icon' => 'cut']);

    }
}