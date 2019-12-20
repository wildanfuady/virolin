window.addEventListener("load",function(){
    let index=0,
    target = document.getElementById('pmwu').dataset.target,
    btn=document.getElementsByClassName('button-pmwu-default')[0],
    counter=document.getElementsByClassName('pmwu-counter')[0],
    bar=document.getElementsByClassName('pmwu-bar')[0],
    progressBar=document.getElementsByClassName('pmwu-progress-wrap')[0],
    status=document.getElementsByClassName('pmwu-status')[0],
    reward=document.getElementsByClassName('pmwu-rewards')[0];
    // $('#myModal').modal('hide');
    reward.style.display="none";
    btn.addEventListener('click',function(){
        index++;
        status.style.visibility='visible';
        setTimeout(function(){
            counter.innerHTML=target-index;
            bar.style.width=((index/target)*100)+'%';
            status.style.visibility='hidden';
            if(target-index<0){
                counter.innerHTML=0;
            }
            if(index>=target){
                btn.style.display='none';
                progressBar.style.display='none';
                status.style.display='none';
                reward.style.display='block';
                // $('#myModal').modal('show');
            }
        },100);})
    });

