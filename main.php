<!DOCTYPE html>
<html>
    <head>
        <title>Pokemon Fans | Products</title>
        <link href="./common.css" rel="stylesheet" />
        <link href="./list.css" rel="stylesheet" />
        
    </head>
    
    <body>
            
        <div class="header">      
            <a href="index.html" class="logo">POKEMON FANS</a>
            <ul class="nav">
                <li class="nav-item"><a href="index.html">Home</a></li>
                <li class="nav-item active"><a href="list.html">Products</a></li>
            </ul>
        </div>            
            
        <div class="list">
            <table>
                <tr>          
            
                <?php
                
                    ini_set('display_errors', 'on'); 

                    require('credentials.php'); 
                    
                    $link = new PDO("mysql:host=$hostname; dbname=$database;", $username, $password); 
                    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                    
                    $count = 0; 
                    $sql = "SELECT * FROM products"; 
                    foreach ($link->query($sql) as $row){
                        
                        if ($count % 4 == 0){
                            
                        
                    ?>
                    
                            <tr>
<?php
                        }
?>
                        <td>
                            <div class="pic_cell">
                                <a href=""><img alt="<?php echo $row['name'] ?> Image Is Not Available" src=""></a>
                                <div class="container">
                                    <p class="name">Pokemon <?php echo $row['name'] ?></p>
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
        <div class="footer">
            <p>University of California, Irvine, CA 92676</p>          
            <p>&copy; 2016 Pokemon Fans.  All rights reserved.</p>
        </div> 

    </body>
</html>