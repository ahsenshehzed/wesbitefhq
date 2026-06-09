<?php
/**
 * FleetHQ — Advanced Structured SEO
 *
 * Covers:
 *  - Canonical URL
 *  - Meta robots (noindex for search/404/date archives)
 *  - Meta description + Open Graph + Twitter Card
 *  - JSON-LD schemas:
 *      • Organization (site-wide)
 *      • SoftwareApplication (home/front page — SaaS product)
 *      • WebSite + SearchAction (sitelinks searchbox)
 *      • BlogPosting (single posts)
 *      • BreadcrumbList (all inner pages)
 *      • FAQPage (any page whose content has <details> FAQ blocks)
 */

defined( 'ABSPATH' ) || exit;

/* ──────────────────────────────────────────────
 * Remove old SEO head hook (replaced below)
 * ────────────────────────────────────────────── */
remove_action( 'wp_head', 'fleethq_seo_head' );

/* ──────────────────────────────────────────────
 * Helper: safe og:image URL
 * ────────────────────────────────────────────── */
function fleethq_og_image( $post_id = null ) {
	if ( $post_id && has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail_url( $post_id, 'large' );
	}
	$custom = get_theme_mod( 'fleethq_default_og_image', '' );
	if ( $custom ) {
		return esc_url( $custom );
	}
	return get_template_directory_uri() . '/assets/images/logo.png';
}

/* ──────────────────────────────────────────────
 * Main SEO output
 * ────────────────────────────────────────────── */
function fleethq_seo_head_v2() {

	/* ---- Decide context ---- */
	$is_home     = is_front_page() || is_home();
	$is_singular = is_singular();
	$is_post     = is_singular( 'post' );
	$post_id     = get_queried_object_id();

	/* ---- Canonical ---- */
	if ( $is_singular ) {
		$canonical = get_permalink( $post_id );
	} elseif ( $is_home ) {
		$canonical = home_url( '/' );
	} else {
		$canonical = get_pagenum_link( get_query_var( 'paged' ) );
	}
	echo '<link rel="canonical" href="' . esc_url( $canonical ) . '">' . "\n";

	/* ---- Robots (noindex low-value pages) ---- */
	if ( is_search() || is_404() || is_date() || is_author() ) {
		echo '<meta name="robots" content="noindex, follow">' . "\n";
	} else {
		echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
	}

	/* ---- Title / description ---- */
	if ( $is_singular ) {
		$raw_desc = wp_strip_all_tags( get_the_excerpt( $post_id ) );
		$title    = get_the_title( $post_id ) . ' — ' . get_bloginfo( 'name' );
		$url      = get_permalink( $post_id );
		$og_type  = $is_post ? 'article' : 'website';
		$img      = fleethq_og_image( $post_id );
	} elseif ( $is_home ) {
		$raw_desc = wp_strip_all_tags( get_bloginfo( 'description' ) )
			?: 'FleetHQ is the all-in-one fleet management platform for car rental operators — automate bookings, rentals, and fleet operations.';
		$title    = get_bloginfo( 'name' ) . ' — Fleet Management Software for Car Rental Operators';
		$url      = home_url( '/' );
		$og_type  = 'website';
		$img      = fleethq_og_image();
	} else {
		$raw_desc = wp_strip_all_tags( get_bloginfo( 'description' ) );
		$title    = wp_title( '—', false ) . ' — ' . get_bloginfo( 'name' );
		$url      = get_pagenum_link( get_query_var( 'paged' ) );
		$og_type  = 'website';
		$img      = fleethq_og_image();
	}

	$desc = $raw_desc ? mb_substr( $raw_desc, 0, 160 ) : '';

	if ( $desc ) {
		echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	}

	/* ---- Open Graph ---- */
	echo '<meta property="og:type"        content="' . esc_attr( $og_type ) . '">' . "\n";
	echo '<meta property="og:title"       content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta property="og:url"         content="' . esc_url( $url ) . '">' . "\n";
	echo '<meta property="og:image"       content="' . esc_url( $img ) . '">' . "\n";
	echo '<meta property="og:image:width"  content="1200">' . "\n";
	echo '<meta property="og:image:height" content="630">' . "\n";
	echo '<meta property="og:site_name"   content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";
	echo '<meta property="og:locale"      content="en_US">' . "\n";

	if ( $is_post ) {
		echo '<meta property="article:published_time" content="' . esc_attr( get_post_time( 'c', true, $post_id ) ) . '">' . "\n";
		echo '<meta property="article:modified_time"  content="' . esc_attr( get_post_modified_time( 'c', true, $post_id ) ) . '">' . "\n";
		foreach ( get_the_category( $post_id ) as $cat ) {
			echo '<meta property="article:section" content="' . esc_attr( $cat->name ) . '">' . "\n";
		}
	}

	/* ---- Twitter Card ---- */
	echo '<meta name="twitter:card"        content="summary_large_image">' . "\n";
	echo '<meta name="twitter:title"       content="' . esc_attr( $title ) . '">' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '">' . "\n";
	echo '<meta name="twitter:image"       content="' . esc_url( $img ) . '">' . "\n";
	$tw_handle = get_theme_mod( 'fleethq_twitter_handle', '' );
	if ( $tw_handle ) {
		echo '<meta name="twitter:site" content="' . esc_attr( $tw_handle ) . '">' . "\n";
	}

	/* ---- Preconnect hints ---- */
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

	/* ════════════════════════════════════════════
	 * JSON-LD Schemas
	 * ════════════════════════════════════════════ */
	$schemas = [];

	/* -- Organization (always) -- */
	$org = [
		'@type'   => 'Organization',
		'@id'     => home_url( '/#organization' ),
		'name'    => get_bloginfo( 'name' ),
		'url'     => home_url( '/' ),
		'logo'    => [
			'@type'  => 'ImageObject',
			'url'    => get_template_directory_uri() . '/assets/images/logo.png',
			'width'  => 200,
			'height' => 60,
		],
		'sameAs'  => array_values( array_filter( [
			get_theme_mod( 'fleethq_social_twitter',   '' ),
			get_theme_mod( 'fleethq_social_linkedin',  '' ),
			get_theme_mod( 'fleethq_social_instagram', '' ),
			get_theme_mod( 'fleethq_social_youtube',   '' ),
		] ) ),
	];
	$contact_email = get_theme_mod( 'fleethq_contact_email', '' );
	if ( $contact_email ) {
		$org['contactPoint'] = [
			'@type'       => 'ContactPoint',
			'contactType' => 'customer support',
			'email'       => $contact_email,
			'areaServed'  => 'US',
		];
	}

	/* -- WebSite + SearchAction -- */
	$schemas[] = [
		'@context' => 'https://schema.org',
		'@graph'   => [
			[
				'@type'            => 'WebSite',
				'@id'              => home_url( '/#website' ),
				'url'              => home_url( '/' ),
				'name'             => get_bloginfo( 'name' ),
				'description'      => get_bloginfo( 'description' ),
				'publisher'        => [ '@id' => home_url( '/#organization' ) ],
				'potentialAction'  => [
					'@type'       => 'SearchAction',
					'target'      => [
						'@type'       => 'EntryPoint',
						'urlTemplate' => home_url( '/?s={search_term_string}' ),
					],
					'query-input' => 'required name=search_term_string',
				],
			],
			$org,
		],
	];

	/* -- SoftwareApplication (home / front page) -- */
	if ( $is_home ) {
		$schemas[] = [
			'@context'            => 'https://schema.org',
			'@type'               => 'SoftwareApplication',
			'name'                => 'FleetHQ',
			'url'                 => home_url( '/' ),
			'applicationCategory' => 'BusinessApplication',
			'operatingSystem'     => 'Web',
			'description'         => 'All-in-one fleet management software for car rental operators. Automate bookings, manage vehicles, sync calendars, and grow your business.',
			'offers'              => [
				'@type'       => 'Offer',
				'price'       => '0',
				'priceCurrency' => 'USD',
				'description' => 'Free trial available. No credit card required.',
			],
			'aggregateRating' => [
				'@type'       => 'AggregateRating',
				'ratingValue' => '4.8',
				'ratingCount' => '120',
				'bestRating'  => '5',
				'worstRating' => '1',
			],
			'screenshot'  => get_template_directory_uri() . '/assets/images/dashboard-app.webp',
			'featureList' => [
				'Fleet & Booking Management',
				'Free Booking Website',
				'Rental Agreement Automation',
				'Driver Verification & Insurance',
				'Turo Calendar Sync',
				'Real-time Analytics Dashboard',
			],
			'publisher' => $org,
		];
	}

	/* -- BlogPosting (single post) -- */
	if ( $is_post ) {
		$schemas[] = [
			'@context'      => 'https://schema.org',
			'@type'         => 'BlogPosting',
			'@id'           => get_permalink( $post_id ) . '#article',
			'headline'      => get_the_title( $post_id ),
			'description'   => $desc,
			'url'           => get_permalink( $post_id ),
			'image'         => $img,
			'datePublished' => get_post_time( 'c', true, $post_id ),
			'dateModified'  => get_post_modified_time( 'c', true, $post_id ),
			'author'        => [
				'@type' => 'Person',
				'name'  => get_the_author_meta( 'display_name', get_post_field( 'post_author', $post_id ) ),
			],
			'publisher'     => $org,
			'mainEntityOfPage' => [
				'@type' => 'WebPage',
				'@id'   => get_permalink( $post_id ),
			],
		];
	}

	/* -- BreadcrumbList (all non-home pages) -- */
	if ( ! $is_home ) {
		$crumbs = [
			[
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => 'Home',
				'item'     => home_url( '/' ),
			],
		];

		if ( $is_post ) {
			$cats = get_the_category( $post_id );
			if ( $cats ) {
				$crumbs[] = [
					'@type'    => 'ListItem',
					'position' => 2,
					'name'     => $cats[0]->name,
					'item'     => get_category_link( $cats[0]->term_id ),
				];
				$crumbs[] = [
					'@type'    => 'ListItem',
					'position' => 3,
					'name'     => get_the_title( $post_id ),
					'item'     => get_permalink( $post_id ),
				];
			} else {
				$crumbs[] = [
					'@type'    => 'ListItem',
					'position' => 2,
					'name'     => get_the_title( $post_id ),
					'item'     => get_permalink( $post_id ),
				];
			}
		} elseif ( $is_singular ) {
			$crumbs[] = [
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => get_the_title( $post_id ),
				'item'     => get_permalink( $post_id ),
			];
		}

		if ( count( $crumbs ) > 1 ) {
			$schemas[] = [
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => $crumbs,
			];
		}
	}

	/* -- FAQPage (auto-detect <details>/<summary> FAQ blocks in post content) -- */
	if ( $is_singular && in_the_loop() ) {
		$content = get_post_field( 'post_content', $post_id );
		if ( $content && strpos( $content, '<details' ) !== false ) {
			$doc = new DOMDocument();
			libxml_use_internal_errors( true );
			$doc->loadHTML( '<?xml encoding="UTF-8">' . $content );
			libxml_clear_errors();
			$details  = $doc->getElementsByTagName( 'details' );
			$faq_main = [];
			foreach ( $details as $node ) {
				$summaries = $node->getElementsByTagName( 'summary' );
				if ( ! $summaries->length ) continue;
				$question = trim( $summaries->item(0)->textContent );
				// Answer = everything except the <summary>
				$summaries->item(0)->parentNode->removeChild( $summaries->item(0) );
				$answer   = trim( $node->textContent );
				if ( $question && $answer ) {
					$faq_main[] = [
						'@type'          => 'Question',
						'name'           => $question,
						'acceptedAnswer' => [
							'@type' => 'Answer',
							'text'  => $answer,
						],
					];
				}
			}
			if ( $faq_main ) {
				$schemas[] = [
					'@context'   => 'https://schema.org',
					'@type'      => 'FAQPage',
					'mainEntity' => $faq_main,
				];
			}
		}
	}

	/* ---- Output all schemas ---- */
	foreach ( $schemas as $schema ) {
		echo '<script type="application/ld+json">'
			. wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT )
			. '</script>' . "\n";
	}
}
add_action( 'wp_head', 'fleethq_seo_head_v2', 2 );

/* ──────────────────────────────────────────────
 * Customizer: SEO extra settings
 * ────────────────────────────────────────────── */
add_action( 'customize_register', function ( $wp_customize ) {

	$wp_customize->add_section( 'fleethq_seo', [
		'title'    => __( 'SEO Settings', 'fleethq' ),
		'priority' => 40,
	] );

	$wp_customize->add_setting( 'fleethq_default_og_image', [ 'sanitize_callback' => 'esc_url_raw' ] );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fleethq_default_og_image', [
		'label'   => __( 'Default OG / Social Image (1200×630)', 'fleethq' ),
		'section' => 'fleethq_seo',
	] ) );

	$wp_customize->add_setting( 'fleethq_twitter_handle', [ 'sanitize_callback' => 'sanitize_text_field' ] );
	$wp_customize->add_control( 'fleethq_twitter_handle', [
		'label'       => __( 'Twitter / X handle (e.g. @fleethq)', 'fleethq' ),
		'section'     => 'fleethq_seo',
		'type'        => 'text',
	] );

	$wp_customize->add_setting( 'fleethq_contact_email', [ 'sanitize_callback' => 'sanitize_email' ] );
	$wp_customize->add_control( 'fleethq_contact_email', [
		'label'   => __( 'Support Email (for Schema.org)', 'fleethq' ),
		'section' => 'fleethq_seo',
		'type'    => 'email',
	] );
} );
