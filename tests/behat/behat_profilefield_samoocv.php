<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Basic authentication steps definitions.
 *
 * @package    profilefield_samoocv
 * @category   test
 * @copyright  2017 Planificacion de Entornos Tecnologicos SL
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// NOTE: no MOODLE_INTERNAL test here, this file may be required by behat before including /config.php.

require_once(__DIR__ . '/../../../../../../lib/behat/behat_base.php');

use Behat\Behat\Context\Step\Given as Given;
use Behat\Behat\Context\Step\When as When;

/**
 * Log in log out steps definitions.
 *
 * @package    local_eudecustom
 * @category   test
 * @copyright  2017 Planificacion de Entornos Tecnologicos SL
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class behat_profilefield_samoocv extends behat_base {

    /**
     * Opens Eudecustom Messages.
     *
     * @Given /^I go to my profile page$/
     */
    public function i_go_to_my_profile_page() {
        $this->getSession()->visit($this->locate_path("/user/profile.php"));
    }

    /**
     * Opens other user profile.
     *
     * @When /^I visit the profile of "(?P<user_string>(?:[^"]|\\")*)"$/
     * @param string $user
     */
    public function i_go_to_other_profile_page($user) {
        global $DB;
        $record = $DB->get_record('user', array('username' => $user));
        $this->getSession()->visit($this->locate_path("/user/profile.php?id=$record->id"));
    }

}
