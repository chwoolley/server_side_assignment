<div class="group-nav">
    <?php for($i = 0; $i < count ($groups_Menu) ; $i++) : ?>
    <ul class="groups-menu">
        <li>
            
            <a href="<?php echo $_SERVER['PHP_SELF']."?groupcode={$groups_Menu[$i][0]}" ?>"><?= $groups_Menu[$i][2]; ?></a></li>
        </li>
        
    </ul>
    <?php endfor; ?>
</div>



<div class="group-nav portfolioFilter">
    
    <ul class="groups-menu filter-button-group">
        <li>
           <a href="#"  data-filter="*" class="current">ALL</a>
            
        </li>
         <li >
           <a href="#" data-filter=".Illustration">Illustration</a>
            
        </li>
           <li >
          <a href="#" data-filter=".Design"> Design</a>
        </li>
          <li >
           <a href="#" data-filter=".Teedesign">Tee Shirt Designs</a>
        </li>
                  <li >
          <a href="#" data-filter=".Web"> Web</a>
        </li>
                  <li >
          <a href="#" data-filter=".Sketches">Sketches</a>
        </li>
    </ul>
   
</div>


<!-- <div class="group-nav">
    <?php for($i = 0; $i < count ($groups_Menu) ; $i++) : ?>
    <ul class="groups-menu">
        <li>
            
            <a href="<?php echo $_SERVER['PHP_SELF']."?groupcode={$groups_Menu[$i][0]}" ?>"><?= $groups_Menu[$i][2]; ?></a></li>
        </li>
        
    </ul>
    <?php endfor; ?>
</div> -->