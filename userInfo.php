<?php
class userInfo {
	public $id;
		public $name;
		public $hash;
		public $firstName;
		public $lastName;
		public $question_answer;
		public $gender;
		public $mobileNumber;
		public $email;
		public $info;
		public $picName;
		function __construct($d,$n, $h, $f, $l, $qa, $g, $m, $e, $i, $p){
			$this->id=$d;
			$this->name = $n;
			$this->hash = $h;
			$this->firstName = $f;
			$this->lastName = $l;
			$this->question_answer = $qa;
			$this->gender = $g;
			$this->mobileNumber = $m;
			$this->email = $e;
			$this->info = $i;
			$this->picName = $p;
		}
	};
?>