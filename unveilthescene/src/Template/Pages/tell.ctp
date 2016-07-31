<form method='post'>
<p id="tell">
I am a 
<input name='sector'> 
from 
<select name='location'>
	<option></option>
	<option>New South Wales</option>
	<option>Queensland</option>
	<option>South Australia</option>
	<option>Tasmania</option>
	<option>The Australian Capital Territory</option>
	<option>The Northern Territory</option>
	<option>Victoria</option>
	<option>Western Australia</option>
	<option>Outside Australia</option>
</select>
and I would like to see innovation within our community around 
<br /><textarea name='story'></textarea><br />
If anyone is interested in discussing with me further, you can contact me at <input name='contact' /> (we will not publicly show your contact information)
<input type='submit' value='Submit your story' />
</p>
</form>
<p>&nbsp;</p>


<style>
#tell {
	padding-top:100px;
	font-size:140%;
	max-width:900px;
	margin:0 auto;
	text-align:center;
	line-height:2.2em;
	color:#fff;
	text-shadow: 0px 0px 10px rgba(255, 255, 255, 1);
}
#tell input, #tell select {
	display:block;
	width:100%;
	text-align:center;
	color:teal;
	background:rgba(255,255,255,0.9);
}
#tell textarea {
	font-size:120%;
	width:100%;
	height:300px;
	border-color: #bfbfbf;
	color:teal;
	padding:5px;
	background:rgba(255,255,255,0.9);
}
#tell select {
	font-size:120%;
	-webkit-appearance: menulist-button;
}
body {
	background-image: url('/img/tellbackground.jpg');
	background-attachment: fixed;
    background-position: center; 
    background-size:     cover;
}
</style>