<?php

$files = array("preface", "statistical-data", "related-work", "payola", "proposal", "implementation", "experiments", "future-work", "epilog");

$abbrs = array();

foreach ($files as $file) {
        $content = file_get_contents($file.".tex");
        $matches = array();

	if (preg_match_all("~([A-Z]{2,6})~", $content, $matches)){
//var_dump($matches); exit;
		foreach ($matches[1] as $abbr){
			if (!in_array($abbr, $abbrs)){
				$abbrs[] = $abbr;
			}
		}
	}
}

foreach ($abbrs as $abbr){
	echo $abbr."\n";
}
