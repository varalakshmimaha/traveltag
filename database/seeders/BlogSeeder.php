<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
            [
                'title' => '10 Best Budget Travel Destinations for Students',
                'slug' => 'best-budget-travel-destinations-' . \Str::random(5),
                'content' => '<h2>Explore the World Without Breaking Your Bank</h2>
<p>Traveling as a student doesn\'t have to be expensive. Here are 10 amazing destinations where you can have an incredible experience without emptying your wallet:</p>

<h3>1. Southeast Asia (Thailand, Vietnam, Cambodia)</h3>
<p>With incredibly affordable accommodation, street food, and activities, Southeast Asia is a paradise for budget travelers. A hostel bed costs just a few dollars, and you can eat delicious meals for even less.</p>

<h3>2. Mexico</h3>
<p>Popular beach destinations like Cancun have budget-friendly options, while smaller towns offer authentic experiences at fraction of the cost. Student discounts are often available for historical sites.</p>

<h3>3. Indonesia</h3>
<p>Bali and other Indonesian islands offer stunning beaches, temples, and culture. Accommodation and food are incredibly cheap, making it perfect for students on a tight budget.</p>

<h3>4. Portugal</h3>
<p>Europe doesn\'t always have to be expensive. Portugal offers great value for money with delicious food, beautiful coastlines, and rich history at reasonable prices.</p>

<h3>5. India</h3>
<p>Experience incredible culture, food, and spirituality. India is extremely affordable and offers diverse experiences from mountains to beaches to bustling cities.</p>

<h3>6. Philippines</h3>
<p>Island hopping in the Philippines is affordable and amazing. Crystal clear waters, friendly locals, and cheap accommodation make it ideal for student travelers.</p>

<h3>7. Guatemala</h3>
<p>Lake Atitlan, Tikal ruins, and colorful markets - Guatemala offers rich culture and adventure at incredibly low costs.</p>

<h3>8. Sri Lanka</h3>
<p>From beaches to mountains, tea plantations to ancient temples, Sri Lanka packs diverse experiences into a very affordable destination.</p>

<h3>9. Turkey</h3>
<p>Straddling two continents, Turkey offers history, culture, and natural beauty. Istanbul, Cappadocia, and Pamukkale are must-see destinations for budget-conscious travelers.</p>

<h3>10. Colombia</h3>
<p>One of South America\'s most exciting destinations, Colombia offers warm people, beautiful landscapes, and excellent value for money.</p>

<h3>Tips for Budget Travel as a Student</h3>
<ul>
<li>Use hostels and homestays instead of hotels</li>
<li>Eat where locals eat - try street food and local restaurants</li>
<li>Use public transportation or walk</li>
<li>Book flights in advance and be flexible with dates</li>
<li>Get an ISIC card for student discounts</li>
<li>Travel during shoulder seasons</li>
<li>Use travel apps and compare prices</li>
</ul>

<p>Remember, the best travel experiences aren\'t always the most expensive ones. With smart planning and an adventurous spirit, you can explore the world as a student!</p>',
                'author' => 'TravelTag',
                'meta_title' => '10 Best Budget Travel Destinations for Students | TravelTag',
                'meta_description' => 'Discover the best and most affordable travel destinations for students. Explore 10 amazing places where you can travel on a budget.',
                'status' => true,
            ],
            [
                'title' => 'Student Travel Tips: Budget Planning & Itinerary Guide',
                'slug' => 'student-travel-tips-budget-' . \Str::random(5),
                'content' => '<h2>Master the Art of Budget Travel as a Student</h2>
<p>Traveling as a student requires smart planning and budgeting. Learn these essential tips to make the most of your travel experiences.</p>

<h3>Before You Leave: Planning Phase</h3>
<h4>1. Choose Your Destination Wisely</h4>
<p>Research currency rates, cost of living, and visa requirements. Websites like Numbeo can help you compare costs across countries.</p>

<h4>2. Set a Realistic Budget</h4>
<p>Calculate daily expenses including accommodation, food, transport, and activities. Add 10-20% buffer for emergencies.</p>

<h4>3. Plan Your Travel Dates</h4>
<p>Avoid peak tourist seasons when prices are highest. Traveling during shoulder season (between peak and low) offers good weather and reasonable prices.</p>

<h3>Saving Money on Accommodation</h3>
<ul>
<li><strong>Hostels:</strong> Great for meeting other travelers and saving money</li>
<li><strong>Homestays:</strong> Live with local families and experience authentic culture</li>
<li><strong>Couchsurfing:</strong> Free accommodation with local hosts</li>
<li><strong>House-sitting:</strong> Get free accommodation while looking after someone\'s home</li>
<li><strong>Work & Travel:</strong> Work in hostels to get free/cheap accommodation</li>
</ul>

<h3>Food on a Budget</h3>
<p>Food is often the biggest expense, but it doesn\'t have to be:</p>
<ul>
<li>Eat where locals eat</li>
<li>Visit street food stalls and markets</li>
<li>Cook some meals in hostels with shared kitchens</li>
<li>Buy groceries at local stores for picnic snacks</li>
<li>Skip tourist area restaurants</li>
</ul>

<h3>Getting Around Cheaply</h3>
<ul>
<li>Use buses instead of flights for nearby cities</li>
<li>Consider night buses to save on accommodation</li>
<li>Walk and use public transportation</li>
<li>Get tourist transport passes</li>
<li>Hitchhike or use ride-sharing apps</li>
</ul>

<h3>Sample 10-Day Budget Itinerary</h3>
<p><strong>Thailand (Estimated: $300-400)</strong></p>
<ul>
<li>Days 1-3: Bangkok - Street food, temples, markets</li>
<li>Days 4-6: Chiang Mai - Hiking, night market, elephant sanctuaries</li>
<li>Days 7-10: Beach island - Relaxation and water activities</li>
</ul>

<h3>Essential Money-Saving Apps</h3>
<ul>
<li>Skyscanner - Flight comparison</li>
<li>Rome2Rio - Transport options and prices</li>
<li>Maps.me - Offline maps</li>
<li>Yelp/Google Maps - Find cheap restaurants</li>
<li>Hostelworld - Book hostels</li>
<li>XE - Currency converter</li>
</ul>

<h3>Safety While Budget Traveling</h3>
<p>Don\'t compromise on safety to save money. Invest in travel insurance, stay aware of your surroundings, and trust your instincts.</p>

<p>With proper planning and these tips, you can travel extensively on a student budget and create memories that last a lifetime!</p>',
                'author' => 'TravelTag',
                'meta_title' => 'Student Travel Tips: Budget Planning Guide | TravelTag',
                'meta_description' => 'Learn expert tips for budget travel planning, money-saving strategies, and creating perfect itineraries as a student traveler.',
                'status' => true,
            ],
            [
                'title' => 'Adventure Activities Every Student Traveler Must Try',
                'slug' => 'adventure-activities-students-' . \Str::random(5),
                'content' => '<h2>Must-Do Adventure Activities for Young Travelers</h2>
<p>Looking for thrilling experiences during your travels? Here are the best adventure activities that every student should try at least once.</p>

<h3>1. Hiking & Trekking</h3>
<p>Hit the trails and challenge yourself! Popular treks include Machu Picchu in Peru, the Inca Trail, and trekking in Nepal. Hiking is affordable, accessible, and incredibly rewarding.</p>

<h3>2. Scuba Diving & Snorkeling</h3>
<p>Explore underwater worlds in destinations like the Great Barrier Reef, Bali, or the Caribbean. Get certified in PADI courses at affordable prices abroad.</p>

<h3>3. Rock Climbing</h3>
<p>Thailand and Vietnam offer world-class rock climbing experiences. Take lessons and climb stunning rock formations in beautiful landscapes.</p>

<h3>4. Paragliding & Skydiving</h3>
<p>Experience the ultimate adrenaline rush. Countries like Switzerland, New Zealand, and Australia are famous for these activities.</p>

<h3>5. White Water Rafting</h3>
<p>Go rafting in Nepal, Costa Rica, or Ecuador. It\'s thrilling, relatively affordable, and a great way to see nature.</p>

<h3>6. Bungee Jumping</h3>
<p>New Zealand\'s Kawarau Bridge is the birthplace of bungee jumping. Challenge yourself with this ultimate adrenaline activity.</p>

<h3>7. Kayaking & Paddleboarding</h3>
<p>Explore fjords, islands, and coastlines. Thailand\'s Phang Nga Bay and New Zealand\'s lakes are stunning for paddling.</p>

<h3>8. Cave Exploration</h3>
<p>Explore natural cave systems in Vietnam, Cambodia, or Mexico. It\'s adventurous and often surprisingly affordable.</p>

<h3>9. Surfing</h3>
<p>Learn to surf in destinations like Indonesia, Costa Rica, or Morocco. Perfect for young travelers and great communities everywhere.</p>

<h3>10. Zip-lining Through Jungles</h3>
<p>Companies across Central America and Asia offer thrilling zip-line experiences through rainforests.</p>

<h3>Budget Adventure Tips</h3>
<ul>
<li>Book group tours for better prices</li>
<li>Look for student discounts</li>
<li>Travel during off-season for cheaper rates</li>
<li>Combine activities to save on guides</li>
<li>Use local guides instead of big tour companies</li>
<li>Share gear rentals with friends</li>
</ul>

<h3>Safety First</h3>
<p>While pursuing adventures, always:</p>
<ul>
<li>Use reputable tour operators with safety records</li>
<li>Wear proper safety equipment</li>
<li>Get travel insurance that covers adventure activities</li>
<li>Follow local regulations and guides</li>
<li>Know your limits</li>
</ul>

<p>These adventures will not only give you incredible memories but also help you discover your own limits and capabilities. Now go out there and explore!</p>',
                'author' => 'TravelTag',
                'meta_title' => 'Adventure Activities for Students | TravelTag',
                'meta_description' => 'Discover the best adventure activities every student traveler should try. From hiking to skydiving - ultimate adventure guide.',
                'status' => true,
            ],
            [
                'title' => 'How to Travel Safely as a Student: A Complete Guide',
                'slug' => 'student-travel-safety-' . \Str::random(5),
                'content' => '<h2>Stay Safe While Exploring the World</h2>
<p>Safety is paramount when traveling, especially for students traveling alone or in groups. Here\'s a comprehensive guide to staying safe during your travels.</p>

<h3>Before You Leave</h3>
<h4>1. Research Your Destination</h4>
<p>Check government travel advisories, read recent traveler reviews, and join travel forums to get current information about safety in your chosen destination.</p>

<h4>2. Get Travel Insurance</h4>
<p>Invest in comprehensive travel insurance that covers medical emergencies, flight cancellations, and theft. It\'s not expensive and can be a lifesaver.</p>

<h4>3. Share Your Plans</h4>
<p>Tell your family or friends your itinerary, where you\'ll be staying, and your contact information. Check in regularly with them.</p>

<h4>4. Document Everything</h4>
<p>Make copies of your passport, travel insurance, airline tickets, and credit cards. Store digitally in cloud storage and keep physical copies.</p>

<h3>On the Road</h3>
<h4>Stay Aware</h4>
<ul>
<li>Keep your valuables hidden and secure</li>
<li>Avoid displaying expensive items like cameras, jewelry, or phones</li>
<li>Be aware of your surroundings, especially at night</li>
<li>Use ATMs in well-lit, populated areas</li>
<li>Don\'t accept drinks from strangers at bars or clubs</li>
</ul>

<h4>Money Safety</h4>
<ul>
<li>Carry money in multiple places (not all in one wallet)</li>
<li>Use ATMs during daytime</li>
<li>Notify your bank of travel dates</li>
<li>Avoid changing money on the streets</li>
<li>Keep emergency cash separate from daily spending</li>
</ul>

<h4>Health & Wellness</h4>
<ul>
<li>Get necessary vaccinations before traveling</li>
<li>Carry first aid supplies and medications</li>
<li>Drink only bottled water in unsafe areas</li>
<li>Eat freshly cooked food from clean places</li>
<li>Maintain good hygiene practices</li>
<li>Get sleep and don\'t overexert yourself</li>
</ul>

<h3>Using Public Transportation Safely</h3>
<ul>
<li>Use official taxis, ride-sharing apps, or pre-arranged transport</li>
<li>Avoid empty buses or trains, especially at night</li>
<li>Keep bags in sight and close to you</li>
<li>Sit near other people in seats</li>
<li>Trust your instincts about unsafe situations</li>
</ul>

<h3>Accommodation Safety</h3>
<ul>
<li>Book accommodations from reputable websites</li>
<li>Read recent reviews from other travelers</li>
<li>Know the neighborhood before booking</li>
<li>Check locks on doors and windows</li>
<li>Use hotel safe for valuable items</li>
<li>Keep your room number private</li>
<li>Use deadbolt locks at night</li>
</ul>

<h3>Solo Travel Safety</h3>
<p>If traveling alone:</p>
<ul>
<li>Stay in social hostels where you can meet people</li>
<li>Join group tours and activities</li>
<li>Let someone know your daily plans</li>
<li>Take self-defense classes before traveling</li>
<li>Trust your gut feelings</li>
<li>Exit situations that feel uncomfortable</li>
</ul>

<h3>Emergency Contacts</h3>
<p>Always keep:</p>
<ul>
<li>Your embassy\'s contact information</li>
<li>Emergency numbers for the country</li>
<li>Travel insurance company contact</li>
<li>Family and friend contact numbers</li>
<li>Backup phone charger or portable battery</li>
</ul>

<h3>What To Do If Something Goes Wrong</h3>
<ul>
<li>Contact your embassy if you lose your passport</li>
<li>Report theft to local police immediately</li>
<li>Contact travel insurance company for claims</li>
<li>Reach out to trusted friends or family</li>
<li>Stay calm and think clearly</li>
</ul>

<h3>App Recommendations for Safety</h3>
<ul>
<li><strong>Google Maps:</strong> Offline maps and navigation</li>
<li><strong>Uber/Grab:</strong> Safe transportation</li>
<li><strong>Emergency SOS:</strong> Built into most phones</li>
<li><strong>TravelSafety app:</strong> Global safety information</li>
<li><strong>Noonlight:</strong> Personal safety app</li>
</ul>

<p>Remember, being cautious doesn\'t mean being paranoid. Trust yourself, stay informed, and enjoy the incredible experiences that travel offers. The world is generally safer than news makes it seem, and millions of students travel safely every year!</p>',
                'author' => 'TravelTag',
                'meta_title' => 'Student Travel Safety Guide | TravelTag',
                'meta_description' => 'Complete guide to staying safe while traveling as a student. Safety tips for solo travel, accommodation, transportation, and emergencies.',
                'status' => true,
            ],
            [
                'title' => 'Cultural Etiquette: How to Be a Respectful Traveler',
                'slug' => 'cultural-etiquette-travel-' . \Str::random(5),
                'content' => '<h2>Travel Responsibly and Respectfully</h2>
<p>Being a respectful traveler means more than just having fun - it means positively impacting the communities you visit. Here\'s how to be a cultural ambassador.</p>

<h3>Learn Basic Local Phrases</h3>
<p>Learning even simple phrases like "hello," "thank you," and "please" in the local language goes a long way. Locals appreciate the effort and respect it shows.</p>

<h3>Dress Appropriately</h3>
<p>Research dress codes for your destination, especially when visiting temples, religious sites, or conservative areas. Respect local customs while dressing.</p>

<h3>Respect Religious Sites</h3>
<ul>
<li>Remove shoes when required</li>
<li>Cover up respectfully</li>
<li>Don\'t touch sacred objects</li>
<li>Ask permission before taking photos</li>
<li>Observe prayer times and rituals</li>
<li>Show reverence and quiet behavior</li>
</ul>

<h3>Photography Ethics</h3>
<ul>
<li>Always ask permission before photographing people</li>
<li>Respect "no photography" signs</li>
<li>Don\'t photograph sacred ceremonies without permission</li>
<li>Consider the dignity of the people in your photos</li>
<li>Share photos respectfully over social media</li>
</ul>

<h3>Food & Dining Respect</h3>
<ul>
<li>Try local cuisine with an open mind</li>
<li>Learn how to properly eat traditional foods</li>
<li>Don\'t criticize local food practices</li>
<li>Tip appropriately based on local customs</li>
<li>Be aware of dietary restrictions and accommodations</li>
<li>Thank your servers and cooks</li>
</ul>

<h3>Gender & Social Customs</h3>
<p>Understand local gender norms and customs:</p>
<ul>
<li>In some cultures, maintain distance between genders</li>
<li>Understand different greeting customs (handshakes vs bowing)</li>
<li>Be respectful of local relationship norms</li>
<li>Dress and act modestly in conservative areas</li>
</ul>

<h3>Environmental Responsibility</h3>
<ul>
<li>Minimize plastic use and waste</li>
<li>Don\'t touch coral or marine life while snorkeling</li>
<li>Respect wildlife and their habitats</li>
<li>Use eco-friendly accommodations</li>
<li>Support sustainable tourism practices</li>
<li>Leave no trace when hiking</li>
</ul>

<h3>Support Local Economy</h3>
<ul>
<li>Buy from local businesses and artisans</li>
<li>Stay in locally-owned accommodations</li>
<li>Hire local guides</li>
<li>Eat at local restaurants</li>
<li>Avoid exploitation of animals and people</li>
</ul>

<h3>Responsible Tourism Practices</h3>
<p><strong>Avoid:</strong></p>
<ul>
<li>Animal tourism that involves abuse or exploitation</li>
<li>Taking home artifacts or natural items</li>
<li>Overgeneralizing about entire cultures</li>
<li>Disrespectful behavior in public</li>
<li>Loud and obnoxious behavior</li>
</ul>

<h3>Engage Authentically</h3>
<ul>
<li>Have genuine conversations with locals</li>
<li>Learn about their lives, not just Instagram moments</li>
<li>Show genuine interest in their culture</li>
<li>Share about your culture too</li>
<li>Create memorable connections, not just memories</li>
</ul>

<h3>This Travel Industry Changes</h3>
<p>Tourism affects local communities. Be conscious of overtourism and spreading across different areas to distribute economic benefits.</p>

<p>Remember, you\'re a guest in someone else\'s home. By respecting local cultures and customs, you\'ll have more meaningful experiences and leave a positive impact on the places you visit.</p>',
                'author' => 'TravelTag',
                'meta_title' => 'Cultural Etiquette for Travelers | TravelTag',
                'meta_description' => 'Learn about cultural respect and ethics while traveling. Be a responsible traveler who respects local customs and communities.',
                'status' => true,
            ],
            [
                'title' => 'Ultimate Guide to Backpacking Across Europe on a Student Budget',
                'slug' => 'backpacking-europe-budget-' . \Str::random(5),
                'content' => '<h2>Explore Europe Without Breaking the Bank</h2>
<p>Europe is on every traveler\'s bucket list, and it\'s possible to do it on a student budget. Here\'s your ultimate guide to backpacking across Europe cheaply.</p>

<h3>When to Go</h3>
<p><strong>Best Time:</strong> April-May (Spring) and September-October (Fall)</p>
<p>These shoulder seasons offer great weather and cheaper prices than summer. Avoid July-August when prices are highest.</p>

<h3>Best Budget Routes</h3>
<h4>Route 1: Western Europe (3 weeks)</h4>
<ul>
<li>Paris, France - 4 Days</li>
<li>Amsterdam, Netherlands - 3 Days</li>
<li>Berlin, Germany - 4 Days</li>
<li>Prague, Czech Republic - 4 Days</li>
<li>Budapest, Hungary - 4 Days</li>
</ul>

<h4>Route 2: Southern Europe (3 weeks)</h4>
<ul>
<li>Barcelona, Spain - 4 Days</li>
<li>Valencia, Spain - 2 Days</li>
<li>Rome, Italy - 4 Days</li>
<li>Naples, Italy - 2 Days</li>
<li>Athens, Greece - 4 Days</li>
<li>Greek Islands - 3 Days</li>
</ul>

<h3>Transportation (Best Investment)</h3>
<h4>Eurail Pass</h4>
<p>For 3+ weeks, consider Eurail pass. Calculate based on your routes to see if it\'s cheaper than individual tickets.</p>

<h4>Budget Airlines</h4>
<ul>
<li>Ryanair</li>
<li>EasyJet</li>
<li>Wizz Air</li>
<li>Vueling</li>
</ul>
<p>Book 6-8 weeks in advance for best prices. Morning/late-night flights are cheapest.</p>

<h4>Buses</h4>
<p>FlixBus offers cheap long-distance travel across Europe. Often cheaper than trains, though slower.</p>

<h3>Budget by Country (Per Day)</h3>
<ul>
<li><strong>Poland, Hungary, Czech Republic:</strong> $20-30</li>
<li><strong>Balkans (Romania, Bulgaria, Croatia):</strong> $25-35</li>
<li><strong>Germany, Spain, Greece:</strong> $30-40</li>
<li><strong>France, Italy, Switzerland:</strong> $40-60</li>
<li><strong>Nordic Countries:</strong> $50-70</li>
</ul>

<h3>Must-See Free Attractions</h3>
<ul>
<li>Walking through city centers and neighborhoods</li>
<li>Church visits (often free or donation-based)</li>
<li>Parks and public spaces</li>
<li>Free museum days (research local programs)</li>
<li>Street performances and markets</li>
<li>Viewpoints and natural attractions</li>
</ul>

<h3>Accommodation Strategy</h3>
<ul>
<li><strong>Hostels:</strong> $15-30 per night (best for solo travelers)</li>
<li><strong>Airbnb (shared room):</strong> $20-35</li>
<li><strong>Couchsurfing:</strong> Free</li>
<li><strong>House-sitting:</strong> Free</li>
</ul>

<h3>Food Tips</h3>
<ul>
<li>Eat where locals eat</li>
<li>Buy groceries at supermarkets for some meals</li>
<li>Have breakfasts at cafes (cheaper than restaurants)</li>
<li>Look for "menu del dia" (daily special) in Spain</li>
<li>Street food is authentic and cheap</li>
<li>Skip tourist restaurants in main areas</li>
</ul>

<h3>Money-Saving Tips</h3>
<ul>
<li>Get an ISIC student card - valid discounts everywhere</li>
<li>Many cities have free walking tours (tip-based)</li>
<li>Use public transportation cards and passes</li>
<li>Visit tourist attractions in the morning before crowds</li>
<li>Set a daily budget and stick to it</li>
<li>Travel with others to share accommodation costs</li>
</ul>

<h3>Sample 3-Week Budget Breakdown</h3>
<ul>
<li><strong>Accommodation:</strong> $315 (21 nights × $15)</li>
<li><strong>Food:</strong> $260 (21 days × $12-13)</li>
<li><strong>Transportation:</strong> $200-300</li>
<li><strong>Activities:</strong> $150-200</li>
<li><strong>Total:</strong> $925-1100 (approximately $44-52 per day)</li>
</ul>

<h3>Essential Apps</h3>
<ul>
<li>Omio/Rome2Rio - Transportation comparison</li>
<li>Hostelworld - Hostel booking</li>
<li>Maps.me - Offline maps</li>
<li>XE - Currency converter</li>
<li>Trainline - Train tickets</li>
</ul>

<h3>Pro Tips</h3>
<ul>
<li>Book accommodation during shoulder season, not peak summer</li>
<li>Take advantage of free breakfast at hostels</li>
<li>Walk as much as possible - saves money and you see more</li>
<li>Join group tours to meet other travelers</li>
<li>Stay in towns outside major cities and use train to day-trip</li>
<li>Be flexible with your itinerary for spontaneous experiences</li>
</ul>

<p>Europe is incredibly rewarding for backpackers. With smart budgeting and flexibility, you can have an amazing experience exploring Europe\'s rich history, diverse cultures, and stunning landscapes!</p>',
                'author' => 'TravelTag',
                'meta_title' => 'Backpacking Europe on Student Budget | TravelTag',
                'meta_description' => 'Complete guide to backpacking Europe on a budget. Routes, money-saving tips, and budget breakdown for student travelers.',
                'status' => true,
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
