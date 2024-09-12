<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PingPongController extends Controller
{
    public function ping() {
        return view('ping', ['word' => 'PING', 'serverInfo' => ['version' => '1.0.0', 'name' => 'mon-premier-projet']]);
    }

    public function pong() {
        return view('pong', ['word' => 'PONG']);
    }
}
