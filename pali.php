<?php
	$myStr = $_POST['pali'];
	$withIgn = ", with unchecked \"<i>ignore punctuation</i>\"";
	$myStr1 = $myStr;

	//spet ta fora s šumniki, če uporabim regex, mi zbriše tudi šumnike... tko da... tole je zaenkrat rešitev :(
	$punct = array("+",",",".","-","'","\"","&","!","?",":",";","#","~","=","/","$","£","^","(",")","_","<",">");
	if(isset($_POST['test'])){	
		$myStr1 = str_replace($punct,'', $myStr1);
		$withIgn = ", with checked \"<i>ignore punctuation</i>\"";
	}
	$newStr = utf8strrev($myStr1);
	if(strtolower(str_replace(' ', '',$newStr)) == strtolower(str_replace(' ', '',$myStr1))){
		$is = "IS";
	}
	else{ $is = "IS NOT";
	}
	echo "You have entered: <strong><i>$myStr</i></strong>$withIgn<br>Which is reversed: \"<strong>$newStr\"<br><br>
		<i>$myStr</i><span style='color:red'> $is</span></strong> a palindrome!";
	function utf8strrev($someStr){
		preg_match_all('/./us', $someStr, $ar);
		return join('', array_reverse($ar[0]));

	};
?>