<?php
// #ddev-generated

$moduleDir = $argv[1];
$moduleComposerJson = "$moduleDir/composer.json";
$requireDevDependencies = [];

if (file_exists($moduleComposerJson)) {
    $composerData = json_decode(file_get_contents($moduleComposerJson), true);


    if (isset($composerData['require-dev']) && is_array($composerData['require-dev'])) {
        foreach ($composerData['require-dev'] as $package => $version) {
            $requireDevDependencies[$package] = \str_replace(' ', '', $version);
        }
    }
}

echo \implode(" ", \array_map(function($package, $version) {
    return "$package:$version";
}, \array_keys($requireDevDependencies), $requireDevDependencies));
