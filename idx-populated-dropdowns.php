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



function idxbroker_add_financial_choices( $choices ) {

  $choices['IDX Broker - Financial'] = array(
  		'Contingent',
  		'Forclosure',
  		'Lease option',
  		'Lender owned',
  		'Licensed owner',
  		'Short Sale'

  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_financial_choices' );



function idxbroker_add_construction_choices( $choices ) {

  $choices['IDX Broker - Construction'] = array(
  		'Brick accent',
  		'Brick exterior',
  		'Concrete block stucco',
  		'Frame and stucco exterior',
  		'Modular construction',
  		'Stone exterior',
  		'Stucco exterior',
  		'Vinyl/metal siding',
  		'Wood siding'

  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_construction_choices' );



function idxbroker_add_stories_choices( $choices ) {

  $choices['IDX Broker - Stories'] = array(
  		'Multi-story',
  		'Single story',
  		'Tri-level',
  		'Two story'
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_stories_choices' );



function idxbroker_add_style_choices( $choices ) {

  $choices['IDX Broker - Style'] = array(
  		'Duplex',
  		'Mediterranean style',
  		'Ranch',
  		'Spanish',
  		'Split-level'
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_style_choices' );



function idxbroker_add_lotsize_choices( $choices ) {

  $choices['IDX Broker - Lot Size'] = array(
  		'lot size between 1/2 and 3/4 acre',
  		'lot size between 1/4 and 1/2 acre',
  		'lot size between 3 and 5 acres',
  		'lot size is 1/4 acre or less',
  		'lot size is between 1 and 2 acres',
  		'lot size is between 2 and 3 acres',
  		'lot size is between 5 and 10 acres',
  		'lot size of 10 or more acres',
  		'lots size between 3/4 and 1 acre'
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_lotsize_choices' );




function idxbroker_add_general_choices( $choices ) {

  $choices['IDX Broker - General'] = array(
  		'Cats allowed',
  		'Dogs allowed',
  		'No pets allowed',
  		'Pet restrictions',
  		'Pets allowed',
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_general_choices' );



function idxbroker_add_inclusions_choices( $choices ) {

  $choices['IDX Broker - Inclusions'] = array(
  		'Built-in oven',
  		'Clothes dryer',
  		'Clothes washer',
  		'Dishwasher',
  		'Disposal',
  		'Electric range and oven',
  		'Freezer',
  		'Furnished',
  		'Gas range and oven',
  		'Microwave oven',
  		'Partially furnished',
  		'Range and oven',
  		'Refrigerator',
  		'Self-cleaning oven',
  		'Trash compactor',
  );
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_inclusions_choices' );


function idxbroker_add_exterior_choices( $choices ) {

  $choices['IDX Broker - Exterior'] = array(
  		'Balcony',
  		'Deck',
  		'Enclosed patio',
  		'Greenhouse',
  		'Outdoor lights',
  		'Patio',
  		'Storage/out-building(s)',
  		);
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_exterior_choices' );



function idxbroker_add_location_choices( $choices ) {

  $choices['IDX Broker - Location'] = array(
  		'Eastern exposure',
  		'Northeastern exposure',
  		'Northern exposure',
  		'Northwestern exposure',
  		'Southeastern exposure',
  		'Southern exposure',
  		'Southwestern exposure',
  		'Western exposure'
  		);
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_location_choices' );



function idxbroker_add_condition_choices( $choices ) {

  $choices['IDX Broker - Condition'] = array(
  		'Fixer-upper',
  		'Home warranty (see agent for details)',
  		'New construction',
  		'currently under construction',
  		'Sold As Is|Sold %22As is%22',
  		);
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_condition_choices' );



function idxbroker_add_recreation_choices( $choices ) {

  $choices['IDX Broker - Recreation'] = array(
  		'Above ground pool',
  		'Automatic pool chlorination',
  		'Automatic pool cleaner',
  		'BBQ',
  		'Boat dockage',
  		'Boat dockage available',
  		'Boat facilities',
  		'Fenced pool area',
  		'Heated pool',
  		'In-ground',
  		'In-ground swimming pool',
  		'Indoor swimming pool',
  		'Private beach',
  		'Sauna',
  		'Solar heated pool',
  		'Spa',
  		'Tennis court',
  		'screen enclosed swimming pool',
  		'swimming pool',
  		);
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_recreation_choices' );



function idxbroker_add_interior_choices( $choices ) {

  $choices['IDX Broker - Interior'] = array(
  		'Breakfast bar',
  		'Built-in features',
  		'Ceiling fan(s)',
  		'Central vacuum system',
  		'Dry bar',
  		'Fire sprinkler system',
  		'Intercom system',
  		'Jetted bathtub',
  		'Kitchen isle',
  		'Pantry',
  		'Secondary bedrooms split from master bed',
  		'Security features',
  		'Skylight(s)',
  		'Vaulted ceilings',
  		'Walk-in closet(s)',
  		'Wetbar',
  		'Window treatments',
  		);
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_interior_choices' );





function idxbroker_add_heatcool_choices( $choices ) {

  $choices['IDX Broker - Heat/Cool'] = array(
  		'Central air conditioning',
  		'Central heat',
  		'Electric heating',
  		'Heat pump',
  		'Natural gas water heater',
  		'Oil heating',
  		'Radiant heat',
  		'Solar heating features',
  		'Wall heating unit(s)',
  		'Wall or window air conditioner(s)',
  		);
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_heatcool_choices' );



function idxbroker_add_community_choices( $choices ) {

  $choices['IDX Broker - Community'] = array(
  		'Biking/fitness trail',
  		'Gated community',
  		'On-site guard',
  		'Picnic area(s)',
  		'community boat facilities',
  		'community childrens play area',
  		'community clubhouse(s)',
  		'community exercise area(s)',
  		'community golf',
  		'community horse facilities',
  		'community laundry facilities',
  		'community sauna(s)',
  		'community spa(s)',
  		'community swimming pool(s)',
  		'community tennis court(s)',
  		);
   return $choices;
}
add_filter( 'gform_predefined_choices', 'idxbroker_add_community_choices' );


}
