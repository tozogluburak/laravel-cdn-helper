<?php

namespace tozogluburak\CdnHelper;

class ComposerScripts
{
    public static function updateAutoload()
    {
        // Laravel basepath()
        $basePath = dirname(__DIR__, 4); 
        $composerJsonPath = $basePath . '/composer.json';

        $composerJson = json_decode(file_get_contents($composerJsonPath), true);

        // Add or update filespace if available
        if (!isset($composerJson['autoload']['files'])) {
            $composerJson['autoload']['files'] = [];
        }

        $cdnHelperPath = 'app/Helpers/CdnHelpers.php';
        if (!in_array($cdnHelperPath, $composerJson['autoload']['files'])) {
            $composerJson['autoload']['files'][] = $cdnHelperPath;
        }

        // Save the JSON file again
        file_put_contents($composerJsonPath, json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        // rebuild autoload by running composer dump-autoload
        exec('composer dump-autoload');
    }
}
