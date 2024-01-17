<?php 
namespace App\Lib;

class Utils {

    static function no_cache_headers() {
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
    }

    static function check_login_redirect() {
        if (!isset($_SESSION['user'])) {
            header('location: /login');
            exit();
        }
    }

    static function is_role( $role ) {
        return (
            isset($_SESSION['user']['role']) 
            && ($_SESSION['user']['role'] == $role)
        );
    }

    static function is_active($path) {
        $fullUrl = "http";
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on") {
            $fullUrl .= "s";
        }
        $fullUrl .= "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        
        // Parse the URL
        $urlParts = parse_url($fullUrl);
    
        if($path == $urlParts['path']) {
            return 'active';
        }
    }
}