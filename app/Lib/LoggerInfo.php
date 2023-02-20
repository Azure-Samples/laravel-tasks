<?php
namespace App\Lib;
use Illuminate\Support\Facades\Log;

class LoggerInfo {

    protected $log;

    public function __construct($name, $type = "daily")
    {
        $this->log = new Log();
        $this->log::setDefaultDriver($type);
        $this->log::info("Executing: {$name}");
    }

    public function info($message) {
    	$this->log::info($message);
    }

    public function warning($message) {
    	$this->log::warning($message);
    }

    public function commandOutput($messages) {
    	foreach($messages AS $message) {
    		$this->info($message);
    		echo "$message \r\n";
    	}
    }
}