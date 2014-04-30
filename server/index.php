<?php
//--------------------------------------------------------------------------------------------------
//= インデックス
//--------------------------------------------------------------------------------------------------

	//----------------------------------------------------------------------------------------------
	//= 初期化
	//----------------------------------------------------------------------------------------------
		include("init.php");

	//----------------------------------------------------------------------------------------------
	//= セッションを取得
	//----------------------------------------------------------------------------------------------
		$UserName = $_COOKIE["UserName"];
		$Password = $_COOKIE["Password"];

	//----------------------------------------------------------------------------------------------
	//= ページ設定
	//----------------------------------------------------------------------------------------------
		$PageTitle = "HIJKCapture";

	//----------------------------------------------------------------------------------------------
	//= バージョン情報
	//----------------------------------------------------------------------------------------------
		$ServerVersion = "1.2.0";
		$ClientVersion = "1.2.0";
?>

<!--------------------------------------------------------------------------------------------------
//= 以下ページ出力
--------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="ja">
	<?php
		include('html_head.php');
	?>
	<body>
		<div class="container">
			<div class="pagetitle">
				HIJKCapture
			</div>
			<div class="versioninfo">
				サーバーのバージョン : <?php print($ServerVersion); ?><br>
				対応クライアントのバージョン : <?php print($ClientVersion); ?><br>
			</div>
			<div class="form-login">
				<div class="form-title">
					ログイン
				</div>
				<form name="login" method="post" action="login.php"  style="text-align:center;">
					<input name="UserName"	type="text" value="<?php print($UserName); ?>" placeholder="UserName" class="input-block-level"><br>
					<input name="Password"	type="password" value="<?php print($Password); ?>" placeholder="Password" class="input-block-level"><br>
					<input class="btn btn-primary" name="Submit"	type="submit" value="ログイン"><br>
			</div>
		</div>
	</body>
</html>