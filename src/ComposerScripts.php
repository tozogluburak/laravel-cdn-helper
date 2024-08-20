<?php
namespace tozogluburak\CdnHelper;

class ComposerScripts
{
    public static function updateAutoload()
    {
        // Laravel basepath()
        $basePath = dirname(__DIR__, 4);

        $helpersDir = $basePath . '/app/Helpers';
        if (!is_dir($helpersDir)) {
            mkdir($helpersDir, 0755, true);
        }

        // Copy CdnHelpers.php from vendor to app/Helpers
        $source = __DIR__ . '/Helpers/CdnHelpers.php';
        $destination = $helpersDir . '/CdnHelpers.php';

        if (file_exists($source)) {
            copy($source, $destination);
        }

        // Update composer autoload files section
        self::updateComposerAutoload($basePath);
    }

    private static function updateComposerAutoload($basePath)
    {
        $composerJsonPath = $basePath . '/composer.json';

        $composerJson = json_decode(file_get_contents($composerJsonPath), true);

        // Add or update autoload files section
        if (!isset($composerJson['autoload']['files'])) {
            $composerJson['autoload']['files'] = [];
        }

        $cdnHelperPath = 'app/Helpers/CdnHelpers.php';
        if (!in_array($cdnHelperPath, $composerJson['autoload']['files'])) {
            $composerJson['autoload']['files'][] = $cdnHelperPath;
        }

        // Save the updated composer.json file
        file_put_contents($composerJsonPath, json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        // Rebuild autoload
        exec('composer dump-autoload');
    }
}
