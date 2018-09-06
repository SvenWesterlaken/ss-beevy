<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
  <% base_tag %>
	$MetaTags(false)
  <title>$Title</title>
  <meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />


	<!-- Google Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto:300,400,500,700" rel="stylesheet">
  <script type="application/javascript" src="//code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>
  <header>
    <% include Header %>
  </header>
  $Layout
  <footer>
    <% include Footer %>
  </footer>
</body>
</html>
