<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <br>

        <div class="content-area col-md-12">
            <main id="main" class="site-main">

                <?php  foreach ($model as $key => $value): ?>

                    <article class='post format-standard hentry'>
                    <div class='media-attachment'>
                      <a href="<?= Yii::app()->createUrl("haber/view",array("id"=>$value->news_id)) ?>"><img width='870' height='460' src="<?=$value->imgM_s3url?>" class='wp-post-image' alt='8'/></a>
                    </div>
                    <div class='content-body'>
                        <header class='entry-header'>
                            <h1 class='entry-title' itemprop='name headline'><a href="<?= Yii::app()->createUrl("haber/view",array("id"=>$value->news_id)) ?>" rel='bookmark'><?=$value->title?></a></h1>
                            <div class='entry-meta'>
                                <!--<span class='cat-links'>Eklenme Tarihi</span>-->
                                <span class='posted-on'><a href="<?= Yii::app()->createUrl("haber/view",array("id"=>$value->news_id)) ?>" rel='bookmark'><time class='entry-date published' ><?=date("d-m-Y H:i",strtotime($value->dateadd))?></time></a></span>
                            </div>
                        </header><!-- .entry-header -->

                        <div class='entry-content' itemprop='articleBody'>
                        </div><!-- .post-excerpt -->

                        <div class='post-readmore'><a href="<?=Yii::app()->createUrl("haber/view",array("id"=>$value->news_id))?>" class='btn btn-primary'>Devamını Oku</a></div>
                    </div>
                </article><!-- #post-## -->

                <?php endforeach ?>


                <nav class="navigation pagination">
                    <h2 class="screen-reader-text">Posts navigation</h2>
                    <div class="nav-links">
                        <?php

                        $this->widget('CLinkPager', array(
                            'currentPage'=>$pages->getCurrentPage(),
                            'itemCount'=>$item_count,
                            'pageSize'=>$page_size,
                            'maxButtonCount'=>5,
                            //'nextPageLabel'=>'My text >',
                            'header'=>'',
                            'htmlOptions'=>array('class'=>'page-numbers'),
                            'selectedPageCssClass' => 'page-numbers current',
                        ));


                        ?>

                    </div>
                </nav>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .container -->
</div><!-- #content -->