

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Anttech</b> Administrator
        </div>
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://www.anttech.in/">Anttech</a>.</strong>
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <!-- <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js"></script> 
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-confirmation.min.js"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');

            /*define ckeditor dynamically*/
        $(window).load(function(){
            $('.cleditor').each(function(){
                var cur =  $(this).attr('id');
                CKEDITOR.replace( cur, {
                    allowedContent: true,
                    removeFormatAttributes: '',
                    extraAllowedContent: '*[id];*(*);*{*};p(*)[*]{*};div(*)[*]{*};li(*)[*]{*};ul(*)[*]{*};span(*)[*]{*};table(*)[*]{*};td(*)[*]{*}'
                });
            }); 
            $('[data-toggle="confirmation"]').confirmation({
                rootSelector: "[data-toggle=confirmation]",
                placement: "left",
                singleton:true,
                html: true,
                popout: true,
                btnOkLabel: "Yes",
                btnOkClass: "btn btn-flat btn-sm btn-success",
                btnOkIcon: "glyphicon glyphicon-share-alt",
                btnCancelLabel: "No",
                btnCancelClass: "btn btn-flat btn-sm btn-danger",
                btnCancelIcon: "glyphicon glyphicon-ban-circle",
                href: function (elem) {
                    return $(elem).attr("href");
                }
            });       
        });
       
        $(function() {
            $('#datetimepicker1').datetimepicker({
              pickTime: false
            });
        });
        function ConfirmDelete(){
          var x = confirm("Are you sure you want to delete?");
          if (x){
              return true;
          }
         
        }
    </script>
  </body>
</html>