<?php

namespace Wazly\Coco;

class Talk
{
    private $defs;
    private $reply;
    private $result;

    public function __construct($defs = [])
    {
        if (!isset($defs['question'])) {
            $defs['question'] = '';
        }
        if (!isset($defs['default'])) {
            $defs['default'] = null;
        }
        if (!isset($defs['expect'])) {
            $defs['expect'] = [];
        }
        $this->defs = $defs;
    }

    public function start()
    {
        if (is_null($this->defs['default'])) {
            echo $this->defs['question'] . ($this->defs['question'] === '' ? '' : ': ');
        } else {
            echo $this->defs['question'] . ' [' . $this->defs['default'] . ']: ';
        }
        $reply = trim(fgets(STDIN));
        if ($reply === '' && isset($this->defs['default'])) {
            $reply = $this->defs['default'];
        }
        $this->reply = $reply;

        return $this;
    }

    public function reply()
    {
        return $this->reply;
    }

    public function result()
    {
        return in_array($this->reply, (array)$this->defs['expect']);
    }
}
