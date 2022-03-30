<?php

namespace Database\Seeders;

use App\Models\Catalog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mac = Catalog::create([
            "title" => "Mac",
            "published" => 1,
            "description" =>
                "Check out the all-new Mac Studio, MacBook Pro, MacBook Air, iMac, Mac mini, and more.",
        ]);

        $macbookAir = Catalog::create([
            "title" => "Macbook Air",
            "published" => 1,
            "description" =>
                "MacBook Air is completely transformed by the power of Apple-designed M1 chip. Up to 3.5x faster CPU, 5x faster graphics, and 18 hours of battery life.",
            "parent_id" => $mac->id,
        ]);

        $macbookPro = Catalog::create([
            "title" => "Macbook Pro",
            "published" => 1,
            "description" =>
                "MacBook Pro. Our most powerful notebooks. Fast M1 processors, incredible graphics, and spectacular Retina displays. Now available in a 14-inch mode",
            "parent_id" => $mac->id,
        ]);

        $Imac24 = Catalog::create([
            "title" => "Macbook 24",
            "published" => 1,
            "description" =>
                "The new iMac. 7 vibrant colors. Impossibly thin design. 24-inch 4.5K Retina display. The best camera, mics, and speakers in a Mac. Supercharged by M1.",
            "parent_id" => $mac->id,
        ]);

        $MacMini = Catalog::create([
            "title" => "Mac Mini",
            "published" => 1,
            "description" =>
                "Mac mini has the Apple M1 chip with 8-core CPU, 8-core GPU, Unified Memory, Neural Engine, full stack machine learning, Wi-Fi 6, and more.",
            "parent_id" => $mac->id,
        ]);

        $MacPro = Catalog::create([
            "title" => "Mac Pro",
            "published" => 1,
            "description" =>
                "The all-new Mac Pro. Redesigned for extreme performance, expansion, and configurability, it’s a system for pros to push the limits of what is possible.",
            "parent_id" => $mac->id,
        ]);

        $iPad = Catalog::create([
            "title" => "iPad",
            "published" => 1,
            "description" =>
                "Explore the world of iPad. Featuring an all-new iPad and iPad mini, and the powerful iPad Pro and iPad Air.",
        ]);

        $iPadPro = Catalog::create([
            "title" => "iPad Pro",
            "published" => 1,
            "description" =>
                "The new iPad Pro has the M1 chip, 12.9-inch Liquid Retina XDR display, 11-inch Liquid Retina display, 5G support, and new camera with Center Stage.",
            "parent_id" => $iPad->id,
        ]);

        $iPadAir = Catalog::create([
            "title" => "iPad Air",
            "published" => 1,
            "description" =>
                "The new iPad Air has an all-screen design, 10.9″ display, M1 chip, Center Stage, works with Apple Pencil and Magic Keyboard, and comes in five colors.",
            "parent_id" => $iPad->id,
        ]);

        $iPadMini = Catalog::create([
            "title" => "iPad Mini ",
            "published" => 1,
            "description" =>
                "iPad mini has an all-new 8.3-inch Liquid Retina display, the A15 Bionic chip, 5G, USB-C, support for Apple Pencil (2nd gen), and comes in four colors.",
            "parent_id" => $iPad->id,
        ]);

        $ApplePencil = Catalog::create([
            "title" => "ApplePencil  ",
            "published" => 1,
            "description" =>
                "Apple Pencil is the standard for drawing, note-taking, and marking up documents. Intuitive, precise, and magical.",
            "parent_id" => $iPad->id,
        ]);

        $Keyboards = Catalog::create([
            "title" => "Keyboards  ",
            "published" => 1,
            "description" =>
                "iPad keyboards provide a great typing experience, full-size keyboard, and durable protection for your iPad.",
            "parent_id" => $iPad->id,
        ]);

        $iPhone = Catalog::create([
            "title" => "iPhone",
            "published" => 1,
            "description" =>
                "Explore iPhone, the world’s most powerful personal device. Check out iPhone 13 Pro, iPhone 13 Pro Max, iPhone 13, iPhone 13 mini, and iPhone SE.",
        ]);

        $iPhone13Pro = Catalog::create([
            "title" => "iPhone13 Pro  ",
            "published" => 1,
            "description" =>
                "IPhone 13 Pro and 13 Pro Max. Huge camera upgrades. New OLED display with ProMotion. Fastest smartphone chip ever. Breakthrough battery life.",
            "parent_id" => $iPhone->id,
        ]);

        $iPhone13 = Catalog::create([
            "title" => "iPhone 13  ",
            "published" => 1,
            "description" =>
                "IPhone 13 and 13 mini. Our most advanced dual-camera system. A chip that’s faster than the competition. Up to 2.5 hours more battery life.",
            "parent_id" => $iPhone->id,
        ]);

        $iPhone12 = Catalog::create([
            "title" => "iPhone 12  ",
            "published" => 1,
            "description" =>
                "IPhone 12 and iPhone 12 mini. With A14 Bionic, great battery life, Night mode on every camera, 5G speed, Ceramic Shield, and Super Retina XDR display.",
            "parent_id" => $iPhone->id,
        ]);

        $iPhone11 = Catalog::create([
            "title" => "iPhone 11  ",
            "published" => 1,
            "description" =>
                'Get $100 - $650 off a new Phone 11 when you trade in an iPhone 8 or newer. Personal setup available. Buy now with free delivery.',
            "parent_id" => $iPhone->id,
        ]);

        $iPhoneSE = Catalog::create([
            "title" => "iPhone SE  ",
            "published" => 1,
            "description" =>
                'A superpowerful chip. A superstar camera. A leap in battery life. A fast 5G connection. A pocket-size 4.7” design. All for $429.',
            "parent_id" => $iPhone->id,
        ]);

        $Watch = Catalog::create([
            "title" => "Watch",
            "published" => 1,
            "description" =>
                "Apple Watch is the ultimate device for a healthy life. Available in three models: Apple Watch Series 7, Apple Watch SE, and Apple Watch Series 3.",
        ]);

        $IAppleWatchseries7 = Catalog::create([
            "title" => "Apple Watch series 7  ",
            "published" => 1,
            "description" =>
                "Apple Watch Series 7 features the largest, most advanced display yet, breakthrough health innovations, and is the most durable Apple Watch ever.",
            "parent_id" => $Watch->id,
        ]);

        $AppleWatchSE = Catalog::create([
            "title" => "Apple Watch SE  ",
            "published" => 1,
            "description" =>
                'Stay connected, active, healthy, and safe. Track your fitness. And go without your phone with available cellular. Apple Watch SE, starting at $279.',
            "parent_id" => $Watch->id,
        ]);

        $AppleWatchSeries3 = Catalog::create([
            "title" => "Apple Watch Series 3  ",
            "published" => 1,
            "description" =>
                "Apple Watch Series 3 has the core fitness, heart-monitoring, and connectivity features that make Apple Watch the ultimate device for a healthy life.",
            "parent_id" => $Watch->id,
        ]);

        $AppleWatchseriesNike = Catalog::create([
            "title" => "Apple Watch Series Nike ",
            "published" => 1,
            "description" =>
                "Apple Watch Nike is available with exclusive bands and watch faces, a new Always-On Retina display, and the Nike Run Club app to take you further.",
            "parent_id" => $Watch->id,
        ]);

        $AAppleWatchHermes = Catalog::create([
            "title" => "Apple Watch Hermes ",
            "published" => 1,
            "description" =>
                "Apple Watch Hermès is the ultimate union of heritage and innovation, combining Apple Watch Series 7 with exclusive watch faces and a range of bands.",
            "parent_id" => $Watch->id,
        ]);

        $Bands = Catalog::create([
            "title" => "Bands ",
            "published" => 1,
            "description" =>
                "Shop the latest Apple Watch bands and change up your look. Choose from a variety of colors and materials. Buy now with fast, free shipping.",
            "parent_id" => $Watch->id,
        ]);

        $AirPods = Catalog::create([
            "title" => "AirPods",
            "published" => 1,
            "description" =>
                "AirPods models deliver an unparalleled wireless experience, from magical setup to high-quality sound. Available with free engraving.",
        ]);

        $AirPods2ndgeneration = Catalog::create([
            "title" => "AirPods 2nd generation ",
            "published" => 1,
            "description" =>
                "AirPods feature high-quality sound, voice-activated Siri, an available wireless charging case, and free personalized engraving.",
            "parent_id" => $AirPods->id,
        ]);

        $AirPods3rdgeneration = Catalog::create([
            "title" => "AirPods 3rd generation ",
            "published" => 1,
            "description" =>
                "AirPods (3rd generation). Spatial audio, Adaptive EQ, longer battery life, and sweat and water resistance — in an all-new design.",
            "parent_id" => $AirPods->id,
        ]);

        $AirPodsPro = Catalog::create([
            "title" => "AirPods Pro ",
            "published" => 1,
            "description" =>
                "AirPods Pro deliver Active Noise Cancellation, Transparency mode, and spatial audio — in a customizable fit. Available with free engraving.",
            "parent_id" => $AirPods->id,
        ]);

        $AAirPodsMax = Catalog::create([
            "title" => "AirPods Max ",
            "published" => 1,
            "description" =>
                "AirPods Max combine high-fidelity audio with industry-leading Active Noise Cancellation, Adaptive EQ,  spatial audio, and free engraving.",
            "parent_id" => $AirPods->id,
        ]);

        $TVHome = Catalog::create([
            "title" => "TV & Home ",
            "published" => 1,
            "description" =>
                "Simply connect Apple TV, HomePod mini, and other accessories to experience a smart home that runs flawlessly across your devices.",
        ]);

        $AppleTV4K = Catalog::create([
            "title" => "Apple TV 4K ",
            "published" => 1,
            "description" =>
                "Watch Apple TV+, movies, and shows in 4K High Frame Rate HDR. Stream live sports and news. Play Apple Arcade, work out with Apple Fitness+, and more.",
            "parent_id" => $TVHome->id,
        ]);

        $AppleTVHD = Catalog::create([
            "title" => "Apple TV HD ",
            "published" => 1,
            "description" =>
                "Apple TV HD brings you popular shows, movies, games, and more. And you can control them all with the Siri Remote. Buy now with fast, free shipping.",
            "parent_id" => $TVHome->id,
        ]);

        $AppleTVApp = Catalog::create([
            "title" => "Apple TV App ",
            "published" => 1,
            "description" =>
                "The Apple TV app features Apple TV+, all your favorite streaming services, top cable TV providers, premium channels, and new Release movies.",
            "parent_id" => $TVHome->id,
        ]);

        $AppleTV = Catalog::create([
            "title" => "Apple TV + ",
            "published" => 1,
            "description" =>
                "Apple TV+ features critically acclaimed Apple Original shows and movies. Watch on the Apple TV app across devices.",
            "parent_id" => $TVHome->id,
        ]);

        $HomePodMini = Catalog::create([
            "title" => "Home Pod Mini",
            "published" => 1,
            "description" =>
                "HomePod mini. A smart speaker with room-filling sound. An intelligent assistant that helps you control your smart home. 100% private and secure.",
            "parent_id" => $TVHome->id,
        ]);
    }
}
