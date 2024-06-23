<?php
$currentUrl = url()->current();
?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="<?php echo e(asset('vendor/menu-builder/style.css')); ?>" rel="stylesheet">
<div id="hwpwrap">
    <div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">
        <div id="wpwrap">
            <div id="wpcontent">
                <div id="wpbody">
                    <div id="wpbody-content">

                        <div class="wrap">

                            <div class="manage-menus">
                                <form method="get" action="<?php echo e($currentUrl); ?>">
                                    <label for="menu" class="selected-menu"><?php echo app('translator')->get('menu-builder::messages.select_menu_edit'); ?></label>

                                    <?php echo Menu::select('menu', $menulist); ?>


                                    <span class="submit-btn">
                                        <input type="submit" class="button-secondary" value="<?php echo app('translator')->get('menu-builder::messages.choose'); ?>">
                                    </span>
                                    
                                </form>
                            </div>
                            <div id="nav-menus-frame">

                                <?php if(request()->has('menu') && !empty(request()->input('menu'))): ?>
                                    <div id="menu-settings-column" class="metabox-holder">

                                        <div class="clear"></div>

                                        <form id="nav-menu-meta" action="" class="nav-menu-meta" method="post"
                                            enctype="multipart/form-data">
                                            <div id="side-sortables" class="accordion-container">
                                                <ul class="outer-border">
                                                    <li class="control-section accordion-section open add-page"
                                                        id="add-page">
                                                        <h3 class="accordion-section-title hndle" tabindex="0">
                                                            <?php echo app('translator')->get('menu-builder::messages.custom_link'); ?>
                                                            <span class="screen-reader-text"><?php echo app('translator')->get('menu-builder::messages.press_enter'); ?></span>
                                                        </h3>
                                                        <div class="accordion-section-content ">
                                                            <div class="inside">
                                                                <div class="customlinkdiv" id="customlinkdiv">
                                                                    <p id="menu-item-url-wrap">
                                                                        <label class="howto"
                                                                            for="custom-menu-item-pages">
                                                                            <span>Pages <code>(optional)</code></span>&nbsp;&nbsp;&nbsp;
                                                                        </label>
                                                                        <select class="form-control" id="custom-menu-item-pages">
                                                                            <option value="">Select</option>
                                                                            <option value="Home" data-url="/">Home</option>
                                                                            <option value="Products" data-url="/products">Products</option>
                                                                            <option value="About" data-url="/about">About</option>
                                                                            <option value="Blogs" data-url="/blogs">Blogs</option>
                                                                            <option value="Contact" data-url="/contact">Contact</option>
                                                                            <option value="Chefs" data-url="/chef">Chefs</option>
                                                                            <option value="Testimonials" data-url="/testimonials">Testimonials</option>
                                                                            <option value="Privacy Policy" data-url="/privacy-policy">Privacy Policy</option>
                                                                            <option value="Trams and Conditions" data-url="/trams-and-conditions">Trams and Conditions</option>

                                                                        </select>
                                                                    </p>

                                                                    <p id="menu-item-url-wrap">
                                                                        <label class="howto"
                                                                            for="custom-menu-item-url">
                                                                            <span>URL</span>&nbsp;&nbsp;&nbsp;
                                                                        </label>
                                                                        <input id="custom-menu-item-url"
                                                                            name="url" type="text"
                                                                            class="form-control"
                                                                            placeholder="URL">
                                                                    </p>

                                                                    <p id="menu-item-name-wrap">
                                                                        <label class="howto"
                                                                            for="custom-menu-item-name">
                                                                            <span><?php echo app('translator')->get('menu-builder::messages.label'); ?></span>&nbsp;
                                                                        </label>
                                                                        <input id="custom-menu-item-name"
                                                                            name="label" type="text"
                                                                            class="regular-text input-with-default-title form-control text-dark"
                                                                            title="<?php echo app('translator')->get('menu-builder::messages.menu_label'); ?>">
                                                                    </p>

                                                                    <?php if(!empty($roles)): ?>
                                                                        <p id="menu-item-role_id-wrap">
                                                                            <label class="howto"
                                                                                for="custom-menu-item-name">
                                                                                <span><?php echo app('translator')->get('menu-builder::messages.role'); ?></span>&nbsp;
                                                                                <select id="custom-menu-item-role"
                                                                                    name="role">
                                                                                    <option value="0">
                                                                                        <?php echo app('translator')->get('menu-builder::messages.select_role'); ?></option>
                                                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option
                                                                                            value="<?php echo e($role->$role_pk); ?>">
                                                                                            <?php echo e(ucfirst($role->$role_title_field)); ?>

                                                                                        </option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            </label>
                                                                        </p>
                                                                    <?php endif; ?>

                                                                    <p class="button-controls">

                                                                        <a href="#" onclick="addcustommenu()"
                                                                            class="button-secondary submit-add-to-menu right"><?php echo app('translator')->get('menu-builder::messages.add_menu_item'); ?></a>
                                                                        <span class="spinner" id="spincustomu"></span>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </form>

                                    </div>
                                <?php endif; ?>
                                <div id="menu-management-liquid">
                                    <div id="menu-management">
                                        <form id="update-nav-menu" action="" method="post"
                                            enctype="multipart/form-data">
                                            <div class="menu-edit ">
                                                <div id="nav-menu-header">
                                                    <div class="major-publishing-actions">
                                                        <label class="menu-name-label howto open-label" for="menu-name">
                                                            <span><?php echo app('translator')->get('menu-builder::messages.name'); ?></span>
                                                            <input readonly name="menu-name" id="menu-name" type="text"
                                                                class="menu-name regular-text menu-item-textbox"
                                                                title="<?php echo app('translator')->get('menu-builder::messages.enter_menu_name'); ?>"
                                                                value="<?php if(isset($indmenu)): ?> <?php echo e($indmenu->name); ?> <?php endif; ?>">
                                                            <input type="hidden" id="idmenu"
                                                                value="<?php if(isset($indmenu)): ?> <?php echo e($indmenu->id); ?> <?php endif; ?>" />
                                                        </label>

                                                        <?php if(request()->has('action')): ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                    id="save_menu_header"
                                                                    class="button button-primary menu-save"><?php echo app('translator')->get('menu-builder::messages.create_menu'); ?></a>
                                                            </div>
                                                        <?php elseif(request()->has('menu')): ?>
                                                            <div class="publishing-action">
                                                                <a onclick="getmenus()" name="save_menu"
                                                                    id="save_menu_header"
                                                                    class="button button-primary menu-save"><?php echo app('translator')->get('menu-builder::messages.save_menu'); ?></a>
                                                                <span class="spinner" id="spincustomu2"></span>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                    id="save_menu_header"
                                                                    class="button button-primary menu-save"><?php echo app('translator')->get('menu-builder::messages.create_menu'); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div id="post-body">
                                                    <div id="post-body-content">

                                                        <?php if(request()->has('menu')): ?>
                                                            <h3><?php echo app('translator')->get('menu-builder::messages.menu_structure'); ?></h3>
                                                            <div class="drag-instructions post-body-plain"
                                                                style="">
                                                                <p>
                                                                    <?php echo app('translator')->get('menu-builder::messages.menu_structure_text'); ?>
                                                                </p>
                                                            </div>
                                                        <?php else: ?>
                                                            <h3><?php echo app('translator')->get('menu-builder::messages.menu_creation'); ?></h3>
                                                            <div class="drag-instructions post-body-plain"
                                                                style="">
                                                                <p>
                                                                    <?php echo app('translator')->get('menu-builder::messages.menu_creation_text'); ?>
                                                                </p>
                                                            </div>
                                                        <?php endif; ?>

                                                        <ul class="menu ui-sortable" id="menu-to-edit"
                                                            style="display: block;">
                                                            <?php if(isset($menus)): ?>
                                                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li id="menu-item-<?php echo e($m->id); ?>"
                                                                        class="menu-item menu-item-depth-<?php echo e($m->depth); ?> menu-item-page menu-item-edit-inactive pending"
                                                                        style="display: list-item;">
                                                                        <dl class="menu-item-bar">
                                                                            <dt class="menu-item-handle">
                                                                                <span class="item-title"> <span
                                                                                        class="menu-item-title"> <span
                                                                                            id="menutitletemp_<?php echo e($m->id); ?>"><?php echo e($m->label); ?></span>
                                                                                        <span
                                                                                            style="color: transparent;">|<?php echo e($m->id); ?>|</span>
                                                                                    </span> <span class="is-submenu"
                                                                                        style="<?php if($m->depth == 0): ?> display: none; <?php endif; ?>"><?php echo app('translator')->get('menu-builder::messages.subelement'); ?></span>
                                                                                </span>
                                                                                <span class="item-controls"> <span
                                                                                        class="item-type">Link</span>
                                                                                    <span
                                                                                        class="item-order hide-if-js">
                                                                                        <a href="<?php echo e($currentUrl); ?>?action=move-up-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=8b3eb7ac44"
                                                                                            class="item-move-up"><abbr
                                                                                                title="<?php echo app('translator')->get('menu-builder::messages.move_up'); ?>">↑</abbr></a>
                                                                                        | <a href="<?php echo e($currentUrl); ?>?action=move-down-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=8b3eb7ac44"
                                                                                            class="item-move-down"><abbr
                                                                                                title="<?php echo app('translator')->get('menu-builder::messages.move_down'); ?>">↓</abbr></a>
                                                                                    </span> <a class="item-edit"
                                                                                        id="edit-<?php echo e($m->id); ?>"
                                                                                        title=" "
                                                                                        href="<?php echo e($currentUrl); ?>?edit-menu-item=<?php echo e($m->id); ?>#menu-item-settings-<?php echo e($m->id); ?>">
                                                                                    </a> </span>
                                                                            </dt>
                                                                        </dl>

                                                                        <div class="menu-item-settings"
                                                                            id="menu-item-settings-<?php echo e($m->id); ?>">
                                                                            <input type="hidden"
                                                                                class="edit-menu-item-id"
                                                                                name="menuid_<?php echo e($m->id); ?>"
                                                                                value="<?php echo e($m->id); ?>" />
                                                                            <p class="description description-thin">
                                                                                <label
                                                                                    for="edit-menu-item-title-<?php echo e($m->id); ?>">
                                                                                    <?php echo app('translator')->get('menu-builder::messages.label'); ?>
                                                                                    <br>
                                                                                    <input type="text"
                                                                                        id="idlabelmenu_<?php echo e($m->id); ?>"
                                                                                        class="widefat edit-menu-item-title"
                                                                                        name="idlabelmenu_<?php echo e($m->id); ?>"
                                                                                        value="<?php echo e($m->label); ?>">
                                                                                </label>
                                                                            </p>

                                                                            <p
                                                                                class="field-css-classes description description-thin">
                                                                                <label
                                                                                    for="edit-menu-item-classes-<?php echo e($m->id); ?>">
                                                                                    <?php echo app('translator')->get('menu-builder::messages.class_css'); ?>
                                                                                    <br>
                                                                                    <input type="text"
                                                                                        id="clases_menu_<?php echo e($m->id); ?>"
                                                                                        class="widefat code edit-menu-item-classes"
                                                                                        name="clases_menu_<?php echo e($m->id); ?>"
                                                                                        value="<?php echo e($m->class); ?>">
                                                                                </label>
                                                                            </p>

                                                                            <p
                                                                                class="field-css-url description description-wide">
                                                                                <label
                                                                                    for="edit-menu-item-url-<?php echo e($m->id); ?>">
                                                                                    URL
                                                                                    <br>
                                                                                    <input type="text"
                                                                                        id="url_menu_<?php echo e($m->id); ?>"
                                                                                        class="widefat code edit-menu-item-url"
                                                                                        id="url_menu_<?php echo e($m->id); ?>"
                                                                                        value="<?php echo e($m->link); ?>">
                                                                                </label>
                                                                            </p>

                                                                            <?php if(!empty($roles)): ?>
                                                                                <p
                                                                                    class="field-css-role description description-wide">
                                                                                    <label
                                                                                        for="edit-menu-item-role-<?php echo e($m->id); ?>">
                                                                                        <?php echo app('translator')->get('menu-builder::messages.role'); ?>
                                                                                        <br>
                                                                                        <select
                                                                                            id="role_menu_<?php echo e($m->id); ?>"
                                                                                            class="widefat code edit-menu-item-role"
                                                                                            name="role_menu_[<?php echo e($m->id); ?>]">
                                                                                            <option value="0">
                                                                                                <?php echo app('translator')->get('menu-builder::messages.select_url'); ?>
                                                                                            </option>
                                                                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <option
                                                                                                    <?php if($role->id == $m->role_id): ?> selected <?php endif; ?>
                                                                                                    value="<?php echo e($role->$role_pk); ?>">
                                                                                                    <?php echo e(ucwords($role->$role_title_field)); ?>

                                                                                                </option>
                                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        </select>
                                                                                    </label>
                                                                                </p>
                                                                            <?php endif; ?>

                                                                            <p
                                                                                class="field-move hide-if-no-js description description-wide">
                                                                                <label>
                                                                                    <span><?php echo app('translator')->get('menu-builder::messages.move'); ?></span>
                                                                                    <a href="<?php echo e($currentUrl); ?>"
                                                                                        class="menus-move-up"
                                                                                        style="display: none;"><?php echo app('translator')->get('menu-builder::messages.move_up'); ?></a>
                                                                                    <a href="<?php echo e($currentUrl); ?>"
                                                                                        class="menus-move-down"
                                                                                        title="Mover uno abajo"
                                                                                        style="display: inline;"><?php echo app('translator')->get('menu-builder::messages.move_down'); ?></a>
                                                                                    <a href="<?php echo e($currentUrl); ?>"
                                                                                        class="menus-move-left"
                                                                                        style="display: none;"></a> <a
                                                                                        href="<?php echo e($currentUrl); ?>"
                                                                                        class="menus-move-right"
                                                                                        style="display: none;"></a> <a
                                                                                        href="<?php echo e($currentUrl); ?>"
                                                                                        class="menus-move-top"
                                                                                        style="display: none;"><?php echo app('translator')->get('menu-builder::messages.top'); ?></a>
                                                                                </label>
                                                                            </p>

                                                                            <div
                                                                                class="menu-item-actions description-wide submitbox">

                                                                                <a class="item-delete submitdelete deletion"
                                                                                    id="delete-<?php echo e($m->id); ?>"
                                                                                    href="<?php echo e($currentUrl); ?>?action=delete-menu-item&menu-item=<?php echo e($m->id); ?>&_wpnonce=2844002501"><?php echo app('translator')->get('menu-builder::messages.delete'); ?></a>
                                                                                <span class="meta-sep hide-if-no-js"> |
                                                                                </span>
                                                                                <a class="item-cancel submitcancel hide-if-no-js button-secondary"
                                                                                    id="cancel-<?php echo e($m->id); ?>"
                                                                                    href="<?php echo e($currentUrl); ?>?edit-menu-item=<?php echo e($m->id); ?>&cancel=1424297719#menu-item-settings-<?php echo e($m->id); ?>"><?php echo app('translator')->get('menu-builder::messages.cancel'); ?></a>
                                                                                <span class="meta-sep hide-if-no-js"> |
                                                                                </span>
                                                                                <a onclick="getmenus()"
                                                                                    class="button button-primary updatemenu"
                                                                                    id="update-<?php echo e($m->id); ?>"
                                                                                    href="javascript:void(0)"><?php echo app('translator')->get('menu-builder::messages.update_item'); ?></a>

                                                                            </div>

                                                                        </div>
                                                                        <ul class="menu-item-transport"></ul>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </ul>
                                                        <div class="menu-settings">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="nav-menu-footer">
                                                    <div class="major-publishing-actions">

                                                        <?php if(request()->has('action')): ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                    id="save_menu_header"
                                                                    class="button button-primary menu-save"><?php echo app('translator')->get('menu-builder::messages.create_menu'); ?></a>
                                                            </div>
                                                        <?php elseif(request()->has('menu')): ?>
                                                            
                                                            <div class="publishing-action">

                                                                <a onclick="getmenus()" name="save_menu"
                                                                    id="save_menu_header"
                                                                    class="button button-primary menu-save"><?php echo app('translator')->get('menu-builder::messages.save_menu'); ?></a>
                                                                <span class="spinner" id="spincustomu2"></span>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="publishing-action">
                                                                <a onclick="createnewmenu()" name="save_menu"
                                                                    id="save_menu_header"
                                                                    class="button button-primary menu-save"><?php echo app('translator')->get('menu-builder::messages.create_menu'); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>

<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/vendor/menu-builder/menu-html.blade.php ENDPATH**/ ?>