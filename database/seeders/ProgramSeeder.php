<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Program;
use App\Models\Itinerary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure programs directory exists
        Storage::disk('public')->makeDirectory('programs');

        $categories = Category::all()->keyBy('slug');

        $programs = [
            // ===== DAY TRIPS =====
            [
                'category' => 'day-trips',
                'title' => 'Heritage Walk - Old Delhi',
                'short_description' => 'A guided heritage walk through the historic lanes of Old Delhi, exploring Mughal-era architecture, bustling markets, and rich cultural traditions.',
                'description' => "Embark on a fascinating journey through Old Delhi's narrow lanes and historic monuments. Students will explore the magnificent Red Fort, walk through Chandni Chowk, visit Jama Masjid, and experience the vibrant street food culture.\n\nThis program is designed to give students a hands-on understanding of Mughal history, urban heritage, and the living culture of one of India's oldest cities.",
                'price' => 1500,
                'duration' => '1 Day',
                'featured' => true,
                'inclusions' => "Transport (AC Bus)\nProfessional Guide\nEntry Tickets\nLunch & Snacks\nFirst Aid Kit\nGroup Coordinator",
                'exclusions' => "Personal Shopping\nAdditional Snacks\nPersonal Insurance",
                'image_url' => 'https://images.unsplash.com/photo-1587474260584-136574528ed5?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Morning Assembly & Departure', 'description' => 'Gather at school, safety briefing, and depart for Old Delhi by AC bus.'],
                    ['day_title' => 'Red Fort & Chandni Chowk', 'description' => 'Guided tour of Red Fort followed by a walk through the iconic Chandni Chowk market.'],
                    ['day_title' => 'Jama Masjid & Lunch', 'description' => 'Visit Jama Masjid, explore the surrounding area, and enjoy a traditional lunch.'],
                    ['day_title' => 'Heritage Walk & Return', 'description' => 'Walk through heritage lanes, visit Gurudwara Sis Ganj, and return to school by evening.'],
                ],
            ],
            [
                'category' => 'day-trips',
                'title' => 'Science City & Planetarium Visit',
                'short_description' => 'An interactive day at the Science City featuring hands-on exhibits, planetarium shows, and STEM learning activities for curious young minds.',
                'description' => "A day packed with scientific discovery and wonder. Students will explore interactive science galleries, watch a planetarium show about the solar system, and participate in hands-on STEM workshops.\n\nThis trip bridges classroom learning with real-world applications, making science tangible and exciting for students of all ages.",
                'price' => 1200,
                'duration' => '1 Day',
                'featured' => false,
                'inclusions' => "Transport (AC Bus)\nEntry Tickets\nPlanetarium Show\nLunch\nWorksheet Kit\nGroup Coordinator",
                'exclusions' => "Souvenir Shopping\nExtra Shows\nPersonal Insurance",
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Departure & Arrival', 'description' => 'Morning departure from school, arrive at Science City.'],
                    ['day_title' => 'Interactive Galleries', 'description' => 'Explore hands-on science exhibits and innovation galleries.'],
                    ['day_title' => 'Planetarium & Lunch', 'description' => 'Watch an immersive planetarium show followed by lunch.'],
                    ['day_title' => 'STEM Workshop & Return', 'description' => 'Participate in a guided STEM activity, then return to school.'],
                ],
            ],
            [
                'category' => 'day-trips',
                'title' => 'Nature Trail & Bird Watching',
                'short_description' => 'A guided nature trail through a nearby wildlife sanctuary with bird watching, nature journaling, and environmental awareness activities.',
                'description' => "Connect with nature on this eco-friendly day trip. Students will trek through scenic trails, identify bird species with expert naturalists, and learn about local ecosystems and conservation.\n\nThe program includes nature journaling, photography sessions, and a group discussion on environmental stewardship.",
                'price' => 1800,
                'duration' => '1 Day',
                'featured' => false,
                'inclusions' => "Transport (AC Bus)\nNaturalist Guide\nBinoculars (shared)\nNature Journal Kit\nLunch & Water\nFirst Aid",
                'exclusions' => "Personal Camera\nExtra Snacks\nPersonal Insurance",
                'image_url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Early Morning Departure', 'description' => 'Depart early to reach the sanctuary during peak bird activity hours.'],
                    ['day_title' => 'Guided Nature Trail', 'description' => 'Trek through forest trails with an expert naturalist guide.'],
                    ['day_title' => 'Bird Watching & Journaling', 'description' => 'Bird identification session and nature journaling activity.'],
                    ['day_title' => 'Lunch & Return', 'description' => 'Picnic lunch at the sanctuary, group discussion, and return journey.'],
                ],
            ],

            // ===== DOMESTIC TRIPS =====
            [
                'category' => 'domestic-trips',
                'title' => 'Rajasthan Heritage Explorer',
                'short_description' => 'A 5-day heritage tour covering Jaipur, Jodhpur, and Udaipur — exploring forts, palaces, culture, and the vibrant traditions of Rajasthan.',
                'description' => "Discover the royal heritage of Rajasthan on this immersive 5-day journey. Students will explore the magnificent Amber Fort, marvel at the blue city of Jodhpur, cruise on Lake Pichola in Udaipur, and experience the vibrant Rajasthani culture.\n\nThis program blends history, geography, and cultural education into an unforgettable travel experience with structured learning outcomes at every stop.",
                'price' => 18500,
                'duration' => '5 Days / 4 Nights',
                'featured' => true,
                'inclusions' => "AC Transport & Train Tickets\nHotel Accommodation (3-Star)\nAll Meals\nEntry Tickets\nProfessional Guide\nGroup Coordinators\n24/7 Support\nTravel Insurance",
                'exclusions' => "Personal Shopping\nRoom Service\nAdditional Activities\nLaundry",
                'image_url' => 'https://images.unsplash.com/photo-1524492412937-b28074a5d7da?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Day 1 - Arrival in Jaipur', 'description' => 'Arrive in Jaipur, check into hotel, visit Hawa Mahal and local markets in the evening.'],
                    ['day_title' => 'Day 2 - Jaipur Exploration', 'description' => 'Full day tour of Amber Fort, City Palace, Jantar Mantar, and Nahargarh Fort viewpoint.'],
                    ['day_title' => 'Day 3 - Jaipur to Jodhpur', 'description' => 'Travel to Jodhpur, visit Mehrangarh Fort and explore the blue city lanes.'],
                    ['day_title' => 'Day 4 - Jodhpur to Udaipur', 'description' => 'Drive to Udaipur via Ranakpur Temples. Evening boat ride on Lake Pichola.'],
                    ['day_title' => 'Day 5 - Udaipur & Departure', 'description' => 'Visit City Palace and Saheliyon ki Bari. Afternoon departure for home.'],
                ],
            ],
            [
                'category' => 'domestic-trips',
                'title' => 'Kerala Backwaters & Culture',
                'short_description' => 'A 4-day exploration of Kerala covering backwater cruises, tea plantations in Munnar, and the rich cultural heritage of God\'s Own Country.',
                'description' => "Experience the enchanting beauty of Kerala on this 4-day cultural and nature trip. From the serene backwaters of Alleppey to the misty tea plantations of Munnar, students will discover diverse ecosystems, traditional art forms, and sustainable living practices.\n\nThe program includes a houseboat stay, visits to spice gardens, and interaction with local artisans.",
                'price' => 16500,
                'duration' => '4 Days / 3 Nights',
                'featured' => true,
                'inclusions' => "Flight Tickets\nAC Transport\nHotel & Houseboat Stay\nAll Meals\nEntry Tickets\nGuide\nCoordinators\nTravel Insurance",
                'exclusions' => "Personal Shopping\nAyurveda Treatments\nAdditional Activities",
                'image_url' => 'https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Day 1 - Arrival in Kochi', 'description' => 'Arrive in Kochi, visit Fort Kochi, Chinese Fishing Nets, and St. Francis Church.'],
                    ['day_title' => 'Day 2 - Alleppey Backwaters', 'description' => 'Drive to Alleppey, board a traditional houseboat, and cruise the backwaters. Overnight on houseboat.'],
                    ['day_title' => 'Day 3 - Munnar Tea Plantations', 'description' => 'Drive to Munnar, visit tea gardens and Tea Museum. Explore Eravikulam viewpoint.'],
                    ['day_title' => 'Day 4 - Munnar & Departure', 'description' => 'Visit spice garden and local market. Afternoon departure for home.'],
                ],
            ],
            [
                'category' => 'domestic-trips',
                'title' => 'Goa Beach & History Tour',
                'short_description' => 'A 3-day trip to Goa covering Portuguese heritage sites, beautiful beaches, water sports, and the unique Indo-Portuguese cultural experience.',
                'description' => "Explore the sun-kissed beaches and rich Portuguese heritage of Goa on this 3-day educational tour. Students will visit UNESCO-listed churches, explore historic forts, enjoy supervised water sports, and learn about Goa's unique cultural blend.\n\nThis trip combines geography, history, and marine ecology into a fun and structured learning experience.",
                'price' => 14000,
                'duration' => '3 Days / 2 Nights',
                'featured' => false,
                'inclusions' => "Transport & Flights\nHotel Accommodation\nAll Meals\nEntry Tickets\nWater Sports (Basic)\nGuide & Coordinator\nTravel Insurance",
                'exclusions' => "Personal Shopping\nPremium Water Sports\nRoom Service",
                'image_url' => 'https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Day 1 - Arrival & North Goa', 'description' => 'Arrive in Goa, visit Fort Aguada, Calangute Beach, and enjoy evening beach activities.'],
                    ['day_title' => 'Day 2 - Old Goa Heritage', 'description' => 'Visit Basilica of Bom Jesus, Se Cathedral, and Dona Paula. Afternoon water sports session.'],
                    ['day_title' => 'Day 3 - South Goa & Departure', 'description' => 'Explore Colva Beach and Mangueshi Temple. Afternoon departure for home.'],
                ],
            ],
            [
                'category' => 'domestic-trips',
                'title' => 'Himachal Mountain Adventure',
                'short_description' => 'A 5-day adventure trip to Himachal Pradesh covering Shimla, Manali, and Solang Valley with trekking, river crossing, and mountain exploration.',
                'description' => "An adrenaline-packed 5-day adventure through the majestic mountains of Himachal Pradesh. Students will trek through pine forests, experience river crossing activities, visit historic sites in Shimla, and enjoy snow-capped mountain views in Manali.\n\nThis program builds resilience, teamwork, and outdoor survival skills while providing breathtaking encounters with Himalayan nature.",
                'price' => 19500,
                'duration' => '5 Days / 4 Nights',
                'featured' => true,
                'inclusions' => "AC Volvo Transport\nHotel Accommodation\nAll Meals\nAdventure Activities\nTrekking Gear\nProfessional Instructors\nFirst Aid & Safety\nTravel Insurance",
                'exclusions' => "Personal Gear\nShopping\nParagliding\nPersonal Insurance",
                'image_url' => 'https://images.unsplash.com/photo-1626621341517-bbf3d9990a23?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Day 1 - Journey to Shimla', 'description' => 'Overnight Volvo from Delhi. Arrive in Shimla, check in, and explore Mall Road.'],
                    ['day_title' => 'Day 2 - Shimla Exploration', 'description' => 'Visit Jakhoo Temple, Christ Church, and the Viceregal Lodge. Evening bonfire.'],
                    ['day_title' => 'Day 3 - Shimla to Manali', 'description' => 'Scenic drive to Manali via Kullu Valley. Visit Hadimba Temple upon arrival.'],
                    ['day_title' => 'Day 4 - Solang Valley Adventures', 'description' => 'Full day at Solang Valley — trekking, rope activities, and snow point visit.'],
                    ['day_title' => 'Day 5 - Manali & Departure', 'description' => 'Visit Old Manali and Vashisht Hot Springs. Evening departure for Delhi.'],
                ],
            ],

            // ===== INTERNATIONAL TRIPS =====
            [
                'category' => 'international-trips',
                'title' => 'Singapore STEM Explorer',
                'short_description' => 'A 5-day international STEM-focused trip to Singapore featuring visits to the Science Centre, Gardens by the Bay, and cutting-edge technology hubs.',
                'description' => "Explore the futuristic city-state of Singapore on this 5-day STEM-focused international program. Students will visit the Singapore Science Centre, marvel at the Supertree Grove at Gardens by the Bay, explore the ArtScience Museum, and learn about smart city technologies.\n\nThis program combines science, technology, and cultural immersion in one of Asia's most innovative countries.",
                'price' => 65000,
                'duration' => '5 Days / 4 Nights',
                'featured' => true,
                'inclusions' => "Return Flights\nHotel (4-Star)\nAll Meals\nVisa Assistance\nEntry Tickets\nAC Transport\nProfessional Guide\nTravel Insurance\n24/7 Coordinator",
                'exclusions' => "Passport Fees\nPersonal Shopping\nVisa Fees\nRoom Service\nPersonal Insurance",
                'image_url' => 'https://images.unsplash.com/photo-1525625293386-3f8f99389edd?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Day 1 - Arrival in Singapore', 'description' => 'Arrive at Changi Airport, transfer to hotel. Evening walk at Marina Bay Sands area.'],
                    ['day_title' => 'Day 2 - STEM Day', 'description' => 'Visit Singapore Science Centre and ArtScience Museum. Afternoon at Gardens by the Bay.'],
                    ['day_title' => 'Day 3 - Cultural Exploration', 'description' => 'Explore Chinatown, Little India, and the Civic District. Visit National Museum.'],
                    ['day_title' => 'Day 4 - Sentosa Island', 'description' => 'Full day at Sentosa — S.E.A. Aquarium, Universal Studios tour, and cable car ride.'],
                    ['day_title' => 'Day 5 - Departure', 'description' => 'Morning visit to Merlion Park and souvenir shopping. Afternoon flight back home.'],
                ],
            ],
            [
                'category' => 'international-trips',
                'title' => 'Dubai Future & Innovation Tour',
                'short_description' => 'A 4-day innovation-focused trip to Dubai exploring the Museum of the Future, Burj Khalifa, Dubai Frame, and sustainable city initiatives.',
                'description' => "Experience the future of urban living in Dubai on this 4-day innovation tour. Students will visit the iconic Museum of the Future, stand atop Burj Khalifa, explore the Dubai Frame, and learn about the city's remarkable transformation from desert to global hub.\n\nThe program highlights sustainability, architecture, and technology — inspiring students to think big about the future.",
                'price' => 55000,
                'duration' => '4 Days / 3 Nights',
                'featured' => false,
                'inclusions' => "Return Flights\nHotel (4-Star)\nAll Meals\nVisa Assistance\nEntry Tickets\nAC Transport\nGuide\nTravel Insurance",
                'exclusions' => "Passport Fees\nVisa Fees\nPersonal Shopping\nDesert Safari (Optional)\nPersonal Insurance",
                'image_url' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Day 1 - Arrival in Dubai', 'description' => 'Arrive in Dubai, hotel check-in. Evening visit to Dubai Marina and JBR Walk.'],
                    ['day_title' => 'Day 2 - Innovation Day', 'description' => 'Visit Museum of the Future, Dubai Frame, and Dubai Creek. Evening at Global Village.'],
                    ['day_title' => 'Day 3 - Iconic Dubai', 'description' => 'Burj Khalifa observation deck, Dubai Mall Aquarium, and Old Dubai heritage walk.'],
                    ['day_title' => 'Day 4 - Departure', 'description' => 'Morning visit to Miracle Garden (seasonal). Afternoon departure for home.'],
                ],
            ],
            [
                'category' => 'international-trips',
                'title' => 'Thailand Cultural Immersion',
                'short_description' => 'A 6-day cultural immersion program in Thailand covering Bangkok temples, Ayutthaya ruins, and Chiang Mai hill tribe interactions.',
                'description' => "Dive deep into Thai culture on this 6-day immersion program spanning Bangkok, Ayutthaya, and Chiang Mai. Students will visit magnificent Buddhist temples, explore ancient ruins, interact with hill tribe communities, and learn about Southeast Asian history and traditions.\n\nThis program fosters cross-cultural understanding, empathy, and global awareness in a safe and structured environment.",
                'price' => 58000,
                'duration' => '6 Days / 5 Nights',
                'featured' => false,
                'inclusions' => "Return Flights\nDomestic Flights (Bangkok-Chiang Mai)\nHotel (4-Star)\nAll Meals\nVisa on Arrival Assistance\nEntry Tickets\nAC Transport\nGuide\nTravel Insurance",
                'exclusions' => "Passport Fees\nPersonal Shopping\nOptional Activities\nRoom Service",
                'image_url' => 'https://images.unsplash.com/photo-1528181304800-259b08848526?w=800&h=600&fit=crop',
                'itineraries' => [
                    ['day_title' => 'Day 1 - Arrival in Bangkok', 'description' => 'Arrive in Bangkok, hotel check-in. Evening boat ride on Chao Phraya River.'],
                    ['day_title' => 'Day 2 - Bangkok Temples', 'description' => 'Visit Grand Palace, Wat Pho (Reclining Buddha), and Wat Arun. Evening at Khao San Road.'],
                    ['day_title' => 'Day 3 - Ayutthaya Day Trip', 'description' => 'Day trip to the ancient city of Ayutthaya. Explore UNESCO World Heritage ruins.'],
                    ['day_title' => 'Day 4 - Fly to Chiang Mai', 'description' => 'Morning flight to Chiang Mai. Visit Doi Suthep Temple and Night Bazaar.'],
                    ['day_title' => 'Day 5 - Hill Tribe Visit', 'description' => 'Visit a hill tribe village, elephant sanctuary, and participate in a cooking class.'],
                    ['day_title' => 'Day 6 - Departure', 'description' => 'Morning free time at Chiang Mai market. Afternoon flight back home.'],
                ],
            ],
        ];

        foreach ($programs as $data) {
            $cat = $categories->get($data['category']);
            if (!$cat) continue;

            $slug = Str::slug($data['title']);

            // Download and store the thumbnail image
            $thumbnailPath = $this->downloadImage($data['image_url'], 'programs', $slug);

            $program = Program::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $data['title'],
                    'slug' => $slug,
                    'category_id' => $cat->id,
                    'short_description' => $data['short_description'],
                    'description' => $data['description'],
                    'thumbnail' => $thumbnailPath,
                    'price' => $data['price'],
                    'duration' => $data['duration'],
                    'inclusions' => $data['inclusions'],
                    'exclusions' => $data['exclusions'],
                    'featured' => $data['featured'],
                    'status' => true,
                ]
            );

            // Create itineraries
            $program->itineraries()->delete();
            foreach ($data['itineraries'] as $order => $it) {
                Itinerary::create([
                    'program_id' => $program->id,
                    'day_title' => $it['day_title'],
                    'description' => $it['description'],
                    'order' => $order + 1,
                ]);
            }
        }
    }

    private function downloadImage(string $url, string $folder, string $name): ?string
    {
        try {
            $context = stream_context_create([
                'http' => [
                    'timeout' => 15,
                    'header' => "User-Agent: Mozilla/5.0\r\n",
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ]);

            $imageContent = @file_get_contents($url, false, $context);
            if ($imageContent === false) return null;

            $extension = 'jpg';
            $filename = $folder . '/' . $name . '.' . $extension;

            Storage::disk('public')->put($filename, $imageContent);

            return $filename;
        } catch (\Exception $e) {
            return null;
        }
    }
}
