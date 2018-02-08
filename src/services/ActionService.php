<?php
/**
 * Add Wp action need by this plugin.
 */

namespace atkdemo\services;

use atkdemo\Plugin;
use atkdemo\tasks\DashboardSetup;
use atkdemo\tasks\Install;
use atk4\ui\Template;
use atk4\ui\View;

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
        add_action('load-profile.php', function () {
            if(!current_user_can('manage_options')) {
                exit(wp_safe_redirect( admin_url('admin.php?page=profile-index')));
            }
        });

        add_action('admin_bar_menu', function ($wp_admin_bar) use ($plugin) {
            //check if one of our page
            if ($page = @$_GET['page']){
                if ($page !== 'profile-index') {
                    if ($panel = $plugin->componentCtrl->searchComponentByType('panel', $page, 'slug')) {
                        $button = new View(['View source', 'template' => new Template('<span class="ab-icon dashicon-before dashicons-media-code"></span><span class="ab-label">{$Content}</span>')]);
                        $uses = str_replace('\\', '/', $panel['uses']);
                        $href = str_replace('atkdemo', $plugin->getConfig('plugin/code_base_url'), $uses).'.php';
                        $args = array(
                            'id'    => 'atkdemo-code',
                            'title' => $button->getHTML(),
                            'href'  => $href,
                            'meta'  => ['title' => 'View Source code on Github', 'target' => '_blank']
                        );
                        $wp_admin_bar->add_node( $args );
                    }
                }
            }
        }, 999);
    }
}
