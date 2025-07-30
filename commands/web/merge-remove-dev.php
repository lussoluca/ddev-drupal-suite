<?php
// #ddev-generated

require_once __DIR__ . '/composer-utils.php';

$moduleDir = $argv[1];
$requireDevDependencies = getRequireDevDependencies($moduleDir, false);

echo formatDependenciesOutput($requireDevDependencies, false);
