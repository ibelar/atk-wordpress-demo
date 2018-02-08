<?php
/**
 * Demo column.
 */

namespace atkdemo\panels\components;

use atk4\ui\Columns;
use atkdemo\ui\Box;
use atkwp\components\PanelComponent;

class ColumnPanel extends PanelComponent
{
    public function init()
    {
        parent::init();
        $page = $this->add(['View', 'id' => 'example']);

        $page->add(['Header', 'Basic Usage']);

        $columns = $page->add(new Columns());
        $cn = $columns->addColumn();
        $cn->add(['Header', 'First', 'size' => 4]);
        $cn->add(['LoremIpsum', 1]);
        $cn = $columns->addColumn();
        $cn->add(['Header', 'Second', 'size' => 4]);
        $cn->add(['LoremIpsum', 1]);
        $cn = $columns->addColumn();
        $cn->add(['Header', 'Third', 'size' => 4]);
        $cn->add(['LoremIpsum', 1]);

        $page->add(['Header', 'Specifying widths, using rows or automatic flow']);

        // highlight class will show cells as boxes, even though they contain nothing
        $c = $page->add(new Columns([null, 'highlight']));
        $c->addColumn(3);
        $c->addColumn(5);
        $c->addColumn(2);
        $c->addColumn(6);
        $c->addColumn(5);
        $c->addColumn(2);
        $c->addColumn(6);
        $c->addColumn(3);

        $r = $c->addRow();
        $r->addColumn();
        $r->addColumn();
        $r->addColumn();

        $page->add(['Header', 'Content Outline']);
        $c = $page->add(new Columns(['internally celled']));

        $r = $c->addRow();
        $r->addColumn([2, 'right aligned'])->add(['Icon', 'huge home']);
        $r->addColumn(12)->add(['LoremIpsum', 1]);
        $r->addColumn(2)->add(['Icon', 'huge trash']);

        $r = $c->addRow();
        $r->addColumn([2, 'right aligned'])->add(['Icon', 'huge home']);
        $r->addColumn(12)->add(['LoremIpsum', 1]);
        $r->addColumn(2)->add(['Icon', 'huge trash']);

        $page->add(['Header', 'Add elements into columns and using classes']);

        $c = $page->add(new Columns(['width' => 4]));
        $c->addColumn()->add(new Box([null, 'red']));
        $c->addColumn([null, null, 'right floated'])->add(new Box([null, 'blue']));
    }
}
