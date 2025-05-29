<ul id="subNav">
  <?php foreach($links as $link){?>
    <li>
      <a href="<?=$link['inpage']==TRUE?'#'.$link['href']:$link['href'];?>" class="sub-nav-link"><?=$link['label']?></a>
    </li>
    <?php } ?>
</ul>
