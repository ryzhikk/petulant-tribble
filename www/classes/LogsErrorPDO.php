<?php

    class LogsErrorPDO {
        protected $time;
        protected $point;
        protected $line;
        protected $textError;

        public  function __construct()
        {
            $this->time = date("d-m-o, H:i:s");
            $this->point = $_SERVER['SCRIPT_FILENAME'];
            $this->line = __LINE__;
        }

        public function recordErrorLog($text)
        {
            $this->textError = $text;
            $textLog = $this->time . "\n" .
                        $this->point . "\n" .
                        $this->line . "\n" .
                        $this->textError . "\n\n";
            file_put_contents(LOGS_ERROR_PDO, $textLog, FILE_APPEND | LOCK_EX);
        }

        public static  function readErrorLog()
        {
            $logs = file_get_contents(LOGS_ERROR_PDO);
            return $logs;
        }
    }