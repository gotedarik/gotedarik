<?php
class SirketController extends Controller
{

    public $layout = "frontLayout/frontlayout";



	public function actions()
	{

        return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError(){
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	
	public function actionUrunler($id){
        $ids=explode("-",$id);
        $id=trim($ids[0]);
        $modelSupplier = $this->loadModelCode($id);

        $modelSuppliercompany = Supplierscompany::model()->find("suppliers_id = :sid",array(
            ":sid" => $modelSupplier->suppliers_id,
        ));


        $criteria = new CDbCriteria();
        $criteria->select = "t.*,productgroup.name as productgroup_name, productimages.imageS_s3url as imageS";
        $criteria->join = "inner join productgroup on (productgroup.productgroup_id = t.productgroup_id)
                           inner join productimages on (productimages.products_id = t.products_id && imagetype=0)";
        $criteria->condition = "t.suppliers_id = :sid && t.viewok=1 &&  t.lastshowdates>:lastshowdates";
        $criteria->params = array(
            ":sid" => $modelSupplier->suppliers_id,
            ':lastshowdates' =>date("Y-m-d H:i:s"),
        );
        $modelSupplierproducts = Products::model()->findAll($criteria);

        $this->render("view",array(
            'modelsupplier' => $modelSupplier,
            'modelcompany' => $modelSuppliercompany,
            'products' => $modelSupplierproducts
        ));
	}

	public function actionDokuman($id){
       $ids = explode("-",$id);
       $id = $ids[0];

        $modelSupplier = $this->loadModelCode($id);

        $modelSuppliercompany = Supplierscompany::model()->find("suppliers_id = :sid",array(
            ":sid" => $modelSupplier->suppliers_id,
        ));

       $model = Suppliercompanydocuments::model()->findAll("supplierscompany_id = :scid",array(':scid' => $modelSuppliercompany->supplierscompany_id));

		$this->render("dokuman",array(
		    "model" => $model,
            'modelcompany' => $modelSuppliercompany,
            'modelsupplier' => $modelSupplier));
	}

	public function actionMagazadegerlendirmeleri($id){
        $ids = explode("-",$id);
        $id = $ids[0];

        $modelSupplier = $this->loadModelCode($id);

        $modelSuppliercompany = Supplierscompany::model()->find("suppliers_id = :sid",array(
            ":sid" => $modelSupplier->suppliers_id,
        ));

        $model = Suppliercompanydocuments::model()->findAll("supplierscompany_id = :scid",array(':scid' => $modelSuppliercompany->supplierscompany_id));

        $criteria = new CDbCriteria;
        $criteria->select = "t.*,users.name as username";
        $criteria->join = "inner join users on (users.users_id = t.users_id)";
        $criteria->condition = "t.suppliers_id = :sid";
        $criteria->params = array(
            'sid' => $modelSupplier->suppliers_id,
        );
        $criteria->order = "supplierreviews_id DESC";

        $modelreviews = Supplierreviews::model()->findAll($criteria);

        $this->render("magazadegerlendirmeleri",array(
            "model" => $model,
            'modelcompany' => $modelSuppliercompany,
            'modelsupplier' => $modelSupplier,
            'modelreview' => $modelreviews
            )
        );
	}

    public function actionMesajyaz($id){
        if(!empty(Yii::app()->user->getState("user_id"))){
            $normalid = $id;
            $ids = explode("-",$id);
            $id = $ids[0];

            $modelSupplier = $this->loadModelCode($id);

            $modelSuppliercompany = Supplierscompany::model()->find("suppliers_id = :sid",array(
                ":sid" => $modelSupplier->suppliers_id,
            ));

            $model=new CompanyMessagesbox;
           
            if(isset($_POST['CompanyMessagesbox']))
            {
                 $func = new Func;

                $model->attributes=$_POST['CompanyMessagesbox'];
                $model->subject =  Func::removeTags($model->subject);
                $model->users_id = Yii::app()->user->getState("user_id");
                $model->sender =  1;
                $model->suppliers_id =  $modelSupplier->suppliers_id;
                $model->dateadd = date("Y-m-d H:i:s");
                $model->code = $func->getHashCode(5,8).time().$modelSupplier->suppliers_id.Yii::app()->user->getState("user_id");;
                $model->readuser=0;
                $model->readsupplier=1;

                if($model->save())
                {
                    $modelCompanyMessages=new CompanyMessages;
                    $modelCompanyMessages->company_messagesbox_ids=$model->company_messagesbox_ids;
                    $modelCompanyMessages->sender=1;
                    $modelCompanyMessages->message=Func::removeTags($model->message);
                    $modelCompanyMessages->dateadd = date("Y-m-d H:i:s");
                    if($modelCompanyMessages->save())
                    {
                          $this->redirect(array ('mesajlar/gelenkutusu'));
                    }
                   
                }
            }


            $this->render("mesajyaz",array(
                'model' => $model,
                'modelcompany' => $modelSuppliercompany,
                'modelsupplier' => $modelSupplier));
        }else{
            $this->redirect(array ('site/giris'));
        }

    }

	public function actionYeniurunler($id){
        $modelSupplier = $this->loadModelCode($id);
        $modelSuppliercompany = Supplierscompany::model()->find("suppliers_id = :sid",array(
            ":sid" => $modelSupplier->suppliers_id,
        ));

        $criteria = new CDbCriteria();
        $criteria->select = "t.*,productgroup.name as productgroup_name, productimages.imageS_s3url as imageS";
        $criteria->join = "inner join productgroup on (productgroup.productgroup_id = t.productgroup_id)
                           inner join productimages on (productimages.products_id = t.products_id && imagetype=0)";
        $criteria->condition = "t.suppliers_id = :sid && t.viewok=1 &&  t.lastshowdates>:lastshowdates && dateadd>:newproduct";
        $criteria->params = array(
            ":sid" => $modelSupplier->suppliers_id,
            ':lastshowdates' =>date("Y-m-d H:i:s"),
            ":newproduct"=>date("Y-m-d H:i:s", strtotime('-6 month', time())),
        );
        $criteria->limit = 8;
        $modelSupplierproducts = Products::model()->findAll($criteria);

        $this->render("yeniurunler",array(
            'modelsupplier' => $modelSupplier,
            'modelcompany' => $modelSuppliercompany,
            'products' => $modelSupplierproducts
        ));
    }

    public function actionIletisim($id){
        $ids = explode("-",$id);
        $id = $ids[0];

        $modelSupplier = $this->loadModelCode($id);

        $modelSuppliercompany = Supplierscompany::model()->find("suppliers_id = :sid",array(
            ":sid" => $modelSupplier->suppliers_id,
        ));

        $model = Suppliercompanydocuments::model()->findAll("supplierscompany_id = :scid",array(':scid' => $modelSuppliercompany->supplierscompany_id));

        $this->render("iletisim",array(
            "model" => $model,
            'modelcompany' => $modelSuppliercompany,
            'modelsupplier' => $modelSupplier));
    }

    public function actionTakipedilensirketler()
    {
        if(empty(Yii::app()->user->getState("user_id"))){
            $this->redirect(array("site/giris"));
            exit();
        }
        $criteria = new CDbCriteria();
        $criteria->select = "t.*,supplierscompany.name as companyname,supplierscompany.logos3url as companyImg,suppliers.code as code";
        $criteria->join = "inner join supplierscompany on (supplierscompany.supplierscompany_id = t.company_id)
                           inner join suppliers on (suppliers.suppliers_id = supplierscompany.suppliers_id)";
        $criteria->condition = "t.user_id = :uid";
        $criteria->params = array(":uid" => Yii::app()->user->getState("user_id"));

        $itemcount = Companyfollowlist::model()->count($criteria);

        $pages = new CPagination($itemcount);
        $pages->setPageSize(Yii::app()->params["listPerPage"]);
        $pages->applyLimit($criteria);

        $this->render("takipedilensirketler",array(
            'model' => Companyfollowlist::model()->findAll($criteria),
            'item_count' => $itemcount,
            'page_size' => Yii::app()->params["listPerPage"],
            'items_count' => $itemcount,
            'pages' => $pages
        ));
    }

    public function actionFollowcompany(){
        if(Yii::app()->request->isAjaxRequest && isset($_POST["data"])) {
            $userid =Yii::app()->user->getState("user_id");
            $data = json_decode(urldecode($_POST["data"]));
            $fid = Func::xssClear(intval($data->fid));
            $model = Supplierscompany::model()->findByPk($fid);

            if(!empty($userid)){
                if(count($model)){
                    $modelFindFollow = Companyfollowlist::model()->find("company_id = :cid && user_id = :uid",array(
                        ":cid" => $model->supplierscompany_id,
                        ":uid" => $userid
                    ));
                    if(count($modelFindFollow) == 0) {
                        $modelFollow = new Companyfollowlist;
                        $modelFollow->company_id = $model->supplierscompany_id;
                        $modelFollow->user_id = $userid;
                        $modelFollow->follow_date = date("Y-m-d H:i:s");

                        if($modelFollow->save()){
                            echo json_encode(array("status" => 1));
                        }else{
                            echo json_encode(array("status" => 2));
                        }
                    }else{
                        if($modelFindFollow->delete()){
                            echo json_encode(array("status" => 5));
                        }else{
                            echo json_encode(array("status" => 6));
                        }
                    }
                }else{
                    echo json_encode(array("status" => 3));
                }
            }else{
                echo json_encode(array("status" => 4));
            }



        }
    }

    public function loadModelCode($id)
    {
        $model=Suppliers::model()->find("code=:code",array(":code"=>$id));

        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
	/**
	 * Logs out the current user and redirect to homepage.
	 */


	
	
}