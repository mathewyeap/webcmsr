<?php

function data_path($path = '')
{
	return Config::get('webcms.dataPath', '/tmp/webcms-data').($path ? '/'.$path : $path);
}