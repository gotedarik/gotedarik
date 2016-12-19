    <?php

class Queue1m1Controller extends Controller
{
	
	public function actionHomeproductbid()
	{
		Products_Que::homeProductBid();
	}


	public function actionOpportunityproducts()
	{
		Products_Que::opportunityproducts();
	}

	public function actionHomenews()
	{
		News_Que::homeNews();
	}

	public function actionChoosetoseizeproducts()
	{
		Products_Que::choosetoseizeproducts();
	}

	public function actionRecentlyadded()
	{
		Products_Que::recentlyadded();
	}

}