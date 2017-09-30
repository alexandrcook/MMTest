<?php

namespace App\Helpers;

class Helper
{
    public static function getBrowserInfo ($userAgent) {
        //$userAgent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36";
        //$userAgent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Safari/604.1.38";
        //$userAgent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36 OPR/47.0.2631.83";
        //$userAgent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:56.0) Gecko/20100101 Firefox/56.0";

        $browsers = [
            'Chrome' => [
                'has' => ['Chrome', 'Safari'],
                '!has' => 'OPR',
                'readAfter' => 'Chrome'
            ],
            'Safari' => [
                'has' => ['Version', 'Safari'],
                'readAfter' => 'Version'
            ],
            'Opera' => [
                'has' => ['OPR'],
                'readAfter' => 'OPR'
            ],
            'Firefox' => [
                'has' => ['Firefox'],
                'readAfter' => 'Firefox'
            ]
        ];

        $browserIdentificated = '';
        $browserIs = '';
        foreach ($browsers as $key => $browser) {
            foreach ($browser['has'] as $has){
                $try = strripos($userAgent, $has);
                if ($try == false){
                    $browserIdentificated = false;
                    break;
                }else {
                    $browserIdentificated = true;
                }
            }
            if ($browserIdentificated and isset($browser['!has'])){
                $try = strripos($userAgent, $browser['!has']);
                if ($try == false){
                    $browserIdentificated = true;
                }else {
                    $browserIdentificated = false;
                }
            }
            if($browserIdentificated){
                $start = strripos($userAgent, $browser['readAfter'])+(strlen($browser['readAfter']))+1;
                $spacePos = strpos ( $userAgent, ' ', $start);
                if(!$spacePos){
                    $spacePos = strlen($userAgent);
                }
                $length = $spacePos - $start;
                $browserIs=$key . ' - Ver: ' . substr($userAgent, $start, $length);
            }else{
                $brouserIs = 'undefined';
            }
        }

        return $browserIs;
    }
}