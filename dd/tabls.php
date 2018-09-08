<table width="600" align="center" border="1" bordercolor="e5e5e5" cellpadding="0" cellspacing="0">
<tr>
<?php

if ($how>=1)
{
echo<<<END
<br />
<td width="50" align="center" bgcolor="lightgray"><font color="black"><b>POSITION</b></font></td>
<td width="100" align="center" bgcolor="lightgray"><font color="black"><b>NICK</b></font></td>
<td width="100" align="center" bgcolor="lightgray"><font color="black"><b>TURNS</b></font></td>
</tr><tr>
END;
}
	for ($i = 1; $i <= $how; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$nick = $row['nick'];
		$turns = $row['turns'];

echo<<<END
<td width="50" align="center">$i</td>
<td width="100" align="center"><a style="cursor: pointer">$nick</a></td>
<td width="100" align="center">$turns</td>
</tr><tr>
END;

	}


?>


</tr></table>
