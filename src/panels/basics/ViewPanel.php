<?php
/**
 * Demo view.
 */

namespace atkdemo\panels\basics;

use atkwp\components\PanelComponent;
use atk4\ui\Message;

class ViewPanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        $msg = new Message(['content' => 'Agile Toolkit for Wordpress!']);

        $this->add($msg);

        $this->add(['Header', 'Default view has no styling']);
        $this->add('View')->set('just a <div> element');

        $this->add(['Header', 'View can specify CSS class']);
        $this->add(['View', 'ui' => 'segment', 'raised'])->set('Segment');

        $this->add(['Header', 'View can contain stuff']);
        $this->add(['View', 'ui' => 'segment'])
            ->addClass('inverted red circular')
            ->add(['Header', 'Buy', 'inverted', 'subHeader' => '$'.(rand(100, 1000) / 100)]);

        $this->add(['Header', 'View can use JavaScript']);
        $this->add(['View', 'ui' => 'heart rating'])
            ->js(true)->rating(['maxRating' => 5, 'initialRating' => rand(1, 5)]);

        $this->add(['Header', 'View can have events']);
        $bb = $this->add(['View', 'ui' => 'large blue buttons']);
        $bb->on('click', '.button')->transition('fly up');

        foreach (str_split('Click me!!') as $letter) {
            $bb->add(['Button', $letter]);
        }

        $this->add(['Header', 'View load HTML from string or file']);
        $plane = $this->add(['View', 'template' => new \atk4\ui\Template(
            '<div id="{$_id}" class="ui statistic">
                <div class="value">
                  <i class="plane icon"></i> {$num}
                </div>
                <div class="label">
                  Flights
                </div>
              </div>'
        )]);
        $plane->template->set('num', rand(5, 20));

        $this->add(['Header', 'Can interract with JavaScript actions']);
        $this->add(['Button', 'Hide plane', 'icon' => 'down arrow'])->on('click', $plane->js()->hide());
        $this->add(['Button', 'Show plane', 'icon' => 'up arrow'])->on('click', $plane->js()->show());
        $this->add(['Button', 'Jiggle plane', 'icon' => 'expand'])->on('click', $plane->js()->transition('jiggle'));
        $this->add(['Button', 'Reload plane', 'icon' => 'refresh'])->on('click', new \atk4\ui\jsReload($plane));

        $this->add(['Header', 'Can be rendered into HTML']);
        $this->add(['View', 'ui' => 'segment', 'raised', 'element' => 'pre'])->set($plane->render());

        $this->add(['Header', 'Has a unique global identifier']);
        $this->add(['Label', 'Plane ID: ', 'detail' => $plane->name]);



        $this->add(['Header', 'Can be on a Virtual Page']);
        $vp = $this->add('VirtualPage')->set(function ($page) use ($plane) {
            $page->add($plane);
            $page->add(['Label', 'Plane ID: ', 'bottom attached', 'detail' => $plane->name]);
        });

        $this->add(['Button', 'Show $plane in a dialog', 'icon' => 'clone'])->on('click', new \atk4\ui\jsModal('Plane Box', $vp));

        $this->add(['Header', 'All components extend View (even paginator)']);
        $columns = $this->add('Columns');

        $columns->addColumn()->add(['Button', 'Button'])->addClass('green');
        $columns->addColumn()->add(['Header', 'Header'])->addClass('green');
        $columns->addColumn()->add(['Label', 'Label'])->addClass('green');
        $columns->addColumn()->add(['Message', 'Message'])->addClass('green');
        $columns->addColumn()->add(['Paginator', 'total' => 3, 'reload' => $columns])->addClass('green');

        $this->add(['Header', 'Can have a custom render logic']);
        $this->add('Table')->addclass('green')->setSource(['One', 'Two', 'Three']);
    }
}
