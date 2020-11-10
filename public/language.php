<?php

if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'de') {
    $language = 'de';
} else if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr') {
    $language = 'fr';
} else if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'it') {
    $language = 'it';
} else {
    $language = 'de';
}

echo json_encode($language);
exit();