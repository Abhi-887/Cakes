<script>
    var menus = {
        "oneThemeLocationNoMenus": "",
        "moveUp": '<?php echo e(__("menu-builder::messages.move_up")); ?>',
        "moveDown": '<?php echo e(__("menu-builder::messages.move_down")); ?>',
        "moveToTop": '<?php echo e(__("menu-builder::messages.move_top")); ?>',
        "moveUnder": '<?php echo e(__("menu-builder::messages.move_under")); ?>',
        "moveOutFrom": '<?php echo e(__("menu-builder::messages.move_out_from")); ?>',
        "under": '<?php echo e(__("menu-builder::messages.under")); ?>',
        "outFrom": '<?php echo e(__("menu-builder::messages.out_from")); ?>',
        "menuFocus": '<?php echo e(__("menu-builder::messages.menu_focus")); ?>',
        "deleteMenu": '<?php echo e(__("menu-builder::messages.deleting_this_menu")); ?>',
        "enterMenuName": '<?php echo e(__("menu-builder::messages.enter_menu_name")); ?>',
        "subMenuFocus" : '<?php echo e(__("menu-builder::messages.submenu_focus")); ?>'
    };
    var arraydata = [];
    var addcustommenur = '<?php echo e(route("menus.items.create")); ?>';
    var updateitemr = '<?php echo e(route("menus.items.update")); ?>';
    var generatemenucontrolr = '<?php echo e(route("menus.update")); ?>';
    var deleteitemmenur = '<?php echo e(route("menus.items.delete")); ?>';
    var deletemenugr = '<?php echo e(route("menus.delete")); ?>';
    var createnewmenur = '<?php echo e(route("menus.create")); ?>';
    var csrftoken = "<?php echo e(csrf_token()); ?>";
    var menuwr = "<?php echo e(url()->current()); ?>";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrftoken
        }
    });
</script>
<script type="text/javascript" src="<?php echo e(asset('vendor/menu-builder/scripts.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/menu-builder/scripts2.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('vendor/menu-builder/menu.js')); ?>"></script>

<script>
    $(document).ready(function(){
        $('#custom-menu-item-pages').on('change', function(e){
            let selectedOption = $(this).find('option:selected');
            let url = selectedOption.data('url');
            $('#custom-menu-item-url').val(url);
            $('#custom-menu-item-name').val($(this).val());
        })
    })
</script>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/vendor/menu-builder/scripts.blade.php ENDPATH**/ ?>