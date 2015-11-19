<?php


if (class_exists("GFForms")) {

/**
 * idxbroker_add_pricerange_choices function.
 *
 * @access public
 * @param mixed $choices
 * @return void
 */
function idxbroker_add_pricerange_choices( $choices ) {

  $choices['IDX Broker - Price Ranges'] = array(
	  	'$50,000|50000',
  		'$100,000|100000',
  		'$200,000|200000',
  		'$300,000|300000',
  		'$400,000|400000',
  		'$500,000|500000',
  		'$600,000|600000',
  		'$700,000|700000',
  		'$800,000|800000',
  		'$900,000|900000',
  		'$1,000,000|1000000',
  		'$2,000,000|2000000',
  		'$3,000,000|3000000',
  		'$4,000,000|4000000',
  		'$5,000,000|5000000',
  		'$6,000,000|6000000',
  		'$7,000,000|7000000',
  		'$8,000,000|8000000',
  		'$9,000,000|9000000',
  		'$10,000,000|10000000',
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_pricerange_choices' );



/**
 * idxbroker_add_propertytype_choices function.
 *
 * @access public
 * @param mixed $choices
 * @return void
 */
function idxbroker_add_propertytype_choices( $choices ) {

  $choices['IDX Broker - Property Types'] = array(
  		'Single Family|1',
  		'Condo/Townhome|2',
  		'Mobile Home|3',
  		'Vacant Land|4',
  		'Commercial|5',
  		'MultiFamily|6',
  		'Rental|7',
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_propertytype_choices' );



/**
 * idxbroker_add_sortby_choices function.
 *
 * @access public
 * @param mixed $choices
 * @return void
 */
function idxbroker_add_sortby_choices( $choices ) {

  $choices['IDX Broker - Sort By'] = array(
  		'Newest Listings|newest',
  		'Oldest Listings|oldest',
  		'Least Expensive to most|pra',
  		'Most expensive to least|prd',
  		'Bedrooms (Low to High)|bda',
  		'Bedrooms (Hight to Low)|bdd',
  		'Bathrooms (Low to High)|tba',
  		'Bathrooms (High to Low)|tbd',
  		'Square Feet (Low to High)|sqfta',
  		'Square Feet (High to Low)|sqftd',
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_sortby_choices' );



/**
 * idxbroker_add_bedbathcount_choices function.
 *
 * @access public
 * @param mixed $choices
 * @return void
 */
function idxbroker_add_bedbathcount_choices( $choices ) {

  $choices['IDX Broker - Bed/Bath Count'] = array(
  		'1+|2',
  		'2+|2',
  		'3+|3',
  		'4+|4',
  		'5+|5',
  		'6+|6',
  		'7+|7',
  		'8+|8',
  		'9+|9',

  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_bedbathcount_choices' );



function idxbroker_add_perpage_choices( $choices ) {

  $choices['IDX Broker - Results per Page'] = array(
  		'5',
  		'10',
  		'25',
  		'50',
  		'100',

  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_perpage_choices' );



}
