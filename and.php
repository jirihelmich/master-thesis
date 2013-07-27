<?php

$files = array("preface", "statistical-data", "related-work", "payola", "proposal", "implementation", "experiments", "future-work", "epilog");

foreach ($files as $file) {
	$content = file_get_contents($file.".tex");
	$matches = array();

	$x = $content;
	$x = preg_replace("/( |~)(and|any) /i","$1$2~",$x);
	$x = preg_replace("/~\n/s","~",$x);
	file_put_contents($file.".tex", $x);
}
