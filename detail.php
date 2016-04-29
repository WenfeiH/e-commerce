<!DOCTYPE html>
<html>
	<head>
		<title>Pokemon Fans | Pokemon <?php $_GET['name'] ?></title>
		<link href="./DetailedStyle.css" rel="stylesheet" />
		<link href="./common.css" rel="stylesheet" />
		<script src="check.js" type="text/javascript"></script>
	</head>
 
	
	<body>
		<div class="header">      
			<a href="index.html" class="logo">POKEMON FANS</a>
			<ul class="nav">
				<li class="nav-item"><a href="index.html">Home</a></li>
				<li class="nav-item active"><a href="main.php">Products</a></li>
			</ul>
		</div>  
		
		<?php

			ini_set('display_errors', 'on'); 

			require('credentials.php');
			require('misc.php'); 
				
			$link = new PDO("mysql:host=$hostname; dbname=$database;", $username, $password); 
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				
			$sql = "SELECT * FROM products WHERE name = '" . $_GET['name'] . "'; "; 
				
			$dir = parseName($_GET['name']);
			$imageSource = "Images/" . $dir . "/" . $dir;

			foreach ($link->query($sql) as $row) {

		?>      
	   
		<div class="details" >   
			<table class="column">
				<td class="left">
					<table class="column">
						 <tr>
							 <img class="thumbnail1" src="<?php echo $imageSource . '.jpg' ?>">
						 </tr>
						 <tr>
							 <td class="columns">
								 <div>
									 <img class="thumbnail1" src="<?php echo $imageSource . '_1.jpg' ?>">
								 </div>
							 </td>
							 <td class="columns">
								 <div>
									 <img class="thumbnail1" src="<?php echo $imageSource . '_2.jpg' ?>">
								 </div>
							 </td>
							 <td class="columns">
								 <div>
									 <img class="thumbnail1" src="<?php echo $imageSource . '_3.jpg' ?>">
								 </div>
							 </td>
						 </tr>
					 </table>
				 </td>			 
				 
					 <td class="right">
						<h4 id="product"><?php echo $row['name'] ?></h4>
						<p id="price">Price: <?php echo $row['price'] ?></p>

						<table class="description">			
							<tr>
								<td class="ExtraInfo1">Platform:</td>
								<td class="ExtraInfo2"><?php echo $row['platform'] ?></td>
				    </tr>
				    <tr>
								<td class="ExtraInfo1">Cover Pokemon:</td>
								<td class="ExtraInfo2"><?php echo $row['coverPokemon'] ?></td>
				    </tr>                          
				    <tr>
								<td class="ExtraInfo1">IGN Rating: </td>
								<td class="ExtraInfo2"><?php echo $row['IGNRating'] ?>/10</td>
				    </tr>
				    <tr>
								<td class="ExtraInfo1">Copies Sold: </td>
								<td class="ExtraInfo2"><?php echo $row['copiesSold'] ?> Million</td>
				    </tr>
				    <tr>
								<td class="ExtraInfo1">Game Region: </td>
								<td class="ExtraInfo2"><?php echo $row['gameRegion'] ?></td>
				    </tr>
				    <tr>
								<td class="ExtraInfo1">Twin Pair: </td>
								<td class="ExtraInfo2"><?php echo $row['twinPair'] ?></td>
				    </tr>
						</table>
						
						<div>
							<br><a href="#payment" class="button">Order this Product</a></br>
						</div>
					 </td>
				</table>       
			</div>

		<?php            
			}      
		?>
	
		<div class="Suggestion" > 
            <fieldset>
                <legend><h4>Related items</h4></legend>
                <table>                   
                    <tr>
                    	<?php
                    		$sql = "SELECT * FROM products WHERE name <> '" . $_GET['name'] . "'; ";
                    		$res = $link->query($sql);
                    		$rows = $res->fetchAll();
                    		for ($i = 0; $i < 4; $i++) {
                    			$dir = parseName($rows[$i]['name']);
                    			$imageSource = "Images/" . $dir . "/" . $dir . ".jpg";
                    	?>

                        <td class="columns2">
                            <div >
                                <a href="detail.php?name=<?php echo $rows[$i]['name'] ?>">
                                	<img class="thumbnail2" src="<?php echo $imageSource ?>">
                                </a>
                            </div>
                        </td>

                        <?php
                        	}
                        ?>

                    </tr>
                </table>
            </fieldset>    
        </div>

		<div class="payment">
			<form action="confirmation.php" method="post" enctype="text/plain">
				<fieldset id="payment">
					<legend><h4>Payment Information</h4></legend>
					<table>
						<td class="columns3">
							<table>
								<tr>
									<td class="ExtraInfo1">Name:</td>
									<td class="ExtraInfo2"><input id="firstname" name="firstName" type="text" placeholder="First" class="textbox" />
										<p id="firstnamealert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1"></td>
									<td class="ExtraInfo2"><input id="lastname" name="lastName" type="text" placeholder="Last" class="textbox" />
										<p id="lastnamealert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1">Email:</td>
									<td class="ExtraInfo2"><input id="email" name="email" type="email" placeholder="example@domain.com" class="textbox" />
										<p id="emailalert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1">Phone:</td>
									<td class="ExtraInfo2"><input id="phone" name="phoneNumber" type="tel" placeholder="(949)888-8888" class="textbox" />
										<p id="phonealert" class="alert"/></p>
									</td>
								</tr>  
								<tr>
									<td class="ExtraInfo1">Quantity:</td>
									<td class="ExtraInfo2"><input id="quantity" name="quantity" type="number" class="textbox" value="1" min="1"/>
										<p id="quantityalert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1">Shipping:</td>
									<td class="ExtraInfo2">
										<select id="shipping" name="shippingMethod" class="textbox" requied />
											<option value=""></option>
											<option value="Overnight">Overnight</option>
											<option value="2-Days Expedited">2-Days Expedited</option>
											<option value="6-Days Ground">6-Days Ground</option>
											<option value="Express">Express</option>
											<option value="Free">Free</option>
										</select>
										<p id="shippingalert" class="alert"/></p>
									</td>
								</tr>
							</table>
						<td class="columns3">
							<table>                   
								<tr>
									<td class="ExtraInfo1">Address:</td>
									<td class="ExtraInfo2"><input id="lin1" name="address1" type="text" placeholder="Line 1" class="textbox" />
										<p id="lin1alert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1"></td>
									<td class="ExtraInfo2"><input id="lin2" name="address2" type="text" placeholder="Line 2" class="textbox" /></td>
								</tr>
								<tr>
									<td class="ExtraInfo1">Post Code:</td>
									<td class="ExtraInfo2"><input id="postal" name="postalCode" type="text" class="textbox" />
										<p id="postalalert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1">City:</td>
									<td class="ExtraInfo2"><input id="city" name="city" type="text" class="textbox" />
										<p id="cityalert" class="alert"/></p>
									</td>
								</tr> 
								<tr>
									<td class="ExtraInfo1">State:</td>
									<td class="ExtraInfo2"><input id="state" name="state" type="text" class="textbox" />
										<p id="statealert" class="alert"/></p>
									</td>
								</tr>                               
								<tr>
									<td class="ExtraInfo1">Country:</td>
									<td class="ExtraInfo2"><input id="country" name="country" type="text" class="textbox" />
										<p id="countryalert" class="alert"/></p>
									</td>
								</tr>                                
							</table>  
						</td>
						<td class="columns3">
							<table>	
								<tr height=20px></tr>
								<tr>
									<td class="ExtraInfo1">Card Type:</td>
									<td class="ExtraInfo2">
										<form id="cardtype"> 
											<input type="radio" name="card" id="Visa" checked /> 
											<label for="Visa">Visa</label><br>
											<input type="radio" name="card" id="American Express" />
											<label for="American Express">American Express</label><br>
											<input type="radio" name="card" id="Mastercard" />
											<label for="Mastercard">Mastercard</label><br>
										</form>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1">Card Number:</td>
									<td class="ExtraInfo2"><input id="cardnum" name="cardNumber" type="text" maxlength="16" class="textbox" />
										<p id="cardnumalert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1">Security Code:</td>
									<td class="ExtraInfo2"><input id="secure" name="securityCode" type="text" class="textbox" />
										<p id="securealert" class="alert"/></p>
									</td>
								</tr>
								<tr>
									<td class="ExtraInfo1">Name on Card:</td>
									<td class="ExtraInfo2"><input id="holder" name="nameOnCard" type="text" class="textbox" />
										<p id="holderalert" class="alert"/></p>
									</td>
								</tr>                                
							</table>  
						</td>
					</table>   
					
					<div class="submit">
						<input type="button" onclick="check()" value="Submit your Order"/>
					</div>         
					
				</fieldset>
			</form>
		</div>   
		
		<div align="center">        
			<h4>Return Policy</h4>
			<p>If you find our product defective, unsatisfactory, or underwhelming, you have up to 30 days to return the merchandise by shipping it to our headquarters. A full refund will be given. If the customer attempts to provide false information regarding the state of the product, he or she will be charged for the original price of the merchandise.</p>
		</div>
		<div class="footer">
			<p>University of California, Irvine, CA 92676</p>          
			<p>&copy; 2016 Pokemon Fans.  All rights reserved.</p>
		</div>        

	</body>
</html>