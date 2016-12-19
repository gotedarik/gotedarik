
<link href="<?=Yii::app()->request->baseUrl;?>/front/css/thumbnail-gallery.css" rel="stylesheet">
<link href="<?=Yii::app()->request->baseUrl;?>/front/css/colorbox.css" rel="stylesheet">

<script src="<?=Yii::app()->request->baseUrl;?>/front/js/jquery.colorbox.js"></script>

<script>
    $(document).ready(function(){
        //Examples of how to assign the Colorbox event to elements
        $(".documentcolor").colorbox();

    });
</script>

<div style="margin: 10px 0px; font-size: 12px;">
    <style type="text/css">

    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php $this->renderPartial("smenu",array("active"=>"companyinformation")); ?>
            </div>
            <div class="col-lg-9 marginn">
                <div style="padding: 10px 30px;" class="box-border">
                    <form enctype="multipart/form-data" action="#" class="checkout woocommerce-checkout" method="post" name="checkout">
                        <div id="customer_details" class="col2-set">
                            <div class="col-lg-12">
                                <div class="woocommerce-billing-fields">

                                    <h3>Şirket Belgelerinizi Yükleyin</h3>

                                    <?php if($iscompany==false):?>

                                        <div id="alertpassword" class="alert alert-warning">
                                            <strong>Lütfen önce şirket bilgilerini düzenleyiniz!</strong>
                                        </div>
                                    <?php else:?>


                                        <div id="alertdoc" class="alert alert-danger hides">
                                            <strong></strong>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <span style="width: 180px; float: left;" class="col-lg-5 col-sm-5 col-xs-5">
                                                    <label style=" background: transparent" class="form-control" for="">Şirket belgeniz</label>
                                                </span>
                                                <span class="col-lg-7 col-sm-7 col-xs-7">
                                                   <span style="margin-bottom: 5px; margin-top: 5px; cursor: pointer" class="ubtn ubtn-primary fileup1" data-toggle="tooltip" data-placement="right" title="Logo Yükle"><i class="fa fa-upload"> &nbsp; Belgenizi Yüklemek İçin Tıklayın</i>
                                                       <input name="upl" id="userCompanyDocumentUpload" type="file" accept="image/*">
                                                   </span><br>
                                                </span>
                                            </div>
                                        </div>
                                     <?php endif?>

                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row center-block">
                        <div class="col-lg-12 col-sm-12 col-xs-12" id="doccont">

                           <?php foreach($modelSuppliercompanydocuments  as $key=>$value):?>
                             <div class="col-sm-3 col-md-3 margintop">
                                <div class="img-box">
                                    <a href="<?=Yii::app()->params["cdn"].$value->document?>" class="documentcolor">
                                         <img src="<?=Yii::app()->params["cdn"].$value->documentmini?>" class="img-responsive" alt="">
                                    </a>
                                    <span class="img-button">
                                        <button onclick="deleteDoc(this,<?=$value->suppliercompanydocuments_id?>)" style="width: 100%" class="ubtn btn-danger"><i class="fa fa-trash"></i></button>
                                    </span>
                                </div>

                            </div>
                           <?php endforeach?>

                            <!--
                            <div class="col-sm-3 col-md-3 margintop">
                                <div class="img-box">
                                    <div class="progress1 prog">
                                        <div class="progress1-bar progress1-bar-success progress1-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                    <span class="img-button">
                                        <button style="width: 100%" class="ubtn btn-danger"><i class="fa fa-trash"></i></button>
                                    </span>
                                </div>

                            </div>

                            <div class="col-sm-3 col-md-3 margintop">
                                <div class="img-box">
                                    <img src="<?=Yii::app()->request->baseUrl;?>/front/images/factory-2.png" class="img-responsive img-box-img" alt="">
                                    <span class="img-button">
                                        <button style="width: 100%" class="ubtn btn-danger"><i class="fa fa-trash"></i></button>
                                    </span>
                                </div>

                            </div>
                            -->



                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
var i=0;
var y=0;
$('#userCompanyDocumentUpload').fileupload({
    url: params.site+"/member/suppliercompanydocumentadd",
    dataType: 'json',  // what to expect back from the PHP script, if anything
    cache: false,
    contentType: false,
    processData: false,
    previewMaxWidth: 1000,
    previewMaxHeight: 1000,
    previewCrop: true,
    add: function(e, data) {
            var uploadErrors = [];
            var acceptFileTypes = /^image\/(jpe?g|png)$/i;
            if(data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) 
            {
                uploadErrors.push('Belge png, jpg, ve jpeg resim formatında olmalıdır');
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
            
           $('#imgbox_'+y).html('<a href="'+data.result.image1+'" class="documentcolor"><img src="'+data.result.image2+'" class="img-responsive" alt=""></a>');
            $('#progres_'+y).css(
                    'width','0%'
             ); 

            setTimeout(function(){
                  $('#deletebutton_'+y).show(); 
                  $('#deletebutton_'+y).children("button").attr("onclick","deleteDoc(this,"+data.result.id+")");
            },1000);
             $(".documentcolor").colorbox();
        }else{
            $('#abox_'+y).remove();
            $('#alertdoc').children("strong").html("Belge yüklenemedi. Yüklendiğiniz belgenin resim olmasına dikkat ediniz.");
        }
        
    },
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progres_'+y).css(
            'width',
            progress + '%'
        );
    },
    start: function (e, data) {
        $('#alertdoc').hide();
        str='<div class="col-sm-3 col-md-3 margintop" id="abox_'+i+'">'+
                '<div class="img-box">'+
                    '<span id="imgbox_'+i+'" >'+
                        '<div class="progress1 prog">'+
                            '<div id="progres_'+i+'" class="progress1-bar progress1-bar-success progress1-bar-striped" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 0%">'+
                            '</div>'+
                        '</div>'+
                    '</span>'+
                    '<span id="deletebutton_'+i+'" class="img-button hides">'+
                        '<button id="doc_'+i+'" style="width: 100%" class="ubtn btn-danger"><i class="fa fa-trash"></i></button>'+
                    '</span>'+
                '</div>'+
            '</div>';

        $('#doccont').html(str+$('#doccont').html());
        y=i;
        i++;
    },
}).prop('disabled', !$.support.fileInput)
.parent().addClass($.support.fileInput ? undefined : 'disabled');



function deleteDoc(element,id)
{
    var data={
        "id":id
    };

    var dataString = 'data='+encodeURIComponent(JSON.stringify(data));

    $.ajax({
         type: "POST",
         dataType:'json',  
         url: params.site+"/member/suppliercompanydocumentdelete", 
         data: dataString,
         timeout: 30000,
         success: function(data)
         {

            if(data.sonuc==1)
            {
                $(element).parent().parent().parent().remove();
            }
         }
        });
}
</script>