<?php
/**
 * Demo button.
 */

namespace atkdemo\panels\basics;


use atkwp\components\PanelComponent;
use atk4\ui\Button;
use atk4\ui\Header;
use atk4\ui\Icon;
use atk4\ui\Label;
use atk4\ui\Template;
use atk4\ui\View;

class ButtonPanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        /** Button Basic */
        $this->add(new Header(['Basic Button', 'size' => 2]));
        $this->add(new Button())->set('Click me');

        /** Button Properties */
        $this->add(new Header(['Properties', 'size' => 2]));
        $b1 = new Button();
        $b2 = new Button();
        $b3 = new Button();
        $b4 = new Button();

        $b1->set(['Load', 'primary']);
        $b2->set(['Load', 'labeled', 'icon' => 'pause']);
        $b3->set(['Next', 'iconRight' => 'right arrow']);
        $b4->set([false, 'circular', 'icon' => 'settings']);
        $this->add($b1);
        $this->add($b2);
        $this->add($b3);
        $this->add($b4);

        $button = new Button();
        $button->set('Click me');
        $button->set(['primary' => true]);
        $button->set(['icon' => 'check']);
        $button->set(['size big' => true]);

        /** Button Big */
        $this->add(new Header(['Big Button', 'size' => 2]));

        $this->add($button);

        /** Button Intent */
        $this->add(new Header(['Button Intent', 'size' => 2]));

        $b_yes = new Button(['Yes', 'positive basic']);
        $b_no = new Button(['No', 'negative basic']);
        $this->add($b_yes);
        $this->add($b_no);

        /** Button Combine */
        $this->add(new Header(['Combining Buttons', 'size' => 2]));
        $bar = new View(['ui' => 'buttons', null, 'vertical']);  // NOTE: class called Buttons, not Button
        $bar->add(new Button(['Play', 'icon' => 'play']));
        $bar->add(new Button(['Pause', 'icon' => 'pause']));
        $bar->add(new Button(['Shuffle', 'icon' => 'shuffle']));

        $this->add($bar);

        /** Button Icon Bar */
        $this->add(new Header(['Icon Bar', 'size' => 2]));
        $bar = new View(['ui' => 'buttons', null, 'blue big']);  // NOTE: class called Buttons, not Button
        $bar->add(new Button(['icon' => 'file']));
        $bar->add(new Button(['icon' => ['save', 'yellow']]));
        $bar->add(new Button(['icon' => 'upload', 'disabled' => true]));
        $this->add($bar);

        /** Button Fork */
        $this->add(new Header(['Forks', 'size' => 2]));
        $forks = new Button(['labeled' => true]); // Button, not Buttons!
        $forks->add(new Button(['Forks', 'blue']))->add(new Icon('fork'));
        $forks->add(new Label(['1,048', 'basic blue left pointing']));
        $this->add($forks);

        /** Button Custom Template */
        $this->add(new Header(['Custom Template', 'size' => 2]));
        $view = new View(['template' => new Template('Hello, {$tag1}, my name is {$tag2}')]);

        $view->add(new Button('World'), 'tag1');
        $view->add(new Button(['Agile UI', 'blue']), 'tag2');

        $this->add($view);
    }
}