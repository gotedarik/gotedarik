<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav itemprop="breadcrumb" class="woocommerce-breadcrumb"><a href="<?=Yii::app()->createurl("site/index")?>">Anasayfa</a><span class="delimiter"><i class="fa fa-angle-right"></i></span><?=$model->title?></nav>

        <div class="col-md-12">
            <main id="main" class="site-main">
                <article class="post type-post status-publish format-gallery has-post-thumbnail hentry" >
                    <div class="media-attachment">
                        <div class="media-attachment-gallery">
                            <div class=" ">
                                <div class="item">
                                    <figure>
                                        <img src="<?=$model->imgM_s3url;?>" class="attachment-post-thumbnail size-post-thumbnail" alt="1" />
                                    </figure>
                                </div><!-- /.item -->
                            </div>
                        </div><!-- /.media-attachment-gallery -->
                    </div>

                    <header class="entry-header">

                        <div class="entry-meta">
                            <span class="posted-on"><time class="entry-date published" datetime="<?=date("d-m-Y H:i",strtotime($model->dateadd))?>"><?=date("d-m-Y H:i",strtotime($model->dateadd))?></time> <time class="updated" datetime="<?="Yayınlanma Tarihi: ".date("d-m-Y H:i",strtotime($model->dateadd))?>" itemprop="datePublished"><?=date("d-m-Y H:i",strtotime($model->dateadd))?></time></span>
                        </div>
                    </header><!-- .entry-header -->

                    <div class="entry-content" itemprop="articleBody">

                        <?=$model->content;?>

                    </div><!-- .entry-content -->
                </article>

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .container -->
</div><!-- #content -->