<?php

namespace Wazly\Coco;

class Color
{
    private $defs;

    private $text_colors = [
        'black' => 30,
        'red' => 31,
        'green' => 32,
        'yellow' => 33,
        'blue' => 34,
        'magenta' => 35,
        'cyan' => 36,
        'light gray' => 37,
        'default' => 39,
        'dark gray' => 90,
        'light red' => 91,
        'light green' => 92,
        'light yellow' => 93,
        'light blue' => 94,
        'light magenta' => 95,
        'light cyan' => 96,
        'white' => 97,
    ];

    private $background_colors = [
        'black' => 40,
        'red' => 41,
        'green' => 42,
        'yellow' => 43,
        'blue' => 44,
        'magenta' => 45,
        'cyan' => 46,
        'light gray' => 47,
        'default' => 49,
        'dark gray' => 100,
        'light red' => 101,
        'light green' => 102,
        'light yellow' => 103,
        'light blue' => 104,
        'light magenta' => 105,
        'light cyan' => 106,
        'white' => 107,
    ];

    public function __construct($defs = [])
    {
        $this->defs = $defs;
    }

    public function __invoke($message, $status = 'default', $new_line = false)
    {
        $def = $this->defs[$status];
        $text_color = isset($def['text']) ? (string)$def['text'] : 'default';
        $text_code = $this->text_colors[$text_color];
        $background_color = isset($def['background']) ? (string)$def['background'] : 'default';
        $background_code = $this->background_colors[$background_color];
        return "\033[{$text_code};{$background_code}m" . $message . "\033[0m" . ($new_line ? PHP_EOL : '');
    }
}
