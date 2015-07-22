<?php

/* 
 * FirstMe Server API
 * Author : Biswajit Bardhan  * 
 */

function fileNoToPlanId($fileNo){
    $plan = $this->doctrine->em->getRepository('Entities\Plan')->findBy(array("fileNo" => $fileNo));
    return ($plan == NULL) ? NULL : $plan->getId();
}