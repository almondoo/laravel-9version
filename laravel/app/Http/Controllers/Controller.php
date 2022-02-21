<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * コントローラーは整形及びRequestの操作を行う
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * プレフィックスを削除
     */
    public function RemovePrefixFormating(array $values, string $prefix): array
    {
        $formated = [];
        foreach ($values as $key => $value) {
            $key = str_replace($prefix, '', $key);
            $formated[$key] = $value;
        }

        return $formated;
    }
}
