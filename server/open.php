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
	//= ページ設定
	//----------------------------------------------------------------------------------------------
		$PageTitle = "HIJKCapture - ".$UserName." - ".$FileName;
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
			<div class="urlbar_container">
				<div class="input-prepend tcentering urlbar">
					<span class="add-on">画像URL</span>
					<input class="span5" type="text" value="<?php print(GetImageUrl()); ?>" onclick="this.select(0,this.value.length)">
				</div>
			</div>
			<!--プレビュー-->
			<?php
				$Path = $UserName."/".$FileName;
				print("<p class=\"tcentering\"><a href=\"".$Path."\"><img src=\"".$Path."\" class=\"preview\"></a></p>");
			?>
			<!--ボタン-->
			<p class="tcentering">
			<?php
				//削除ボタン
				print("<a class=\"btn btn-danger\" href=\"./delete.php?file=".$FileName."\"><i class=\"icon-white icon-trash\"></i>　削除する</a>");
				//セパレータ
				print("　｜　");
				//戻るボタン
				print("<a class=\"btn\" href=\"./mypage.php\">マイページへ戻る</a>");
			?>
			</p>
		</div>
	</body>
</html>