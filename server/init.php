<?php
//--------------------------------------------------------------------------------------------------
//= 初期化
//--------------------------------------------------------------------------------------------------
	include("init_session.php");							//セッション
	include("init_cookie.php");								//クッキー
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
		$UserName	= $_COOKIE["UserName"];
		$FilePath	= "./".$UserName."/".$file.".png";
		$FilePathT	= "./".$UserName."/".$file.".thumb.png";
		$LinkPath	= "open.php?file=".$file.".png";
		$put = "<a class=\"span1 thumbnail\" href=\"$LinkPath\"><img src=\"$FilePathT\"></a>";
		print($put);
	}

//--------------------------------------------------------------------------------------------------
//= array ファイルリスト取得を取得し整形する関数
//--------------------------------------------------------------------------------------------------
	function GetFileList($FTP){
		//ファイルリストを取得
		$f = ftp_nlist( $FTP, "/" );
		//"." ".." ".thumb" ".stamp" を無視し整形
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
//= array タイムスタンプ配列取得
//--------------------------------------------------------------------------------------------------
	function GetTimeStamp($f){
		$UserName = $_COOKIE["UserName"];
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
//= str 画像のURLを返す
//--------------------------------------------------------------------------------------------------
	function GetImageUrl(){
		$UserName = $_COOKIE["UserName"];
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
//= str 短縮URLを生成し返す
//--------------------------------------------------------------------------------------------------
	function GetTinyUrl($url) {
		return file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
	}
?>