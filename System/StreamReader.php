<?php
/*!
 * Bayrell Common Library
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
namespace BayrellCommon\System;
use Runtime\rs;
use Runtime\rtl;
use Runtime\Map;
use Runtime\Vector;
use Runtime\Dict;
use Runtime\Collection;
use Runtime\IntrospectionInfo;
use Runtime\UIStruct;
use Runtime\CoreObject;
class StreamReader extends CoreObject{
	protected $stream;
	protected $charset;
	/**
	 * Create object
	 */
	function __construct($stream, $charset = "utf8"){
		$this->stream = $stream;
		$this->charset = $charset;
	}
	/**
	 * Returns current stream
	 */
	function getStream(){
		return $this->stream;
	}
	/**
	 * Returns current stream
	 */
	function getCharset(){
		return $this->charset;
	}
	/**
	 * Read next char from stream
	 * @return char
	 */
	function readChar(){
	}
	/**
	 * Read string from stream
	 * @param int 
	 * @return string
	 */
	function readString($length){
		$s = "";
		$i = 0;
		while (!$this->stream->isEOF() && $i < $length){
			$s .= $this->readChar();
			$i++;
		}
		return $s;
	}
	/**
	 * Read line from stream
	 * @return string
	 */
	function readLine(){
		$s = "";
		$ch = $this->readChar();
		while (!$this->stream->isEOF() && $ch != "\n"){
			$s .= $ch;
			$ch = $this->readChar();
		}
		return $s;
	}
	/**
	 * Read all content from stream
	 */
	function readAll($buffer_length = 4096){
		$res = new Vector();
		while (false){
			$buffer = $this->stream->readBytes($buffer_length);
			$res->appendVector($buffer);
		}
		$s = (new \Runtime\Callback($Utils->getClassName(), "bytesToString"))($res, $this->charset);
		return $s;
	}
	/* ======================= Class Init Functions ======================= */
	public function getClassName(){return "BayrellCommon.System.StreamReader";}
	public static function getCurrentClassName(){return "BayrellCommon.System.StreamReader";}
	public static function getParentClassName(){return "Runtime.CoreObject";}
	protected function _init(){
		parent::_init();
	}
}