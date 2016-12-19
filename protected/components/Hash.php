<?php


class Hash
{
	
	public static function hashCreate($str){

		return md5(sha1(md5($str)));
	}

	
}