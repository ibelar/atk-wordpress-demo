<?php
/**
 * Report for console demo.
 */

namespace atkdemo\models;

use atk4\data\Model;

class Test extends Model
{
    use \atk4\core\DebugTrait;

    public function generateReport()
    {
        $this->log('info', 'Starting long process');
        $this->debug('test=123');
        sleep(1);
        $this->debug('test=321');
        sleep(5);

        return 123;
    }
}
