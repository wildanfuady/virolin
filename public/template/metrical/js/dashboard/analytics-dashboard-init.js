$(function(){$(document).ready(function(){setTimeout(function(){toastr.options={positionClass:"toast-top-right",closeButton:true,progressBar:true,showMethod:"slideDown",timeOut:5000};toastr.info("Membantu bisnis Anda terus berkembang","Welcome, selamat datang di Virolin")},300)});var b={chart:{height:350,type:"bar",fontFamily:"IBM Plex Sans, sans-serif",foreColor:"#6780B1",},plotOptions:{bar:{horizontal:false,columnWidth:"50%",},},dataLabels:{enabled:false},stroke:{show:true,width:2,colors:["transparent"]},series:[{name:"New Visitors",data:[44,55,57,56,61,58,63,60,66]},{name:"Unique Visitors",data:[76,85,101,98,87,105,91,114,94]},{name:"Returning Visitors",data:[35,41,36,26,45,48,52,53,41]}],colors:["#66a4fb","#e4eaff","#65e0e0"],xaxis:{categories:["Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct"],},yaxis:{title:{text:"K"}},fill:{opacity:1},tooltip:{y:{formatter:function(e){return""+e+"K"}}}};var d=new ApexCharts(document.querySelector("#audienceOverviewBar"),b);d.render();var a=[{label:"New User",fontFamily:"IBM Plex Sans, sans-serif",foreColor:"#6780B1",data:[[1,50]],color:"#66a4fb"},{label:"Page Views",data:[[1,40]],color:"#e4eaff"},{label:"Page Session",data:[[1,90]],color:"#65e0e0"},{label:"Bounce Rate",data:[[1,70]],color:"#EE8CE5"}];$.plot("#sessionsDeviceDonut",a,{series:{pie:{show:true,radius:1,innerRadius:0.5,label:{show:true,radius:2/3,formatter:c,threshold:0.1}}},grid:{hoverable:true,clickable:true}});function c(e,f){return"<div style='font-size:7pt; text-align:center; padding:2px; color:white;'>"+e+"<br/>"+Math.round(f.percent)+"%</div>"}var b={chart:{height:200,type:"bar",stacked:true,fontFamily:"IBM Plex Sans, sans-serif",foreColor:"#8392a5",toolbar:{show:false,},},plotOptions:{bar:{horizontal:false,},},stroke:{width:1,colors:["#fff"]},dataLabels:{enabled:false},series:[{name:"Marine Sprite",data:[44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21]},{name:"Striking Calf",data:[53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32]}],fill:{opacity:0.7},colors:["#66a4fb","#e4eaff"],legend:{show:false,}};var d=new ApexCharts(document.querySelector("#behaviorAreaChart"),b);d.render();var b={chart:{height:200,type:"bar",stacked:true,fontFamily:"IBM Plex Sans, sans-serif",foreColor:"#8392a5",toolbar:{show:false,},},plotOptions:{bar:{horizontal:false,},},stroke:{width:1,colors:["#fff"]},dataLabels:{enabled:false},series:[{name:"Marine Sprite",data:[44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21,44,55,41,37,22,43,21]},{name:"Striking Calf",data:[53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32,53,32,33,52,13,43,32]}],fill:{opacity:0.7},colors:["#66a4fb","#e4eaff"],legend:{show:false,}};var d=new ApexCharts(document.querySelector("#revenueAreaChart"),b);d.render();var b={chart:{height:225,type:"bar",fontFamily:"IBM Plex Sans, sans-serif",foreColor:"#6780B1",toolbar:{show:false},},plotOptions:{bar:{horizontal:false,columnWidth:"50%",},},dataLabels:{enabled:false},stroke:{show:true,width:1,colors:["transparent"]},series:[{name:"Desktop",data:[144,155,157,156,161,170]},{name:"Mobile",data:[176,185,101,198,187,190]},{name:"Others",data:[115,111,116,116,135,110]}],colors:["#66a4fb","#e4eaff","#65e0e0"],xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun"],},fill:{opacity:1},legend:{show:false,position:"top",offsetY:0,},};var d=new ApexCharts(document.querySelector("#visitorsByDevices"),b);d.render()});