<?php
// Connect to database
class Helpers
{
    public static function get_path($url_string = null)
    {

        
        if (!$url_string) {
            $url_string = $_SERVER['REQUEST_URI'];
        }

        $parse_url = parse_url($url_string);

        $path = $parse_url['path'];

        $refined_path = preg_replace("/\/index.php\/?/is", "", $path);

        return trim($refined_path, "/");

    }

    public static function get_basepath($url_string = null)
    {

        return explode("/", self::get_path($url_string))[0];
    }

    public static function get_path_arrays($url_string = null)
    {
        $path_arrays = explode("/", self::get_path($url_string));
        return array_filter($path_arrays);
    }

    public static function siteURL()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'].'/';
        return $protocol.$domainName;
    }

    public static function server_path($path) {

        return self::siteURL().trim($path, '/');
    }
}
