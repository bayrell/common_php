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
namespace BayrellCommon\Types;
use Runtime\rs;
use Runtime\rtl;
use Runtime\Map;
use Runtime\Vector;
use Runtime\Dict;
use Runtime\Collection;
use Runtime\IntrospectionInfo;
use Runtime\UIStruct;
use Runtime\CoreObject;
class Pipe extends CoreObject{
	public $pipe;
	/**
	 * Constructor
	 */
	function __construct(){
		parent::__construct();
		$this->pipe = new Vector();
	}
	/**
	 * Constructor
	 */
	function __destruct(){
		parent::__destruct();
	}
	/**
	 * Add function to pipe
	 */
	function then($f){
		$this->pipe->push($f);
		return $this;
	}
	/**
	 * Add function to pipe
	 */
	function prepend($f){
		$this->pipe->prepend($f);
		return $this;
	}
	/**
	 * Prepend another pipe
	 */
	function prependPipe($p){
		$p->pipe->each(function ($item){
			$this->pipe->prepend($item);
		});
		return $this;
	}
	/**
	 * Append another pipe
	 */
	function appendPipe($p){
		$p->pipe->each(function ($item){
			$this->pipe->append($item);
		});
		return $this;
	}
	/**
	 * Run pipe of functions
	 * @param mixed obj - input value
	 * @return mixed - the result
	 */
	function run($obj){
		return $this->pipe->reduce(function ($res, $item){
			return $item($res);
		}, $obj);
	}
	/* ======================= Class Init Functions ======================= */
	public function getClassName(){return "BayrellCommon.Types.Pipe";}
	public static function getCurrentClassName(){return "BayrellCommon.Types.Pipe";}
	public static function getParentClassName(){return "Runtime.CoreObject";}
	protected function _init(){
		parent::_init();
	}
}