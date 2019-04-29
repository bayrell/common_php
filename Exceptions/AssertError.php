<?php
/*!
 *  Bayrell Common Library
 *
 *  (c) Copyright 2016-2018 "Ildar Bikmamatov" <support@bayrell.org>
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      https://www.bayrell.org/licenses/APACHE-LICENSE-2.0.html
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
namespace BayrellCommon\Exceptions;
use Runtime\rs;
use Runtime\rtl;
use Runtime\Map;
use Runtime\Vector;
use Runtime\Dict;
use Runtime\Collection;
use Runtime\IntrospectionInfo;
use Runtime\UIStruct;
use Runtime\rtl;
use Runtime\Utils;
use Runtime\RuntimeConstant;
use Runtime\Exceptions\RuntimeException;
use Runtime\Interfaces\ContextInterface;
class AssertError extends RuntimeException{
	function __construct($message, $context, $prev = null){
		if ($message == ""){
			$message = Utils::translate("ERROR_ASSERT", null, "", $context);
		}
		parent::__construct($message, RuntimeConstant::ERROR_ASSERT, $context, $prev);
	}
	/* ======================= Class Init Functions ======================= */
	public function getClassName(){return "BayrellCommon.Exceptions.AssertError";}
	public static function getCurrentClassName(){return "BayrellCommon.Exceptions.AssertError";}
	public static function getParentClassName(){return "Runtime.Exceptions.RuntimeException";}
	public static function getFieldsList($names, $flag=0){
	}
	public static function getFieldInfoByName($field_name){
		return null;
	}
	public static function getMethodsList($names){
	}
	public static function getMethodInfoByName($method_name){
		return null;
	}
}