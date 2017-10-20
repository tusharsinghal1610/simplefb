<?php
$a[] = "";
$a[] = "abc@123";
$a[] = "aman";
$a[] = "creator";
$a[] = "Kanika45";
$a[] = "Manisha";
$a[] = "mark";
$a[] = "mksinghal8";
$a[] = "Ram";
$a[] = "singhal100tushar";
$a[] = "singhal103.ts";
$a[] = "singhal104.ts";
$a[] = "singhal105.ts";
$a[] = "singhal106.ts";
$a[] = "singhsudhanshu204";
$a[] = "tanyasinghal1610";
$a[] = "tushar";
$a[] = "tushar@gmail.com";
$a[] = "tushar11";
$a[] = "tushar7888";
$a[] = "tushargautam46";
$a[] = "tusharsinghal3";
$a[] = "tusharsinghal309";
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = "<option value = $name>";
            } else {
                $hint .= "<option value = $name>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>