<?php
/**
 * Demo js event panel.
 */

namespace atkdemo\panels\actions;

use atk4\ui\Button;
use atk4\ui\Header;
use atkwp\components\PanelComponent;

class JsPanel extends PanelComponent
{

    public function init()
    {
        parent::init();
        $this->add(new Header('Basic Button'));

        // This button hides on page load
        $b = $this->add(new Button('Hidden Button'));
        $b->js(true)->hide();

        // This button hides when clicked
        $b = $this->add(new Button(['id' => 'b2']))->set('Hide on click Button');
        $b->js('click')->hide();

        $this->add(['Button', 'Redirect'])->on('click', $this->app->jsRedirect(['foo'=>'bar']));

        if (isset($_GET['foo']) && $_GET['foo'] == 'bar') {
            $this->redirect(['foo'=>'baz']);
        }

        $this->add(new Header('js() method'));

        $b = $this->add(new Button('Hide button B'));
        $b2 = $this->add(new Button('B'));
        $b->js('click', $b2->js()->hide('b2'))->hide('b1');

        $this->add(new Header('on() method'));

        $b = $this->add(new Button('Hide button C'));
        $b2 = $this->add(new Button('C'));
        $b->on('click', $b2->js()->hide('c2'))->hide('c1');

        $this->add(new Header('Callbacks'));

        // On button click reload it and change it's title
        $b = $this->add(new Button('Callback Test'));
        $b->on('click', function ($b) {
            return $b->text(rand(1, 20));
        });

        $b = $this->add(new Button('success'));
        $b->on('click', function ($b) {
            return 'success';
        });

        $b = $this->add(new Button('failure'));
        $b->on('click', function ($b) {
            throw new \atk4\data\ValidationException(['Everything is bad']);
        });
    }
}