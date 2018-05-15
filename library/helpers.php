<?php
/**
 * function will chmod dirs and files recursively
 * @param type $start_dir
 * @param type $debug (set false if you don't want the function to echo)
 */
function chmod_recursive($start_dir, $debug = true) {
    $dir_perms = 0755;
    $file_perms = 0755;

    $str = "";
    $files = array();
    if (is_dir($start_dir)) {
        $fh = opendir($start_dir);
        while (($file = readdir($fh)) !== false) {
            // skip hidden files and dirs and recursing if necessary
            if (strpos($file, '.')=== 0) continue;

            $filepath = $start_dir . '/' . $file;
            if ( is_dir($filepath) ) {
                //$newname = sanitize_file_name($filepath);
                echo $str = "chmod $filepath To $dir_perms\n";
                chmod($filepath, $dir_perms);
                chmod_recursive($filepath);
            } else {
                ////$newname = sanitize_file_name($filepath);
                echo $str = "chmod $filepath tp $file_perms\n";
                chmod($filepath, $file_perms);
            }
        }
        closedir($fh);
    }
    if ($debug) {
        echo $str.'<br	>';
    }
}




function array_combine_($keys, $values){
    $result = array();

    foreach ($keys as $i => $k) {
     $result[$k][] = $values[$i];
     }

    array_walk($result, function(&$v){
     $v = (count($v) == 1) ? array_pop($v): $v;
     });

    return $result;
}
