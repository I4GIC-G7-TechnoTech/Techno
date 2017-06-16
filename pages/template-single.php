<?php 
    require_once('./../config/dbconfig.php');
    require_once('./../functions.php');
?>

<body>
    <div class="top-container">
        <?php 
            $row = getPostById($postType, $id, $conn);

            /* Navbar */
            require_once('navbar.php');
        ?>

        <!-- Title -->
        <div class="archive-title">
            <h2><?php echo $row->title ?></h2>
            <hr>
        </div>

        <!-- Title -->
        <div class="phone-content">
            <div class="col-xs-12 col-md-5">
                <img class="img-thumbnail" src="<?php echo $row->featureImage ?>" alt="phone-image">
            </div>
            <div class="col-xs-12 col-md-7">
                <?php echo $row->content ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- related-post -->
        <div class="related-post">
            <h3>Related Posts</h3>
            <hr>
            <?php listRelatedPosts($postType, $id, $conn); ?>
            