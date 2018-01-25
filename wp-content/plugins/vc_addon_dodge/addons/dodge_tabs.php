<?php
add_shortcode( 'dodge_tab', function($atts, $content=null){
	extract(shortcode_atts(array(
		'tabs'				=> '',
		'tab_name'			=> '',
		'tab_content'		=> '',
		'tab_content_list'	=> ''
	), $atts));

	if(!DODGE_CORE_VISUAL_COMPOSER_ACTIVED) return  $output= '';
	$output ='';
	$output .='<div class="requirements">';
		$output .='<ul class="nav nav-tabs">';
		// tabs menu 
		$tab_item = (isset($atts['tabs']) ? $atts['tabs'] : '');
		$tabs = vc_param_group_parse_atts($tab_item);
		$is_array	= is_array($tabs) ? true:false;
		if(!empty($tabs) && $is_array){
			$i = 0;
			foreach($tabs as $tab_item){
				$menu_name = (isset($tab_item['tab_name']) ? $tab_item['tab_name'] : '');
				$output .='<li '.($i==0 ? 'class="active"' : '').' ><a data-toggle="tab" href="#'.$menu_name.'">'.$menu_name.'</a></li>';
				$i++;
			}
		}
        $output .='</ul>';    
        $output .='<div class="tab-content">';
        $tab_item = (isset($atts['tabs']) ? $atts['tabs'] : '');
		$tabs = vc_param_group_parse_atts($tab_item);
		$is_array	= is_array($tabs) ? true:false;
		if(!empty($tabs) && $is_array){
			$i = 0;
			foreach($tabs as $tab_item){
			$body_name = (isset($tab_item['tab_name']) ? $tab_item['tab_name'] : '');
        	$output .='<div id="'.$body_name.'" class="tab-pane fade in '.($i==0 ? 'active' : '').'">';
            	$output .='<ul class="list-links">';
            	$lists = (isset($tab_item['tab_content']) ? $tab_item['tab_content'] : '');
            	$list_item = vc_param_group_parse_atts($lists);
            	$is_list_array	= is_array($list_item) ? true:false;
            	if(!empty($list_item) && $is_list_array){
            		foreach ($list_item as $item) {
            			if(!empty($item['tab_content_list'])){
                		$output .='<li class="list-link">'.(isset($item['tab_content_list']) ? $item['tab_content_list'] : '').'</li>';
                		} // end inner child if
                	}
                }	
                $output .='</ul>';
            $output .='</div>';
            $i++;
        	}
        }

         $output .='</div>';
    $output .='</div>';
	return $output;
});

// visual composer 
if(class_exists('WPBakeryVisualComposerAbstract')){
	vc_map(array(
		'name'	=> esc_html__( 'Dodge Tabs', 'dodge' ),
		'base'	=> 'dodge_tab',
		'class'	=> '',
		'description'	=> esc_html__('Dodge tabs for requirement', 'dodge'),
		'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
		'params'		=> array(
			array(
				'type'		=> 'param_group',
				'heading'	=> esc_html__( 'Add Tab', 'dodge' ),
				'param_name'=> 'tabs',
				'params'	=> array(
					array(
						'type'		=> 'textfield',
						'heading'	=> esc_html__( 'Tab Name', 'dodge' ),
						'param_name'=> 'tab_name'
					),
					array(
						'type'		=> 'param_group',
						'heading'	=> esc_html__( 'Tab Body', 'dodge' ),
						'param_name'=> 'tab_content',
						'params'	=> array(
							array(
								'type'		=> 'textfield',
								'heading'	=> esc_html__( 'Add Item', 'dodge' ),
								'param_name'=> 'tab_content_list'
							)
						)
					)
				)
			),
			array(
				'type'		=> 'textfield',
				'heading'	=> esc_html__( 'ID', 'dodge' ),
				'param_name'=> 'id'
			)
		)

	));
}

