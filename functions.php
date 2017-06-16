
<!-- Display Functions -->
<?php   
	function showAlertMessage() {
		if (isset($_GET['status'])) {
	        $status = $_GET['status'];
	        if ($status == "success") {
	            echo '
	                <div class="alert alert-success fade in">
	                    <a href="#" class="close" data-dismiss="alert">&times;</a>
	                    <strong>Request Success!</strong>
	                </div>
	            ';
	        }
	        else if ($status == "fail") {
	            echo '
	                <div class="alert alert-danger fade in">
	                    <a href="#" class="close" data-dismiss="alert">&times;</a>
	                    <strong>Request Failed!</strong>
	                </div>
	            ';
	        }
	    }
	}
?>

<?php 
	function showDeleteButton($id, $action, $postType) { ?>
		<!-- Delete Button -->
		<button type='button' class='btn btn-danger btn-xs' id='btn-delete' data-toggle='modal' data-target=<?php echo '#delete-'.$id ?>>
            <i class='fa fa-trash' aria-hidden='true'></i>
        </button>

        <!-- Delete Modal -->
		<div class='modal fade' id=<?php echo 'delete-'.$id ?> tabindex='-1' role='dialog' aria-labelledby='update-post'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Are you sure you want to delete this post?</h4>
                    </div>
                    <form method='POST' action=<?php echo $action ?>>
                        <div class='modal-footer'>
                            <div class='form-group'>
                                <input class='form-control' type='hidden' value=<?php echo $id ?> name='id'>
                                <input class='form-control' type='hidden' value=<?php echo $postType ?> name='postType'>
                                <button class='btn btn-success' type='submit' name='deletePost'>Confirm</button>
                                <button class='btn btn-danger' type='button' data-dismiss='modal' aria-hidden='true'>Cancel</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
	<?php
	}
?>

<?php 
	function showUpdateButton($id, $action, $title, $content, $postType) { ?>
		<!-- Update Button -->
		<button type='button' class='btn btn-warning btn-xs' id='btn-update' data-toggle='modal' data-target=<?php echo '#update-'.$id ?>>
            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
        </button>

        <!-- Update Modal -->
		<div class='modal fade' id=<?php echo 'update-'.$id ?> tabindex='-1' role='dialog' aria-labelledby='update-post'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4>Update Post</h4>
                    </div>
                    <form method='POST' action=<?php echo $action ?>>
                    	<div class='modal-body'>
                    		<div class="form-group">
		                        <label><h3>Title</h3></label>
		                        <input class="form-control" type="text" name="title" placeholder="Title Here" value="<?php echo $title ?>">
		                    </div>

		                    <div class="form-group">
		                        <label><h3>Content</h3></label>
		                        <textarea class="tinymce" name="content"><?php echo $content ?></textarea>
		                    </div>
                    	</div> 
                        <div class='modal-footer'>
                            <div class='form-group'>
                                <input class='form-control' type='hidden' value=<?php echo $id ?> name='id'>
                                <input class='form-control' type='hidden' value=<?php echo $postType ?> name='postType'>
                                <button class='btn btn-success' type='submit' name='updatePost'>Update</button>
                                <button class='btn btn-danger' type='button' data-dismiss='modal' aria-hidden='true'>Cancel</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
	<?php
	}
?>

<?php 
function prepareUploadedImage($imageType) {
    if (isset($imageType)) {
        if ($imageType == $_FILES['featureImage']) {
            $type = "f";
        }
        else if ($imageType == $_FILES['postImage']) {
            $type = "p";
        }

        $imgGallary = './../public/img/imgGallery/';
        $fileTmpName = $imageType['tmp_name'];
        $fileExtension = pathinfo($imageType['name'])['extension'];
        $fileName = $type.time().".$fileExtension";
        $target = $imgGallary.$fileName;
        $fileSize = $imageType['size'];

        // Check uploaded file size
        if ($fileSize <= 5242880) {
            if (in_array($fileExtension, ['jpg', 'png'])) {
                if (move_uploaded_file($fileTmpName, $target)) {
                    return $target;
                }
                else {
                    header('location:add-backend.php?status=fail&postType='.$postType.'&page='.$page);
                }
            }
            else {
                header('location: add-backend.php?status=fail&postType='.$postType.'&page='.$page);
            }
        }
        else {
            header('location: add-backend.php?status=fail&postType='.$postType.'&page='.$page);
        }
    }
} 
?>

<!-- Query Fuctions -->
<?php 
    function list2Posts($postType, $conn) {
        $num_post = 3;
        $sql = "SELECT * FROM $postType ORDER BY updated DESC LIMIT $num_post";
        $result = $conn->query($sql);

        $num_rows = $result->num_rows;
        $row = array();
        while ($row[] = $result->fetch_object());
        ?>

        <div class="line sub-<?php echo $postType ?>">
        <?php
            for($i=1; $i<$num_post; $i++) { 
                $postUrl = 'single.php?postType='.$postType.'&id='.$row[$i]->id; 
                ?>
                <div class="col-xs-12 col-md-6 sub-post">
                    <div class="col-xs-4 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <img class="img-thumbnail img-feature" src="<?php echo $row[$i]->featureImage ?>">
                        </a>
                    </div>
                    <div class="col-xs-8 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <h4 class="post-tilte"><?php echo $row[$i]->title ?></h4>
                        </a>
                    </div>
                </div>
        <?php
            }
        ?>
        <div class="clearfix"></div>
        </div>
<?php    
    }
?>

<?php 
    function list4Posts($postType, $conn) {
        $num_post = 5;
        $sql = "SELECT * FROM $postType ORDER BY updated DESC LIMIT $num_post";
        $result = $conn->query($sql);

        $num_rows = $result->num_rows;
        $row = array();
        while ($row[] = $result->fetch_object());
        ?>

        <div class="line sub-<?php echo $postType ?>">
        <?php
            for($i=1; $i<$num_post; $i++) { 
            $postUrl = 'single.php?postType='.$postType.'&id='.$row[$i]->id; 
        ?>
                <div class="col-xs-12 col-md-3 sub-post">
                    <div class="col-xs-4 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <img class="img-thumbnail img-feature" src="<?php echo $row[$i]->featureImage ?>">
                        </a>
                    </div>
                    <div class="col-xs-8 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <h4 class="post-tilte"><?php echo $row[$i]->title ?></h4>
                        </a>
                    </div>
                </div>
        <?php
            }
        ?>
        <div class="clearfix"></div>
        </div>
<?php    
    }
?>

<?php 
    function showLatestPost($postType, $conn) {
        $sql = "SELECT * FROM $postType ORDER BY updated DESC LIMIT 1";
        $result = $conn->query($sql);
        return $row = $result->fetch_object();
    }
?>

<?php 
    function getPostById($postType, $id, $conn) {
        $sql = "SELECT * FROM $postType WHERE id = $id";
        $result = $conn->query($sql);
        return $row = $result->fetch_object();
    }
?>

<?php 
    function listRelatedPosts($postType, $id, $conn) {
        $num_post = 5;
        $sql = "SELECT * FROM $postType WHERE id <> $id LIMIT $num_post";
        $result = $conn->query($sql);

        $num_rows = $result->num_rows;
        $row = array();
        while ($row[] = $result->fetch_object());
        ?>

        <div class="line sub-<?php echo $postType ?>">
        <?php
            for($i=1; $i<$num_post; $i++) { 
                $postUrl = 'single.php?postType='.$postType.'&id='.$row[$i]->id;
        ?>
                <div class="col-xs-12 col-md-3 sub-post">
                    <div class="col-xs-4 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <img class="img-thumbnail img-feature" src="<?php echo $row[$i]->featureImage ?>">
                        </a>
                    </div>
                    <div class="col-xs-8 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <h4 class="post-tilte"><?php echo $row[$i]->title ?></h4>
                        </a>
                    </div>
                </div>
        <?php
            }
        ?>
        <div class="clearfix"></div>
        </div>
<?php    
    }
?>