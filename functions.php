<?php

function render(string $templateName, array $params) {
    ob_start();
    extract($params);
    require 'templates/header.php';
    require 'templates/' . $templateName;
    require 'templates/footer.php';

    $template = ob_get_clean();
    echo $template;
}