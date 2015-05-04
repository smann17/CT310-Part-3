<?php
class user {
		public $name;
		public $hash;
		public $firstName;
		function __construct($n, $h, $f){
			$this->name = $n;
			$this->hash = $h;
			$this->firstName = $f;
		}
	};
?>