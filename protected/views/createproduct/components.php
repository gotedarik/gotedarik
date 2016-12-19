
<style type="text/css">
    .stepwizard-step p {
        margin-top: 10px;
        font-weight: bold;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 22px;
        background: #ffffff;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        border: 1px solid #e5e5e5;
        border-radius: 2px;
        height: 9px;

    }
    .control-label{
        cursor: pointer;
        font-size: 16px;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 50px;
        height: 50px;
        text-align: center;
        border: 1px solid #e5e5e5;
        padding: 14px 0;
        font-weight: 800;
        font-size: 14px;
        line-height: 1.428571429;
        border-radius: 25px;
        background: white;
    }

    .mar1{
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .btn-primary{
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .btn-lg{
        margin: 10px 5px;
    }
    #CountSelect{
        border: 1px solid #d8d8d8;
        display: inline-block;
        font-weight: 700;
        margin: 15px 0 10px 0;
    }
    #buttons{
        display: inline-block;
        font-weight: 700;
        margin: 25px 0 10px 0;
        text-align: center;
    }
    #CountSelect ul{
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    #CountSelect ul li{
        text-align: center;
        display: block;
        float: left;
        font-size: 1.167em;
        height: 58px;
        padding: 20px 10px;
    }
    .adeText{
        border-right: 1px solid #d8d8d8;
    }
    #CountSelect ul li span{
        padding: 0 5px;
    }

    #CountSelect ul li input[type="text"]{
        margin: 0;
        border: none;
        border-radius: 0;
        padding: 20px;
        width: 100px;
        border-right: 1px solid #d8d8d8;
    }
    #CountSelect ul li a{
        position: relative;
        padding: 0 10px;
    }
    .sagcount{
        position: relative;
        top: 40px;
    }
    .sagcount p{
        font-weight: bold;
        font-size: 16px;
    }
    .alttext{
        position: relative;
        top: 10px;
    }
    .ubtn-default:hover,.ubtn-default:focus{
        background-color: #5cb85c;
        border-color: #4cae4c;
    }
    .tabs-block .nav .nav-item a{
        font-size: 14px;
    }
    .padding10{
        padding: 10px;
    }
    .img-box1{
        max-width: 300px;
        max-height: 300px;
        background: #FFFFFF;
        border: 1px solid #e5e5e5;
        padding: 5px;
    }
    .img-box-thumb{
        max-height: 69px;
        max-width: 69px;
        background: #FFFFFF;
        border: 1px solid #e5e5e5;
        padding: 5px;
        margin-right: 5px;
        margin-top: 5px;
    }
    .img-box-img1{
        opacity: 0.442;
        width: 100%;
        height: 100%;
    }
</style>
<div class="jumbotron">
    <div class="row">

    </div>
    <div class="clearfix"></div>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <div class="row">
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Cras justo odio <i class="fa fa-caret-right pull-right"></i>
            </a>
            <a href="#" class="list-group-item">Dapibus ac facilisis in <i class="fa fa-caret-right pull-right"></i></a>
            <a href="#" class="list-group-item">Morbi leo risus <i class="fa fa-caret-right pull-right"></i></a>
            <a href="#" class="list-group-item">Porta ac consectetur ac <i class="fa fa-caret-right pull-right"></i></a>
            <a href="#" class="list-group-item">Vestibulum at eros <i class="fa fa-caret-right pull-right"></i></a>
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="row">
        <div class="alert alert-success">
            <strong>Başarılı!</strong> Indicates a successful or positive action.
        </div>

        <div class="alert alert-info">
            <strong>Bilgilendirme!</strong> Indicates a neutral informative change or action.
        </div>

        <div class="alert alert-warning">
            <strong>Alarm!</strong> Indicates a warning that might need attention.
        </div>

        <div class="alert alert-danger">
            <strong>Hata!</strong> Indicates a dangerous or potentially negative action.
        </div>
    </div>


</div>

