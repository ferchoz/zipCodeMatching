<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Customer;
use App\Library\MatchZipCode;
use \Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Validator;

class MatchZipController extends BaseController
{
    public function index()
    {
        $agents = Agent::all();

        return view('zipMatching', ['agents' => $agents]);
    }

    /**
     * process the request in search of matches.
     */
    public function matchZipCodes(Request $request)
    {
        $agents = $request->all();

        unset ($agents['_token']);
        $validator = Validator::make($agents, [
            '*' => 'exists:zip_codes,zip',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $customers = DB::table('customers')->groupBy('zip_code')->lists('zip_code');

        $matches   = MatchZipCode::getMatch($agents, $customers);

        $items     = $this->getListOfCustomers($agents, $matches);

        return view('showMatches', ['items' => $items]);
    }

    private function getListOfCustomers($agents, $matches)
    {
        $list = array();

        foreach ($agents as $id => $zip) {
            $agent = Agent::find($id);
            foreach ($matches[$zip] as $contactZip) {
                $customers = Customer::where('zip_code', '=', $contactZip)->get();
                foreach ($customers as $customer) {
                    $list[] = array('agent' => $agent, 'customer' => $customer);
                }
            }
        }

        return $list;
    }
}