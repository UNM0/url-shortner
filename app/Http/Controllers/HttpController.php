<?php

namespace App\Http\Controllers;

use App\Exceptions\TestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Joke;
use Exception;

class HttpController extends Controller
{
    public function index()
    {
        // try {
        $response = Http::get('https://official-joke-api.appspot.');
        // } catch (Exception $e) {
        // return "Exception Occured";
        // throw new TestException;
        // }
        $response = json_decode($response->body());
        $joke = new Joke();
        $joke->type = $response->type;
        $joke->joke = $response->setup  . '' .  $response->punchline;
        $joke->save();
        return $joke;
    }

    public function post_request()
    {
        $request = Http::post('https://httpbin.org/post', [
            'id' => 1,
            'name' => 'Nunam Rai',
            'age' => 20,
            'class' => 'laravel',

        ]);
        return $request->failed();
        // return $request->successful();
        // return $request;
    }
}
