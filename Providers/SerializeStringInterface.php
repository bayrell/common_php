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
use Runtime\rs;
use Runtime\rtl;
use Runtime\Map;
use Runtime\Vector;
use Runtime\Dict;
use Runtime\Collection;
use Runtime\IntrospectionInfo;
use Runtime\UIStruct;
interface SerializeStringInterface{
	/**
	 * Convert object to string
	 * @return string
	 */
	function convertToString($obj);
	/**
	 * Restore object from string
	 * @param string s
	 */
	function restoreFromString($s);
	/**
	 * Set display class name
	 * @param boolean value
	 */
	function setDisplayClassName($value);
	/**
	 * Set indent
	 * @param string value
	 */
	function setIndent($value);
	/**
	 * Set space
	 * @param string value
	 */
	function setSpace($value);
	/**
	 * Set crlf
	 * @param string value
	 */
	function setCRLF($value);
	/**
	 * Returns display class name
	 * @return string
	 */
	function getDisplayClassName();
	/**
	 * Returns indent
	 * @return string
	 */
	function getIndent();
	/**
	 * Set space
	 * @param string value
	 */
	function getSpace();
	/**
	 * Returns crlf
	 * @return string
	 */
	function getCRLF();
}