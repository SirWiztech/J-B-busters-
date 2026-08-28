<?php
// ─────────────────────────────────────────────
//  J&B JUNK BUSTERS — Site Configuration
// ─────────────────────────────────────────────
define('SITE_NAME',    'J&B Junk Busters');
define('SITE_TAGLINE', 'Removal & Cleanup Services');
define('PHONE',        '469-510-8246');
define('PHONE_RAW',    '4695108246');
define('EMAIL',        'info@jnbjunkbusters.com');
define('ADDRESS',      '1101 Ridge Rd, Rockwall, TX 75087');
define('FACEBOOK',     'https://www.facebook.com/profile.php?id=61591112125301');

// All service areas
$SERVICE_AREAS = [
    'Rockwall','Allen','Mesquite','Seagoville','Forney','Richardson',
    'Sachse','Lavon','Royse City','Garland','Murphy','Wylie','Heath',
    'Rowlett','Sunnyvale','Balch Springs','Plano','Terrell','Fate',
    'Crandall','Quinlan','Josephine','Parker','Nevada','Saint Paul',
    'McLendon-Chisholm','Mobile City','Kaufman','Blackland'
];

// Services data
$SERVICES = [
    [
        'icon'  => '<i class="fas fa-house"></i>',
        'title' => 'Residential Junk Removal',
        'desc'  => 'From a single item to an entire house — we haul it all. Furniture, appliances, electronics, you name it.',
        'img'   => 'assets/images/743996045_122107751631370404_6105072072094681472_n.jpg'
    ],
    [
        'icon'  => '<i class="fas fa-building"></i>',
        'title' => 'Commercial Cleanouts',
        'desc'  => 'Office clearances, retail space cleanouts, warehouse junk — we keep your business running smooth.',
        'img'   => 'assets/images/744273379_122107751733370404_1043641177230336075_n.jpg'
    ],
    [
        'icon'  => '<i class="fas fa-hard-hat"></i>',
        'title' => 'Construction Debris',
        'desc'  => 'Drywall, lumber, concrete, roofing — post-construction cleanup done fast and disposed of properly.',
        'img'   => 'assets/images/744316880_122107751799370404_3772456259846875103_n.jpg'
    ],
    [
        'icon'  => '<i class="fas fa-door-open"></i>',
        'title' => 'Estate & Eviction Cleanouts',
        'desc'  => 'Compassionate, thorough estate clearances and fast eviction cleanouts for property managers.',
        'img'   => 'assets/images/744393555_122107751745370404_2205775612204206352_n.jpg'
    ],
    [
        'icon'  => '<i class="fas fa-warehouse"></i>',
        'title' => 'Garage & Shed Cleanouts',
        'desc'  => 'Reclaim your garage! We sort, haul, and even help organize what you want to keep.',
        'img'   => 'assets/images/744536201_122107751637370404_2416342080935895967_n.jpg'
    ],
    [
        'icon'  => '<i class="fas fa-tree"></i>',
        'title' => 'Yard Waste & Brush Removal',
        'desc'  => 'Storm debris, fallen trees, brush piles, old fencing — we clear your yard completely.',
        'img'   => 'assets/images/744663568_122107751673370404_1837427653010624636_n.jpg'
    ],
    [
        'icon'  => '<i class="fas fa-kitchen-set"></i>',
        'title' => 'Appliance Removal',
        'desc'  => 'Refrigerators, washers, dryers, stoves, hot tubs — heavy lifting is our specialty.',
        'img'   => 'assets/images/745305079_122107751703370404_2009808343106279365_n.jpg'
    ],
    [
        'icon'  => '<i class="fas fa-chair"></i>',
        'title' => 'Furniture Hauling',
        'desc'  => 'Couches, mattresses, tables, beds — if it fits in our truck, it\'s gone today.',
        'img'   => 'assets/images/745314109_122107751757370404_1885520254129196585_n.jpg'
    ],
];

// Gallery / Recent Work items — using real job photos
$GALLERY = [
    ['src'=>'assets/images/742267066_122107751841370404_2321035289854632733_n.jpg',  'cat'=>'garage',       'title'=>'Full Garage Cleanout — Rockwall, TX'],
    ['src'=>'assets/images/743996045_122107751631370404_6105072072094681472_n.jpg',  'cat'=>'furniture',    'title'=>'Furniture Haul — Rockwall, TX'],
    ['src'=>'assets/images/744273379_122107751733370404_1043641177230336075_n.jpg',  'cat'=>'construction', 'title'=>'Construction Debris Removal — Forney, TX'],
    ['src'=>'assets/images/744316880_122107751799370404_3772456259846875103_n.jpg',  'cat'=>'estate',       'title'=>'Estate Cleanout — Allen, TX'],
    ['src'=>'assets/images/744393555_122107751745370404_2205775612204206352_n.jpg',  'cat'=>'garage',       'title'=>'Shed Cleanout & Haul — Mesquite, TX'],
    ['src'=>'assets/images/744536201_122107751637370404_2416342080935895967_n.jpg',  'cat'=>'appliance',    'title'=>'Appliance Pickup — Sachse, TX'],
    ['src'=>'assets/images/744663568_122107751673370404_1837427653010624636_n.jpg',  'cat'=>'yard',         'title'=>'Yard Debris Clearing — Wylie, TX'],
    ['src'=>'assets/images/745144716_122107751883370404_1235714177704123432_n.jpg',  'cat'=>'furniture',    'title'=>'Living Room Clearout — Garland, TX'],
    ['src'=>'assets/images/745305079_122107751703370404_2009808343106279365_n.jpg',  'cat'=>'construction', 'title'=>'Post-Reno Cleanup — Rowlett, TX'],
    ['src'=>'assets/images/745314109_122107751757370404_1885520254129196585_n.jpg',  'cat'=>'estate',       'title'=>'Full House Cleanout — Plano, TX'],
    ['src'=>'assets/images/745320604_122107751931370404_2861709432381213003_n.jpg',  'cat'=>'garage',       'title'=>'Garage Cleanout — Heath, TX'],
    ['src'=>'assets/images/745393922_122107751691370404_8932796907367178009_n.jpg',  'cat'=>'appliance',    'title'=>'Hot Tub Removal — Fate, TX'],
    ['src'=>'assets/images/745441989_122107751955370404_4550878729830468357_n.jpg',  'cat'=>'yard',         'title'=>'Storm Debris Cleanup — Terrell, TX'],
    ['src'=>'assets/images/745557031_122107751769370404_3574837595584918388_n.jpg',  'cat'=>'furniture',    'title'=>'Mattress & Sofa Haul — Murphy, TX'],
    ['src'=>'assets/images/745962912_122107751913370404_5300045797466094363_n.jpg',  'cat'=>'garage',       'title'=>'Full Garage Cleanout — Royse City, TX'],
    ['src'=>'assets/images/745963035_122107751811370404_2089252023120994608_n.jpg',  'cat'=>'construction', 'title'=>'Construction Cleanup — Richardson, TX'],
    ['src'=>'assets/images/746130013_122107751661370404_878674799570659017_n.jpg',   'cat'=>'estate',       'title'=>'Estate Cleanout — Lavon, TX'],
    ['src'=>'assets/images/recent-work-photo.jpg',               'cat'=>'garage',       'title'=>'Recent Garage Cleanout — Rockwall, TX'],
    ['src'=>'assets/images/urbside and drive way pick up.jpg',   'cat'=>'garage',       'title'=>'Curbside & Driveway Pickup — Rockwall, TX'],
    ['src'=>'assets/images/after.jpg',                           'cat'=>'garage',       'title'=>'Garage Cleanout — After'],
    ['src'=>'assets/images/before.jpg',                          'cat'=>'garage',       'title'=>'Garage Cleanout — Before'],
];

// Testimonials
$TESTIMONIALS = [
    ['name'=>'Debbie T.',     'city'=>'Rockwall, TX',  'stars'=>5, 'text'=>'Josh and Bailee are absolutely wonderful! They showed up on time, worked fast, and left my garage spotless. Best junk removal experience I\'ve ever had. Highly recommend!'],
    ['name'=>'Marcus R.',     'city'=>'Allen, TX',     'stars'=>5, 'text'=>'I sent a pic of my junk pile via text and got a quote within 10 minutes. They came the SAME DAY. Incredible service and fair pricing. These guys are the real deal.'],
    ['name'=>'Linda S.',      'city'=>'Mesquite, TX',  'stars'=>5, 'text'=>'We hired J&B for an estate cleanout after my mother passed. They were so respectful and compassionate. They even donated usable items. Can\'t thank them enough.'],
    ['name'=>'Carlos M.',     'city'=>'Garland, TX',   'stars'=>5, 'text'=>'Construction debris was piling up on my job site. J&B hauled 3 truckloads in one afternoon. Professional, insured, and affordable. My go-to from now on.'],
    ['name'=>'Jennifer K.',   'city'=>'Wylie, TX',     'stars'=>5, 'text'=>'Texted a photo of my old couch and broken washer at 9pm — got a reply and a quote before I went to bed. Picked up next morning. This is how service should work!'],
    ['name'=>'Robert D.',     'city'=>'Forney, TX',    'stars'=>5, 'text'=>'Family-owned businesses hit different. Josh personally supervised my whole cleanout. Felt like hiring a friend who happens to be really good at hauling junk.'],
];

// Stats
$STATS = [
    ['number'=>'500+',  'label'=>'Jobs Completed'],
    ['number'=>'30+',   'label'=>'Cities Served'],
    ['number'=>'24/7',  'label'=>'Availability'],
    ['number'=>'100%',  'label'=>'Satisfaction Rate'],
];

// Process steps
$PROCESS = [
    ['step'=>1, 'icon'=>'<i class="fas fa-mobile-screen-button"></i>', 'title'=>'Send Us a Pic',     'desc'=>'Text or call us with a photo of your junk. We\'ll give you a fast, free, no-obligation quote — usually within minutes.'],
    ['step'=>2, 'icon'=>'<i class="fas fa-circle-check"></i>', 'title'=>'Get Your Quote',     'desc'=>'We\'ll send you an upfront, honest price. No hidden fees, no surprises. You approve it, we schedule it.'],
    ['step'=>3, 'icon'=>'<i class="fas fa-truck"></i>', 'title'=>'We Haul It Away',   'desc'=>'Our crew shows up on time, does all the heavy lifting, and leaves your space cleaner than we found it.'],
    ['step'=>4, 'icon'=>'<i class="fas fa-recycle"></i>', 'title'=>'Eco-Friendly Disposal','desc'=>'We donate, recycle, and responsibly dispose of everything. Good for your space, good for the planet.'],
];