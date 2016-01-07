<?php

namespace App\Http;

class Flash {

    private function create($title, $message, $info, $key = 'flash_message')
    {
        session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $info
        ]);
    }

    public function info($title, $message)
    {
        $this->create($title, $message, 'info');
    }

    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }

    public function overlay($title, $message, $level = 'success')
    {
        $this->create($title, $message, $level, 'flash_message_overlay');
    }
}