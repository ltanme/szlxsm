 <div class="anlieList">
	<div class="tenglong-anlie clearfix">
	<ul> 
		<?php foreach ($anlie_list as $key =>$msg) : ?>
		 <li>
		
			 <div class="thumbnail-anlie" >
			 <?php 
				 echo l(theme_image_style(array('path' => $msg['img'],
				 'style_name' => 'medium')), 'workroom/' . $msg['nid'], array('html' => TRUE)); 
				?>
			 </div>
				
		 
		 <div class="title-anlie">
		   <?php 
				echo  l($msg['title'], 'workroom/' . $msg['nid']);
	        ?>
		 </div> 
		
		 </li>
		<?php endforeach; ?>
</ul>
		 
	</div>
	<div id='dpager'>
     <div class="pagercontent">
      <?php 
        print_r(theme('pager'));
      ?>
     </div>
  </div>
</div>
