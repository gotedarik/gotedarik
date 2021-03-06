<style type="text/css">
    /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/


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



                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">İletişim Bilgileri</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td width="120"><strong>Mağaza Sahibi</strong></td><td>
                                    <?=$modelsupplier->name?>
                                </td>
                            </tr>
                        <tr>
                            <td><strong>Şirket Adı</strong> </td><td><?=$modelcompany->name?></td>
                        </tr>
                        <tr>
                            <td><strong>Adres</strong></td><td><?=$modelcompany->address?></td>
                        </tr>
                        <tr>
                            <td><strong>İnternet Sitesi</strong></td><td><a target="_blank" href="<?=$modelcompany->website?>"><?=$modelcompany->website?></a></td>
                        </tr>
                        </tbody>
                    </table>
                    <iframe src="<?=$modelcompany->map?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>
        </div>

</div>
</div>