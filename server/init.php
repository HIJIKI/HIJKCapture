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
		$UserName	= $_COOKIE["UserName"];
		$FilePath	= "./".$UserName."/".$file.".png";
		$FilePathT	= "./".$UserName."/".$file.".thumb.png";
		$LinkPath	= "open.php?file=".$file.".png";
		$put = "<a class=\"span1 thumbnail\" href=\"$LinkPath\"><img src=\"$FilePathT\"></a>";
		print($put);
	}

//--------------------------------------------------------------------------------------------------
//= array ファイルリストを取得し整形する関数
//--------------------------------------------------------------------------------------------------
	function GetFileList($FTP){
		//ファイルリストを取得
		$f = ftp_nlist( $FTP, "" );
		//"." ".." ".thumb" ".stamp" "Thumbs.db" を無視し整形
		$ret = array();
		$num = count($f);
		for( $i=0;$i<$num;$i++ ){
			if( $f[$i] != "." ){
				if( $f[$i] != ".." ){
					if( substr_count($f[$i], ".thumb") == 0 ){
						if( substr_count($f[$i], ".stamp") == 0 ){
							if( substr_count($f[$i], "Thumbs.db") == 0 ){
								$push = mb_convert_encoding($f[$i], "SJIS", "auto");
								array_push($ret, $push);
							}
						}
					}
				}
			}
		}
		return $ret;
	}

//--------------------------------------------------------------------------------------------------
//= array タイムスタンプを取得
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
		$ServerIP = $GLOBALS['ServerIP'];
		$URL = "";
		$URL = $URL."http://";
		$URL = $URL.$ServerIP."/";
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

//--------------------------------------------------------------------------------------------------
//= ログインしているかをチェックし、していなければindexへ戻す関数
//--------------------------------------------------------------------------------------------------
	function LoginCheck() {
		if( !isset($_COOKIE["UserName"]) ){
			if( !isset($_COOKIE["Password"]) ){
				header('Location: ./');
				exit();
			}
		}
	}
?>