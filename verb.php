<?php

function contains ($needle, $haystack){
	return (strpos($haystack, $needle) !== FALSE);
}

$files = array("preface", "statistical-data", "related-work", "payola", "proposal", "implementation", "experiments", "future-work", "epilog");

foreach ($files as $file) {
	$content = file($file.".tex");
	$matches = array();

	echo $file."\n";

	$open = false;

	$i = 0;
	foreach($content as $line){
		$i++;
		if (contains("\\begin{verbatim}",strtolower($line))){
			if (!$open){
				$open = true;
			}else{
				echo "\nwarning, opening verb in verb\n";
			}
		}
		if ($open){
			if (contains("~",$line)){
				echo "~ in ".$file." at line: ".$i."\n";
			}
		}
		if (contains("\\end{verbatim}",strtolower($line))){
                        if (!$open){
                                echo "\nwarning, closing closed verb\n";
                        }else{
				$open = false;
                        }
                }
	}

}
