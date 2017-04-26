</div>
</div><!-- mainwrapper -->
</section>


<script src="/template/adminpanel/js/jquery-1.11.1.min.js"></script>
<script src="/template/adminpanel/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/template/adminpanel/js/bootstrap.min.js"></script>
<script src="/template/adminpanel/js/modernizr.min.js"></script>
<script src="/template/adminpanel/js/pace.min.js"></script>
<script src="/template/adminpanel/js/retina.min.js"></script>
<script src="/template/adminpanel/js/jquery.cookies.js"></script>
<script src="/template/adminpanel/js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        // Delete row in a table
        jQuery('.delete-row').click(function () {
            var id = $(this).attr("data-id");
            
             $.ajax({
                type: "POST",
                //url: "/admin/product/delete/"+id,
                success: function () {
                    }
            }); 
        });   
    });
</script>
</body>
</html>