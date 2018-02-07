<?php
/**
 * Model base of fake data.
 */

namespace atkdemo\models;

use atk4\data\Model;

class SomeData extends Model
{
    public function __construct()
    {
        $p = new PersistenceFaker();

        parent::__construct($p);
    }

    public function init()
    {
        parent::init();
        $m = $this;

        $m->addField('title');
        $m->addField('name');
        $m->addField('surname', ['actual' => 'name']);
        $m->addField('date', ['type' => 'date']);
        $m->addField('salary', ['type' => 'money', 'actual' => 'randomNumber']);
    }
}
