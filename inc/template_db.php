<?php
$dbconn = pg_connect("host=xxx 1dbname=xxxx user=xxxxx password=xxxxx")
    or die('Could not connect: ' . pg_last_error());
