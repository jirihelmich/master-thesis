<?php

$keys = array();

$files = array("preface", "statistical-data", "related-work", "payola", "proposal", "implementation", "experiments", "future-work", "epilog");

foreach ($files as $file){
	$content = file_get_contents($file.".tex");
	$matches = array();
	if (preg_match_all("~cite\{([^}]+)\}~", $content, $matches)){
		$matched = $matches[1];
		foreach ($matched as $bib){
			if (!in_array($bib, $keys)){
				$keys[] = $bib;
			}
		}
	}
}

foreach ($keys as $k => $v){
	//echo "[$k] => $v\n";
}

$bibfile = "bibliography.tex";
$bibcontent = file_get_contents($bibfile);
$m = array();
if (preg_match_all("~bibitem\{([^}]+)\}~", $bibcontent, $m)){
	//var_dump($m[1]);
}

foreach ($keys as $k => $v){
	if($v != $m[1][$k]){
		$r = array_flip($m[1]);
		$p = $r[$v];
		echo "Move $v to position [$k - after ".$keys[$k-1]."] (is at $p)\n";
	}
}