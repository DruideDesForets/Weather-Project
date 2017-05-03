    <form id="form" method="post" action="add_station_post.php"  onsubmit="return validName()" onkeyup="sendForm()">
    <label><h3>Add a station</h3></label> <br />
    <p>Name</p><br>
    <input id="name" type="text" name="name">
    <br>
    <br>
    <input type="checkbox" name="temperature" checked="checked"/> <label for="temperature">Temperature</label>
    <br>
    <input type="checkbox" name="pressure" checked="checked"/> <label for="pressure">Pressure</label>
    <br>
    <input type="checkbox" name="humidity" checked="checked" /> <label for="humidity">Humidity</label>
    <br>
    <p>select a frequency of measurement<p/>
    <p>One step each</p><input type="number" name="frequency" value="1" min="1"><p>secondes</p>
    <br>
    <input id="button_add" type="submit" value="Add" disabled>
    </form> 
    <br>



    <script>



var name = document.getElementById('name');
var form = document.getElementById('form');

var sendForm = function(){
    var reg = /^[a-zA-Z_]+[a-zA-Z0-9_]*$/;
    var button_add = document.getElementById('button_add');
    var name = document.getElementById('name').value;
    var border_name = document.getElementById('name');
    
    if(name.match(reg) != name){
	button_add.disabled = true;
	border_name.style.border = "3px groove red";
    }
    if(name.match(reg) == name){
	button_add.disabled = false;
	border_name.style.border = "3px groove #00ff6b";
    }
}

    </script>
    
