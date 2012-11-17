<?php
class date
{	
	function time_date($timestamp)
	{
		return date('j-n-Y - H:i',$timestamp);
	}
}

$data= new date();
print_r($data->time_date(1352201826));
?>
