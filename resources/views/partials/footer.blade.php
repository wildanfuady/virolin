<!-- Page Footer Start -->	
<!--================================-->
<footer class="page-footer" style="background: orange; color: white;position: fixed;
  right: 0;
  bottom: 0;overflow: hidden; float:right">
    <div class="pd-t-4 pd-b-0 pd-x-20">
        <div class="tx-10 tx-uppercase">
            <p class="pd-y-10 mb-0" style="color: white">Copyright&copy; {{ date('Y') }} | All rights reserved. | Created By <a href="https://virolin.com" target="_blank" style="color: white">Virolin</a></p>
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
      <script src="{{ asset('template/metrical') }}/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>
      <script src="{{ asset('template/metrical') }}/js/jquery.slimscroll.min.js"></script>
      <script src="{{ asset('template/metrical') }}/js/app.js"></script>
      <script src="{{ asset('template/metrical') }}/js/custom.js"></script>
      @yield('js')
      <script>
        $(document).ready(function(){
          'use strict';

          var url = window.location;
          
          var a = $('ul.accordion-menu li a').filter(function() {
              return this.href == url;
          }).parent('ul.accordion-menu li').addClass('open active');
          
          $('ul.nav-treeview a').filter(function() {
              return this.href == url;
          }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open') .prev('a').addClass('active');
         
         });
      </script>
   </body>
</html>