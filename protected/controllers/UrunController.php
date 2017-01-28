<?php

class UrunController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
    public $layout = "frontLayout/frontlayout";

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

    public function actionSearchbuild()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $dt=json_decode(urldecode($_POST["data"]));

            $params=$dt->params;
            $params =  (array) $params;
            foreach($params as $key=>$value)
            {
                if(empty($value))
                {
                   unset($params[$key]); 
                }
                
            }

            if(isset($params["page"]))
            {
                unset($params["page"]); 
            }

            $data["sonuc"]=1;
            $data["url"]=Yii::app()->createUrl("urun/ara",$params);

            echo json_encode($data);

        }
    }

  

    public function actionMainsearch()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $dt=json_decode(urldecode($_POST["data"]));

            $arr =array();


            $MoProducts=new MoProducts;
            $get=$MoProducts->searchmain( $dt->text);
            
            foreach($get as $key=>$value)
            {

                $arr["products"][]=array(
                    "key"=>$value->code,
                    "name"=>$value->name,
                );
            }

            $MoProductgroups=new MoProductgroups;
            $get=$MoProductgroups->search( $dt->text);
            
            foreach($get as $key=>$value)
            {

                $arr["productgroups"][]=array(
                    "key"=>$value->productgroup_id,
                    "name"=>$value->name,
                );
            }
                
            echo json_encode($arr);
        }
    }

    private function buildSearch()
    {
        $page=1;
        $arr=array();

        if(isset($_GET["text"]))
        {
            $arr["text"]=trim($_GET["text"]);
        }

        if(isset($_GET["productgroup"]))
        {
            $arr["productgroup"]=trim($_GET["productgroup"]);
        }


        if(isset($_GET["product_id"]))
        {
            $arr["product_id"]=trim($_GET["product_id"]);
        }
        
        if(isset($_GET["pricestart"]))
        {
            $arr["pricestart"]=trim($_GET["pricestart"]);
        }
        
        if(isset($_GET["priceend"]))
        {
            $arr["priceend"]=trim($_GET["priceend"]);
        }

        if(isset($_GET["salestype"]))
        {
            $arr["salestype"]=trim($_GET["salestype"]);
        }

        if(isset($_GET["cargopricetype"]))
        {
            $arr["cargopricetype"]=trim($_GET["cargopricetype"]);
        }

        if(isset($_GET["orderby"]))
        {
            $arr["orderby"]=trim($_GET["orderby"]);
        }

        if(isset($_GET["page"]))
        {
            $page=(int)trim($_GET["page"])+0;

            if($page>1)
            {

            }else{
                $page=1;
            }
        }

        if(isset($_GET["pagesize"]))
        {
            
            $pagesize=(int)$_GET["pagesize"];
        }else{
            $pagesize=Yii::app()->params["productsearchpagesize"];
        }


        if(!isset($arr["text"]) )
        {
            $pagesize=3*400;
        }

        return array(
            'arr'=>$arr,
            "page"=>$page,
            "pagesize"=>$pagesize,
        );
    }

    public function actionAra()
    {
        
        extract($this->buildSearch());


        $MoProducts=new MoProducts;
        $get=$MoProducts->search($arr,$page,$pagesize);

        $products=$get["list"];
        $curret_itemcount=0;

        $productgroups=$get["productgroups"];

        $pages = new CPagination($get["count"]);
        $pages->setPageSize($pagesize);

        $productgrouptree=$this->getProductgroups($productgroups);
        
        $this->render("ara",array(
            'item_count' => $get["count"],
            'pages' => $pages,
            'pagesize' =>$pagesize,
            'current_page'=>$page-1,
            "curret_itemcount"=>count($products),
            "products"=>$products,
            "productgrouptree"=>$productgrouptree,
        ));


    }

    public function actionAra2(){
	    $this->render("ara2");
    }

	public function actionTeklifsepetineekle($id)
	{
		
		$modelProduct=$this->loadModelCode($id);

	}

	public function actionView($id)
	{
		$ids=explode("-",$id);
		$id=trim($ids[0]);

		$modelProduct = $this->loadModelCode($id);

        $keywords=$modelProduct->name;
        $keys=explode(" ",$modelProduct->name);
        foreach($keys as $key=>$value)
        {
            $keywords.=",".$value;
        }
        Yii::app()->params["site_title"]=$modelProduct->name." ".$modelProduct->subtitle." OrganizeTedarik 'te";
        Yii::app()->params["site_description"]=$modelProduct->name." ürünlerinde online satış OrganizeTedarik 'te! ".$modelProduct->name." modelleri, ".$modelProduct->name." çeşitleri ve markalarını uygun fiyatları ile tedarik edin.";
        Yii::app()->params["site_keywords"].=",".$keywords;

        $modelProduct->viewed+=1;
        $modelProduct->update();

        $MoProducts=new MoProducts;
        $MoProducts->update($modelProduct->products_id,$MoProducts->buildArr($modelProduct));


		$criteria=new CDbCriteria;
		$criteria->condition = "products_id=:products_id";
		$criteria->params = array (	
			':products_id' =>$modelProduct->products_id,
		);
		$criteria->order="imagetype asc";

		$modelProductimages=Productimages::model()->findAll($criteria);
        $suppliersinf = Suppliers::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>$modelProduct->suppliers_id));
		
		$modelSupplierscompany=Supplierscompany::model()->find("suppliers_id=:suppliers_id",array(":suppliers_id"=>$modelProduct->suppliers_id));

		$arrimages=array();

        $criteria = new CDbCriteria;

        $criteria->select ="t.*,users.name as username,products.currency as currency";
        $criteria->join = "inner join users on (users.users_id = t.users_id)
                           inner join products on (products.products_id = t.products_id)";
        $criteria->condition = "t.products_id = :pid";
        $criteria->order = "tenderoffers_id DESC";
        $criteria->params = array(
            ":pid" => $modelProduct->products_id
        );

        $modeltenders = Tenderoffers::model()->findAll($criteria);

        $criteria = new CDbCriteria;
        $criteria->select = "t.*,users.name as username";
        $criteria->join = "inner join users on (users.users_id = t.users_id)";
        $criteria->condition = "t.suppliers_id = :sid";
        $criteria->params = array(
            'sid' => $modelProduct->suppliers_id,
        );
        $criteria->order = "supplierreviews_id DESC";

        $modelreviews = Supplierreviews::model()->findAll($criteria);

		foreach($modelProductimages as $key=>$value)
		{
            if($value["imagetype"]==0)
            {
                Yii::app()->params["site_image"]=Yii::app()->params["cdn"].$value->imageS;
            }
		    
			$arrimages[]=array(
				"imageS"=>Yii::app()->params["cdn"].$value->imageS,
				"imageL"=>Yii::app()->params["cdn"].$value->imageL,
				"imageXL"=>Yii::app()->params["cdn"].$value->imageXL,
				"productimages_id"=>$value->productimages_id,
			);
			
		}

		$this->render("view",array(
			"modelProduct"=>$modelProduct,
			"arrimages"=>$arrimages,
			'modelSupplierscompany'=>$modelSupplierscompany,
            "modeltenders" => $modeltenders,
            "modelreviews" => $modelreviews,
            "supinf" => $suppliersinf
        ));
	}

    public function actionAddteklifsepeti(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])){
            $user_id = Yii::app()->user->getState("user_id");

            $code = json_decode(urldecode($_POST['data']));
            if(isset($code->count_number)){
                $code->count_number = Func::xssClear($code->count_number);
            }else{
                $code->count_number = 1;
            }
            $pmodel = Products::model()->find('code =:code',array(':code' => $code->code));
            $omodel = Offerbasket::model()->find("products_id = :pid && users_id = :uid",array(
                ":pid" => $pmodel->products_id,
                ":uid" => $user_id
            ));

            if(!empty($user_id) && count($omodel) == 0){
                $offer = new Offerbasket;
                $offer->users_id = $user_id;
                $offer->count_number = $code->count_number;
                $offer->products_id = $pmodel->products_id;
                $offer->dateadd = date("Y-m-d H:i:s");
                if($offer->save()){
                    echo json_encode(array("status" => "1"));
                }
            }else{
                if(CookieBasket::has($pmodel->products_id) == false)
                    CookieBasket::set($pmodel->products_id,array('piece' => $code->count_number));
                echo json_encode(array("status" => "1"));
            }

        }
    }

    public function actionAddcomparelist(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])){
            $user_id = Yii::app()->user->getState("user_id");
            $code = json_decode(urldecode($_POST['data']));

            $pmodel = Products::model()->find('code =:code',array(':code' => $code->code));
            $omodel = Comparelist::model()->findAll("products_id = :pid && users_id = :uid",array(
                ":pid" => $pmodel->products_id,
                ":uid" => $user_id
            ));


            if(!empty($user_id )&& count($omodel) == 0){
                $comparelist = new Comparelist;
                $comparelist->users_id = $user_id;
                $comparelist->products_id = $pmodel->products_id;
                $comparelist->dateadd = date("Y-m-d H:i:s");
                if($comparelist->save()){
                    echo json_encode(array("status" => "1"));
                }
            }else{
                echo json_encode(array("status" => "2"));
            }

        }
    }
    
    public function actionAddfollowlist(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])){
            $user_id = Yii::app()->user->getState("user_id");

            $code = json_decode(urldecode($_POST['data']));

            $pmodel = Products::model()->find('code =:code',array(':code' => $code->code));
            $fmodel = Followlist::model()->findAll("products_id = :pid && users_id = :uid",array(
                ":pid" => $pmodel->products_id,
                ":uid" => $user_id
            ));

            if(!empty($user_id) && count($fmodel) ==  0){
                $follow = new Followlist;
                $follow->users_id = $user_id;
                $follow->products_id = $pmodel->products_id;
                $follow->dateadd = date("Y-m-d H:i:s");
                if($follow->save()){
                    echo json_encode(array("status" => "1"));
                }
            }else{
                echo json_encode(array("status" => "2"));
            }

        }
    }

    public function actionTeklifsepetim(){
        $user_id = Yii::app()->user->getState("user_id");

        $criteria = new CDbCriteria();
        $criteria->select = "t.*,products.currency as currency,products.code as code,products.name as product_name,products.price as product_price, productimages.imageS_s3url as product_imageS";
        $criteria->join = "inner join products on (products.products_id = t.products_id) inner join productimages on (productimages.products_id = t.products_id)";
        $criteria->condition = "productimages.imagetype = :types && t.users_id = :uid";
        $criteria->params = array(
            ":types" => 0,
            ":uid" => $user_id
        );
        $model = Offerbasket::model()->findAll($criteria);

        $this->render("teklifsepetim",array('model' => $model));
    }

    public function actionTakiplistesi(){
        $user_id = Yii::app()->user->getState("user_id");

        $criteria = new CDbCriteria();
        $criteria->select = "t.*,products.currency as currency,products.code as code,products.name as product_name,products.price as product_price, productimages.imageS_s3url as product_imageS";
        $criteria->join = "inner join products on (products.products_id = t.products_id) inner join productimages on (productimages.products_id = t.products_id)";
        $criteria->condition = "productimages.imagetype = :types && t.users_id = :uid";
        $criteria->params = array(
            ":types" => 0,
            ":uid" => $user_id
        );
        $model = Followlist::model()->findAll($criteria);

        $this->render("takiplistesi",array('model' => $model));
    }

    public function actionUrunkarsilastir(){
        $user_id = Yii::app()->user->getState("user_id");

        $criteria = new CDbCriteria();
        $criteria->select = "t.*,products.currency as currency,products.code as code,products.name as product_name,products.price as product_price, productimages.imageS_s3url as product_imageS";
        $criteria->join = "inner join products on (products.products_id = t.products_id) inner join productimages on (productimages.products_id = t.products_id)";
        $criteria->condition = "productimages.imagetype = :types && t.users_id = :uid";
        $criteria->params = array(
            ":types" => 0,
            ':uid' => $user_id
        );
        $model = Comparelist::model()->findAll($criteria);
        $this->render("urunkarsilastir",array("model" => $model));

    }

    public function actionClearfollowlist(){
        if(Yii::app()->request->isAjaxRequest) {

            $user_id = Yii::app()->user->getState("user_id");

            if (!empty($user_id)) {
                $delete = Followlist::model()->deleteAll("users_id = :uid", array(":uid" => $user_id));

                if ($delete)
                    echo json_encode(array("status" => "1"));

            } else {
                echo json_encode(array("status" => "2"));
            }
        }
    }

    public function actionClearofferbasket(){
        if(Yii::app()->request->isAjaxRequest) {

            $user_id = Yii::app()->user->getState("user_id");

            if (!empty($user_id)) {
                $delete = Offerbasket::model()->deleteAll("users_id = :uid", array(":uid" => $user_id));

                if ($delete)
                    echo json_encode(array("status" => "1"));

            } else {
                CookieBasket::deleteAll();
                echo json_encode(array("status" => "1"));
            }
        }
    }

    public function actionDeletefollowitem(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])){
            $user_id = Yii::app()->user->getState("user_id");
            $code = json_decode(urldecode($_POST['data']));

            $pmodel = Products::model()->find('code =:code',array(':code' => $code->code));

            if(!empty($user_id)){
               $follow = Followlist::model()->find("products_id = :pid && users_id = :uid",array(
                   ":pid" => $pmodel->products_id,
                   ":uid" => $user_id));


                if($follow->delete()){
                    $count_follow = Followlist::model()->count("users_id = :uid",array(
                        ":uid" => $user_id));

                    echo json_encode(array("status" => "1",'code'=> $pmodel->code,'count' => $count_follow));
                }
            }else{
                echo json_encode(array("status" => "2"));
            }

        }
    }

    public function actionDeleteofferitem(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])){
            $code = json_decode(urldecode($_POST['data']));

            $pmodel = Products::model()->find('code =:code',array(':code' => $code->code));

            $user_id = Yii::app()->user->getState("user_id");

            if(!empty($user_id)){
                $offer = Offerbasket::model()->find("products_id = :pid && users_id = :uid",array(
                    ":pid" => $pmodel->products_id,
                    ":uid" => $user_id));


                if($offer->delete()){

                    $count_offer = Offerbasket::model()->count("users_id = :uid",array(
                        ":uid" => $user_id));


                    echo json_encode(array("status" => "1",'code'=> $pmodel->code,'count' => $count_offer));
                }
            }else{
                CookieBasket::delete($pmodel->products_id);
                $count_offer = count(CookieBasket::getAll());
                echo json_encode(array("status" => "1",'code'=> $pmodel->code,'count' => $count_offer));
            }

        }
    }

    public function actionDeletecompareitem(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])){
            $code = json_decode(urldecode($_POST['data']));

            $pmodel = Products::model()->find('code =:code',array(':code' => $code->code));

            $user_id = Yii::app()->user->getState("user_id");

            if(!empty($user_id)){
                $compare = Comparelist::model()->find("products_id = :pid && users_id = :uid",array(
                    ":pid" => $pmodel->products_id,
                    ":uid" => $user_id));

                if($compare->delete()){
                    $count_compare = Comparelist::model()->count("users_id = :uid",array(
                        ":uid" => $user_id));
                    echo json_encode(array("status" => "1",'code'=> $pmodel->code,'count' => $count_compare));
                }
            }else{
                echo json_encode(array("status" => "2"));
            }

        }
    }

    public function actionSendoffers(){
        if(Yii::app()->request->isAjaxRequest){
            $users_id = Yii::app()->user->getState("user_id");
           
            if(!empty($users_id)){
                $func = new Func;
                $offerbasket = Offerbasket::model()->findAll("users_id = :uid",array(":uid" => $users_id));

                $filoid =$func->getHashCode(2,4).$users_id.time();

                foreach ($offerbasket as $key => $value){
                    $offerlist = new Offers();
                    $offerlist->users_id = $users_id;
                    $offerlist->filo_id = $filoid;
                    $offerlist->piece = $value->count_number;
                    $offerlist->products_id = $value->products_id;
                    $offerlist->dateadd = Func::datefunc();

                    if($offerlist->save()){
                        echo json_encode(array("status" => 1));
                    }else{
                        echo json_encode(array("status" => 2));
                    }
                }
                Offerbasket::model()->deleteAll("users_id = :uid", array(":uid" => $users_id));
            }else{
                echo json_encode(array("status" => 3));
            }
        }
    }

    public function actionChangepiece(){

        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])) {

            $user_id = Yii::app()->user->getState("user_id");

            $change = json_decode(urldecode($_POST["data"]));

            $pmodel = Products::model()->find('code =:code',array(':code' => $change->code));


            if(!empty($user_id)){

                $cmodel = Offerbasket::model()->find("products_id = :pid && users_id = :uid",array(
                    ":pid" => $pmodel->products_id,
                    ":uid" => $user_id
                ));

                $cmodel->count_number =Func::xssClear(intval($change->piece));

                if($cmodel->update()){
                    echo json_encode(array("status" => 1));
                }else{
                    echo json_encode(array("status" => 2));
                }

            }else{
                CookieBasket::delete($pmodel->products_id);
                CookieBasket::set($pmodel->products_id,array("piece" => $change->piece));
                echo json_encode(array("status" => 1));

            }

        }
    }

    public function actionSendtenderoffer(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])){
            $data = json_decode(urldecode($_POST["data"]));
            $user_name = Yii::app()->user->getState("name");
            
            if(!empty(Yii::app()->user->getState("user_id"))){

                $modelProduct=new Products;
                $modelProduct=Products::model()->findByPk((int)$data->id);
                
                if(isset($modelProduct->products_id))
                {
                    $model = new Tenderoffers;

                    $model->users_id = Yii::app()->user->getState("user_id");
                    $model->piece = Func::xssClear($data->count);
                    $model->products_id = $modelProduct->products_id;
                    $model->price = Func::xssClear(doubleval($data->offer));
                    $model->dateadd = Func::datefunc();

                    if($model->save()){
                        $modelProduct->lastbidprice=$model->price;
                        $modelProduct->update();

                        $MoProducts=new MoProducts;
                        $MoProducts->update($modelProduct->products_id,$MoProducts->buildArr($modelProduct));

                        echo json_encode(array("status" => 1,"name" => $user_name));
                    }else{
                        echo json_encode(array("status" => 2));
                    }

                }else{
                     echo json_encode(array("status" => 2));
                }
               
            }
        }
    }

    public function actionIhaleler(){
        $user_id = Yii::app()->user->getState("user_id");

        $criteria = new CDbCriteria;
        $criteria->select = "t.*,products.name as productname,products.lastshowdates as lastdate,products.code as productprice,products.code as productcode, productimages.imageS_s3url as prdImgS3url,products.currency as currency";
        $criteria->join = "inner join products on(products.products_id = t.products_id)
                           inner join productimages on(productimages.products_id = t.products_id)";
        $criteria->condition = "productimages.imagetype = :types && t.users_id = :uid";
        $criteria->params = array(
            ":types" => 0,
            ':uid' => $user_id,
        );
        $criteria->order = "t.dateadd DESC";

        $itemcount = Tenderoffers::model()->count($criteria);

        $pages = new CPagination($itemcount);
        $pages->setPageSize(Yii::app()->params["listPerPage"]);
        $pages->applyLimit($criteria);

        $this->render("ihaleler",array(
            'model' => Tenderoffers::model()->findAll($criteria),
            'item_count' => $itemcount,
            'page_size' => Yii::app()->params["listPerPage"],
            'items_count' => $itemcount,
            'pages' => $pages
        ));
    }

    public static function findmax($id){
        $maxcriteria = new CDbCriteria;
        $maxcriteria->select = "max(price) as mprice";
        $maxcriteria->condition = "products_id = :pid";
        $maxcriteria->params = array(':pid' => $id);

        $maxmodel = Tenderoffers::model()->find($maxcriteria);
        $max =$maxmodel["mprice"];
        return $max;
    }

    public function loadModelCode($id)
	{
		$model=Products::model()->find("code=:code",array(":code"=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    private function getProductgroups($productgroups)
    {

        $procount=array_count_values($productgroups);

        $tree=$this->getProductgroups2();

        foreach($tree as $key=>$value)
        {
            $count=0;
            if(isset($procount[$key]))
            {
                $tree[$key]["is"]=$procount[$key];
            }

            if(isset($tree[$key]["is"]))
            {
                $count+=$tree[$key]["is"];
            }

            if(isset($value["subs"]))
            {
                $control=false;
                foreach($value["subs"] as $key2=>$value2)
                {
                    if(isset($procount[$key2]))
                    {
                        $control=true;
                        $tree[$key]["subs"][$key2]["is"]=$procount[$key2];
                    }else{
                        $tree[$key]["subs"][$key2]["is"]=0;
                    }

                    if(isset($tree[$key]["subs"][$key2]["is"]))
                    {
                        $count+=$tree[$key]["subs"][$key2]["is"];
                    }
                }

                

            }else{
                $tree[$key]["subs"]=array();
            }

            
            $tree[$key]["is"]=$count;
            
        }

        
        return $tree;
    }


    private function getProductgroups2(){
        $array=$this->groupTree();

        foreach($array as $key=>$value){
            $value=(object)$value;
            
            $array2[$value->productgroup_id]["name"]=$value->name;
            $array2[$value->productgroup_id]["pgID"]=$value->productgroup_id;
            $line=1;
            unset($array[$key]);
            if(isset($value->sub_cats))
                $array2=$this->sub_cats($value->sub_cats,$array2,$value->productgroup_id);
            
            
        }

        return $array2;
    }

    private function sub_cats(&$array,&$array2,&$pg){
    
        foreach($array as $key=>$value){
            $value=(object)$value;
            $array2[$pg]["subs"][$value->productgroup_id]["pgID"]=$value->productgroup_id;
            $array2[$pg]["subs"][$value->productgroup_id]["name"]=$value->name;
            unset($array[$key]);
            if(isset($value->sub_cats))
                $array2=$this->sub_cats($value->sub_cats,$array2,$pg);
            
        }
        
        return $array2;
    }

    private function groupTree(){
        $modelProductgroup=Productgroup::model()->findAll(array(
             'order'=>'name asc',
         ));
        
        $array=array();
        foreach ($modelProductgroup as $key => $value)
        {
                $value=(object)$value;
                
                if($value->sub_id==0){
                    $array[$value->productgroup_id]["productgroup_id"] = $value->productgroup_id;
                    $array[$value->productgroup_id]["name"] = $value->name;
                    $array[$value->productgroup_id]["sub_id"] = $value->sub_id;
                
         
                    unset($modelProductgroup[$key]);
                    
                    
                    $array[$value->productgroup_id]=$this->group_Find_Sub_Cats2($modelProductgroup, $array[$value->productgroup_id]);
                }
     
        }
        
        return  $array;
    }

    private function group_Find_Sub_Cats2(&$modelProductgroup, &$array)
    { 
        
        foreach ($modelProductgroup as $key => $value)
        {
            $value=(object)$value;
            
            if ($value->sub_id == $array['productgroup_id'])
            {
                
                $array["sub_cats"][$value->productgroup_id] = array(
                    "productgroup_id"=>$value->productgroup_id,
                    "name"  =>$value->name,
                    "sub_id" =>$value->sub_id
                );
                
                unset($modelProductgroup[$key]);
                
                $this->group_Find_Sub_Cats2($modelProductgroup, $array["sub_cats"][$value->productgroup_id]);
            }
        }
        
        return $array;
    }

}