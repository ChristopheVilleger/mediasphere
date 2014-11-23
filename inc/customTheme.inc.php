<?php


		/*
	* Theme Customization
	*/
	function mediasphere_customize_register( $wp_customize ) {
			//All our sections, settings, and controls will be added here
		$wp_customize->add_section('mediasphere_color', array(
			'title'    => __('Couleurs', 'mediasphere'),
			'priority' => 100,
			));

		$wp_customize->add_section('mediasphere_banner', array(
			'title'    => __('Bannière', 'mediasphere'),
			'priority' => 101,
			));

		$wp_customize->add_section('mediasphere_background', array(
			'title'    => __('Image d\'arrière plan', 'mediasphere'),
			'priority' => 102,
			));

		$wp_customize->add_section('mediasphere_disposition', array(
			'title'    => __('Disposition', 'mediasphere'),
			'priority' => 103,
			));


			//  =============================
			//  = Section mediasphere_color =
			//  =============================

		$wp_customize->add_setting('mediasphere_theme_options[link_color1]', array(
			'default'           => '000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',

			));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color1', array(
			'label'    => __('Couleur 1', 'mediasphere'),
			'section'  => 'mediasphere_color',
			'settings' => 'mediasphere_theme_options[link_color1]',
			)));


		$wp_customize->add_setting('mediasphere_theme_options[link_color2]', array(
			'default'           => '000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',

			));

		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color2', array(
			'label'    => __('Couleur 2', 'mediasphere'),
			'section'  => 'mediasphere_color',
			'settings' => 'mediasphere_theme_options[link_color2]',
			)));


			//  ==============================
			//  = Section mediasphere_banner =
			//  ==============================

		$wp_customize->add_setting('mediasphere_theme_options[image_upload_banner]', array(
			'default'           => get_bloginfo(template_url) . '/images/default-banner.jpg',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',

			));

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_banner', array(
			'label'    => __('Bannière du thème', 'mediasphere'),
			'section'  => 'mediasphere_banner',
			'settings' => 'mediasphere_theme_options[image_upload_banner]',
			)));


			//  ==================================
			//  = Section mediasphere_background =
			//  ==================================

		$wp_customize->add_setting('mediasphere_theme_options[image_upload_background]', array(
			'default'           => get_bloginfo(template_url) . '/images/default-wallpaper.jpg',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',

			));

		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_background', array(
			'label'    => __('Image d\'arrière plan', 'mediasphere'),
			'section'  => 'mediasphere_background',
			'settings' => 'mediasphere_theme_options[image_upload_background]',
			)));



		$wp_customize->add_setting('themename_theme_options[text_test]', array(
			'default'        => 'Arse!',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
			));
		$wp_customize->add_control('themename_text_test', array(
			'label'      => __('Text Test', 'themename'),
			'section'    => 'mediasphere_banner',
			'settings'   => 'themename_theme_options[text_test]',
			));
			//  =============================
			//  = Radio Input               =
			//  =============================
		$wp_customize->add_setting('themename_theme_options[color_scheme]', array(
			'default'        => 'value2',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
			));
	//
		$wp_customize->add_control('mediasphere_banner', array(
			'label'      => __('Color Scheme', 'themename'),
			'section'    => 'mediasphere_banner',
			'settings'   => 'themename_theme_options[color_scheme]',
			'type'       => 'radio',
			'choices'    => array(
				'value1' => 'Choice 1',
				'value2' => 'Choice 2',
				'value3' => 'Choice 3',
				),
			));
	//
			//  =============================
			//  = Checkbox                  =
			//  =============================
		$wp_customize->add_setting('themename_theme_options[checkbox_test]', array(
			'capability' => 'edit_theme_options',
			'type'       => 'option',
			));
	//
		$wp_customize->add_control('display_header_text', array(
			'settings' => 'themename_theme_options[checkbox_test]',
			'label'    => __('Display Header Text'),
			'section'  => 'mediasphere_banner',
			'type'     => 'checkbox',
			));
	//
	//
			//  =============================
			//  = Select Box                =
			//  =============================
		$wp_customize->add_setting('themename_theme_options[header_select]', array(
			'default'        => 'value2',
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
			));
		$wp_customize->add_control( 'example_select_box', array(
			'settings' => 'themename_theme_options[header_select]',
			'label'   => 'Select Something:',
			'section' => 'mediasphere_banner',
			'type'    => 'select',
			'choices'    => array(
				'value1' => 'Choice 1',
				'value2' => 'Choice 2',
				'value3' => 'Choice 3',
				),
			));
	//
	//
			//  =============================
			//  = Image Upload              =
			//  =============================
		$wp_customize->add_setting('themename_theme_options[image_upload_test]', array(
			'default'           => 'image.jpg',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
	//
			));
	//
		$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
			'label'    => __('Image Upload Test', 'themename'),
			'section'  => 'mediasphere_banner',
			'settings' => 'themename_theme_options[image_upload_test]',
			)));
	//
			//  =============================
			//  = File Upload               =
			//  =============================
		$wp_customize->add_setting('themename_theme_options[upload_test]', array(
			'default'           => 'arse',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
	//
			));
	//
		$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
			'label'    => __('Upload Test', 'themename'),
			'section'  => 'mediasphere_banner',
			'settings' => 'themename_theme_options[upload_test]',
			)));
	//
	//
			//  =============================
			//  = Color Picker              =
			//  =============================
		$wp_customize->add_setting('themename_theme_options[link_color]', array(
			'default'           => '000',
			'sanitize_callback' => 'sanitize_hex_color',
			'capability'        => 'edit_theme_options',
			'type'           => 'option',
	//
			));
	//
		$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
			'label'    => __('Link Color', 'themename'),
			'section'  => 'mediasphere_banner',
			'settings' => 'themename_theme_options[link_color]',
			)));
	//
	//
			//  =============================
			//  = Page Dropdown             =
			//  =============================
		$wp_customize->add_setting('themename_theme_options[page_test]', array(
			'capability'     => 'edit_theme_options',
			'type'           => 'option',
	//
			));
	//
		$wp_customize->add_control('themename_page_test', array(
			'label'      => __('Page Test', 'themename'),
			'section'    => 'mediasphere_banner',
			'type'    => 'dropdown-pages',
			'settings'   => 'themename_theme_options[page_test]',
			));
	//
			// =====================
			//  = Category Dropdown =
			//  =====================
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
	//
		$wp_customize->add_setting('_s_f_slide_cat', array(
			'default'        => $default
			));
		$wp_customize->add_control( 'cat_select_box', array(
			'settings' => '_s_f_slide_cat',
			'label'   => 'Select Category:',
			'section'  => '_s_f_home_slider',
			'type'    => 'select',
			'choices' => $cats,
			));
	}
	add_action( 'customize_register', 'mediasphere_customize_register' );
