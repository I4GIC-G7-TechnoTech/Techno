<?php 
	require_once('./../config/dbconfig.php');

	if (isset($_POST['deletePost'])) {
		$id = $_POST['id'];
		$postType = $_POST['postType'];

		$sql = "DELETE FROM $postType WHERE id = $id";
		$result = $conn->query($sql);

		if ($result) {
			header('location: backend.php?status=success&postType='.$postType.'&page='.$page);
		}
		else {
			header('location: news-backend.php?status=fail&postType='.$postType.'&page='.$page);
		}
	}
?>