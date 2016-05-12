<?php
/*
 * To handle error from last.fm API response
 * 
 * @param $error array containing error code and message.
 */
function ApiErrorHandler($error = array()) {
    echo ("<h2>" . $error['message'] ."</h2>");
}
