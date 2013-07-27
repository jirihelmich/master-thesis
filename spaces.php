<?php

$file = "proposal.tex";

$data = file_get_contents($file);
$data = preg_replace("~ ([^\\{}()\.;0-9,=$_-]{0,3})\n~s"," $1~", $data);
$data = preg_replace("# ([^\\{}()\.;0-9,=$_-]{0,3}) #"," $1~", $data);
$data = str_replace("~~","~",$data);
$data = str_replace(" ~"," ",$data);
echo $data;
