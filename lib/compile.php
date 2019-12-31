<?php 
function compilePython($path, $params) {
	chmod($path, 0777);
	$cmd = "python3 ".$path." ".$params."";
	echo $cmd;
	return shell_exec($cmd);
}

function compileJava($path, $params) {
	chmod($path, 0777);
	$cmd = "javac ".$path."java";
	$cmd = "java ".$path." ".$params."";
	echo $cmd." ";
	return shell_exec($cmd);
}

function compilePHP($path, $params) {
	chmod($path, 0777);
	$cmd = "php -r \"require '".$path."'; echo main(".$params.");\"";
	echo $cmd;
	return shell_exec($cmd);
}

function compileCCC($path, $params) {
	chmod($path, 0777);
	$cmd = "gcc -o program ".$path;
	return shell_exec($cmd);
}

function combineCode($path, $language, $params) {
	if ($language == "php") {
		return compilePHP($path, $params);
	} else if ($language == "java"){
		return compileJava($path, $params);
	} else if($language == "py") {
		return compilePython($path, $params);
	}
}

?>
