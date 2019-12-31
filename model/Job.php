<?php 

class Job {
	
	public $fillable = [
		"id",
		"storage",
		"userid",
		"language",
		"payload",
		"problemid",
		"lang",
		"attempts",
		"reserved_at",
		"available_at",
	];
	public $table = "mdl_job";

}

 ?>