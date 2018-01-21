<?php
include_once("creatAccessToken.php");
$AppID='wx81f5b1d4d893eb8c';
$AppSecret='78eefed22bf0006d53eae8b891b54e9b';
$tokenClass = new TokenUtil();
$tokenClass->build_access_token($AppID,$AppSecret);


