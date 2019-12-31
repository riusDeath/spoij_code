<?php 
require_once("/var/www/html/combine/config.php");
require_once("/var/www/html/combine/lib/dblib.php");
require_once("/var/www/html/combine/lib/compile.php");
global $DB, $CFG;
$db = new setup_DB($CFG, $DB);
$job = $db->table('mdl_job')->select()->excuteSelectFirst();
$testcases = $db->table("mdl_testcase")->where(['problemid' => $job['problemid']])->excuteSelect();
$index = 0;
foreach ($testcases as $value) {
	$output = combineCode($job['storage'], $job['language'], $value['input']);
	echo $output;
	if((trim($output) != trim($value['output']))){
		break;
	} 
	$index++;
}

if ($index == 0 || count($testcases)==0) {
	$grade = 0;
} else {
	$grade = ($index/count($testcases))*100;
}
$grade_problem = [
	"problemid" => $job['problemid'],
	"userid" => $job['userid'],
	"grade" => $grade,
	"code" => $job['payload'],
	"lang" => $job['language'],
 	"jobid" => $job['id'],
];
$db->table('mdl_grade_problem')->insert($grade_problem)->excute();
$update = [
	'deleted_at' => date("Y-m-d H:i:s")
];
$db->table('mdl_job')
	->update($job['id'], $update)
	->excute();
	echo $grade;
?>