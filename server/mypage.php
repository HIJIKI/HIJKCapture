<?php
	//----------------------------------------------------------------------------------------------
	//= ������
	//----------------------------------------------------------------------------------------------
		include("init.php");

	//----------------------------------------------------------------------------------------------
	//= �Z�b�V�������擾
	//----------------------------------------------------------------------------------------------
		$UserName = $_COOKIE["UserName"];
		$Password = $_COOKIE["Password"];

		//���O�C�����Ă��Ȃ��ꍇ��index�փW�����v
		LoginCheck();

	//----------------------------------------------------------------------------------------------
	//= �y�[�W�ݒ�
	//----------------------------------------------------------------------------------------------
		$PageTitle = "HIJKCapture - �}�C�y�[�W";
		$ViewNumber = 100;	//�}�C�y�[�W�ɕ\�������摜����

	//----------------------------------------------------------------------------------------------
	//= �T�[�o�[����摜�t�@�C�����X�g���擾
	//----------------------------------------------------------------------------------------------
		if( $FTP=ftp_connect($ServerIP, $ServerPort) ){} else {
			Error("�f�[�^�x�[�X�T�[�o�[�ւ̐ڑ������s���܂����B<br>
					���΂炭�o���Ă����P����Ȃ��ꍇ�́A�Ǘ��҂ɒm�点�Ă��������B");
			exit();
		}
		//���O�C��
		if( ftp_login($FTP, $UserNameHeader.$UserName, $Password) ){
			//�t�@�C�����X�g���擾
			$FileList = GetFileList($FTP);
			//�^�C���X�^���v���擾
			$TimeStamp = GetTimeStamp($FileList);
			//�^�C���X�^���v�����Ƀt�@�C�����X�g���\�[�g
			array_multisort($TimeStamp, $FileList);
		} else {
			Error("���O�C���Ɏ��s���܂����B<br>
					���[�U�[���܂��̓p�X���[�h������������܂���B");
			exit();
		}

		//FTP �T�[�o����ؒf����B
		ftp_close( $FTP );
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
			<?php
				print($UserName." ����̃}�C�y�[�W<br>");
			?>
			<div class="image-count">
				<i class="icon-picture"></i>
				<?php
					$cnt = count($FileList);
					$n = $ViewNumber;
					if( $cnt != 0 ){
						print(count($FileList)." ���̉摜��������܂����B<br>");
						if( $cnt > $n ){
							print("<div class=\"alert\">");
							print("$n ���𒴂���摜�̓}�C�y�[�W�ɕ\������܂���B �ŐV�� $n ���݂̂�\�����Ă��܂��B");
							print("</div>");
						}
					} else {
						print("�摜�t�@�C����������܂���ł����B");
					}
				?>
			</div>
			<p class="myhr"></p>
			<?php
//				print(var_dump($FileList));
//				print("<br>");
//				print(var_dump($TimeStamp));
				$m = count($FileList);
				$n = $ViewNumber;
				for( $i = 0; $i < $m; $i++ ){
					if( $i >= $n ){
						break;
					}
					$file = substr($FileList[$m-1-$i], 0, 8);
					DrawThumbnail($file);
				}
			?>
			<p class="myhr"></p>
			<a href="./" class="btn">���O�C����ʂ֖߂�</a>
		</div>
	</body>
</html>