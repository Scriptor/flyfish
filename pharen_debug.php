<?php
namespace pharen\debug;
require_once('/home/scriptor/pharen/lang.php');
use Pharen\Lexical as Lexical;
use \Seq as Seq;
use \FastSeq as FastSeq;
Lexical::$scopes['_home_scriptor_flyfishpharen_debug'] = array();
include_once 'pharen/repl.php';
use pharen\repl as repl;
function set_repl_ns($ns){
		\NamespaceNode::$repling = TRUE;
	return compile(("(ns " . $ns . ")"));
}

function help(){
	return "Help:
   (vim) -- opens up both the .phn and .php files in vim";
}

function vim(){
	$phn_file = Lexical::get_lexical_binding('_home_scriptor_flyfishpharen_debug', 247, '$phn_file', isset($__closure_id)?$__closure_id:0);;
	$php_file = Lexical::get_lexical_binding('_home_scriptor_flyfishpharen_debug', 247, '$php_file', isset($__closure_id)?$__closure_id:0);;
	$phn_line = Lexical::get_lexical_binding('_home_scriptor_flyfishpharen_debug', 247, '$phn_line', isset($__closure_id)?$__closure_id:0);;
	return system(("vim -o " . $phn_file . " " . $php_file . " +" . $phn_line . " > `tty`"));
}

function generate_pharen_err($msg, $phn_file, $phn_line, $php_file, $php_line){
	$__scope_id = Lexical::init_closure("_home_scriptor_flyfishpharen_debug", 247);
	Lexical::bind_lexing("_home_scriptor_flyfishpharen_debug", 247, '$phn_file', $phn_file);
	Lexical::bind_lexing("_home_scriptor_flyfishpharen_debug", 247, '$phn_line', $phn_line);
	Lexical::bind_lexing("_home_scriptor_flyfishpharen_debug", 247, '$php_file', $php_file);

	prn("Error: ", $msg, " near ", $phn_file, ":", $phn_line);
	set_repl_ns("pharen.debug");
	repl\work();
	return TRUE;
}

