<?
function dump($var, $return = false)
{
    if (is_array($var)) {
        $out = print_r($var, true);
    } else if (is_object($var)) {
        $out = var_export($var);
    } else {
        $out = $var;
    }
    if ($return) {
        return "\n<pre>$out</pre>\n";
        echo "reterned";
    } else {
        echo "<pre> $out</pre>";
    }
}
