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

    .errorMessage{
        font-size: 11px;
        color:#f00;
    }
</style>

<link href="<?=Yii::app()->request->baseUrl;?>/front/css/thumbnail-gallery.css" rel="stylesheet">
<link href="<?=Yii::app()->request->baseUrl;?>/front/css/colorbox.css" rel="stylesheet">

<script src="<?=Yii::app()->request->baseUrl;?>/front/js/jquery.colorbox.js"></script>

<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".group1").colorbox({rel:'group1'});

        $('.non-retina').colorbox({rel:'group5', transition:'none'});
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});

        //Example of preserving a JavaScript event for inline calls.
        $("#click").click(function(){
            $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
            return false;
        });
    });
</script>

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


                    <?php if(isset($_GET["durum"]) && $_GET["durum"] == "hata") :?>
                        <div style="padding: 15px;" class="form">
                            <div class="alert alert-danger" role="alert">Mesajınız gönderilirken hatalar oluştu</div>
                        </div>
                    <?php endif; ?>


                    <div class="row">

                        <?php if(!isset($_GET["durum"]) || (isset($_GET["durum"]) && $_GET["durum"] == "hata")) :?>
                        <div class="form">

                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'company-messages-mesajyaz1-form',
                                // Please note: When you enable ajax validation, make sure the corresponding
                                // controller action is handling ajax validation correctly.
                                // See class documentation of CActiveForm for details on this,
                                // you need to use the performAjaxValidation()-method described there.
                                'enableAjaxValidation'=>false,
                            )); ?>

                            <table class="table">
                                <thead>
                                
                                <tr>
                                    <th colspan="2">Mesaj Yaz</th>
                                </tr>

                                </thead>
                                <tbody>
                                <tr>
                                    <td width="120"><strong>
                                            <?php echo $form->labelEx($model,'subject'); ?>
                                        </strong></td>
                                    <td class="borders">
                                        <?php echo $form->textField($model,'subject',array("class" => "form-control col-md-7 col-xs-12")); ?>
                                        <?php echo $form->error($model,'subject'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>
                                            <?php echo $form->labelEx($model,'message'); ?>
                                        </strong>
                                    </td>
                                    <td class="borders">
                                        <?php echo $form->textArea($model,'message',array("class" =>"form-control","style" =>"border:1px solid #e5e5e5",'cols' => '30','rows' => '10')); ?>
                                        <?php echo $form->error($model,'message'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo CHtml::submitButton('Gönder',array("class" => "pull-lg-right")); ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <?php $this->endWidget(); ?>

                        </div><!-- form -->
                        <?php endif; ?>


                    </div>
                </div>

            </div>
        </div>

</div>
</div>
</div>
