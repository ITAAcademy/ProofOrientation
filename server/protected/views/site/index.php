<?php
/* @var $this SiteController */
    $jsonArray['token'] = $secretKey;
    echo CJSON::encode($jsonArray);
?>
