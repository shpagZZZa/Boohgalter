<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function error(int $errorId)
    {
        $errorMsg = $this->getErrorMsg($errorId);
        dd($errorMsg);
        return view('order.error', compact('errorMsg'));
    }

    private function getErrorMsg($errorId): string
    {
        if ($errorId == 1000)
            return 'Недостаточно ингридиентов на складе';
        return 'Неизвестный код ошибки';
    }
}
