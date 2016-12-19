<?php
class CreateproductController extends Controller
{

    public $layout = "frontLayout/productLayout";


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
				'actions'=>array('components','index','choosecategory','productdescription','productinformations',
					'productpayment','productpayment','productreview'),
				'users'=>array('*'),

			),


			array('deny', // deny all users
				'users' => array('*'),
				'deniedCallback' => function() {$this->redirect(array ('site/login'));},
			),
		);
	}

	public function actionIndex(){
		$this->render('index');
	}


	public function actionComponents(){
		$this->render('components');
	}

	public function actionChoosecategory(){
		$this->render('choosecategory');
	}

	public function actionProductdescription()
	{
		$this->render("productdescription");	
	}

	public function actionProductinformations()
	{
		$this->render("productinformations");
	}

	public function actionProductpayment()
	{
		$this->render("productpayment");
	}

	public function actionProductreview()
	{
		$this->render("productreview");
	}
	


}