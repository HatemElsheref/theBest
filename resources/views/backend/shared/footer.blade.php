
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="hidden-xs"     @if(LaravelLocalization::getCurrentLocaleDirection()=='rtl') style="float: left" @else style="float: right" @endif>
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <script>window.document.write((new Date()).getFullYear())</script>
        <a href="{{AUTHOR_URL}}">
            {{AUTHOR}}
        </a>
        .</strong> All rights reserved.
</footer>



<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{dashboardAssets('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.4 -->
<script src="{{dashboardAssets('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{dashboardAssets('dist/js/app.min.js')}}"></script>

<script src="{{dashboardAssets('js/swl.js')}}"></script>
<script src="{{dashboardAssets('js/main.js')}}"></script>

@stack('js')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
