<?php 
    $page = 'TechnoTech';

    require_once('header.php'); 
    require_once('./../functions.php');
    require_once('./../config/dbconfig.php');

    define('EXCERPT_LENGTH', 320);
?>

<body>
	<div class="top-container">
		<?php 
            /* Slider */
            require_once('slider.php');
        ?>

        <!-- news -->
        <div class="line section-news" id="section-news"> 
            <h2 class="home-section">Tech News</h2>
            <hr>
            <?php 
                $postType = 'news';
                $page = 'Tech News';

                $row = showLatestPost($postType, $page, $conn);
                $postUrl = 'single.php?postType='.$postType.'&page='.$page.'&id='.$row->id;
            ?>
            <div class="line main-<?php echo $postType ?>">
                <a href="<?php echo $postUrl ?>">
                    <h3><?php echo $row->title ?></h3>
                </a>
                <div class="col-xs-12 col-md-4">
                    <a href="<?php echo $postUrl ?>">
                        <img class="img-thumbnail" src="<?php echo $row->featureImage ?>">
                    </a>
                </div>
                <div class="col-xs-12 col-md-8">
                    <p>
                        <?php echo substr(($row->content), 0, EXCERPT_LENGTH); ?>
                        <a href="<?php echo $postUrl; ?>">Read More...</a>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>

            <?php
                list4Posts($postType, $page, $conn);
            ?>
            <div class="float-right">
                <a href="archive-<?php echo $postType ?>.php">
                    <button type="button" class="btn btn-primary">View More >></button>
                </a>
            </div>
        </div>
        <!-- END: News Section -->
        <br>
        <!-- wiki -->
        <div class="line section-wiki">
            <h2 class="home-section">Tech Wiki</h2>
            <hr>
            <?php 
                $postType = 'wiki';
                $page = 'Tech Wiki';

                $row = showLatestPost($postType, $page, $conn);
                $postUrl = 'single.php?postType='.$postType.'&page='.$page.'&id='.$row->id;
            ?>
            <div class="line main-<?php echo $postType ?>">
                <a href="<?php echo $postUrl ?>">
                    <h3><?php echo $row->title ?></h3>
                </a>
                <div class="col-xs-12 col-md-8">
                    <p>
                        <?php echo substr(($row->content), 0, EXCERPT_LENGTH); ?>
                        <a href="<?php echo $postUrl; ?>">Read More...</a>
                    </p>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="<?php echo $postUrl ?>">
                        <img class="img-thumbnail" src="<?php echo $row->featureImage ?>">
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
                list4Posts($postType, $page, $conn);
            ?>
            <div class="float-right">
                <a href="archive-<?php echo $postType ?>.php">
                    <button type="button" class="btn btn-primary">View More >></button>
                </a>
            </div>
        </div>
        <!-- END: wiki-section -->
        <br>
        <br>
        <!-- phone-and-computer -->

        <div class="line section-phone-and-computer">
            <!-- phone -->
            <div class="col-xs-12 col-md-6 phone"> 
                <h2 class="home-section">Phone</h2>
                <hr>
                <?php 
                    $postType = 'phone';
                    $page = 'Phone';

                    $row = showLatestPost($postType, $page, $conn);
                    $postUrl = 'single.php?postType='.$postType.'&page='.$page.'&id='.$row->id;
                ?>
                <div class="line main-<?php echo $postType ?>">
                    <div class="col-xs-6 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <h3><?php echo $row->title ?></h3>
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <img class="img-thumbnail" src="<?php echo $row->featureImage ?>" alt="image">
                        </a>
                    </div>
                </div>

                <?php 
                    list2Posts($postType, $page, $conn);
                ?>
                <div class="float-right">
                    <a href="archive-<?php echo $postType ?>.php">
                        <button type="button" class="btn btn-primary">View More >></button>
                    </a>
                </div>
            </div>
            <!-- END phone -->

            <!-- computer -->
            <div class="col-xs-12 col-md-6 computer"> 
                <h2 class="home-section">Computer</h2>
                <hr>
                <?php 
                    $postType = 'computer';
                    $page = 'Computer';

                    $row = showLatestPost($postType, $page, $conn);
                    $postUrl = 'single.php?postType='.$postType.'&page='.$page.'&id='.$row->id;
                ?>
                <div class="line main-<?php echo $postType ?>">
                    <div class="col-xs-6 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <h3><?php echo $row->title ?></h3>
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-12">
                        <a href="<?php echo $postUrl ?>">
                            <img class="img-thumbnail" src="<?php echo $row->featureImage ?>" alt="image">
                        </a>
                    </div>
                </div>

                <?php 
                    list2Posts($postType, $page, $conn);
                ?>
                
            </div>
            <div class="float-right">
                <a href="archive-<?php echo $postType ?>.php">
                    <button type="button" class="btn btn-primary">View More >></button>
                </a>
            </div>
            <!-- END computer -->
            <div class="clearfix"></div>
        </div>
        <!-- END phone-and-computer -->
        <br>
        
        <!-- Camera Section -->
        <div class="line section-camera">
            <h2 class="home-section">Camera</h2>
            <hr>
            <?php 
                $postType = 'camera';
                $page = 'Camera';

                $row = showLatestPost($postType, $page, $conn);
                $postUrl = 'single.php?postType='.$postType.'&page='.$page.'&id='.$row->id;
            ?>
            <div class="line main-<?php echo $postType ?>">
                <a href="<?php echo $postUrl ?>">
                    <h3><?php echo $row->title ?></h3>
                </a>
                <div class="col-xs-12 col-md-8">
                    <p>
                        <?php echo substr(($row->content), 0, EXCERPT_LENGTH); ?>
                        <a href="<?php echo $postUrl; ?>">Read More...</a>
                    </p>
                </div>
                <div class="col-xs-12 col-md-4">
                    <a href="<?php echo $postUrl ?>">
                        <img class="img-thumbnail" src="<?php echo $row->featureImage ?>">
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php
                list4Posts($postType, $page, $conn);
            ?>
            <div class="float-right">
                <a href="archive-<?php echo $postType ?>.php">
                    <button type="button" class="btn btn-primary">View More >></button>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- END: Camera Section -->
        <!-- END CONTENT -->
	</div>

<?php require_once('footer.php'); ?>