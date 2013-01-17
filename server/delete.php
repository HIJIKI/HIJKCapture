<?php
	//----------------------------------------------------------------------------------------------
	//= 初期化
	//----------------------------------------------------------------------------------------------
		include("init.php");

	//----------------------------------------------------------------------------------------------
	//= セッションを取得
	//----------------------------------------------------------------------------------------------
		$UserName = $_SESSION["UserName"];
		$Password = $_SESSION["Password"];
		$FileName = $_GET["file"];

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
			<!--プレビュー-->
			<?php
				$Path = $UserName."/".$FileName;
				print("<p class=\"tcentering\"><a href=\"".$Path."\"><img src=\"".$Path."\" class=\"preview delete\"></a></p>");
			?>
			<!--警告-->
			<div class="alert tcentering">
				<h4 class="alert-heading">画像の削除<br><br></h4>
				削除した画像は元に戻せません。<br>
				この画像を削除しますか？
			</div>
			<!--ボタン-->
			<p class="tcentering">
			<?php
				//削除ボタン
				print("<a class=\"btn btn-danger\" href=\"./delete_start.php?file=".$FileName."\"><i class=\"icon-white icon-trash\"></i>　削除する</a>");
				//セパレータ
				print("　｜　");
				//戻るボタン
				print("<a class=\"btn\" href=\"./mypage.php\">キャンセル</a>");
			?>
			</p>
		</div>
	</body>
</html>