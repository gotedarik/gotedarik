<style type="text/css">

    /* Profile container */
    .profile {
        margin: 20px 0;
    }

    /* Profile sidebar */
    .profile-sidebar {
        padding: 20px 0 10px 0;
        background: #fff;
    }

    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
    }

    .profile-usertitle {
        text-align: center;
        margin-top: 20px;
    }

    .profile-usertitle-name {
        color: #5a7391;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .profile-usertitle-job {
        text-transform: uppercase;
        color: #5b9bd1;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .profile-userbuttons {
        text-align: center;
        margin-top: 10px;
    }

    .profile-userbuttons .btn {
        text-transform: uppercase;
        font-size: 11px;
        font-weight: 600;
        padding: 6px 15px;
        margin-right: 5px;
    }

    .profile-userbuttons .btn:last-child {
        margin-right: 0px;
    }

    .profile-usermenu {
        margin-top: 30px;
    }

    .profile-usermenu ul li {
        border-bottom: 1px solid #f0f4f7;
    }

    .profile-usermenu ul li:last-child {
        border-bottom: none;
    }

    .profile-usermenu ul li a {
        color: #93a3b5;
        font-size: 14px;
        font-weight: 400;
    }

    .profile-usermenu ul li a i {
        margin-right: 8px;
        font-size: 14px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #5b9bd1;
    }

    .profile-usermenu ul li.active {
        border-bottom: none;
    }

    .profile-usermenu ul li.active a {
        color: #5b9bd1;
        background-color: #f6f9fb;
        border-left: 2px solid #5b9bd1;
        margin-left: -2px;
    }

    /* Profile Content */
    .profile-content {
        padding: 20px;
        background: #fff;
        min-height: 460px;
    }
</style>

<div class="container">

    <div class="row profile">
        <?php

        $this->renderPartial("leftinformations",array(
            'modelcompany' => $modelcompany,
            'modelsupplier' => $modelsupplier));

        ?>

            <div class="col-md-9">
                <div role="tabpanel" class="tab-pane active">
                    <?php

                    $this->renderPartial("menu",array(
                        'modelsupplier' => $modelsupplier,
                        'modelcompany' => $modelcompany,
                    ));

                    ?>

                    <div style="border: 1px solid #e5e5e5; padding: 10px; border-radius: 3px;">
                        <div class="inftitle"><b>Detaylı Satıcı Değerlendirme (Tüm satışlar)</b></div>
                        <hr>
                        <table class="table table-resposive">
                            <div class="rating-histogram">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Kriterler</th>
                                    <th style="text-align: center" colspan="2">Puan</th>
                                    <th style="text-align: center">Değerlendirme Adedi</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>
                                        Ürünün açıklamalarda anlatıldığı gibi olması
                                    </td>
                                    <div class="rating-bar">
                                        <td>
                                            <div class="star-rating" title="Rated 5 out of 5">
                                                <span style="width:36%"></span>
                                            </div>
                                        </td>
                                        <td><b>2.3</b></td>
                                        <td>
                                            <div class="rating-count">187</div>

                                        </td>
                                    </div><!-- .rating-bar -->

                                </tr>
                                <tr>
                                    <td>
                                        Satıcının alıcıyla olan iletişimi
                                    </td>
                                    <div class="rating-bar">
                                        <td>
                                            <div class="star-rating" title="Rated 5 out of 5">
                                                <span style="width:70%"></span>
                                            </div>
                                        </td>
                                        <td><b>3.3</b></td>
                                        <td>
                                            <div class="rating-count">98</div>

                                        </td>
                                    </div><!-- .rating-bar -->

                                </tr>
                                <tr>
                                    <td>
                                        Ürünün zamanında kargoya verilmesi
                                    </td>
                                    <div class="rating-bar">
                                        <td>
                                            <div class="star-rating" title="Rated 5 out of 5">
                                                <span style="width:100%"></span>
                                            </div>
                                        </td>
                                        <td><b>3.8</b></td>
                                        <td>
                                            <div class="rating-count">1</div>

                                        </td>
                                    </div><!-- .rating-bar -->

                                </tr>
                                <tr>
                                    <td>
                                        Ürünün kargo ücreti
                                    </td>
                                    <div class="rating-bar">
                                        <td>
                                            <div class="star-rating" title="Rated 5 out of 5">
                                                <span style="width:30%"></span>
                                            </div>
                                        </td>
                                        <td><b>4.3</b></td>
                                        <td>
                                            <div class="rating-count">80</div>

                                        </td>
                                    </div><!-- .rating-bar -->

                                </tr>
                                <tr>
                                    <td>
                                        Ürünün kargo (taşıma, teslimat) hizmeti
                                    </td>
                                    <div class="rating-bar">
                                        <td>
                                            <div class="star-rating" title="Rated 5 out of 5">
                                                <span style="width:50%"></span>
                                            </div>
                                        </td>
                                        <td><b>4.7</b></td>
                                        <td>
                                            <div class="rating-count">5</div>

                                        </td>
                                    </div><!-- .rating-bar -->

                                </tr>

                                </tbody>

                            </div>
                        </table>
                        <hr>
                        <div class="avg-rating">
                            <span class="avg-rating-number">4.3</span> Ortalama Puan
                        </div>
                    </div>
                    <hr>
                    <div class="woocommerce-tabs wc-tabs-wrapper">
                        <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">

                            <li class="nav-item reviews_tab">
                                <a href="#tab-ayorum" class="active" data-toggle="tab">Mağazanın aldığı yorumlar</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active panel entry-content wc-tab" id="tab-ayorum">
                                <div id="reviews" class="electro-advanced-reviews">
                                    <div id="comments">

                                        <ol class="commentlist">
                                            <?php foreach ($modelreview as $key => $value) : ?>
                                                <?php

                                                if($value->point == 1){
                                                    $rate = "20%";
                                                }else if($value->point == 2){
                                                    $rate = "40%";
                                                }else if($value->point == 3){
                                                    $rate = "60%";
                                                }else if($value->point == 4){
                                                    $rate = "80%";
                                                }else if($value->point == 5){
                                                    $rate = "100%";
                                                }else{
                                                    $rate = "0%";
                                                }

                                                ?>
                                                <li itemprop="review" class="comment even thread-even depth-1">

                                                    <div id="comment-390" class="comment_container">


                                                        <div class="comment-text">

                                                            <div class="star-rating" title="5 üzerinden 4 puan aldı">
                                                                <span style="width:<?=$rate;?>">5 üzerinden<strong itemprop="ratingValue"><?=$value->point?></strong> puan aldı</span>
                                                            </div>


                                                            <p class="meta">
                                                                <strong><?=$value->username?></strong> &ndash;
                                                                <time itemprop="datePublished" datetime="2016-03-03T14:13:48+00:00"><?=$value->dateadd?></time>:
                                                            </p>



                                                            <div itemprop="description" class="description">
                                                                <p><?=$value->text?></p>
                                                            </div>


                                                            <p class="meta">
                                                                <strong itemprop="author"><?=$value->username?></strong> &ndash; <time itemprop="datePublished" datetime="2016-03-03T14:13:48+00:00"><?=date("d-m-Y H:i:s",strtotime($value->dateadd))?></time>
                                                            </p>


                                                        </div>
                                                    </div>
                                                </li><!-- #comment-## -->
                                            <?php endforeach; ?>

                                        </ol><!-- /.commentlist -->

                                    </div><!-- /#comments -->

                                    <div class="clear"></div>
                                </div><!-- /.electro-advanced-reviews -->
                            </div><!-- /.panel -->
                        </div>
                    </div><!-- /.woocommerce-tabs -->
                </div>



            </div>

        </div>


</div>
</div>