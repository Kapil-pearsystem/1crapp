<?php
if (!function_exists('FindDistance')) {
    function FindDistance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return number_format(($miles * 1.609344), 2);
            } else if ($unit == "N") {
                return number_format(($miles * 0.8684), 2);
            } else {
                return number_format($miles, 2);
            }
        }
    }
}
if (!function_exists('get_all_name')) {
    function get_all_name($name)
    {
        $words = explode(' ', $name);
        $first_name = "";
        $middle_name = "";
        $last_name = "";

        if (count($words) == 2) {
            $first_name = $words[0];
            $last_name = $words[1];
        } elseif (count($words) == 3) {
            $first_name = $words[0];
            $middle_name = $words[1];
            $last_name = $words[2];
        } elseif (count($words) >= 4) {
            $first_name = $words[0];
            $middle_name = $words[1];
            $last_name = implode(' ', array_slice($words, 2)); // Combine all remaining words into last name
        } else {
            $first_name = $name;
        }
        return [
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name
        ];
    }
}
if (!function_exists('file_is_exist')) {
    function file_is_exist($url)
    {
        $headers = @get_headers($url);
        if ($headers && strpos($headers[0], '200') !== false) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('check_subdomain')) {
    function check_subdomain()
    {
        $host = request()->getHost();
        $parts = explode('.', $host);
        // If there are more than 2 parts, it usually means there's a subdomain
        $hasSubdomain = count($parts) > 2;
        $subdomain = $hasSubdomain ? $parts[0] : null;
        return $subdomain;
    }
}
if (!function_exists('previous_baseurl')) {
    function previous_baseurl()
    {
        $previousUrl = url()->previous();
        $parsedUrl = parse_url($previousUrl);
        $previousBaseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];
        return $previousBaseUrl;
    }
}
if (!function_exists('calculateRentPenalty')) {
    function calculateRentPenalty($basicRent, $dueDate, $penaltySetting, $collectionYear, $collectionMonth)
    {
        if (!$penaltySetting || empty($dueDate) || $basicRent <= 0 || empty($collectionYear) || empty($collectionMonth)) {
            return 0;
        }

        $today = \Carbon\Carbon::today();
        $collectionDate = \Carbon\Carbon::create((int) $collectionYear, (int) $collectionMonth, 1);

        $dueDate = (int) $dueDate;
        $penalty1Day = (int) $penaltySetting->penalty1_day;
        $penalty2Day = (int) $penaltySetting->penalty2_day;
        $penalty3Day = (int) $penaltySetting->penalty3_day;

        // Future collection month = No penalty
        if ($collectionDate->greaterThan($today->copy()->startOfMonth())) {
            return 0;
        }

        // Previous collection month = Penalty 3
        if ($collectionDate->lessThan($today->copy()->startOfMonth())) {
            $rate = $penaltySetting->penalty3;
            return round($basicRent * $rate / 100, 2);
        }

        // Current collection month
        $currentDay = $today->day;

        // Due date to Rule 1 = No penalty
        if ($currentDay <= $penalty1Day) {
            return 0;
        }

        // After Rule 1 up to Rule 2 = Penalty 1
        if ($currentDay < $penalty2Day) {
            $rate = $penaltySetting->penalty1;
        }
        // Rule 2 up to Rule 3 = Penalty 2
        elseif ($currentDay < $penalty3Day) {
            $rate = $penaltySetting->penalty2;
        }
        // Rule 3 onward = Penalty 3
        else {
            $rate = $penaltySetting->penalty3;
        }

        return round($basicRent * $rate / 100, 2);
    }
}
