<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="#"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Tekkif sepetim</li>
            </ul>
        </div>
        <div class="main-page">
            <h1 class="page-title">Teklif sepetim</h1>
            <div class="page-content checkout-page">
                <div class="box-border">
                    <table class="table table-bordered table-responsive cart_summary">
                        <thead>
                        <tr>
                            <th class="cart_product">Product</th>
                            <th>Description</th>
                            <th>Unit price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th class="action"><i class="fa fa-trash-o"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/p1.jpg" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">Frederique Constant </a></p>
                                <small class="cart_ref">Ürün Kodu : #123654999</small><br>
                            </td>
                            <td class="price"><span>61,19 €</span></td>
                            <td class="qty">
                                <input class="form-control input-sm" type="text" value="1">
                                <a href="#"><i class="fa fa-caret-up"></i></a>
                                <a href="#"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td class="price">
                                <span>61,19 €</span>
                            </td>
                            <td class="action">
                                <a href="#">Delete item</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/p2.jpg" alt="Product"></a>
                            </td>
                            <td class="cart_description">
                                <p class="product-name"><a href="#">Frederique Constant </a></p>
                                <small class="cart_ref">Ürün Kodu : #123654999</small><br>
                            </td>
                            <td class="price"><span>61,19 €</span></td>
                            <td class="qty">
                                <input class="form-control input-sm" type="text" value="1">
                                <a href="#"><i class="fa fa-caret-up"></i></a>
                                <a href="#"><i class="fa fa-caret-down"></i></a>
                            </td>
                            <td class="price">
                                <span>61,19 €</span>
                            </td>
                            <td class="action">
                                <a href="#">Delete item</a>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                    <button class="button pull-right">Teklifleri gönder</button>
                </div>
            </div>
        </div>
    </div>

</div>