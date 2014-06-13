#! /usr/bin/env php
<?php
namespace flyfish;
require_once('/home/scriptor/pharen/lang.php');
use Pharen\Lexical as Lexical;
use \Seq as Seq;
use \FastSeq as FastSeq;
Lexical::$scopes['_flyfish'] = array();
$__scope_id = Lexical::init_closure("_flyfish", 249);
include_once 'pharen/path.php';
use pharen\path as path;
$flydir = dirname(__FILE__);
Lexical::bind_lexing("_flyfish", 249, '$flydir', $flydir);
function copy_debug_file($cwd){
	$flydir = Lexical::get_lexical_binding('_flyfish', 249, '$flydir', isset($__closure_id)?$__closure_id:0);;
	return copy(($flydir . "/pharen_debug.php"), ($cwd . "/pharen_debug.php"));
}

function compile_file($file){
	exec(("pharen -d " . $file));
	return str_replace(".phn", ".php", $file);
}

$cwd = getcwd();

$__condtmpvar5 = Null;
if(isset($argv[1])){
	$__condtmpvar5 = $argv[1];
}
else{
	$__condtmpvar5 = NULL;
}
$file = $__condtmpvar5;
if(!($file)){
	prn("Usage: flyfish <pharen file>");
	exit(0);
}
else{
	NULL;
}


copy_debug_file($cwd);
$phpfile = compile_file(path\join($cwd, $file));
include_once($phpfile);
