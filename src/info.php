<?php 

  header("Content-type: text/html; charset=utf-8");

?><html><head>
  <title>jQuery Zkouščka - info</title>
</head><body>

  <h1>Info</h1>

<?php

  $files = array();
  
  $handle = opendir('safe');
  
  $counter = 0;
  $space = 0;
  
  while (false !== ($file = readdir($handle)))
  {
    if(is_file('safe/' . $file))
    {
      //echo $file . "<br />";
      $file_name = 'safe/' . $file;
      $counter ++;
      $size = filesize($file_name);
      $space += $size;
      
      $files[] = array( 'name' => substr($file, 0, -5), 
                        'size' => $size,
                        'time'   => filemtime($file_name),
                      );
    }
  }
  
  function cmp($b, $a)
  {
    return $a['time'] - $b['time'];
  }
  
  usort($files, "cmp");
  
?>
  
  <hr>
  
  <table>
    <tr>
      <td><b>Files: </b> </td>
      <td><?php echo $counter; ?></td>
    </tr>
    <tr>
      <td><b>Total size: </b> </td>
      <td><?php echo round($space/1024, 3); ?> kB</td>
    </tr>
  </table>
  
  <hr>
  
  <table>
    <tr>
      <th style="width: 50px;">n</th>
      <th style="width: 400px;">Name</th>
      <th style="width: 100px;">Size [B]</th>
      <th>Created</th>
    </tr>
    
    <?php $i = 1; foreach ($files as $file): ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><a href=".#<?php echo $file['name']; ?>" target="_blank"><?php echo $file['name']; ?></a></td>
      <td><?php echo $file['size']; ?></td>
      <td><?php echo date('d.m.y – H:i:s', $file['time']); ?></td>
    </tr>
    <?php endforeach ?>



</body></html>