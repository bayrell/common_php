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
namespace BayrellCommon\Providers;
use Runtime\rtl;
use Runtime\Map;
use Runtime\Vector;
use Runtime\IntrospectionInfo;
/**
 * Provider "default:assert" 
 */
interface AssertInterface{
	/**
	 * Throw exception with message
	 * @param string message
	 * @param Object prev - Previous error
	 */
	function error($message = "", $prev = null);
	/**
	 * Throw exception with message if value is true
	 * @param boolean value
	 * @param string message
	 * @param Object prev - Previous error
	 */
	function assert($value, $message = "", $prev = null);
	/**
	 * Equals value1 and value2. Throw exception if value1 != value2
	 * @param var value1
	 * @param var value2
	 * @param string message
	 * @param Object prev - Previous error
	 */
	function equals($value1, $value2, $message = "", $prev = null);
	/**
	 * Check if value is boolean and equals True
	 * @param var value
	 * @param string message
	 * @param Object prev - Previous error
	 */
	function checkTrue($value, $message = "", $prev = null);
	/**
	 * Check if value is boolean and equals False
	 * @param var value
	 * @param string message
	 * @param Object prev - Previous error
	 */
	function checkFalse($value, $message = "", $prev = null);
	/**
	 * Check if value is not null 
	 * @param var value
	 * @param string message
	 * @param Object prev - Previous error
	 */
	function checkExists($value, $message = "", $prev = null);
	/* ======================= Class Init Functions ======================= */
}