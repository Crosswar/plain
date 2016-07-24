
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
                        <?=$post['post_headline'];?>
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

