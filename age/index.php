<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Age Counter</title>
</head>
<body>
    <div class="main">

        <form action="" method="post" id="submit">
            <label for="day">Date: </label>
            <select name="day" id="day">
                <?php
                    for($day=1; $day<=31; $day++){
                        echo "<option value='$day'>$day</option>";
                    }
                ?>
            </select>

            <label for="month">month: </label>
            <select name="month" id="month">
                <?php
                    for($day=1; $day<=date('m'); $day++){
                        echo "<option value='$day'>$day</option>";
                    }
                ?>
            </select>

           <label for=""year>Year:</label>
           <select name="year" id="year" data-component="date">';
                <?php
                    for($year=date('Y'); $year>=1920; $year--){
                        echo '<option value="'.$year.'">'.$year.'</option>';
                    }
                ?>
            </select>

            <label for="hour">hour: </label>
            <select name="hour" id="hour">
                <?php
                    for($hour=1; $hour<=24; $hour++){
                        echo "<option value='$hour'>$hour</option>";
                    }
                ?>
            </select>

            <label for="minute">minute: </label>
            <select name="minute" id="minute">
                <?php
                    for($minute=0; $minute<=60; $minute++){
                        echo "<option value='$minute'>$minute</option>";
                    }
                ?>
            </select>

            <label for="second">second: </label>
            <select name="second" id="second">
                <?php
                    for($second=0; $second<=60; $second++){
                        echo "<option value='$second'>$second</option>";
                    }
                ?>
            </select><br><br><br>

            <input class="btn" type="submit" name="submit" value="Count Age"><br><br>

        <div><h2 id="display"></h2></div>
        </form>
    </div>
</body>
<script>
  
    $(document).ready(function(){
        var display ;
        var interval;
        var data;
        $("#submit").submit(function(e){
            e.preventDefault();
            calc();
            var day = $('#day').val();
            var month = $('#month').val();
            var year = $('#year').val();
            var hour = $('#hour').val();
            var minute = $('#minute').val();
            var second = $('#second').val();
            data={ 'year':year, 'month':month, 'day':day, 'hour':hour, 'minute':minute, 'second':second}
        })

        function calc()
        {
            $.ajax({
                type:'POST',
                dataType:"text",
                url:'calculate.php',
                data:data,
                success:function(data){
                    // console.log(data);
                    display = data;
                    document.getElementById('display').innerHTML = display;
                    if(interval==undefined)
                        {
                         interval=setInterval(function(){
                            calc();
                        },1000)
                        }
                }
            });
        }  
    });

    
</script>
</html>