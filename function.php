<?php

function formatCurrentDate()
{
    $date = date('m-d-Y');
    $dateObj = DateTime::createFromFormat('m-d-Y', $date);
    return $dateObj->format('d-M-Y');
}
