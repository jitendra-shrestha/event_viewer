 <!-- Mainly scripts -->
 <script src="public/assets/js/jquery-2.1.1.js"></script>
    <script src="public/assets/js/bootstrap.min.js"></script>
    <script src="public/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="public/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="public/assets/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Peity -->
    <script src="public/assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="public/assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="public/assets/js/inspinia.js"></script>
    <script src="public/assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="public/assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Data picker -->
   <script src="public/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Toastr -->
    <script src="public/assets/js/plugins/toastr/toastr.min.js"></script>

    <!-- Data Tables -->
    <script src="public/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="public/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="public/assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="public/assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- ckeditor -->
    <script src="public/assets/js/plugins/ckeditor/ckeditor.js"></script>

   
   

    <!-- Page-Level Scripts -->
    <script>
         $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            


        });

        $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
       
    </script>

    



    
</body>
</html>