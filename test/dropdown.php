<?php
require_once("db.php");
$db_handle = new DB();
$query = "Select * from country";
$result = $db_handle->runQuery($query);
?>
<html>
<head>
    <title>Dropdown</title>
</head>
<script src="jquery.main.js" type="text/javascript">
<script type="type/javascript">

 function state(val){
    $.ajax({
         type:"POST",  
         url:"state.php",
         data:'country_id='+val,
         success:function(data){
            $("#state-list").html(data);
            city();
         }
    }); 
 }
 function city(val){
    $.ajax({
         type:"POST",  
         url:"city.php",
         data:'state_id='+val,
         success:function(data){
            $("#city-list").html(data);
           
         }
    });
 }
 </script>
<body>
    <div class="form"> 
        <h2>Dependent Dropdownlist</h2>
        <div class="row">
        <label>Country:</label>
        <select name="country" id="country_list" class="InputBox" onChange="state(this.value);">
            <option value disabled selected>Select Country</option>
            <?php
            foreach($result as $country){
                ?>
                <option value="<?php echo $country["id"]; ?>"><?php echo $country["name"]; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="row">
        <label>State:</label>
        <select name="state" id="state_list" class="InputBox"  onChange="city(this.value);">
            <option value="">Select State</option>
        </select>
    </div>
    <div class="row">
        <label>City:</label>
        <select name="city" id="city_list" class="InputBox">
            <option value="">Select City</option>
        </select>
    </div>
</div>
</body>
