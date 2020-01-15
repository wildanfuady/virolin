<!-- Page Footer Start -->	
<!--================================-->
<footer class="page-footer">
    <div class="pd-t-4 pd-b-0 pd-x-20">
        <div class="tx-10 tx-uppercase">
            <p class="pd-y-10 mb-0">Copyright&copy; {{ date('Y') }} | All rights reserved. | Created By <a href="https://virolin.com" target="_blank">Virolin</a></p>
        </div>
    </div>
</footer>
<!--/ Page Footer End -->		
</div>
<!--/ Page Content End -->
</div>
      <!--/ Page Container End -->
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->	
      <a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      <!--/ Scroll To Top End -->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <script src="{{ asset('template/metrical') }}/plugins/popper/popper.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/feather-icon/feather.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/pace/pace.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/toastr/toastr.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/countup/counterup.min.js"></script>		
      <script src="{{ asset('template/metrical') }}/plugins/waypoints/waypoints.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/chartjs/chartjs.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/apex-chart/apexcharts.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/apex-chart/irregular-data-series.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>	   
      <script src="{{ asset('template/metrical') }}/js/dashboard/sales-dashboard-init.js"></script>
      <script src="{{ asset('template/metrical') }}/js/jquery.slimscroll.min.js"></script>
      <script src="{{ asset('template/metrical') }}/js/highlight.min.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/steps/jquery.steps.js"></script>
      <script src="{{ asset('template/metrical') }}/plugins/parsleyjs/parsley.js"></script>
      <script src="{{ asset('template/metrical') }}/js/app.js"></script>
      <script src="{{ asset('template/metrical') }}/js/custom.js"></script>
      <script>
         $(document).ready(function(){
           'use strict';
         
           $('#wizard1').steps({
             headerTag: 'h3',
             bodyTag: 'section',
             autoFocus: true,
             titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
           });
         
           $('#wizard2').steps({
             headerTag: 'h3',
             bodyTag: 'section',
             autoFocus: true,
             stepsOrientation: 1,
             titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
             onStepChanging: function (event, currentIndex, newIndex) {
               if(currentIndex < newIndex) {
                 // Step 1 form validation
  
                 if(currentIndex === 0) {
                   var form_telp = $('#campaign_form_telp').parsley();
                   var form_address = $('#campaign_form_telp').parsley();
                   if(form_telp.isValid() && form_address.isValid()) {
                     return true;
                   } else { 
                     form_telp.validate(); 
                     form_address.validate(); 
                  }
                 }

                 // Step 2 form validation
                 if(currentIndex === 1) {
                   var lp_name = $('#campaign_lp_name').parsley();
                   if(lp_name.isValid()) {
                     return true;
                   } else { 
                    lp_name.validate();  
                  }
                 }
               // Always allow step back to the previous step even if the current step is not valid.
               } else { return true; }
             }
           });
         
           $('#wizard3').steps({
             headerTag: 'h3',
             bodyTag: 'section',
             autoFocus: true,
             titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
             stepsOrientation: 1
           });
         
           $('#wizard4').steps({
             headerTag: 'h3',
             bodyTag: 'section',
             autoFocus: true,
             titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
             cssClass: 'wizard step-equal-width'
           });
         
           $('#wizard5').steps({
             headerTag: 'h3',
             bodyTag: 'section',
             autoFocus: true,
             titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
             cssClass: 'wizard wizard-style-1'
           });
         
         });
      </script>
   </body>
</html>