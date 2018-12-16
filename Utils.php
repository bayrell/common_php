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
namespace BayrellCommon;
use Runtime\rtl;
use Runtime\Map;
use Runtime\Vector;
use Runtime\IntrospectionInfo;
use Runtime\rs;
use Runtime\ContextObject;
use Runtime\CoreObject;
use Runtime\Interfaces\ContextInterface;
use Runtime\Interfaces\FactoryInterface;
use BayrellCommon\Exceptions\AssertError;
use BayrellCommon\Types\PathInfo;
class Utils{
	/**
	 * Equals value1 and value2. Throw exception if value1 != value2
	 * @param var value1
	 * @param var value2
	 */
	static function assert($value, $message = ""){
		if (!$value){
			throw new AssertError(null, $message);
		}
	}
	/**
	 * Разбивает путь файла на составляющие
	 * @param {string} filepath путь к файлу
	 * @return {json} Объект вида:
	 *         dirname    - папка, в которой находиться файл
	 *         basename   - полное имя файла
	 *         extension  - расширение файла
	 *         filename   - имя файла без расширения
	 */
	static function pathinfo($filepath){
		$arr1 = rs::explode(".", $filepath);
		$arr2 = rs::explode("/", $filepath);
		$ret = new PathInfo();
		$ret->filepath = $filepath;
		$ret->extension = $arr1->pop();
		$ret->basename = $arr2->pop();
		$ret->dirname = rs::implode("/", $arr2);
		$ext_length = rs::strlen($ret->extension);
		if ($ext_length > 0){
			$ext_length++;
		}
		$ret->filename = rs::substr($ret->basename, 0, -1 * $ext_length);
		return $ret;
	}
	/**
	 * Возвращает полное имя файла
	 * @param {string} filepath - путь к файлу
	 * @return {string} полное имя файла
	 */
	static function basename($filepath){
		$ret = static::pathinfo($filepath);
		$res = $ret->basename;
		return $res;
	}
	/**
	 * Возвращает расширение файла
	 * @param {string} filepath - путь к файлу
	 * @return {string} расширение файла
	 */
	static function extname($filepath){
		$ret = static::pathinfo($filepath);
		$res = $ret->extension;
		return $res;
	}
	/**
	 * Возвращает путь к папке, содержащий файл
	 * @param {string} filepath - путь к файлу
	 * @return {string} путь к папке, содержащий файл
	 */
	static function dirname($filepath){
		$ret = static::pathinfo($filepath);
		$res = $ret->dirname;
		return $res;
	}
	/**
	 * Returns relative path of the filepath
	 * @param string filepath
	 * @param string basepath
	 * @param string ch - Directory separator
	 * @return string relative path
	 */
	static function relativePath($filepath, $basepath, $ch = "/"){
		$source = rs::explode($ch, $filepath);
		$base = rs::explode($ch, $basepath);
		$source = $source->filter(function ($s){
			return $s != "";
		});
		$base = $base->filter(function ($s){
			return $s != "";
		});
		$i = 0;
		while ($source->count() > 0 && $base->count() > 0 && $source->item(0) == $base->item(0)){
			$source->shift();
			$base->shift();
		}
		$base->each(function ($s) use (&$source){
			$source->unshift("..");
		});
		return rs::implode($ch, $source);
	}
	/* ======================= Class Init Functions ======================= */
	public function getClassName(){return "BayrellCommon.Utils";}
	public static function getParentClassName(){return "";}
}