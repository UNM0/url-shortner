<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TestException extends Exception
{
    public function report(Request $request)
    {
        Log::info('error Occured');
    }
    public function render(Request $request)
    {
        return "hello world!";
    }
}
