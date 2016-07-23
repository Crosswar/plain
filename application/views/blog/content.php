

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">contact@plainhealing.org</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?=  base_url()?>home/">Home</a>
                    </li>
                    <li>
                        <a href="about.html">Answers</a>
                    </li>
                    <li>
                        <a href="post.html">Campaign</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Articles</h1>
                        <hr class="small">
                        <span class="subheading">Nutrition, Medicine, Psychology and more</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

              <?php foreach($posts as $post) { ?>
                <div class="post-preview">
                  <a href="<?=  base_url()?>blog/post/<?=$post['slug'];?>">
                    <h2 class="post-title">
                        <?=$post['post_title'];?>
                    </h2>
                    <h3 class="post-subtitle">
                        Problems look mighty small from 150 miles up
                    </h3>
                  </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                </div>
                <hr>
              <?php } ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                      <?php if (count($pages) >= 1 ) { ?>
                        <?=$pages?><span>More Posts &rarr;</span>
                      <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

