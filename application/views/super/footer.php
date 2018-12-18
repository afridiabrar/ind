</div>
<script src="<?= site_url('assets_b') ?>/bundles/libscripts.bundle.js"></script>

<script src="<?= site_url('assets_b') ?>/ckeditor/ckeditor.js"></script>
<script src="<?= site_url('assets_b') ?>/bundles/easypiechart.bundle.js"></script> <!-- easypiechart Plugin Js -->
<script src="<?= site_url('assets_b') ?>/bundles/vendorscripts.bundle.js"></script>
<script src="<?= site_url('assets_b') ?>/datatable/datatables.js"></script>
<script src="<?= site_url('assets_b') ?>/datatable/datatables.min.js"></script>

<script src="<?= site_url('assets_b') ?>/bundles/datatablescripts.bundle.js"></script>
<script src="<?= site_url('assets_b') ?>/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="<?= site_url('assets_b') ?>/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="<?= site_url('assets_b') ?>/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="<?= site_url('assets_b') ?>/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="<?= site_url('assets_b') ?>/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
-->
<script src="<?= site_url('assets_b') ?>/vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js -->
<script src="<?= site_url('assets_b') ?>/bundles/mainscripts.bundle.js"></script>
<script src="<?= site_url('assets_b') ?>/bundles/morrisscripts.bundle.js"></script>
<script src="<?= site_url('assets_b') ?>/js/pages/tables/jquery-datatable.js"></script>
<script src="<?= base_url('assets_b')?>/js/pages/ui/dialogs.js"></script>
<script src="<?= base_url('assets_b')?>/bundles/fullcalendarscripts.bundle.js"></script><!--/ calender javascripts -->
<script src="<?= base_url('assets_b')?>/js/pages/calendar.js"></script>
<script src="<?= base_url('assets_b')?>/vendor/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="<?= base_url('assets_b')?>/vendor/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->
<script src="<?= base_url('assets_b')?>/bundles/mainscripts.bundle.js"></script>
<script src="<?= base_url('assets_b')?>/js/pages/forms/form-wizard.js"></script>

<script src="<?= base_url('assets_b')?>/bundles/chartist.bundle.js"></script>
<script src="<?= base_url('assets_b')?>/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
<script src="<?= base_url('assets_b')?>/bundles/flotscripts.bundle.js"></script> <!-- flot charts Plugin Js -->
<script src="<?= base_url('assets_b')?>/vendor/flot-charts/jquery.flot.selection.js"></script>

<!--Frolla-->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

<script>
    $(document).ready(function(){
        $(".mail-detail-expand").click(function(){
            $("#mail-detail-open").toggle();
        });
        $(".mail-back").click(function(){
            $("#mail-detail-open").toggle();
        });
    });

    var open=false;
    function togg(){
        if(open){
            document.getElementById('leftsidebar').style.left="0";
            document.getElementById('main-content').style.width="85%";

            open=false;
        }else{
            document.getElementById('leftsidebar').style.left="-233px";
            document.getElementById('main-content').style.width="100%";

            open=true;

        }
    }

</script>
</body>
</html>
