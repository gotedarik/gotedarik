	<?php 

    class AllowExpression
    {
        public static function allowOnlyUser(){
            if(!empty(Yii::app()->user->getState("user_id"))){
                return true;
            }

            return false;
        }

        public static  function allowOnlySupplier(){
            if(!empty(Yii::app()->user->getState("supplier_id"))){
                return true;
            }

            return false;
        }

        public static  function allowOnlyAdmin(){
            if(!empty(Yii::app()->user->getState("admin_id"))){
                return true;
            }

            return false;
        }
    }