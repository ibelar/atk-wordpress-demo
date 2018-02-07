<?php
/**
 * Create Fake data.
 */

namespace atkdemo\models;

use atk4\data\Persistence;
use Faker;

class PersistenceFaker extends Persistence
{
    public $faker = null;

    public $count = 5;

    public function __construct($opts = [])
    {
        //parent::__construct($opts);

        if (!$this->faker) {
            $this->faker = Faker\Factory::create();
        }
    }

    public function prepareIterator($m)
    {
        foreach ($this->export($m) as $row) {
            yield $row;
        }
    }

    public function export($m, $fields = [])
    {
        if (!$fields) {
            foreach ($m->elements as $name => $e) {
                if ($e instanceof \atk4\data\Field) {
                    $fields[] = $name;
                }
            }
        }

        $data = [];
        for ($i = 0; $i < $this->count; $i++) {
            $row = [];
            foreach ($fields as $field) {
                $type = $field;

                if ($field == $m->id_field) {
                    $row[$field] = $i + 1;
                    continue;
                }

                $actual = $m->getElement($field)->actual;
                if ($actual) {
                    $type = $actual;
                }

                $row[$field] = $this->faker->$type;
            }
            $data[] = $row;
        }

        return array_map(function ($r) use ($m) {
            return $this->typecastLoadRow($m, $r);
        }, $data);
    }
}
