<?php
	$file = 'shouts.txt';
	$maxShouts = 10;
	$shouts = file($file);
	
	$emoticons = [':D', ':(', '<3', '8)', ';)', ':)', ':|', ':P'];
	$replace = [
					'<span class="emote-happy"></span>', 		'<span  class="emote-sad"></span>', 
					'<span  class="emote-love"></span>',	 	'<span  class="emote-cool"></span>', 
					'<span  class="emote-wink"></span>', 		'<span  class="emote-smile"></span>', 
					'<span  class="emote-plain"></span>', 		'<span  class="emote-tongue"></span>'
					];
					
	if (array_key_exists('shout', $_POST)) {
		$count = count($shouts);
		
		if ($count == $maxShouts) {
			unset($shouts[0]);
		}
		
		array_push($shouts, $_POST['shout']."\n");
		file_put_contents($file, $shouts);
	}
	
	$shouts = array_reverse($shouts);
?>
<html>
	<head>
		<title>Chatbox</title>
		<style>
			#chatbox {
				padding: 0;
				width: 15%;
				margin: 0 auto;
			}
			#chatbox table {
				border-collapse: collapse;
				word-wrap: break-word;
				table-layout: fixed;
			}
			#chatbox table tr td { 
				font-family: Tahoma, Verdona, Arial;
				font-size: 12px;
				height: 24px;
				width: 100%;
				padding: 2px 5px 2px 5px;
				word-wrap: break-word;
				border: 1px solid #000;
			}
			#chatbox table tr:first-child td { 
				font-size: 14px;
				font-weight: bold;
				text-align: center;
				background-color: #000;
				color: #FFF;
			}
			.emote-happy, .emote-sad, .emote-love, .emote-cool, .emote-wink, .emote-smile, .emote-plain, .emote-tongue {
				display: inline-block;
				margin: 0;
				padding: 0;
				background-image: url('emoticons.png');
				width: 24px;
				height: 24px;
				background-repeat: no-repeat;
			}
			
			.emote-happy {
				background-position: 0 0;
			}
			
			.emote-sad {
				background-position: -24px 0;
			}
			
			.emote-love {
				background-position: -48px 0px;
			}
			
			.emote-cool {
				background-position: -72px 0;
			}
			
			.emote-wink {
				background-position: -96px 0;
			}
			
			.emote-smile {
				background-position: -120px 0;
			}
			
			.emote-plain {
				background-position: -144px 0;
			}
			
			.emote-tongue {
				background-position: -168px 0;
			}
			
		</style>
	</head>
	<body>
		<div id="chatbox">
			<table width="100%">
				<tr>
					<td>Chatbox</td>
				</tr>
				<?php
					for($i = 0; $i < $maxShouts; $i++) {
						if (array_key_exists($i, $shouts)) {
							$shouts[$i] = str_replace($emoticons, $replace, $shouts[$i]);
							echo '
								<tr>
									<td>'.$shouts[$i].'</td>
								</tr>
							';
						}
					}
				?>
			</table>
			 <form name="shoutbox" method="post" action="">
				<input style="width: 74%;" type="text" id="inputfield" name="shout" />
				<input style="width: 24%; margine: 0; padding: 0;" type="Submit" value="Chat!" />
			</form>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + ':D';"><span class="emote-happy"></span></a>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + ':(';"><span class="emote-sad"></span></a>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + '<3';"><span class="emote-love"></span></a>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + '8)';"><span class="emote-cool"></span></a>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + ';)';"><span class="emote-wink"></span></a>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + ':)';"><span class="emote-smile"></span></a>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + ':|';"><span class="emote-plain"></span></a>
			<a href="#" onclick="document.getElementById('inputfield').value = document.getElementById('inputfield').value + ':P';"><span class="emote-tongue"></span></a>
		</div>
	</body>
</html>