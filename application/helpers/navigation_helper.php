<?php
function get_nav() {
    $navigation = array(
        array(
            'title' => 'Dashboard',
            'permission' => '22',
            'uri' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'has_child' => false,
            'child' => ''
        ),
        array(
            'title' => 'Center',
            'permission' => '213',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-th',
            'has_child' => true,
            'child' => array(
                array(
                    'title' => 'Registered Centers',
                    'permission' => '213',
                    'uri' => 'center',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
                array(
                    'title' => 'Add New Center',
                    'permission' => '214',
                    'uri' => 'center/process',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                )
            )
        ),
        array(
            'title' => 'Approved Qualification',
            'permission' => '119',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-th',
            'has_child' => true,
            'child' => array(
                array(
                    'title' => 'Approved Qualification',
                    'permission' => '119',
                    'uri' => 'qualification',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
				
				array(
                    'title' => 'Assign Qualification to Center',
                    'permission' => '119',
                    'uri' => '#',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
            )
        ),
        array(
            'title' => 'Approved Trainer',
            'permission' => '120',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-copy',
            'has_child' => false,
            'child' => array(
                
            )
        ),
        array(
            'title' => 'Learners',
            'permission' => '215',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-copy',
            'has_child' => true,
            'child' => array(
                array(
                    'title' => 'Registered Learners',
                    'permission' => '216',
                    'uri' => 'learners',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
                array(
                    'title' => 'Add New',
                    'permission' => '217',
                    'uri' => 'learners/add_new',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
                array(
                    'title' => 'Assign Qualification',
                    'permission' => '218',
                    'uri' => 'learners/assign_qualification',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
                array(
                    'title' => 'Update Result',
                    'permission' => '115',
                    'uri' => 'asset/requisitions',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                )
            )
        ),
        array(
            'title' => 'Certification',
            'permission' => '122',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-chart-pie',
            'has_child' => true,
            'child' => array(
                array(
                    'title' => 'Certification Status',
                    'permission' => '112',
                    'uri' => 'asset/allocation_request',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
				array(
                    'title' => 'Certification Claim',
                    'permission' => '112',
                    'uri' => 'asset/allocation_request',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                )
            )
        ),
        array(
            'title' => 'User Managemnt',
            'permission' => '25',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-user',
            'has_child' => true,
            'child' => array(
                array(
                    'title' => 'Add New',
                    'permission' => '1',
                    'uri' => 'user/adduser',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                ),
				array(
                    'title' => 'All Users',
                    'permission' => '29',
                    'uri' => 'user/show',
                    'icon' => 'far fa-circle nav-icon',
                    'is_label' => false,
                )
            )
        ),
        array(
            'title' => 'Sample Question',
            'permission' => '140',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-th',
            'has_child' => false,
            'child' => ''
        ),
        array(
            'title' => 'Learning Materials',
            'permission' => '141',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-th',
            'has_child' => false,
            'child' => ''
        ),
        array(
            'title' => 'Withdrwal Approval',
            'permission' => '142',
            'uri' => '#',
            'icon' => 'nav-icon fas fa-th',
            'has_child' => false,
            'child' => ''
        ),
        array(
            'title' => 'Sample Form & Policies',
            'permission' => '144',
            'uri' =>'#',
            'icon' => 'nav-icon fas fa-th',
            'has_child' => false,
            'child' => ''
        ),
        array(
            'title' => 'Logout',
            'permission' => '143',
            'uri' => 'login/logout',
            'icon' => 'nav-icon far fa-circle text-info',
            'has_child' => false,
            'child' => ''
        )
        
        
    );

    //all menu permisssino of current user
    $permission = get_user_permission();

    foreach ($navigation as $nav) {

        $ci = &get_instance();

        $parent_class = '';
        $child_class = '';

        if ($nav['has_child']) {
            $parent_class = 'has-treeview';
            $child_class = 'nav nav-treeview';
        }


        if (in_array($nav['permission'], $permission)) {


            #Activate menu in left panel
            $active_parent = ($nav['uri'] == get_current_uri() || $nav['uri'] == get_current_uri() . '/index') ? " active " : "";

			
			$parent_angle = "";
            //find the child is active, if so, this will activate the parent also
            if ($nav['has_child']) {
                foreach ($nav['child'] as $child) {
                    $active_parent = ($child['uri'] == get_current_uri() || $child['uri'] == get_current_uri() . '/index') ? " active " : "";

                    if ($active_parent != "")
                        break;
                }
				
				$parent_angle = '<i class="fas fa-angle-left right"></i>';
            }

            // echo $active_parent;
            //exit;
            $menu = '
                <li class="nav-item '. $parent_class . ' ">
                    <a href="' . base_url() . $nav['uri'] . '" class="nav-link '.$active_parent.'">
                        <i class="' . $nav['icon'] . '"></i>
                        <p>' . $nav['title'] . $parent_angle .'</p>
						
                    </a>';

            //If there is any sub menu
            if ($nav['has_child']) {
                $menu .= '<ul class="' . $child_class . '">';

                foreach ($nav['child'] as $child) {
                    $active = ($child['uri'] == get_current_uri() || $child['uri'] == get_current_uri() . '/index') ? " active " : "";

                    if (in_array($child['permission'], $permission))
                        if ($child['is_label']) {
                            $menu .= '<li class="nav-item">' . $child['title'] . '</li>';
                        } else {
                            $menu .= '<li class="nav-item"><a class="nav-link '. $active . '" href="' . base_url() . $child['uri'] . '"><i class="' . $child['icon'] . '"></i>' . $child['title'] . '</a></li>';
                        }
                    //Child Navigation if have the permission
                }

                $menu .= '</ul>';
            }

            $menu .= '</li>';

            echo $menu;
        }
    }
    echo '<br><br><br>';
}

function get_current_uri() {
    $ci = &get_instance();
    $uri_segment = $ci->uri->segment(1);
    $uri_segment .= ($ci->uri->segment(2)) ? '/' . $ci->uri->segment(2) : '';

    return $uri_segment;
}