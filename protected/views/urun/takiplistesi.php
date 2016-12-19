<div class="container">
    <div class="row">
        <div class="block block-breadcrumbs">
            <ul>
                <li class="home">
                    <a href="#"><i class="fa fa-home"></i></a>
                    <span></span>
                </li>
                <li>Takip Listem</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="sidebar">
                    <!-- block  top sellers -->
                    <div class="block block-top-sellers">
                        <div class="block-head">
                            <div class="block-title">
                                <div class="block-icon">
                                    <img src="<?=Yii::app()->request->baseUrl;?>/front/data/top-seller-icon.png" alt="store icon">
                                </div>
                                <div class="block-title-text text-sm">top</div>
                                <div class="block-title-text text-lg">SELLERS</div>
                            </div>
                        </div>
                        <div class="block-inner">
                            <ul class="products kt-owl-carousel" data-items="1" data-autoplay="true" data-loop="true" data-nav="true">
                                <li class="product">
                                    <div class="product-container">
                                        <div class="product-left">
                                            <div class="product-thumb">
                                                <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p1.jpg" alt=""></a>
                                                <a title="Quick View" href="#" class="btn-quick-view">Quick View</a>
                                            </div>
                                        </div>
                                        <div class="product-right">
                                            <div class="product-name">
                                                <a href="#">Cotton Lycra Leggings</a>
                                            </div>
                                            <div class="price-box">
                                                <span class="product-price">$139.98</span>
                                                <span class="product-price-old">$169.00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="product-button">
                                                <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                                <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                                <a class="button-radius btn-add-cart" title="Add to Cart" href="#">Buy<span class="icon"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="product">
                                    <div class="product-container">
                                        <div class="product-left">
                                            <div class="product-thumb">
                                                <a class="product-img" href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p2.jpg" alt=""></a>
                                                <a title="Quick View" href="#" class="btn-quick-view">Quick View</a>
                                            </div>
                                        </div>
                                        <div class="product-right">
                                            <div class="product-name">
                                                <a href="#">Cotton Lycra Leggings</a>
                                            </div>
                                            <div class="price-box">
                                                <span class="product-price">$139.98</span>
                                                <span class="product-price-old">$169.00</span>
                                            </div>
                                            <div class="product-star">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="product-button">
                                                <a class="btn-add-wishlist" title="Add to Wishlist" href="#">Add Wishlist</a>
                                                <a class="btn-add-comparre" title="Add to Compare" href="#">Add Compare</a>
                                                <a class="button-radius btn-add-cart" title="Add to Cart" href="#">Buy<span class="icon"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- block  top sellers -->
                    <div class="block-sidebar-img banner-hover">
                        <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/banner/3.jpg" alt="Banner"></a>
                    </div>
                    <!-- block SPECIALS -->
                    <div class="block block-specials">
                        <div class="block-head">SPECIALS</div>
                        <div class="block-inner">
                            <div class="product">
                                <div class="image">
                                    <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/option1/p23.jpg" alt="p23.jpg"></a>
                                </div>
                                <div class="product-name">
                                    <a href="#">Cotton Lycra Leggings</a>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">$139.98</span>
                                    <span class="product-price-old">$169.00</span>
                                </div>
                            </div>
                            <a href="#" class="button-radius">All Specials<span class="icon"></span></a>
                        </div>
                    </div>
                    <!-- ./block SPECIALS -->
                </div>

            </div>
            <div class="col-xs-12 col-sm-8 col-md-9">
                <h1 class="page-title">Takip Listem</h1>
                <div class="page-content">
                </div>
                <div class="box-border">
                    <h4>Yeni bir ürünü takip et</h4>
                    <p>
                        <label>Ürün adı</label>
                        <input type="text">
                    </p>
                    <p>
                        <button class="button">Takip et</button>
                    </p>
                </div>
                <table class="table table-bordered table-wishlist">
                    <thead>
                    <tr>
                        <th>Ürün Adı</th>
                        <th>Adet</th>
                        <th>Takip Tarihi</th>
                        <th>Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>My wishlist</td>
                        <td>7</td>
                        <td>2015-06-18</td>
                        <td class="text-center"><a href="#"><i class="fa fa-close"></i></a></td>
                    </tr>
                    </tbody>
                </table>
                <ul class="row list-wishlist">
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist1.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist2.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist3.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist4.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist5.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist6.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist7.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                    <li class="col-sm-6 col-md-3">
                        <div class="product-img">
                            <a href="#"><img src="<?=Yii::app()->request->baseUrl;?>/front/data/wishlist8.jpg" alt="Product"></a>
                        </div>
                        <h5 class="product-name">
                            <a href="#">Cotton Lycra Leggings</a>
                        </h5>
                        <div class="qty">
                            <label>Quantity</label>
                            <input type="text">
                        </div>
                        <div class="priority">
                            <label>Priority</label>
                            <select>
                                <option>Medium</option>
                            </select>
                        </div>
                        <div class="button-action">
                            <button class="button button-sm">Save</button>
                            <a href="#"><i class="fa fa-close"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
