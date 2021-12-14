<?php
  
  $csvfile = 'Book1.csv';
  $file_handle = fopen($csvfile, 'r');
  while(list($Name, $Password, $email, $AccountType, $Gender, $DateOfBirth) =
  fgetcsv($file_handle, 1024, ','))
  {
    
  }
    fclose($file_handle);
?>