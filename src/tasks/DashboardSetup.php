<?php
/**
 * Setup dashboard task required by this plugin.
 */

namespace atkdemo\tasks;

use atkdemo\ui\Welcome;

class DashboardSetup extends Task
{
    public function setDashBoard()
    {
        if ($this->plugin->getUserService()->isDemoUser()) {
            remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
            //Add dashboard the old way.
            wp_add_dashboard_widget( 'atkdemo_welcome', 'Welcome', [$this, 'dashboardWelcome'] );
        }
    }

    /**
     * Quick dashboard output.
     *
     * @throws \atk4\ui\Exception
     */
    public function dashboardWelcome()
    {
        echo (new Welcome())->getHTML();
    }
}