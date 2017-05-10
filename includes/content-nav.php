


<div class="group-nav portfolioFilter">
   
    <ul class="filter-button-group">
      <?php for($i = 0; $i < count ($groups_Menu) ; $i++) : ?>
    
        <li>
            
            <a  href="#" data-filter="<?= $groups_Menu[$i][4]; ?>"><?= $groups_Menu[$i][2]; ?></a></li>
        </li>
            
   
    <?php endfor; ?>
     </ul>
</div>