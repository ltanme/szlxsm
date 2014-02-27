<div class="anlieList scroll-pane mainBox">
  <div class="anlieList1">
     <ul>
      <?php 
      foreach ($dongtai_list as $key =>$msg) : 
      ?>
	    <li>
	       <span class="newstitle"> 
	       <?php 
	        echo l($msg['title'], 'node/' . $msg['nid']); 
	       ?>
	       </span>
	       <span class="newstime">(<?php echo date('Y-m-d',$msg['ctime']);?>)</span>
	       
	       <div class="newinfo"><?php echo $msg['body'];?>
	         <?php 
	          echo l("详请点击", 'node/' . $msg['nid']); 
	         ?> 
	       </div>
	    </li> 
	    <?php endforeach; ?>
	  </ul>
	   
   
  </div>
  <!--页码-->
  <div id='dpager'>
     <div class="pagercontent">
      <?php 
        print_r(theme('pager'));
      ?>
     </div>
  </div>
</div>

