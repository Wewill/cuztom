<?php

namespace Gizburdt\Cuztom\Support;

use Gizburdt\Cuztom\Support\Guard;

Guard::directAccess();

class Notice
{
    /**
     * Notice itself
     * @var string
     */
    public $notice;

    /**
     * Notice type
     * @var string
     */
    public $type;

    /**
     * Dismissible?
     * @var boolean
     */
    public $dismissible;

    /**
     * Constructor
     *
     * @param string  $notice
     * @param string  $type
     * @param boolean $dismissible
     * @since 2.3
     */
    public function __construct($notice, $type = 'updated', $dismissible)
    {
        $this->notice       = $notice;
        $this->type         = $type;
        $this->dismissible  = $dismissible;

        add_action('admin_notices', array(&$this, 'add_admin_notice'));
    }

    /**
     * Adds the admin notice
     *
     * @since 2.3
     */
    public function add_admin_notice()
    {
        echo '<div class="' . $this->get_css_class() . '">' .
            '<p>' . $this->notice . '</p>' .
        '</div>';
    }

    /**
     * Returns the complete css class for the notice
     *
     * @return string
     * @since  2.3
     */
    public function get_css_class()
    {
        return $this->type . ($this->dismissible ? ' is-dismissible' : '');
    }
}
