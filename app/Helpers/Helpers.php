<?php
    if(!function_exists('FindDistance')){
        function FindDistance($lat1, $lon1, $lat2, $lon2, $unit){
            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                return 0;
            }
            else {
                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);
            
                if ($unit == "K") {
                    return number_format(($miles * 1.609344),2);
                } else if ($unit == "N") {
                    return number_format(($miles * 0.8684),2);
                } else {
                    return number_format($miles,2);
                }
            }
        }
    }
    if(!function_exists('get_all_name')){
        function get_all_name($name) {
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
            }else{
                $first_name = $name;
            }
            return [
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name
            ];
        }
    }
    if(!function_exists('file_is_exist')){
        function file_is_exist($url) {
            $headers = @get_headers($url);
            if ($headers && strpos($headers[0], '200') !== false) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    if(!function_exists('check_subdomain')){
        function check_subdomain() {
            $host = request()->getHost();
            $parts = explode('.', $host);
            // If there are more than 2 parts, it usually means there's a subdomain
            $hasSubdomain = count($parts) > 2;
            $subdomain = $hasSubdomain ? $parts[0] : null;
            return $subdomain;
        }
    }
    if(!function_exists('previous_baseurl')){
        function previous_baseurl() {
            $previousUrl = url()->previous();
            $parsedUrl = parse_url($previousUrl);
            $previousBaseUrl = $parsedUrl['scheme'] . '://' . $parsedUrl['host'];
            return $previousBaseUrl;
        }
    }
    
  
    
    
    
    
    
    
    