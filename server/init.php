<?php
//--------------------------------------------------------------------------------------------------
//= ������
//--------------------------------------------------------------------------------------------------
	include("init_session.php");							//�Z�b�V����
	include("init_server.php");								//FTP�T�[�o�[�ݒ�

//--------------------------------------------------------------------------------------------------
//= �G���[�y�[�W�Ɉړ�����֐�
//--------------------------------------------------------------------------------------------------
	function Error($msg){
		$_SESSION[ "ErrorMsg" ] = $msg;
		header('Location: error.php');
	}

//--------------------------------------------------------------------------------------------------
//= �T���l�C����`�悷��֐�
//--------------------------------------------------------------------------------------------------
	function DrawThumbnail($file){
//		$UserName = $_SESSION["UserName"];
//		$FilePath = "./".$UserName."/".$file;
//		$FilePathT = "./".$UserName."/t/".$file;
//		$put = "<a class=\"span1 thumbnail\" href=\"$FilePath\" target=\"_blank\"><img src=\"$FilePathT\"></a>";
		$UserName	= $_SESSION["UserName"];
		$FilePath	= "./".$UserName."/".$file;
		$FilePathT	= "./".$UserName."/t/".$file;
		$LinkPath	= "open.php?file=".$file;
		$put = "<a class=\"span1 thumbnail\" href=\"$LinkPath\"><img src=\"$FilePathT\"></a>";
		print($put);
	}

//--------------------------------------------------------------------------------------------------
//= �t�@�C�����X�g�擾���擾�����`����֐�
//--------------------------------------------------------------------------------------------------
	function GetFileList($FTP){
		//�t�@�C�����X�g���擾
		$f = ftp_nlist( $FTP, "/" );
		//"." ".." "count.txt" �𖳎������`
		$ret = array();
		$num = count($f);
		for( $i=0;$i<$num;$i++ ){
			if( $f[$i] != "." and $f[$i] != ".." and $f[$i] != "count.txt" and $f[$i] != "t" )
			array_push($ret, $f[$i]);
		}
		return $ret;
	}

//--------------------------------------------------------------------------------------------------
//= �y�[�W�������[�h����֐�
//--------------------------------------------------------------------------------------------------
	function GetImageUrl(){
		$UserName = $_SESSION["UserName"];
		$FileName = $_GET["file"];
		$URL = "";
		$URL = $URL."http://";
		$URL = $URL.$_SERVER["SERVER_NAME"]."/";
		$URL = $URL."hijkcapture/";
		$URL = $URL.$UserName."/";
		$URL = $URL.$FileName;
		return $URL;
	}

?>