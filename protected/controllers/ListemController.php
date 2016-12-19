<?php

class ListemController extends Controller
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

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array("tekliflerim","addofferunitprice"),
                'expression' => array('AllowExpression','allowOnlySupplier')
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array("liste","listedetay","approvaloffer"),
                'expression' => array('AllowExpression','allowOnlyUser')
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
                'deniedCallback' => function() {$this->redirect(array ('site/giris'));},
            ),
        );
    }

    public function actionListe(){
     


        $criteria = new CDbCriteria();
        $criteria->select="*";
        $criteria->condition="users_id = :uid";
        $criteria->params = array(
             ':uid' =>Yii::app()->user->getState("user_id")
        );
       
        $criteria->group="filo_id";
        $criteria->order="dateadd desc";
        $item_count= Offers::model()->count($criteria);
                
        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['listPerPageListe']);
        $pages->applyLimit($criteria);  // the trick is here!

        $model = Offers::model()->findAll($criteria);

        $this->render("liste",array(
            "model" => $model,
            'item_count'=>$item_count,
            'page_size'=>Yii::app()->params['listPerPageListe'],
            'items_count'=>$item_count,
            'pages'=>$pages,
        ));

    }

    public static function getListProduct($filo_id)
    {

        $criteria = new CDbCriteria();
        $criteria->select = "t.*,products.code as code,products.name as product_name, productimages.imageS_s3url as product_imageS";
        $criteria->join = "inner join products on (products.products_id = t.products_id) 
                           inner join productimages on (productimages.products_id = t.products_id)";
        $criteria->condition = "productimages.imagetype = :types && filo_id = :fid";
        $criteria->params = array(
            ":types" => 0,
            ':fid' => $filo_id
        );
        $criteria->limit=2;
        $products=Offers::model()->findAll($criteria);

        $criteria = new CDbCriteria();
        $criteria->condition = "filo_id = :fid";
        $criteria->params = array(
            ':fid' => $filo_id
        );

        $totalproductscount=Offers::model()->count($criteria);


        $criteria = new CDbCriteria();
        $criteria->condition = "filo_id = :fid && offerunitprice!='' ";
        $criteria->params = array(
            ':fid' => $filo_id
        );

        $productofferprice=Offers::model()->count($criteria);


        $criteria = new CDbCriteria();
        $criteria->condition = "filo_id = :fid && read_user = 1";
        $criteria->params = array(
            ':fid' => $filo_id
        );

        $productofferread=Offers::model()->count($criteria);


        return array(
            'products'=>$products,
            'totalproductscount'=>$totalproductscount,
            'productofferprice'=>$productofferprice,
            'productofferread' => $productofferread,
        );

    }

    public function actionListedetay($id)
    {
        $model = $this->loadModelList($id);

        Yii::app()->db
            ->createCommand("UPDATE offers SET read_user = 0 WHERE filo_id = :fid and users_id = :uid")
            ->bindValues(array(":fid" => $id,':uid' => Yii::app()->user->getState("user_id")))
            ->execute();

        $this->render("listedetay",array(
            'model' => $model
        ));
    }

    public function actionTekliflerim(){

        $criteria = new CDbCriteria();
        $criteria->select = "t.*,products.code as code,products.name as product_name,products.currency as currency,products.price as product_price, productimages.imageS_s3url as product_imageS,
                            users.name as usersname";
        $criteria->join = "inner join products on (products.products_id = t.products_id) 
                           inner join users on (users.users_id = t.users_id) 
                           inner join productimages on (productimages.products_id = t.products_id)";
        $criteria->condition = "productimages.imagetype = :types && products.suppliers_id = :sid";
        $criteria->params = array(
            ":types" => 0,
            ":sid" => Yii::app()->user->getState("supplier_id"),
        );
        $criteria->order = "t.dateadd DESC";
        $model=Offers::model()->findAll($criteria);

        $this->render("tekliflerim",array("model" => $model));

    }

    public function actionAddofferunitprice(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])) {

            $data = json_decode(urldecode($_POST["data"]));

            $model = Offers::model()->findByPk($data->uid);

            $model->offerunitprice = doubleval(Func::xssClear($data->price));
            $model->read_user = 1;
            $model->approval = 0;

            if($model->save()){
                echo json_encode(array("status" => 1));
            }else{
                echo json_encode(array("status" => 2));
            }
        }
    }

    public function actionApprovaloffer(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])) {
            $data = json_decode(urldecode($_POST["data"]));
            $data->oid = Func::xssClear(intval($data->oid));

            $model = Offers::model()->findByPk($data->oid);
            $model->approval = $data->app;

            if($model->update()){
                echo json_encode(array("status" => 1));
            }else{
                echo json_encode(array("status" => 2));
            }
        }
    }

    public function loadModelList($id)
	{
        $user_id = Yii::app()->user->getState("user_id");

        $criteria = new CDbCriteria();
        $criteria->select = "t.*,products.code as code,products.name as product_name,products.currency as currency,products.price as product_price, productimages.imageS_s3url as product_imageS";
        $criteria->join = "inner join products on (products.products_id = t.products_id) 
                           inner join productimages on (productimages.products_id = t.products_id)";
        $criteria->condition = "productimages.imagetype = :types && t.users_id = :uid && t.filo_id = :fid";
        $criteria->params = array(
            ":types" => 0,
            ':uid' => $user_id,
            ':fid' => $id
        );
		$model=Offers::model()->findAll($criteria);



		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


}