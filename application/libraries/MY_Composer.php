<?php
/**
 * Description of MY_Composer
 *
 * @author Rana
 */
class MY_Composer 
{
    function __construct() 
    {
        //include("/vendor/autoload.php");
        require_once($_SERVER['DOCUMENT_ROOT']."/sathiplanners/vendor/autoload.php");
    }
}