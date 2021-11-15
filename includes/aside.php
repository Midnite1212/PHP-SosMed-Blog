<?php
/**cetak side komentar**/
$query=mysqli_query($conn,"SELECT * FROM comment ORDER BY id DESC LIMIT 4 ");
?>


<aside class="col-md-4">
    <div class="panel panel-default">
    	<div class="panel-heading">
    		<h3 class="panel-title">Komentar Terbaru</h3>
    	</div>
    	<div class="panel-body latest-comments">
    		<ul>
            <?php if(mysqli_num_rows($query)>0){?>
            <?php while ($row_new_comment=mysqli_fetch_array($query)){?>
    		    <li><a href="index.php?detail">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 
                    <strong><?php echo $row_new_comment["name"]?>
                    </strong>: <?php echo $row_new_comment["reply"] ?></a></li>
    	<?php }?>
        <?php }?>
        </div>
    </div>
</aside>

