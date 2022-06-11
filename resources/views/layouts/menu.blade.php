<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
        data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true">
            <div class="menu-item">
                <div class="menu-content pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">MENU</span>
                </div>
            </div>
            <div class="menu-item">
                <?php  
                    $role = \Auth::user()->roles->first()->id;
                    $uri  = \Request::segment(1);

                    /* Retrieve active parent menu data | $menu_master = parent menu */
                    $menu_master = \DB::table('mst_menu_master as a')
                    ->join('ref_role_menu_master as b','a.id','=','b.menu_master_id')
                    ->where('a.active',1)
                    ->where('b.active',1)
                    ->where('b.role_id',$role)
                    ->orderBy('b.order','asc')
                    ->get();

                    
                    foreach($menu_master as $master) 
                    {
                        /* Check if the submenu is available */
                        $sub_menu = \DB::table('mst_menu_detail as a')
                        ->join('ref_role_menu_detail as b','a.id','=','b.menu_detail_id')
                        ->where('a.active',1)
                        ->where('b.active',1)
                        ->where('b.role_id',$role)
                        ->where('b.menu_master_id',$master->id)
                        ->orderBy('b.order','asc')
                        ->get();

                        /** 
                         * Sub Menu 
                         * 
                         * If the sub menu doesn't exist, it's only the parent menu
                         * */
                        if(count($sub_menu) == 0)
                        {
                        
                ?>
                <a class="menu-link {{ ($master->route == $uri ? 'active' : '') }}" href="{{ $master->route }}">
                    <span class="menu-icon">
                        <?php echo ShowIcon($master->icon_id); ?>
                    </span>
                    <span class="menu-title">{{ $master->name }}</span>
                </a>
                <?php
                        }
                        /** 
                         * Sub Menu 
                         * 
                         * But if the sub menu exists, then display the submenu
                         * */
                        else
                        {
            ?>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <?php echo ShowIcon($master->icon_id); ?>
                        </span>
                        <span class="menu-title">{{ $master->name }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <?php 
                            foreach($sub_menu as $sub_menus) 
                            { 
                                $GLOBALLS['data'] = $sub_menus;
                                ?>
                            <a class="menu-link sub_menu_link {{ ($sub_menus->route == $uri ? 'active' : '') }}"
                                href="{{ RouteType($sub_menus->route_type, $sub_menus->route) }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{ $sub_menus->name }}</span>
                            </a>
                            <?php 
                            } 
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>

