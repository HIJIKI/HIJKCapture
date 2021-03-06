<?php
	//----------------------------------------------------------------------------------------------
	//= 初期化
	//----------------------------------------------------------------------------------------------
		include("init.php");

	//----------------------------------------------------------------------------------------------
	//= セッションを取得
	//----------------------------------------------------------------------------------------------
		$UserName = $_COOKIE["UserName"];
		$Password = $_COOKIE["Password"];
		$FileName = $_GET["file"];

		//ログインしていない場合はindexへジャンプ
		LoginCheck();

	//----------------------------------------------------------------------------------------------
	//= FTPへ接続
	//----------------------------------------------------------------------------------------------
		if( $FTP=ftp_connect($ServerIP, $ServerPort) ){} else {
			Error("データベースサーバーへの接続が失敗しました。<br>
					しばらく経っても改善されない場合は、管理者に知らせてください。");
			exit();
		}
		//ログイン
		if( ftp_login($FTP, $UserNameHeader.$UserName, $Password) ){
			//ファイルを削除
			$name = substr($FileName, 0, 8);
			ftp_delete($FTP, $name.".png");
			ftp_delete($FTP, $name.".thumb.png");
			ftp_delete($FTP, $name.".stamp.txt");
			//マイページへ移動
			header('Location: mypage.php');
		} else {
			Error("ログインに失敗しました。<br>
					ユーザー名またはパスワードが正しくありません。");
			exit();
		}

		//FTP サーバから切断する。
		ftp_close( $FTP );
?>