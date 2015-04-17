<?php

require_once 'Toggit.php';

$data = 'Here is so()me c*^%omplicaTed data   with spaces   ';

var_dump("\n");
var_dump(DATA_FORMAT_SEO);
var_dump(Toggit::dataFormat($data, DATA_FORMAT_SEO));

var_dump("\n");
var_dump(DATA_FORMAT_NAME);
var_dump(Toggit::dataFormat($data, DATA_FORMAT_NAME));
var_dump(DATA_FORMAT_NAME_WITH_SPECIAL_CHARS);
var_dump(Toggit::dataFormat($data, DATA_FORMAT_NAME_WITH_SPECIAL_CHARS));

var_dump("\n");
var_dump(DATA_FORMAT_TITLE);
var_dump(Toggit::dataFormat($data, DATA_FORMAT_TITLE));

var_dump("\n");
var_dump("togg_id");
var_dump(Toggit::id());

var_dump("\n");
var_dump("userAgents");
var_dump(Toggit::userAgents());

?>