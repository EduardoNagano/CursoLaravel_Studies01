<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller // Tem apenas UM método PÚBLICO
{
    public function __invoke(Request $request): void // o nome do método público deve ser __invoke
    {
        echo "Single Action Controller";
        echo "<br>";
        echo $this->privateMethod();
    }

    private function privateMethod(): string
    {
        return 'Private Method';
    }
}
