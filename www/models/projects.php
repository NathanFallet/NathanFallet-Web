<?php
// Read projects from file
$projects = json_decode(file_get_contents('../projects.json'), true);

// Sort them by date
usort($projects, function ($a, $b) {
    return $a["last_update"] > $b["last_update"] ? -1 : 1;
});
