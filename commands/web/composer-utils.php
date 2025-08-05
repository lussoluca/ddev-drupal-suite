<?php
// #ddev-generated
// Shared utility functions for composer dependency handling

/**
 * Reads require-dev dependencies from a module's composer.json file.
 *
 * @param string $moduleDir
 *   The module directory path
 * @param bool $includeVersions \
 *   Whether to include version information
 *
 * @return array
 *   The dependencies array
 */
function getRequireDevDependencies(string $moduleDir, bool $includeVersions = false): array {
    $moduleComposerJson = "$moduleDir/composer.json";
    $requireDevDependencies = [];

    if (file_exists($moduleComposerJson)) {
        $composerData = json_decode(file_get_contents($moduleComposerJson), true);

        if (isset($composerData['require-dev']) && is_array($composerData['require-dev'])) {
            foreach ($composerData['require-dev'] as $package => $version) {
                if ($includeVersions) {
                    $requireDevDependencies[$package] = str_replace(' ', '', $version);
                } else {
                    $requireDevDependencies[] = $package;
                }
            }
        }
    }

    return $requireDevDependencies;
}

/**
 * Formats dependencies for output.
 *
 * @param array $dependencies
 *   The dependencies array
 * @param bool $includeVersions
 *   Whether to include version information
 *
 * @return string
 *   The formatted output string
 */
function formatDependenciesOutput(array $dependencies, bool $includeVersions = false): string {
    if ($includeVersions) {
        return implode(" ", array_map(function($package, $version) {
            return "$package:$version";
        }, array_keys($dependencies), $dependencies));
    } else {
        return implode(" ", array_map(function($package) {
            return "$package";
        }, $dependencies));
    }
}
