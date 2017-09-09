<?php

namespace VincentRagosta\Taxonomies;

class TaxonomyFactory {

	public $taxonomies = array();

	public function build( $taxonomy ) {
		if ( $this->exists( $taxonomy ) ) {
			return $this->taxonomies[ $taxonomy ];
		} else {
			switch ( $taxonomy ) {
				case CATEGORY_TAXONOMY:
					$instance = new CategoryTaxonomy();
					break;
				default:
					throw new \Exception(
						"TaxonomyFactory - Unknown Taxonomy: $taxonomy"
					);
			}
			$instance->register();
			$this->taxonomies[ $taxonomy ] = $instance;
			return $instance;
		}
	}

	public function build_all() {
		foreach ( $this->get_supported_taxonomies() as $taxonomy ) {
			$this->build( $taxonomy );
		}
	}

	public function exists( $taxonomy ) {
		return ! empty( $this->taxonomies[ $taxonomy ] );
	}

	public function get_supported_taxonomies() {
		$taxonomies = array(
			CATEGORY_TAXONOMY,
		);

		$taxonomies = apply_filters( 'vincentragosta_taxonomies', $taxonomies );
		return $taxonomies;
	}
}
