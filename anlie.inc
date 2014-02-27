<?php 
function szlxsm_anlie(){
  global $user; 
   $output = '';
  //Use Database API to retrieve current posts.
 
   if(arg(1)=='all'){
          $query = db_select('node', 'n')
          ->extend('PagerDefault');
          $query->join('photos_album', 'p', 'p.pid = n.nid');
          $query->fields('n', array('nid')); 
          $query->fields('p', array('fid')); 
          $query->orderBy('p.wid', 'ASC');
          $query->orderBy('n.nid', 'DESC');
          $query->limit(16);
          $objects = $query->execute()->fetchAll();  
   }else{
     
       $query = db_select('taxonomy_index', 't')
       ->extend('PagerDefault');
       $query->join('node', 'n', 'n.nid = t.nid');
       $query->join('photos_album', 'p', 'p.pid = n.nid');
       $query->fields('n', array('nid'));
       $query->fields('p', array('fid')); 
       $query->condition('t.tid', arg(1));
       $query->orderBy('p.wid', 'ASC');
       $query->orderBy('n.nid', 'DESC');
       $query->limit(16);
       $objects = $query->execute()->fetchAll();
   }
 
  foreach ($objects as $key=>$object) {
     $image = photos_get_info($object->fid,$object);
     $node = node_load($object->nid);
      $data = array(
          "title"=>$node->title,
          "nid"=>$object->nid,
          "fid"=>$object->fid,
          "anlieinfo"=>drupal_substr(strip_tags($node->body['und']['0']['value']),0,130),
          "img"=>isset($image->uri)? $image->uri: "public://photos/nocover.jpg"
      );
     $rows[] = $data; 
  }
 
  $header =  array("ID");
  //$output .= theme('table', array('header' => $header,'rows' => $rows));
  $output .= theme('anlie_list', array('anlie_list' => $rows));
 
  return $output;
  

}

function szlxsm_workroom(){
      $ablum_id = arg(1);
      
      
      $query = db_select('file_managed', 'f')->extend('PagerDefault');
      $query->join('photos_image', 'p', 'p.fid = f.fid');
      $query->join('photos_album', 'a', 'p.pid = a.pid');
      $query->join('node', 'n', 'n.nid = p.pid'); 
      $query->fields('f', array('uri', 'filemime', 'timestamp', 'filename'))
      ->fields('p')
      ->fields('n',array('title'))
      ->fields('a', array('data'));
       $query->condition('a.pid', $ablum_id);
       $query->limit(100);
      $images = $query->execute()->fetchAll(); 
      foreach ($images as $key=>$value){
            $nodeinfo  = node_load($value->pid);
            $value->workroominfo = drupal_substr(strip_tags($nodeinfo->body['und']['0']['value']),0,230);
      }
       
        
      $output .= theme('workroom_list', array('workroom_list' => $images));
      $output .= theme('pager');
      return $output;
}

function szlxsm_dongtai(){
  
  if(arg(1)=='all'){
    $query = db_select('node', 'n')
    ->extend('PagerDefault'); 
    $query->fields('n', array('nid','title')); 
    $query->orderBy('n.nid', 'DESC');
    $query->limit(4);
    $query->condition('n.type', "article");
    $objects = $query->execute()->fetchAll();
    
  
    foreach ($objects as $key=>$object) {
      $node = node_load($object->nid);
 
      $data = array(
          "title"=>$node->title,
          "nid"=>$object->nid,
          "ctime"=>$node->changed,
          "body"=>drupal_substr(str_replace(array("&nbsp;"," "), "",strip_tags($node->body['und'][0]['value'])) ,0,130)
      );
      
      $rows[] = $data;
    }
  
    
    $header =  array("ID");
    //$output .= theme('table', array('header' => $header,'rows' => $rows));
    $output .= theme('dongtai_list', array('dongtai_list' => $rows)); 
    return $output; 
  }
}
