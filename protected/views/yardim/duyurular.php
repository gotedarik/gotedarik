<div class="electro-tabs electro-tabs-wrapper wc-tabs-wrapper">
    <div class="electro-tab" id="tab-profil">
        <div style="padding: 20px;" class="container">
            <?php $this->renderPartial("menu"); ?>
            <div class="advanced-review row helpbox1">

                <div class="col-xs-12 col-md-12">

                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <h6 style="text-align: center"><i style="color: #31708f; font-size: 36px; position: relative;top: 8px" class="fa fa-bullhorn"></i>   Duyurular</h6>
                        </div>
                        <hr>

                        <?php

                        foreach ($allannouncements as $key => $value) {
                            echo "<p style='font-weight: bold; color: #0A246A'>$value->title;</p>
                                  <p>$value->content</p>
                                  <hr>";
                        }
                        ?>
                    </div>


                </div><!-- /.col -->
                <div class="clearfix"></div>

            </div>
        </div>
    </div>
</div>


