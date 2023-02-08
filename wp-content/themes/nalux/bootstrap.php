<?php
/*
 * This file is used for loading of theme
 */
if(session_id() == '') session_start();

include_once(TEMPLATEPATH. "/config.php");
include_once(TEMPLATEPATH. "/models/ML_Models_Init.php"); /* regis content types */
include_once(TEMPLATEPATH. "/models/ML_Models_Data.php"); /* regis content types */

?>