<?php
/**
 * Add Wp action need by this plugin.
 */

namespace atkdemo\services;

use atkdemo\Plugin;
use atkdemo\tasks\DashboardSetup;
use atkdemo\tasks\Install;

class ActionService
{
    /**
     * Which user is doing the action.
     *
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function setupPluginAction(Plugin $plugin)
    {
        add_action('admin_init', [$this->userService, 'setUserActionProfile']);
        add_action('plugins_loaded', [new Install($plugin), 'checkVersion']);
        add_action('wp_dashboard_setup', [new DashboardSetup($plugin), 'setDashBoard']);

        // do not load profile for demo user.
        add_action( 'load-profile.php', function () {
            if(!current_user_can('manage_options')) {
                exit(wp_safe_redirect( admin_url('admin.php?page=profile-index')));
            }
        });
    }
}