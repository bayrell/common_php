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
namespace BayrellCommon\FileSystem;
use Runtime\rs;
use Runtime\rtl;
use Runtime\Map;
use Runtime\Vector;
use Runtime\Dict;
use Runtime\Collection;
use Runtime\IntrospectionInfo;
use Runtime\UIStruct;
interface FileSystemInterface{
	/**
	 * Returns files and folders from directory
	 * @param string basedir
	 * @return Vector<string> - Result
	 */
	function getDirectoryListing($basedir = "");
	/**
	 * Returns recursive files and folders from directory
	 * @param string basedir
	 * @return Vector<string> - Result
	 */
	function readDirectoryRecursive($basedir = "");
	/**
	 * Returns recursive only files from directory
	 * @param string basedir
	 * @return Vector<string> - Result
	 */
	function getFilesRecursive($basedir = "");
	/**
	 * Returns content of the file
	 * @param string filepath
	 * @param string charset
	 * @return string
	 */
	function readFile($filepath = "", $charset = "utf8");
	/**
	 * Save file content
	 * @param string filepath
	 * @param string content
	 * @param string charset
	 */
	function saveFile($filepath = "", $content = "", $charset = "utf8");
	/**
	 * Open file
	 * @param string filepath
	 * @param string mode
	 * @return FileInterface
	 */
	function openFile($filepath = "", $mode = "");
	/**
	 * Make dir
	 * @param string dirpath
	 * @param boolean create_parent. Default is true
	 */
	function makeDir($dirpath = "", $create_parent = false);
	/**
	 * Return true if path is folder
	 * @param string path
	 * @param boolean 
	 */
	function isDir($path);
}