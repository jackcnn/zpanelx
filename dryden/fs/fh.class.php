<?php

class fs_fh {

    /**
    * Create blank or preformatted file with permissions.
    * @author Bobby Allen (ballen@zpanel.co.uk) 
    * @version 10.0.0
	*/
	static function ResetFile($value) {
	if ($value == ctrl_options::GetOption('cron_file')){
		$new_file  = "#################################################################################\r\n";
		$new_file .= "# CRONTAB FOR ZPANEL CRON MANAGER MODULE                                        #\r\n";
		$new_file .= "# Module Developed by Bobby Allen, 17/12/2009                                   #\r\n";
		$new_file .= "#                                                                               #\r\n";
		$new_file .= "#################################################################################\r\n";
		$new_file .= "# WE DO NOT RECOMMEND YOU MODIFY THIS FILE DIRECTLY, PLEASE USE ZPANEL INSTEAD! #\r\n";
		$new_file .= "#################################################################################\r\n";
		$new_file .= "# CronW Debug infomation can be found in this file here:-                       #\r\n";
		$new_file .= "# C:\WINDOWS\System32\crontab.txt                                               #\r\n";
		$new_file .= "#################################################################################\r\n";
		$new_file .= "0 * * * * ".ctrl_options::GetOption('php_exer')." C:\ZPanel\panel\daemon.php\r\n";
		$new_file .= "#################################################################################\r\n";
		$new_file .= "# DO NOT MANUALLY REMOVE ANY OF THE CRON ENTRIES FROM THIS FILE, USE ZPANEL     #\r\n";
		$new_file .= "# INSTEAD! THE ABOVE ENTRIES ARE USED FOR ZPANEL TASKS, DO NOT REMOVE THEM!     #\r\n";
		$new_file .= "#################################################################################\r\n";
		$fp = fopen(ctrl_options::GetOption('cron_file'),'w');
		fwrite($fp, $new_file);
		fclose($fp);
	}elseif ($value == ctrl_options::GetOption('apache_vhosts')){
		$new_file  = "################################################################\r\n";
		$new_file .= "# Apache VHOST configuration file\r\n";
		$new_file .= "# Automatically generated by ZPanel ".ctrl_options::GetOption('zpanel_version')."\r\n";
		$new_file .= "################################################################\r\n";
		$fp = fopen(ctrl_options::GetOption('apache_vhosts'),'w');
		fwrite($fp, $new_file);
		fclose($fp);	
	}else{
		$new_file = "";
		if (is_dir($value)){
		$fp = fopen($value,'w');
		fwrite($fp, $new_file);
		fclose($fp);
		}
	}
	

	}
	
	
	
	
	static function NewLine() {
		if (sys_versions::ShowOSPlatformVersion() == "Windows"){
			$retval = "\r\n";
		}else{
			$retval = "\n";
		}
	return $retval;
	}
	
}

?>
