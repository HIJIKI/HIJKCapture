<?php
//--------------------------------------------------------------------------------------------------
//= �C���f�b�N�X
//--------------------------------------------------------------------------------------------------

	//----------------------------------------------------------------------------------------------
	//= ������
	//----------------------------------------------------------------------------------------------
		include("init.php");

	//----------------------------------------------------------------------------------------------
	//= �Z�b�V�������擾
	//----------------------------------------------------------------------------------------------
		$UserName = $_SESSION["UserName"];
		$Password = $_SESSION["Password"];

	//----------------------------------------------------------------------------------------------
	//= �y�[�W�ݒ�
	//----------------------------------------------------------------------------------------------
		$PageTitle = "HIJKCapture"

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
			<div class="pagetitle">
				HIJKCapture
			</div>
			<div class="form-login">
				<div class="form-title">
					���O�C��
				</div>
				<form name="login" method="post" action="login.php"  style="text-align:center;">
					<input name="UserName"	type="text" value="<?php print($UserName); ?>" placeholder="UserName" class="input-block-level"><br>
					<input name="Password"	type="password" value="<?php print($Password); ?>" placeholder="Password" class="input-block-level"><br>
					<input class="btn btn-primary" name="Submit"	type="submit" value="���O�C��"><br>
			</div>
		</div>
	</body>
</html>