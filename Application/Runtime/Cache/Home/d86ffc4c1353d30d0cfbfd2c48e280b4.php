<?php if (!defined('THINK_PATH')) exit();?><table> 
<tr>    
	<td>id:</td>    
	<td><?php echo ($data["id"]); ?></td> 
</tr>
<tr>    
	<td>标题：</td>    
	<td><?php echo ($data["title"]); ?></td>
</tr>
<tr>    
	<td>
		内容:
	</td>    
	<td>
		<?php echo ($data["content"]); ?>
	</td>
</tr> 
<tr>
	<td>
		title:
	</td> 	
	<td>
		<?php echo ($title); ?>
	</td>
</tr>
</table>