<?php
$br = (php_sapi_name() == "cli")? "":"<br>";

if(!extension_loaded('IDGen')) {
	dl('IDGen.' . PHP_SHLIB_SUFFIX);
}
$module = 'IDGen';
$functions = get_extension_funcs($module);
echo "Functions available in the test extension:$br\n";
foreach($functions as $func) {
    echo $func."$br\n";
}
echo "$br\n";
$function = 'confirm_' . $module . '_compiled';
if (extension_loaded($module)) {
	$str = $function($module);
} else {
	$str = "Module $module is not compiled into PHP";
}
echo "$str\n";

$config = array(
	'server_id' => 'fsrfsd9',
	'sequence_id' => 'a10',
	'last_timestamp' => 1476148258123,
);

$idgen = new IDGen($config);
$ret = $idgen->get();
var_dump($ret);
?>
