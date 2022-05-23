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

    $("#first-card").on('click', function(){
        $("#content").addClass('show');
        $("#first-card").removeClass('show');
        $("#first-card").addClass('hide');
    });

    $("#message").bind('change keyup', function(){
        var totalChar = $(this).val().length;
        $("#char-count").text(totalChar);
    });

    $("#rsvp-form").submit(function(e){
        e.preventDefault();
        
        var formData = $(this).serialize();

        $.ajax({
            url: $("body").data('site-url')+'/rsvp/submit',
            type: 'POST',
            data: formData,
            beforeSend: function(){
                $("#message").attr('disabled', true);
                $(".btn-submit-rsvp").attr('disabled', true);
            },
            success: function(data){
                var res = JSON.parse(data);
                if(res.error !== null && res.error !== ''){
                    alert(res.error);
                }else{
                    //success
                    alert(res.message);
                    $("#message").val('');

                    getRsvp();
                }
                $("#message").attr('disabled', false);
                $(".btn-submit-rsvp").attr('disabled', false);
            },
            error: function(err){
                $("#message").attr('disabled', false);
                $(".btn-submit-rsvp").attr('disabled', false);
            }
        });
    })

    getRsvp();

    var sanitizeHTML = function (str) {
        return str.replace(/[^\w. ]/gi, function (c) {
            return '&#' + c.charCodeAt(0) + ';';
        });
    };

    function getRsvp(){
        $.ajax({
            url: $("body").data('site-url')+'/rsvp/list',
            type: 'GET',
            data: {},
            beforeSend: function(){
                $("#rsvp-list").html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-3x"></i></div>');
            },
            success: function(data){
                var res = JSON.parse(data);
                
                $("#rsvp-list").html('');

                for(var i=0; i< res.length;i++){
                    $("#rsvp-list").append('<div class="p-3 mt-3 bg-light text-dark rounded"><h4><b>'+res[i].name+'</b></h4><h5>'+sanitizeHTML(res[i].message)+'</h5><div class="text-end">'+res[i].created_at+'</div></div>');
                }
            },
            error: function(err){
                $("#rsvp-list").html('<div class="text-center">Error saat mengambil Data.</div>');
            }
        });
    }
})