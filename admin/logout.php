<?php
/** 
 * admin/logout.php
 *
 * Destroy the session.
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require_once './common.php';

session_destroy();

redirect("login.php","You have been logged out.");
?>