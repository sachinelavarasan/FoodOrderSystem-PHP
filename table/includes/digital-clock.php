<!DOCTYPE html>
<html>
	<head>
        <style>
        .clock {
            position: absolute;
            position: absolute;
            top: 90px;
            right: 16px;
            font-size: 18px;
            color: red;
            font-weight:bolder;
/*             color: #17D4FE; */
            font-size: 25px;
            font-family: Orbitron;
            letter-spacing: 5px;
        }
        </style>
        <script>
        function showTime(){
            var date = new Date();
            var h = date.getHours(); // 0 - 23
            var m = date.getMinutes(); // 0 - 59
            var s = date.getSeconds(); // 0 - 59
            var session = "AM";
            
            if(h == 0){
                h = 12;
            }
            
            if(h > 12){
                h = h - 12;
                session = "PM";
            }
            
            h = (h < 10) ? "0" + h : h;
            m = (m < 10) ? "0" + m : m;
            s = (s < 10) ? "0" + s : s;
            
            var time = h + ":" + m + ":" + s + " " + session;
            document.getElementById("MyClockDisplay").innerHTML = time;
        //     document.getElementById("MyClockDisplay").textContent = time;
            
            setTimeout(showTime, 1000);
        }
        
        </script>
    </head>
    <body onload="showTime()">
    	<div id="MyClockDisplay" class="clock" ></div>
    </body>
</html>