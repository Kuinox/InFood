//start
<?php
ob_end_flush();
for($i=0;$i<=100;$i++)
{
    // sleep 1 seconds every so often
    if($i % 2 == 0)
        sleep(1);
    echo "\n" . $i;
    flush();
}
