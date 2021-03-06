
<script type="text/javascript">
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {

                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });


        $('div.setup-panel div a.btn-primary').trigger('click');
/* Checkbox configuration */
            $('.btn-radio').click(function(e) {
                $('.btn-radio').not(this).removeClass('active1')
                    .siblings('input').prop('checked',false);
                $(this).addClass('active1')
                    .siblings('input').prop('checked',true)
            });

        $('.btn-radio1').click(function(e) {
            $('.btn-radio1').not(this).removeClass('active1')
                .siblings('input').prop('checked',false);
            $(this).addClass('active1')
                .siblings('input').prop('checked',true)
        });
        $('.btn-radio2').click(function(e) {
            $('.btn-radio2').not(this).removeClass('active1')
                .siblings('input').prop('checked',false);
            $(this).addClass('active1')
                .siblings('input').prop('checked',true)
        });
/* Checkbox configuration */
    });


</script>
<div class="container border123 mar1">
    <h1 class="mar1">Ürünlerinizi Satın</h1>

    <hr style="color: #e5e5e5;">

    <div class="stepwizard mar1">

        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'choosecategory'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">1</span>";
                }else{
                    echo "<a href=\"#step-1\" type=\"button\" class=\"btn btn-primary btn-circle \">1</a>";
                }

                ?>
                <p>Kategori Seçimi</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productdescription'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">2</span>";
                }else{
                    echo "<a href=\"#step-2\" type=\"button\" class=\"btn btn-primary btn-circle \">2</a>";
                }

                ?>
                <p>Ürün Satış Şekli</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productinformations'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">3</span>";
                }else{
                    echo "<a href=\"#step-3\" type=\"button\" class=\"btn btn-primary btn-circle \">3</a>";
                }

                ?>
                <p>Ürün Detayları</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productreview'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">4</span>";
                }else{
                    echo "<a href=\"#step-4\" type=\"button\" class=\"btn btn-primary btn-circle \">4</a>";
                }

                ?>
                <p>Ön İzleme & Onay</p>
            </div>

            <div class="stepwizard-step">
                <?php

                if(Yii::app()->controller->action->id != 'productpayment'){
                    echo "<span class=\"btn btn-default btn-circle\" disabled=\"disabled\">5</span>";
                }else{
                    echo "<a href=\"#step-5\" type=\"button\" class=\"btn btn-primary btn-circle \">5</a>";
                }

                ?>
                <p>Ödeme Seçeneği</p>
            </div>

        </div>
    </div>

    <hr style="color: #e5e5e5">