<?php
namespace App\Http\Controllers;

use Cache;
use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index(){
        $envierment= App::enviroment();
        var_dump($envierment);
    }
}