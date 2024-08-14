<?php

namespace tozogluburak\CdnHelper\Helpers;

use Illuminate\Support\Facades\Config;

class CdnHelpers {
    public static function cdn($asset) {
        if (!Config::get('app.cdn'))
            return asset($asset);

        $cdns = Config::get('app.cdn');
        $assetName = basename($asset);

        $assetName = explode("?", $assetName);
        $assetName = $assetName[0];

        foreach ($cdns as $cdn => $types) {
            if (preg_match('/^.*\.(' . $types . ')$/i', $assetName))
                return self::cdnPath($cdn, $asset);
        }

        end($cdns);
        return self::cdnPath(key($cdns), $asset);
    }

    private static function cdnPath($cdn, $asset) {
        return "https://" . rtrim($cdn, "/") . "/" . ltrim($asset, "/");
    }
}
