<div style="margin: 10px 0px; font-size: 12px;">
    <style type="text/css">

    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <?php 
                if(!empty(Yii::app()->user->getState("user_id")))
                    $this->renderPartial("umenu",array("active"=>"companyinformation"));
                else
                    $this->renderPartial("smenu",array("active"=>"companyinformation"));
                ?>
            </div>
            <div class="col-lg-9 marginn">
                <div style="padding: 10px 30px;" class="block block-sidebar box-header">
                        <div id="customer_details" class="col2-set">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Şirket Logosu Güncelleme</h3>
                                    <?php if(count($model)==0):?>

                                        <div id="alertpassword" class="alert alert-warning">
                                            <strong>Lütfen önce şirket bilgilerini düzenleyiniz!</strong>
                                        </div>
                                    <?php else:?>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span class="img-box col-lg-6 col-sm-6 col-xs-6">
                                                <img id="logoxa" src="<?=$islogo==true?$model->logo:Yii::app()->request->baseUrl."/front/images/factory-2.png"?>" class="img-responsive" alt="">
                                                </span>
                                                <span class="col-lg-6 col-sm-6 col-xs-6">
                                                   <span style="margin-bottom: 5px; width: 39px; cursor: pointer" class="btn btn-primary fileup" data-toggle="tooltip" data-placement="right" title="Logo Yükle"><i class="fa fa-upload"></i>
                                                       <input name="upl" id="userCompanyLogoUpload" type="file" accept="image/*">
                                                   </span><br>

                                                   <span  onclick="logodelete()" style="width: 39px;" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Logoyu Sil">
                                                       <i class="fa fa-trash"></i>
                                                   </span>
                                                   
                                                </span>
                                            </div>

                                        </div>
                                    <br>
                                        <div class="row">
                                            <div class="col-lg-12 margin1">
                                                <div class="progress">
                                                    <div id="userCompanyLogoUploadProgress" class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <?php endif?>



                        </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

$('#userCompanyLogoUpload').fileupload({
    url: params.site+"/member/companylogoadd",
    dataType: 'json',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    previewMaxWidth: 200,
    previewMaxHeight: 200,
    previewCrop: true,
    add: function(e, data) {
            var uploadErrors = [];
            var acceptFileTypes = /^image\/(jpe?g|png)$/i;
            if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) 
            {
                uploadErrors.push('Logo png, jpg, ve jpeg resim formatında olmalıdır');
            }
            if(data.originalFiles[0]['size'].length && data.originalFiles[0]['size'] > 7340032) {
                uploadErrors.push('Dosya boyutu en fazla 7 Mb olabilir.');
            }
            if(uploadErrors.length > 0) {
                alert(uploadErrors.join("\n"));
            } else {
                data.submit();
            }
    },
    done: function (e, data) {
        $('#logoxa').attr("src",data.result.image);
        $('#userCompanyLogoUploadProgress').css(
                    'width','0%'
         );
    },
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#userCompanyLogoUploadProgress').css(
            'width',
            progress + '%'
        );
    },
    start: function (e, data) {
        
        $('#userCompanyLogoUploadProgress').css(
            'width','0%'
        );
    },
}).prop('disabled', !$.support.fileInput)
.parent().addClass($.support.fileInput ? undefined : 'disabled');


function logodelete()
{
    $.ajax({
         type: "POST",
         dataType:'json',  
         url: params.site+"/member/companylogodelete", 
         timeout: 30000,
         success: function(data)
         {

            if(data.sonuc==1)
            {

             
                $('#userCompanyLogoUploadProgress').css(
                    'width','0%'
                );

                $('#logoxa').attr("src","<?=Yii::app()->request->baseUrl?>/front/images/factory-2.png");
            }
         }
        });
}
</script>