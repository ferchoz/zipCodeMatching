<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;


class MatchZipController extends BaseController
{
    /**
     * Show the profile for the given user.
     */
    public function matchZipCodes(Request $request)
    {
        $from = array();
        $from[] = $request->input('agent1');
        $from[] = $request->input('agent2');

        dump($from);die;
        return view('zipMatching', ['user' => 'pepepe']);


    }
}