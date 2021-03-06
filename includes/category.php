<?php
$category_id = $_GET["category"];
/**Paging post**/
$per_page = 2;
$cur_page = 1;
$query1 = mysqli_query($conn,"SELECT * FROM post WHERE category_id ='$category_id'");
if(isset($_GET["page-category"])){
    $cur_page = $_GET["page-category"];
    $cur_page = ($cur_page > 1) ? $cur_page : 1;
}
$total_data = mysqli_num_rows($query1);
$total_page = ceil($total_data/$per_page);
$offset = ($cur_page-1)* $per_page;

/**TampilAN DATA post**/
$query = mysqli_query($conn,"SELECT post.*, category.category_name, category.icon FROM post, category
                                WHERE category.id = post.category_id AND post.category_id = '$category_id' 
                                ORDER BY id DESC
                                LIMIT $per_page OFFSET $offset");
?>

<article>
<?php if(mysqli_num_rows($query)>0) { ?>
<?php while ($row=mysqli_fetch_array($query)) { ?>
  <div class="row latest-post">
    <div class="col-md-3">
      <img src="images/<?php echo $row["image"] ?>" class="img-responsive btn-block">
    </div>
    <div class="col-md-9">
      <h2><a href="index.php?detail=<?php echo $row["id"] ?>"><?php echo $row["title"] ?></a></h2>
        <div class="meta">
            <a href="index.php?category=<?php echo $row["category_id"] ?>">
                <span class="<?php echo $row["icon"] ?>" aria-hidden="true">
                </span> <?php echo $row["category_name"] ?>
            </a> - <?php echo tgl_indonesia($row["date"])  ?>
        </div>
        <p><?php echo $row["description"] ?></p>
    </div>
  </div>
  <?php } ?>
<?php } ?>
</article>
<?php if (isset($total_page)){?>
<?php if($total_page >1) { ?>
    <nav class="text-center">
      <ul class="pagination">
        <?php if($cur_page>1) { ?>
        <li>
            <a href="index.php?page-category=<?php echo ($cur_page-1)."&category=".$category_id ?>" aria-label="Previous">
                <span aria-hidden="true">Prev</span>
            </a>
        </li>
        <?php }else{ ?>
            <li class="disabled"><span aria-hidden="true">Prev</span></li>
        <?php }?>
        <?php if($cur_page<$total_page) { ?>
        <li>
          <a href="index.php?page-category=<?php echo ($cur_page +1) ."&category=".$category_id?>" aria-label="Next">
            <span aria-hidden="true">Next</span>
          </a>
        </li>
        <?php }else{ ?>
            <li class="disabled"><span aria-hidden="true">Next</span></li>
        <?php }?>
      </ul>
    </nav>
<?php } ?>
<?php } ?>