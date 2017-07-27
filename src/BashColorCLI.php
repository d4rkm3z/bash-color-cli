<?php

namespace D4rkm3z;

class BashColorCLI
{
    protected static function getFontColor($colorCode)
    {
        $font_colors = [
            'black' => '0;30',
            'dark_gray' => '1;30',
            'blue' => '0;34',
            'light_blue' => '1;34',
            'green' => '0;32',
            'light_green' => '1;32',
            'cyan' => '0;36',
            'light_cyan' => '1;36',
            'red' => '0;31',
            'light_red' => '1;31',
            'purple' => '0;35',
            'light_purple' => '1;35',
            'brown' => '0;33',
            'yellow' => '1;33',
            'light_gray' => '0;37',
            'white' => '1;37'
        ];
        return isset($font_colors[$colorCode]) ? $font_colors[$colorCode] : false;
    }

    protected static function getBackgroundColor($colorCode)
    {
        $background_colors = [
            'black' => '40',
            'red' => '41',
            'green' => '42',
            'yellow' => '43',
            'blue' => '44',
            'magenta' => '45',
            'cyan' => '46',
            'light_gray' => '47'
        ];
        return isset($background_colors[$colorCode]) ? $background_colors[$colorCode] : false;
    }

    /**
     * Returned colored string
     * If no parameters are given, returns a string without conversion
     *
     * @param string $string
     * @param string $font_color Text color name from @array font_colors
     * @param string $background_color Background color name from @array background_colors
     * @return string
     */
    public static function transformString($string, $font_color = null, $background_color = null)
    {
        $colored_string = "";
        $font_color_code = self::getFontColor($font_color);
        $background_color_code = self::getBackgroundColor($background_color);
        
        $colored_string .= $font_color_code ? '\033[' . self::getFontColor($font_color) . 'm' : '';
        $colored_string .= $background_color_code ? '\033[' . self::getBackgroundColor($background_color) . 'm' : '';
        $colored_string .= $string . '\033[0m';

        return $colored_string;
    }
}