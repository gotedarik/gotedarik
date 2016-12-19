<?php

class MesajlarController extends Controller
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
        $supplierid=Yii::app()->user->getState("supplier_id");

        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('gelenkutusu','gidenkutusu','mesajoku','mesajyaz'),
                'expression' => array('AllowExpression','allowOnlySupplier')
            ),
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('gelenkutusu','gidenkutusu','mesajoku','mesajyaz'),
                'expression' => array('AllowExpression','allowOnlyUser')
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
                'deniedCallback' => function() {$this->redirect(array ('site/giris'));},
            ),
        );
    }

	public function actionGelenkutusu()
	{
	    if(!empty(Yii::app()->user->getState("user_id"))){
	        $id = Yii::app()->user->getState("user_id");
            $condition = "company_messages.user_id = :rec";
        }else if(!empty(Yii::app()->user->getState("supplier_id"))){
            $id = Yii::app()->user->getState("supplier_id");
            $condition = "company_messages.supplier_id = :rec";
        }

<<<<<<< HEAD
        $model = Yii::app()->db
            ->createCommand("select *,suppliers.name as suppliername,users.name as username,users.dateadd as udateadd,suppliers.dateadd as sdateadd,t.dateadd as cmdateadd
                           from  
                          (SELECT * FROM company_messages
                          where $condition ORDER BY company_messages.dateadd DESC) as t 
                          inner join users on (users.users_id = t.user_id)
                          inner join suppliers on (suppliers.suppliers_id = t.supplier_id) 
                          GROUP BY t.message_code")
            ->bindValues(array(":rec" => $id))
            ->queryAll();


       $this->render("gelenkutusu",array('model' => $model,
=======
        $criteria = new CDbCriteria;
        $criteria->select = "t.*,suppliers.name as suppliername,users.name as username,suppliers.code as scode";
        $criteria->join = "left join suppliers on suppliers.suppliers_id = t.supplier_id";
        $criteria->condition = "t.message_code = :mcode";
        $criteria->params = array(":mcode" => $id);
        $criteria->order = "t.dateadd desc";



        $model = Companymessages::model()->findAll($criteria);



       $this->render("gelenkutusu",array(
            'model' => $model,
>>>>>>> 56eedf00e2628c680b2645522198c367adfb132c
        ));
	}

	public function actionMesajoku($id){
        if(!empty(Yii::app()->user->getState("user_id"))){
            $uid = Yii::app()->user->getState("user_id");
        }else if(!empty(Yii::app()->user->getState("supplier_id"))){
            $uid = Yii::app()->user->getState("supplier_id");
        }

        $criteria = new CDbCriteria;
        $criteria->select = "t.*,suppliers.name as suppliername,users.name as username,suppliers.code as scode";
        $criteria->join = "left join users on users.users_id = t.user_id
                           left join suppliers on suppliers.suppliers_id = t.supplier_id";
        $criteria->condition = "t.message_code = :mcode";
        $criteria->params = array(":mcode" => $id);
        $criteria->order = "t.dateadd desc";



        $model = Companymessages::model()->findAll($criteria);

        $model1 = Companymessages::model()->find($criteria);
        $model1->message_code;

        if($model1->sender != $uid){
            Yii::app()->db
                ->createCommand("UPDATE company_messages SET read_status = 1 WHERE message_code = :mid")
                ->bindValues(array(":mid" => $id))
                ->execute();
        }


        $this->render("mesajioku",array(
            "model" => $model,
            "mcode" =>$model1->message_code,
            "msub" => $model1->subject
        ));
    }

    public function actionMesajyaz($id){
        $ids = explode("-",$id);
        $id = $ids[0];

        if(!empty(Yii::app()->user->getState("user_id"))){
            $userid = Yii::app()->user->getState("user_id");
        }elseif (!empty(Yii::app()->user->getState("supplier_id"))){
            $userid = Yii::app()->user->getState("supplier_id");
        }

        $criteria = new CDbCriteria;
        $criteria->select = "t.*,suppliers.name as suppliername,users.name as username";
        $criteria->join = "left join users on users.users_id = t.user_id
                           left join suppliers on suppliers.suppliers_id = t.supplier_id";
        $criteria->condition = "t.message_code = :mcode";
        $criteria->params = array(":mcode" => $id);

        $modelMesg = Companymessages::model()->find($criteria);

        $model=new Companymessages;


        if(isset($_POST['Companymessages']))
        {
            $model->attributes=$_POST['Companymessages'];
            $model->message = Func::removeTags($model->message);
            $model->user_id = $modelMesg->user_id;
            $model->sender = $userid;
            $model->subject = $modelMesg->subject;
            $model->supplier_id =  $modelMesg->supplier_id;
            $model->message_code = $modelMesg->message_code;
            $model->dateadd =Func::datefunc();
            if($model->save())
            {
                $this->redirect(array ('mesajlar/gelenkutusu'));
            }
        }
        $this->render('mesajyaz',array('model'=>$model,"msg" => $modelMesg));
    }


	public function loadModel($id)
	{
		$model=Companymessages::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


}