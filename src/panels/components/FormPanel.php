<?php
/**
 * Demo form.
 */

namespace atkdemo\panels\components;

use atkwp\components\PanelComponent;

class FormPanel extends PanelComponent
{
    public function init()
    {
        parent::init();

        $tabs = $this->add('Tabs');

        ////////////////////////////////////////////
        $tab = $tabs->addTab('Basic Use');

        $tab->add(['Header', 'Very simple form']);

        $form = $tab->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            // implement subscribe here

            return $form->success('Subscribed '.$form->model['email'].' to newsletter.');
        });

        $form->buttonSave->set('Subscribe');
        $form->buttonSave->icon = 'mail';

        $tab->add(['Header', 'But very flexible']);

        $form = $tab->add('Form');
        $g = $form->addGroup(['width' => 'three']);
        $g->addField('name');
        $g->addField('surname');
        $g->addField('gender', ['DropDown', 'values' => ['Female', 'Male']]);

        $tab->add(['Header', 'Comparing Field type vs Decorator class']);
        $form = $tab->add('Form');
        $form->addField('date1', null, ['type' => 'date']);
        $form->addField('date2', ['Calendar', 'type' => 'date']);

        $form->onSubmit(function ($form) {
            echo 'date1 = '.print_r($form->model['date1'], true).' and date2 = '.print_r($form->model['date2'], true);
        });

        ////////////////////////////////////////////////////////////
        $tab = $tabs->addTab('Handler Output');

        $tab->add(['Header', 'Form can respond with manually generated error']);
        $form = $tab->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            return $form->error('email', 'some error action '.rand(1, 100));
        });

        $tab->add(['Header', '..or success message']);
        $form = $tab->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            return $form->success('form was successful');
        });

        $tab->add(['Header', 'Any other view can be output']);
        $form = $tab->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            $view = new \atk4\ui\Message('some header');
            $view->init();
            $view->text->addParagraph('some text '.rand(1, 100));

            return $view;
        });

        $tab->add(['Header', 'jsAction can be used too']);
        $form = $tab->add('Form');
        $field = $form->addField('email');
        $form->onSubmit(function ($form) use ($field) {
            return $field->jsInput()->val('random is '.rand(1, 100));
        });

        /////////////////////////////////////////////////////////////////////
        $tab = $tabs->addTab('Handler Safety');

        $tab->add(['Header', 'Form handles errors (PHP 7.0+)', 'size' => 2]);

        $form = $tab->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            $o = new \StdClass();

            return $o['abc'];
        });

        $tab->add(['Header', 'Form handles random output', 'size' => 2]);

        $form = $tab->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            echo 'some output here';
        });

        $tab->add(['Header', 'Form shows Agile exceptions', 'size' => 2]);

        $form = $tab->add('Form');
        $form->addField('email');
        $form->onSubmit(function ($form) {
            throw new \atk4\core\Exception(['testing', 'arg1'=>'val1']);
            return 'somehow it did not crash';
        });

        /////////////////////////////////////////////////////////////////////
        $tab = $tabs->addTab('Complex Examples');

        $tab->add(['Header', 'Conditional response']);

        $a = [];
        $m_register = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
        $m_register->addField('name');
        $m_register->addField('email');
        $m_register->addField('is_accept_terms', ['type' => 'boolean', 'mandatory' => true]);

        $f = $tab->add(new \atk4\ui\Form(['segment' => true]));
        $f->setModel($m_register);

        $f->onSubmit(function ($f) {
            if ($f->model['name'] != 'John') {
                return $f->error('name', 'Your name is not John! It is "'.$f->model['name'].'". It should be John. Pleeease!');
            } else {
                return [
                    $f->jsInput('email')->val('john@gmail.com'),
                    $f->jsField('is_accept_terms')->checkbox('set checked'),
                ];
            }
        });
    }
}
