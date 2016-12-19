
<?php


?>

<div class="col-lg-9 sagicerik">

    <?php if(empty($modelquestion)) :?>

    <div class="helpicon">
        <i class="fa fa-group fa-4x"></i>
    </div>
    <div class="helpbox2">
        <p>Son 30 günde yaptığım yazışmaları</p>
        <p>
            <a class="ubtn ubtn-primary" href="">Göster</a>
        </p>
    </div>
    <?php endif; ?>

    <?php if(!empty($modelquestion)) : ?>
            <?=$modelquestion->answer?>
    <?php endif; ?>

</div>
