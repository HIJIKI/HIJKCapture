<?php
//--------------------------------------------------------------------------------------------------
//= �Z�b�V����������
//--------------------------------------------------------------------------------------------------
	$SessionSavePath	= "D:/phpsession/hijkcapture";			//�Z�b�V������ۑ�����p�X
	$SessionName		= "HIJKCaptureUserData";				//�Z�b�V�����̖��O
	$SessionLifeTime	= 60*60*24*30;							//�Z�b�V�����̕ۑ�����(�b)

	session_save_path( "".$SessionSavePath );
	session_name( "".$SessionName );
	ini_set( "session.gc_maxlifetime", $SessionLifeTime );
	session_start();
?>