<?php
//--------------------------------------------------------------------------------------------------
//= 初期化
//--------------------------------------------------------------------------------------------------
	include("init_session.php");							//セッション
	include("init_server.php");								//FTPサーバー設定

//--------------------------------------------------------------------------------------------------
//= エラーページに移動する関数
//--------------------------------------------------------------------------------------------------
	function Error($msg){
		$_SESSION[ "ErrorMsg" ] = $msg;
		header('Location: error.php');
	}

//--------------------------------------------------------------------------------------------------
//= サムネイルを描画する関数
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
//= ファイルリスト取得を取得し整形する関数
//--------------------------------------------------------------------------------------------------
	function GetFileList($FTP){
		//ファイルリストを取得
		$f = ftp_nlist( $FTP, "/" );
		//"." ".." "count.txt" を無視し整形
		$ret = array();
		$num = count($f);
		for( $i=0;$i<$num;$i++ ){
			if( $f[$i] != "." and $f[$i] != ".." and $f[$i] != "count.txt" and $f[$i] != "t" )
			array_push($ret, $f[$i]);
		}
		return $ret;
	}

//--------------------------------------------------------------------------------------------------
//= ページをリロードする関数
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