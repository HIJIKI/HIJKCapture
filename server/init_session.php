<?php
//--------------------------------------------------------------------------------------------------
//= セッション初期化
//--------------------------------------------------------------------------------------------------
	$SessionSavePath	= "D:/phpsession/hijkcapture";			//セッションを保存するパス
	$SessionName		= "HIJKCaptureUserData";				//セッションの名前
	$SessionLifeTime	= 60*60*24*30;							//セッションの保存期間(秒)

	session_save_path( "".$SessionSavePath );
	session_name( "".$SessionName );
	ini_set( "session.gc_maxlifetime", $SessionLifeTime );
	session_start();
?>