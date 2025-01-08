<?php

if (!function_exists('formatStoreNameForUrl')) {
    function formatStoreNameForUrl($name)
    {
        // Remove caracteres especiais e substitui espaços por hífens
        $formattedName = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $name));
        $formattedName = preg_replace('/[^a-z0-9-]+/', '-', $formattedName);
        $formattedName = trim($formattedName, '-');

        return $formattedName;
    }
}
