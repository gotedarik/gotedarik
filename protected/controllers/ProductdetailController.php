<?php
class ProductdetailController extends Controller
{

    public $layout = "frontLayout/frontlayout";


	/**
	 * Declares class-based actions.
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
			array('allow',
				'actions'=>array('detail','detail2'),
				'users'=>array('*'),

			),

			array('deny', // deny all users
				'users' => array('*'),
				'deniedCallback' => function() {$this->redirect(array ('site/login'));},
			),
		);
	}
	


	public function actionDetail(){
		$this->render('detail');
	}
	public function actionDetail2(){
		$this->render('detail2');
	}
	


}