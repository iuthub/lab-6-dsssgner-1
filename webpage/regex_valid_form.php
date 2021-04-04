<?php

	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";
    $removedText = "";
    $replaceComaAndDot = "";
    $removeNewLine= "";

    $popTheWord= "";

	$match="Not checked yet.";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}

    $removedText=preg_replace('/\s+/', '', $text);

    $replaceComaAndDot=preg_replace('/[^0-9,.]/', '', $text);

    $removeNewLine=preg_replace('/\s+/', ' ', trim($text));

    $popTheWord=preg_replace('#\[(.*?)\]#', $text, $match);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

            <dt>Removed whitespace</dt>
            <dd> <code><?=	$removedText ?></code></dd>

            <dt>Replace Coma And Dot</dt>
            <dd> <code><?=	$replaceComaAndDot ?></code></dd

            <dt>Remove New Line</dt>
            <dd> <code><?=	$removeNewLine ?></code></dd

            <dt>Pop The Word </dt>
            <dd> <code><?=	$popTheWord ?></code></dd

            <dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>

	</form>
</body>
</html>
