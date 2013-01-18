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
		$FilePath	= "./".$UserName."/".$file.".png";
		$FilePathT	= "./".$UserName."/".$file.".thumb.png";
		$LinkPath	= "open.php?file=".$file.".png";
		$put = "<a class=\"span1 thumbnail\" href=\"$LinkPath\"><img src=\"$FilePathT\"></a>";
		print($put);
	}

//--------------------------------------------------------------------------------------------------
//= array �t�@�C�����X�g�擾���擾�����`����֐�
//--------------------------------------------------------------------------------------------------
	function GetFileList($FTP){
		//�t�@�C�����X�g���擾
		$f = ftp_nlist( $FTP, "/" );
		//"." ".." ".thumb" ".stamp" �𖳎������`
		$ret = array();
		$num = count($f);
		for( $i=0;$i<$num;$i++ ){
			if( $f[$i] != "." ){
				if( $f[$i] != ".." ){
					if( substr_count($f[$i], ".thumb") == 0 ){
						if( substr_count($f[$i], ".stamp") == 0 ){
							array_push($ret, "".$f[$i]);
						}
					}
				}
			}
		}
		return $ret;
	}

//--------------------------------------------------------------------------------------------------
//= array �^�C���X�^���v�z��擾
//--------------------------------------------------------------------------------------------------
	function GetTimeStamp($f){
		$UserName = $_SESSION["UserName"];
		$ret = array();
		$num = count($f);
		for( $i=0 ; $i<$num ; $i++ ){
			$name = substr($f[$i], 0, 8);
			$time = file_get_contents("./".$UserName."/".$name.".stamp.txt");
			array_push($ret, "".$time);
		}
		return $ret;
	}

//--------------------------------------------------------------------------------------------------
//= str �摜��URL��Ԃ�
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

//--------------------------------------------------------------------------------------------------
//= str �Z�kURL�𐶐����Ԃ�
//--------------------------------------------------------------------------------------------------
	function GetTinyUrl($url) {
		return file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
	}
?>