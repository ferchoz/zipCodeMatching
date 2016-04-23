<?php

namespace App\Library;

use App\ZipCodes;

/**
 * Class MatchZipCode
 * @package App\Library
 */
class MatchZipCode
{
    /**
     * here is where the magic happens (return the matches)
     * @param $agents array
     * @param $customers array
     * @return array
     */
    static public function getMatch($agents, $customers)
    {
        $agents = array_unique($agents);

        $distances = self::calculate($agents, $customers);

        return self::findBest($distances);
    }

    /**
     * calculate the distance between agents and customers
     * @param $agents array
     * @param $customers array
     * @return array
     */
    static private function calculate($agents, $customers)
    {
        $distances = array();
        foreach ($agents as $agent) {
            $from = ZipCodes::where('zip', $agent)->first();

            foreach ($customers as $customer) {
                $to         = ZipCodes::where('zip', $customer)->first();
                $distance   = self::calcDist($from, $to);
                $distances[$customer][$agent] = $distance;
            }
        }

        return $distances;
    }

    /**
     * find the nearby agent for each customer zip code
     * @param $distances array
     * @return array
     */
    static private function findBest($distances)
    {
        $matches = array();
        foreach ($distances as $customer => $distance) {
            $nearbyAgent = array_keys($distance, min($distance));
            $nearbyAgent = array_shift($nearbyAgent);
            $matches[$nearbyAgent][] = $customer;
        }

        return $matches;
    }

    /**
     * calculate the distance between zip codes
     * @param $from ZipCodes
     * @param $to ZipCodes
     * @return float
     */
    static private function calcDist(ZipCodes $from, ZipCodes $to) {

        $distance = sin(deg2rad($from->latitude))
            * sin(deg2rad($to->latitude))
            + cos(deg2rad($from->latitude))
            * cos(deg2rad($to->latitude))
            * cos(deg2rad($from->longitude - $to->longitude));

        $distance = (rad2deg(acos($distance))) * 69.09;

        return $distance;
    }
}