<?php
/**
 * Demo Lister view.
 */

namespace atkdemo\ui;

use atk4\ui\Lister;
use atkwp\helpers\WpUtil;

class DemoLister extends Lister
{
    /**
     * Setup proper url for our demo lister.
     *
     * @param array $page
     *
     * @return string
     */
    public function url($page = [])
    {
        return WpUtil::getBaseAdminUrl().'/admin.php?page='.$page['id'];
    }
}