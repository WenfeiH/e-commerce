<!DOCTYPE html>
<html>
    <head>
        <title>Pokemon Fans | Products</title>
        <link href="./css/list.css" rel="stylesheet" />
        
    </head>
    
    <body>
        <?php include "header.html"?>
        
        <div class="list">
            <table>
                <tr>          
            
                    <?php
                    ini_set('display_errors', 1); 

                    require('credentials.php');
                    require('misc.php');

                    $link = new PDO("mysql:host=$hostname; dbname=$database;", $username, $password); 
                    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

                    $count = 0; 
                    $sql = "SELECT * FROM products"; 
                    foreach ($link->query($sql) as $row){
                        if ($count % 4 == 0){     
                            echo "<tr>";            
                        }

                        $dir = parseName($row['name']);
                        $img = "Images/" . $dir . "/" . $dir . ".jpg";
                        $ref = "./detail.php?name=" . $row['name']; 
                    ?>
                    <td>
                        <div class="pic_cell">
                            <a href="<?php echo $ref ?>"><img alt="<?php echo $row['name'] ?> Image Is Not Available" src="<?php echo $img ?>"></a>
                            <div class="container">
                                <p class="name"><?php echo $row['name'] ?></p>
                                <p class="rd">Release Date: <?php echo $row['releaseDate'] ?></p>
                                <p class="gen">Generation: <?php echo $row['generation'] ?></p>
                            </div>
                        </div>
                    </td>

                    <?php
                        $count = $count + 1;         
                    }
                    ?>
                </tr>                
            </table>
        </div>
        
        <?php include "footer.html"?>
    </body>
</html>