<?php 
	$data = false;
	if (!empty($_GET)){	
		$data = true;	
		
		class numbers {
			var $arr = array();
			var $max2_result = 0;
			var $max3_result = 0;
			function max2($nr1, $nr2){
				if($nr1>$nr2) return $nr1;
				else return $nr2;
			}
			
			function max3($nr1, $nr2, $nr3){
				$temp = $this->max2($nr1, $nr2);
				return $this->max2($temp, $nr3);
			}
			
			function __construct(){
				if(isset($_GET['x1']) && isset($_GET['x2']) && isset($_GET['x3'])){
					$arr[0] = (int) $_GET['x1'];
					$arr[1] = (int) $_GET['x2'];
					$arr[2] = (int) $_GET['x3'];
					$this->max2_result = $this->max2($arr[0], $arr[1]);
					$this->max3_result = $this->max3($arr[0], $arr[1], $arr[2]);
				}
			}
		}
		
		$numbers = new numbers();
	} else
?>
<!DOCTYPE html>
<html>
	<head>
	<style>
		body {padding: 0; margin: 0; font-family: Tahoma;}
		.bar { width: calc(100% - 40px); position: absolute; text-align: center; padding: 20px; background-color: #1b1b1b; color: white; font-weight: bold; font-size: 12px; }
		.cont { display:flex;justify-content:center;align-items:center;width:100%;height:100%; margin-top: 80px; }
		.ball { float:left; width: 20vw; height: 20vw; border-radius: 50%; margin: 20px;padding: 20px; background-color: #1b1b1b;  text-align: center; }
		.ball>.info { color: #fff; font-size: 3vw; position: relative; bottom: 10px; }
		.ball>.result { color: #fff; font-size: 15vw; position: relative; bottom: 20px; }
		.footer_link, .footer_link:visited, a:active, a:hover, a:focus { text-decoration: none; color: white;}
		form { width: 90%; text-align: center; }
		input { border-radius: 5px; padding: 5px; width: 40px;}
		label { font-size: 12px;}
		button { border-radius: 5px; padding: 5px; clear:both; width: 70px; margin-top: 10px;}
	</style>
	</head>
	<body>
		<header class="bar" style="top: 0px;">
			<?php if($data){ ?>
				1 liczba = <?php echo $_GET['x1']; ?> | 
				2 liczba = <?php echo $_GET['x2']; ?> | 
				3 liczba = <?php echo $_GET['x3']; ?>
			<?php } else { ?>
				Podaj dane!
			<?php } ?>
		</header>
		
		<?php if($data){ ?>
		<div class="cont">
			<div id="results">
				<div class="ball">
					<span class="info">max2</span>
					<span class="result"><?php echo $numbers->max2_result; ?></span>
				</div>
				<div class="ball">
					<span class="info">max3</span>
					<span class="result"><?php echo $numbers->max3_result; ?></span>
				</div>
			</div>
		</div>
		<?php } ?>
		
		<div class="cont" style="margin-top: 50px !important">
			<form method="get" name="addplace_form" action="#">
				<label for="x1">1 liczba</label>
				<?php if($data) $savedx1= $_GET['x1']; else $savedx1 = 10;?>
				<input type="number" name="x1" step="10" value="<?php echo $savedx1; ?>"/>
				
				<label for="x2">2 liczba</label>
				<?php if($data) $savedx2= $_GET['x2']; else $savedx2 = 20;?>
				<input type="number" name="x2" step="10" value="<?php echo $savedx2; ?>"/>
				
				<label for="x3">3 liczba</label>
				<?php if($data) $savedx3= $_GET['x3']; else $savedx3 = 30;?>
				<input type="number" name="x3" step="10" value="<?php echo $savedx3; ?>"/>
				<button type="submit">Oblicz!</button>
			</form>
		</div>
		<footer class="bar" style="bottom: 0px;">
			<a class="footer_link" href="http://emste.eu">Emil Stefaniuk @ emste.eu</a>
		</footer>
	</body>
</html>