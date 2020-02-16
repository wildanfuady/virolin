"use strict";
    $(window).on('load', function() {
        let index=0,
        target = document.getElementById('pmwu').dataset.target,
        btn = document.getElementsByClassName('button-pmwu-default')[0],
        counter = document.getElementsByClassName('pmwu-counter')[0],
        bar = document.getElementsByClassName('pmwu-bar')[0],
        progressBar = document.getElementsByClassName('pmwu-progress-wrap')[0],
        status = document.getElementsByClassName('pmwu-status')[0],
        reward = document.getElementsByClassName('pmwu-rewards')[0];
        reward.style.display="none";
        document.getElementById('text-expired').style.display = "none";
        $('#myModal').modal('hide');
        $('.text-lead-finish').css('display', 'none');
        $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: 450,
        controlNav: false,
        itemMargin: 20,
        minItems: 2,
        maxItems:  3
        });
        btn.addEventListener('click',function(){
        index++;
        status.style.visibility='visible';
        $(btn).addClass('disabledButton');
        // .style.pointerEvents = "none";
        setTimeout(function(){
            counter.innerHTML=target-index;
            bar.style.width=((index/target)*100)+'%';
            status.style.visibility='hidden';
            $(btn).removeClass('disabledButton');
            if(target-index<0){
                counter.innerHTML=0;
            }
            if(index>=target){
                btn.style.display='none';
                progressBar.style.display='none';
                status.style.display='none';
                reward.style.display='block';
                $('#myModal').modal('show');
                $('.text-lead').css('display', 'none');
            }
        },10000);})
        
    });  
    $(window).on('scroll', function() {
        if ($(this).scrollTop() >= 300) {
            $(".navbar").addClass("active");
        }else{
            $(".navbar").removeClass("active");
        } 
    });
    
var submit = $('#form-submit');

function submitForm() {
    $('#myModal').modal('hide');
    $('#modalFinish').modal('show');
    $('.text-lead-finish').css('display', 'block');
    
}