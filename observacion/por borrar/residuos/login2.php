<?php
if (isset($_SESSION['k_username'])) 
{
	echo (' Usuario: '.$_SESSION['k_username']);

	
}else{
	echo '
		<br><br>
		 <form action="validar.php" name="" method="post">
        	<table  width="400" border="0" align="right">
            <tr>
            	<td align="right">
                	Usuario: 
				</td>
				<td  align="left">
					<input type="text" name="usuario" size="25" maxlength="30"/>
				</td>
			</tr>
			<tr>
				<td  align="right">
                    Contrase&ntildea:
				</td>
				<td  align="left">
					<input type="password"  name="password" size="25" maxlength="30"/>
				</td>
				
			</tr>	
				<tr>
					<td colspan="2">                    	<input type="submit" value="Entrar" />
                    	<input type="reset" value="Limpiar" />
               		</td>
            </tr>
            </table>
         </form>';
}
?>
