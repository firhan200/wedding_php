$(document).ready(function(){
    if($("#time-elapsed").length){
        startCount();
    }

    function startCount(){
        var startDateTime = new Date(2022,9,1,11,0,0,0); // YYYY (M-1) D H m s ms (start time and date from DB)
        var startStamp = startDateTime.getTime();

        var newDate = new Date();
        var newStamp = newDate.getTime();

        var timer; // for storing the interval (to stop or pause later if needed)

        function updateClock() {
            newDate = new Date();
            newStamp = newDate.getTime();
            var diff = Math.abs(Math.round((newStamp-startStamp)/1000));
            
            var d = Math.floor(diff/(24*60*60)); /* though I hope she won't be working for consecutive days :) */
            diff = diff-(d*24*60*60);
            var h = Math.floor(diff/(60*60));
            diff = diff-(h*60*60);
            var m = Math.floor(diff/(60));
            diff = diff-(m*60);
            var s = diff;
            
            document.getElementById("time-elapsed").innerHTML = '<span class="box-num">'+d+"</span> Hari, <span class='box-num'>"+h+"</span> Jam, <span class='box-num'>"+m+"</span> Menit, <span class='box-num'>"+s+"</span> Detik";
        }

        timer = setInterval(updateClock, 1000);
    }
})