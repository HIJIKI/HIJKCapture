<?php
	//----------------------------------------------------------------------------------------------
	//= ������
	//----------------------------------------------------------------------------------------------
		include("init.php");

	//----------------------------------------------------------------------------------------------
	//= �Z�b�V�������擾
	//----------------------------------------------------------------------------------------------
		$UserName = $_SESSION["UserName"];
		$Password = $_SESSION["Password"];
		$FileName = $_GET["file"];

	//----------------------------------------------------------------------------------------------
	//= �y�[�W�ݒ�
	//----------------------------------------------------------------------------------------------
		$PageTitle = "HIJKCapture - ".$UserName." - ".$FileName;
?>

<!--------------------------------------------------------------------------------------------------
//= �ȉ��y�[�W�o��
--------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="ja">
	<?php
		include('html_head.php');
	?>
	<body>
		<div class="container">
			<p class="tcentering">
				<div class="input-prepend tcentering">
					<span class="add-on">�摜��URL�F</span>
					<input class="span5" type="text" value="<?php print(GetImageUrl()); ?>" onclick="this.select(0,this.value.length)">
				</div>
			</p>
			<!--�v���r���[-->
			<?php
				$Path = $UserName."/".$FileName;
				print("<p class=\"tcentering\"><a href=\"".$Path."\"><img src=\"".$Path."\" class=\"preview\"></a></p>");
			?>
			<!--�{�^��-->
			<p class="tcentering">
			<?php
				//�폜�{�^��
				print("<a class=\"btn btn-danger\" href=\"./delete.php?file=".$FileName."\"><i class=\"icon-white icon-trash\"></i>�@�폜����</a>");
				//�Z�p���[�^
				print("�@�b�@");
				//�߂�{�^��
				print("<a class=\"btn\" href=\"./mypage.php\">�}�C�y�[�W�֖߂�</a>");
			?>
			</p>
		</div>
	</body>
</html>