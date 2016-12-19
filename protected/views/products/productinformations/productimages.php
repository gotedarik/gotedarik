<div class="col-md-5 mar1">
    <p id="billing_last_name_field" class="form-row form-row">
            <span class="img-box2 col-lg-12 col-sm-12 col-xs-12">
            <img id="productimageB_img" src="<?=isset($arr1images[0]["imageL"])?$arr1images[0]["imageL"]:Yii::app()->request->baseUrl."/front/images/img_upload.png";?>" class="img-responsive img-box-img-main" alt="">
                   <input name="upl" image="" id="productimageB" class="fileuproduct-main" type="file" accept="image/*">
            </span>

            <div class="row hides" id="productImagesProgressro">
                <div class="col-lg-12 margin1">
                    <div class="progress1">
                        <div id="productImagesProgress" class="progress1-bar progress1-bar-success progress1-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            
                        </div>
                    </div>
                </div>
            </div>
    </p>

    <div class="clearfix"></div>

    <p class="form-row form-row hizala">
        <?php foreach ($arr2images as $key => $value):?>
                <span class="img-box-thumb col-lg-3 col-sm-3 col-xs-3">
                    <img src="<?=isset($value["imageS"])?$value["imageS"]:Yii::app()->request->baseUrl."/front/images/img_upload.png"?>" class="img-responsive img-box-img-small" alt="">
                       <input name="upl"  id="productimage<?=$key?>" class="fileuproduct" type="file" accept="image/*">
                </span>
        <?php endforeach?>
          

    </p>

    <p id="product_images_error" class="error_system"></p>
</div>

<script type="text/javascript">



$('#productimageB').fileupload({
    url: params.site+"/products/productimageadd?imagetype=0",
    dataType: 'json',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    previewMaxWidth: 800,
    previewMaxHeight: 800,
    previewCrop: true,
    add: function(e, data) {
            var uploadErrors = [];
            var acceptFileTypes = /^image\/(jpe?g|png)$/i;
            if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) 
            {
                uploadErrors.push('Ürün resmi png, jpg, ve jpeg resim formatında olmalıdır');
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

       if(data.result.sonuc==1)
        {
            $('#productimageB_img').attr("src",data.result.image);
            $('#productImagesProgress').css(
                        'width','0%'
             );
            $('#productImagesProgressro').hide();
        }else{
            $('#productImagesProgressro').hide();
            alert("Ürün resmi eklenemedi. Lütfen tekrar deneyiniz veya iletişimm kurunuz..")
        }
        
    },
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#productImagesProgress').css(
            'width',
            progress + '%'
        );
    },
    start: function (e, data) {
        
        $('#productImagesProgress').css(
            'width','0%'
        );

        $('#productImagesProgressro').show();
    },
}).prop('disabled', !$.support.fileInput)
.parent().addClass($.support.fileInput ? undefined : 'disabled');


for(i=1;i<=8;i++)
{

    $('#productimage'+i).fileupload({
        url: params.site+"/products/productimageadd?imagetype="+i,
        dataType: 'json',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        previewMaxWidth: 800,
        previewMaxHeight: 800,
        previewCrop: true,
        add: function(e, data) {
                var uploadErrors = [];
                var acceptFileTypes = /^image\/(jpe?g|png)$/i;
                if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) 
                {
                    uploadErrors.push('Ürün resmi png, jpg, ve jpeg resim formatında olmalıdır');
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

            if(data.result.sonuc==1)
            {
                $(this).prev().attr("src",data.result.image);
                $('#productImagesProgress').css(
                            'width','0%'
                 );
                $('#productImagesProgressro').hide(); 
            }else{
                $('#productImagesProgressro').hide();
                alert("Ürün resmi eklenemedi. Lütfen tekrar deneyiniz veya iletişimm kurunuz..")
            }
            
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#productImagesProgress').css(
                'width',
                progress + '%'
            );
        },
        start: function (e, data) {
            
            $('#productImagesProgress').css(
                'width','0%'
            );

            $('#productImagesProgressro').show();
        },
    }).prop('disabled', !$.support.fileInput)
    .parent().addClass($.support.fileInput ? undefined : 'disabled');
     
}

</script>
