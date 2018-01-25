<?php
add_shortcode( 'dodge_map', function($atts, $content = null) {

	extract(shortcode_atts(array(
			'latitude'  => '',
			'longitude'	=> '',
			'style'	=> '',
			'image'	=> '',
			'id'	=> '',
			), $atts));
		$output  = '';
		$marker = plugins_url('../images/map-marker.png',__FILE__);
		
		if($image !=''){
			$url =  wp_get_attachment_image_src($image, 'full');
			$marker =  $url[0];
		}
		$output .= '<div id="'.$id.'" class="google-map"></div>';
		$output .= '<script>
		  jQuery("#'.$id.'").gmap3({
			map:{
				options:{
					zoom: 15,
					center: ['.$latitude.','.$longitude.'],
					mapTypeControl: true,
					mapTypeControlOptions: {
						style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
					},
					mapTypeId: "style1",
					mapTypeControlOptions: {
						mapTypeIds: [google.maps.MapTypeId.ROADMAP, "style1"]
					},
					navigationControl: true,
					scrollwheel: false,
					streetViewControl: true
				}
			},
			marker:{
				latLng: [40.663663,-74.210190],
				options: {animation:google.maps.Animation.BOUNCE, icon: "'.$marker.'" }
			},
			styledmaptype:{
				id: "style1",
				options:{
					name: "Style 1"
				},
				styles: [
					{
						featureType: "road.highway",
						stylers: [
							{"color": "#4673ec"},         
							{"elementType":"geometry"},
						]
					},{
						featureType: "water",
						stylers: [
							{ visibility: "on" },
							{ color: "#ededed" }
						]
					},{
						featureType:"landscape",
						stylers:[
							{"color":"#f2f2f2"}
						]
					},{
						featureType: "poi.park",
						elementType:"geometry",
						stylers: [
							{"color":"#efefef"}
						]
					},{
						featureType: "transit.line",
						stylers: [
							{"color":"#ffffff"}
						]
					}
				]
			}
	   });
		</script>';
		
						
			
	return $output;

});


//Visual Composer
if (class_exists('WPBakeryVisualComposerAbstract')) {
vc_map(array(
	"name" => esc_html__("dodge Map", 'dodge'),
	'base' => 'dodge_map',
	'icon' => 'icon-thm-title',
	"class" => "",
	"description" => esc_html__("MAP", 'dodge'),
	'category'		=> esc_html__('Dodge Shortcode', 'dodge'),
	"params" => array(
		array(
			"type" => "textfield",
			"heading" => esc_html__("Latitude", 'dodge'),
			"param_name" => "latitude",
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Longitude", 'dodge'),
			"param_name" => "longitude",
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("Google Map ID", 'dodge'),
			"param_name" => "id",
		),
		array(
			"type" => "attach_image",
			"heading" => esc_html__("Add Marker", 'dodge'),
			"param_name" => "image",
		),
	)
));
}