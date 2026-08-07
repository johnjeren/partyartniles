<ul id="subNav">
  <?php foreach($links as $link){?>
    <li>
      <a href="<?=esc_url($link['inpage']==TRUE?'#'.$link['href']:$link['href']);?>" class="sub-nav-link"><?=esc_html($link['label'])?></a>
    </li>
    <?php } ?>
</ul>
