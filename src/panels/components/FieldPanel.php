<?php
/**
 * Demo field.
 */

namespace atkdemo\panels\components;

use atkwp\components\PanelComponent;

class FieldPanel extends PanelComponent
{
    public function init()
    {
        parent::init();
        $this->add(['Header', 'Types', 'size' => 2]);

        $this->add(new \atk4\ui\FormField\Line())->setDefaults(['placeholder' => 'Search']);
        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search', 'loading' => true]));
        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search', 'loading' => 'left']));
        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search', 'icon' => 'search', 'disabled' => true]));
        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search', 'error' => true]));

        $this->add(new \atk4\ui\Header(['Icon Variations', 'size' => 2]));

        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search users', 'left' => true, 'icon' => 'users']));
        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search users', 'icon' => 'circular search link']));
        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search users', 'icon' => 'inverted circular search link']));

        $this->add(new \atk4\ui\Header(['Labels', 'size' => 2]));

        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Search users', 'label' => 'http://']));

        // dropdown example
        $dd = new \atk4\ui\DropDown('.com');
        $dd->setSource(['.com', '.net', '.org']);
        $this->add(new \atk4\ui\FormField\Line([
            'placeholder' => 'Find Domain',
            'labelRight'  => $dd,
        ]));

        $this->add(new \atk4\ui\FormField\Line(['placeholder' => 'Weight', 'labelRight' => new \atk4\ui\Label(['kg', 'basic'])]));
        $this->add(new \atk4\ui\FormField\Line(['label' => '$', 'labelRight' => new \atk4\ui\Label(['.00', 'basic'])]));

        $this->add(new \atk4\ui\FormField\Line([
            'iconLeft'   => 'tags',
            'labelRight' => new \atk4\ui\Label(['Add Tag', 'tag']),
        ]));

        // left/right corner is not supported, but here is work-around:
        $label = new \atk4\ui\Label();
        $label->addClass('left corner');
        $label->add(new \atk4\ui\Icon('asterisk'));

        $this->add(new \atk4\ui\FormField\Line([
            'label' => $label,
        ]))->addClass('left corner');

        $label = new \atk4\ui\Label();
        $label->addClass('corner');
        $label->add(new \atk4\ui\Icon('asterisk'));

        $this->add(new \atk4\ui\FormField\Line([
            'label' => $label,
        ]))->addClass('corner');

        $this->add(new \atk4\ui\Header(['Actions', 'size' => 2]));

        $this->add(new \atk4\ui\FormField\Line(['action' => 'Search']));

        $this->add(new \atk4\ui\FormField\Line(['actionLeft' => new \atk4\ui\Button([
            'Checkout', 'icon' => 'cart', 'teal',
        ])]));

        $this->add(new \atk4\ui\FormField\Line(['iconLeft' => 'search',  'action' => 'Search']));

        $dd = new \atk4\ui\DropDownButton(['This Page', 'basic']);
        $dd->setSource(['This Organisation', 'Entire Site']);
        $this->add(new \atk4\ui\FormField\Line(['iconLeft' => 'search',  'action' => $dd]));

        // double actions are not supported but you can add them yourself
        $dd = new \atk4\ui\DropDown(['Articles', 'compact selection']);
        $dd->setSource(['All', ['name' => 'Articles', 'active' => true], 'Products']);
        $this->add(new \atk4\ui\FormField\Line(['iconLeft' => 'search',  'action' => $dd]))
            ->add(new \atk4\ui\Button('Search'), 'AfterAfterInput');

        $this->add(new \atk4\ui\FormField\Line(['action' => new \atk4\ui\Button([
            'Copy', 'iconRight' => 'copy', 'teal',
        ])]));

        $this->add(new \atk4\ui\FormField\Line(['action' => new \atk4\ui\Button([
            'icon' => 'search',
        ])]));

        $this->add(new \atk4\ui\Header(['Modifiers', 'size' => 2]));

        $this->add(new \atk4\ui\FormField\Line(['icon' => 'search', 'transparent' => true, 'placeholder' => 'transparent']));
        $this->add(new \atk4\ui\FormField\Line(['icon' => 'search', 'fluid' => true, 'placeholder' => 'fluid']));

        $this->add(new \atk4\ui\FormField\Line(['icon' => 'search', 'mini' => true, 'placeholder' => 'mini']));
    }
}
