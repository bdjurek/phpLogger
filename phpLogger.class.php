<?php

	/**
	*   phpLogger v0.0.3
	**/
	
	class phpLogger
	{
		public $logFilePath;
		public $separator = " | ";
		private $dateTimeTemplate = "d-m-Y H:i";

		public function __construct($filePath = null)
		{

			// check if the constructor was called with parameter
			if(!empty($filePath)){

				// if called constructor with parameter
				if(!file_exists($filePath)){

					// create directories that doesnt exist
					if (!file_exists(dirname($filePath))) {
						mkdir(dirname($filePath), 0755, true);
					}

				}
			
			}else{
				$filePath = "untitled.log";
			}
			
			// set log file's path
			$this->logFilePath = $filePath;

		}

		public function write(){
				
			$time = date($this->dateTimeTemplate);
			$data = array_merge(array($time), func_get_args());
			$record = implode($this->separator, $data)."\n"; 
			
			$log = fopen($this->logFilePath, 'a+');
			fwrite($log, $record);
			fclose($log);
			
		}

		public function read($numberOfLogs){
			
			$logArray = array();
			$file = file($this->logFilePath);
			$linesInFile = count($file);

			if($linesInFile - $numberOfLogs < 0){
				$downlimit = 0;
			}else{
				$downlimit = $linesInFile-$numberOfLogs;
			}

			for ($i = $linesInFile - 1; $i >= $downlimit; $i--) {
			 	array_push($logArray, $file[$i]);
			}

			return $logArray;
		}

	}
?>
