<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/template.css" rel="stylesheet">
    <link href="css/listA.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">


            <div id="mainmenu">
                <ul>
                    <!-- Пункт меню 1 -->
                    <li><a  href="?">Home</a>
                        <ul>
                    </li>
                </ul>

                    <!-- Пункт меню 2 -->
                    <li><a  href="?controler=films">film</a>
                        <ul>
                            <li><a href="?controler=films&action=add">add</a></li>
                            <li><a href="?controler=films&action=delete">delete</a></li>
                            <li><a href="?controler=films&action=print">print</a></li>
                            <li><a href="?controler=films&action=search">search</a></li>
                        </ul>
                    </li>
                    <!-- Пункт меню 3 -->
                    <li><a  href="?controler=studios">studio</a>
                        <ul>
                            <li><a  href="?controler=studios&action=add">add</a></li>
                            <li><a  href="?controler=studios&action=delete">delete</a></li>
                            <li><a  href="?controler=studios&action=print">print</a></li>
                            <li><a  href="?controler=studios&action=printfilmsbystudio">print films by studio</a></li>
                            <li><a  href="?controler=studios&action=search">search</a></li>
                        </ul>
                    </li>
                    <!-- Пункт меню 4 -->
                    <li> <a  href="?controler=producers">producer</a>
                        <ul>
                            <li><a  href="?controler=producers&action=add">add</a></li>
                            <li><a  href="?controler=producers&action=delete">delete</a></li>
                            <li><a  href="?controler=producers&action=print">print</a></li>
                            <li><a  href="?controler=producers&action=printfilmbyproducer">print film by producer</a></li>
                            <li><a  href="?controler=producers&action=search">search</a></li>
                        </ul>
                    </li>

                <!-- Пункт меню 5 -->
                <li><a href="?controler=countries">Country</a>
                    <ul>
                        <li><a href="?controler=countries&action=add">add</a></li>
                        <li><a href="#">подпункт 5.2</a></li>
                        <li><a href="#">подпункт 5.3</a></li>
                        <li><a href="#">подпункт 5.4</a></li>
                        <li><a href="#">подпункт 5.5</a></li>
                    </ul>
                </li>
                <!-- Пункт меню 6 -->
                <li><a href="?controler=nationalities">Country</a>
                    <ul>
                        <li><a href="?controler=nationalities&action=add">add</a></li>
                        <li><a href="#">подпункт 5.2</a></li>
                        <li><a href="#">подпункт 5.3</a></li>
                        <li><a href="#">подпункт 5.4</a></li>
                        <li><a href="#">подпункт 5.5</a></li>
                    </ul>
                </li>

                </ul>
            </div>

        </div>
    </div>
</nav>

<div class="container">
