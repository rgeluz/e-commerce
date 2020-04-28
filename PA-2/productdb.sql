-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 06:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `productdb`
--

CREATE TABLE `productdb` (
  `ProductName` varchar(200) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `ProductID` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Platform` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Description` text NOT NULL,
  `ImageLinks` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdb`
--

INSERT INTO `productdb` (`ProductName`, `Quantity`, `ProductID`, `Category`, `Platform`, `Price`, `Description`, `ImageLinks`) VALUES
('Arozzi - Verona Pro V2 Gaming Chair - Green', 100, '11VX1635', 'Gaming Chair', '', 249.99, 'Experience exceptional comfort by sitting on this Arozzi Verona Pro V2 green gaming chair.The neck and lower-back cushions provide extra support, while the dual-wheel casters ensure rolling around your setup is smooth and simple. This Arozzi Verona Pro V2 green gaming chair features adjustable height and tilt for optimal sitting.', '../img/products/arozzi/arozzi1.jpg,../img/products/arozzi/arozzi1.jpg,../img/products/arozzi/arozzi2.jpg,../img/products/arozzi/arozzi3.jpg,../img/products/arozzi/arozzi4.jpg'),
('Vintage Metroid cotton t-shirt', 100, '56SH682', 'RPG', '', 18.63, 'Vintage Metroid cotton t-shirt. The design is based on the action-adventure game Metroid, developed and published by Nintendo.', '../img/products/metroid/metroid.png,../img/products/metroid/metroid.png,../img/products/metroid/metroid2.png'),
('Legend of Zelda: Breadth of the Wild', 100, '66LJL89', 'RPG', 'Nintendo Switch', 59.99, 'Travel back to Hyrule with Link in Zelda: Breath of the Wild for the Nintendo Switch.\r\nExplore a variety of shrines, sail across rough waters and scavenge for food to defeat Ganondorf and save Zelda once and for all. Zelda: Breath of the Wild includes Wolf, who joins Link in his adventure and\r\ndelivers enhanced gameplay for greater enjoyment.', '../img/products/zelda/zelda.jpg,../img/products/zelda/zelda1.jpg,../img/products/zelda/zeldagameplay.jpg,../img/products/zelda/zeldagameplay2.jpg,../img/products/zelda/zeldagameplay3.png'),
('CORSAIR - Gaming K70 RGB MK.2 SE Mechanical Wired CHERRY MX Speed Switch Keyboard with RGB Back Lighting - Silver Anodized Brushed Aluminum', 100, '79GX1255', 'Mechanical Keyboard', 'PC Gaming', 139.99, 'Stand out from the competition with this CORSAIR mechanical gaming keyboard. Its 8MB of onboard memory stores frequently used macros and RGB lighting settings, and its USB pass-through port lets you connect a mouse or headset. This CORSAIR mechanical gaming keyboard has a detachable wrist rest for keeping you comfortable during marathon sessions', '../img/products/corsair/cosair1.jpg,../img/products/corsair/cosair1.jpg,../img/products/corsair/cosair2.jpg,../img/products/corsair/cosair3.jpg,../img/products/corsair/cosair4.jpg'),
('Astro Gaming - ASTRO A50 + Base Station RF Wireless Over-the-Ear Headphones - Gray', 100, '86XX1225', 'Gaming Headphones', 'PC Gaming', 299.99, 'Strategize with your team using this Logitech Astro wireless headset and base for Xbox One, PC and Mac. Advanced drivers with Dolby Headphone 7.1 surround sound deliver immersive 3D audio, and the rechargeable Li-ion battery lasts for up to 15 hours for all-day use. This Logitech Astro wireless headset and base has a precision voice-isolating microphone for clear communication in noisy areas.', '../img/products/astro/astro1.jpg,../img/products/astro/astro1.jpg,../img/products/astro/astro2.jpg,../img/products/astro/astro3.jpg,../img/products/astro/astro4.jpg'),
('Street Fighter Group Shot Men\'s T-Shirt', 100, '89GR1235', 'Vintage Games', '', 21.99, 'Now you can rock a piece of gaming history with this slick Street Fighter II men’s tee shirt. Featuring the whole gang ready to rumble, this comfy cotton black t-shirt will have you googling the nearest arcade.', '../img/products/streetfighter/streetfighter2.png,../img/products/streetfighter/streetfighter2.png'),
('Microsoft - Wireless Controller for Xbox One and Windows 10 - Black', 100, '89GX1235', 'Gaming Controller', '', 59.99, 'Experience the incredible intensity, precision and comfort of the Xbox Wireless Controller. Impulse triggers deliver fingertip vibration feedback, so you can feel every jolt and crash in high definition. Responsive thumbsticks and an enhanced D-pad provide greater accuracy.', '../img/products/xboxcontroller/xboxcontroller1.jpg,../img/products/xboxcontroller/xboxcontroller1.jpg,../img/products/xboxcontroller/xboxcontroller2.jpg,../img/products/xboxcontroller/xboxcontroller3.jpg,../img/products/xboxcontroller/xboxcontroller4.jpg'),
('Minecraft Creeper T-Shirt', 100, '89GX1MN5', 'Video Games', '', 10, 'Creepers are one of the most unique and iconic hostile mobs found in Minecraft.\r\nA Creeper can easily be recognized by its tall vertical structure (roughly the size of a player), green, pixelated skin, and four legs. It is possibly the most dangerous enemy in the game.', '../img/products/minecraft/creeper1.jpg,../img/products/minecraft/creeper1.jpg,../img/products/minecraft/creeper2.jpg,../img/products/minecraft/creeper3.jpg,../img/products/minecraft/creeper4.jpg'),
('Street Fighter Character Select Men\'s T-Shirt', 100, '89SF6235', 'Vintage Games', '', 21.99, 'Now you can relive the happy times with this retro Street Fighter Character Select men’s cotton tee, featuring the classic character select from the original Street Fighter!', '../img/products/streetfighter/streetfighter1.png,../img/products/streetfighter/streetfighter1.png'),
('DualShock 4 Wireless Controller for Sony PlayStation 4 - Magma (red)', 100, '92GX1235', 'Gaming Controller', 'PlayStation 4', 64.99, 'Take gaming to the next level with this DualShock wireless controller for the PlayStation 4. Its analog sticks and trigger buttons provide pinpoint accuracy and comfort, and its share button lets you post achievements and live-stream game play without pausing the action. This DualShock wireless controller charges through your game console or its microUSB port.', '../img/products/ps4controller/ps4controller1.jpg,../img/products/ps4controller/ps4controller1.jpg,../img/products/ps4controller/ps4controller2.jpg,../img/products/ps4controller/ps4controller3.jpg,../img/products/ps4controller/ps4controller4.jpg'),
('Animal Crossing: New Horizons', 100, 'AC8X1245', 'Education Simulation', 'Nintendo Switch', 59.99, 'Description: Escape to a deserted island and create your own paradise as you explore, create, and customize in the Animal Crossing: New Horizons game. Your island getaway has a wealth of natural resources that can be used to craft everything from tools to creature comforts.', '../img/products/animalcrossing/animalcrossing.jpg,../img/products/animalcrossing/acnh01.jpg,../img/products/animalcrossing/acnh02.jpg,../img/products/animalcrossing/acnh03.jpg,../img/products/animalcrossing/acnh04.jpg'),
('Call of Duty: Modern Warfare', 100, 'CD12N35', 'FPS', 'PC', 59.99, 'The stakes have never been higher as players take on the role of lethal Tier One operators in a heart-racing saga that will affect the global balance of power. Developed by the studio that started it all, Infinity Ward delivers an epic reimagining of the iconic Modern Warfare® series from the ground up.', '../img/products/CODMW/CODMW.jpg,../img/products/CODMW/mw3pc01.jpg,../img/products/CODMW/mw3pc02.jpg,../img/products/CODMW/mw3pc03.jpg,../img/products/CODMW/mw3pc04.jpg'),
('GTA V GRAND THEFT AUTO FIVE LOGO GRAPHIC T SHIRT', 100, 'F5GAD51', 'Video Games', '', 10, 'GTA V Grand Theft Auto Five Logo T Shirt Custom Printed on the Front Chest.', '../img/products/gtav/gtav1.jpg,../img/products/gtav/gtav1.jpg,../img/products/gtav/gtav2.jpg,../img/products/gtav/gtav3.jpg,../img/products/gtav/gtav4.jpg'),
('Final Fantasy VII Remake', 100, 'FFRE4212', 'RPG', 'PS4', 59.99, 'A spectacular reimagining of one of the most visionary games ever, FINAL FANTASY VII REMAKE rebuilds and expands the legendary RPG for today', '../img/products/ff7remake/FFVIIRemake.png,../img/products/ff7remake/ff7re01.jpg,../img/products/ff7remake/ff7re02.jpg,../img/products/ff7remake/ff7re03.jpg,../img/products/ff7remake/ff7re04.jpg'),
('The Last of Us 2', 100, 'PS4J1735', 'Action', 'PS4', 59.99, 'Five years after their dangerous journey across the post-pandemic United States, Ellie and Joel have settled down in Jackson, Wyoming. Living amongst a thriving community of survivors has allowed them peace and stability, despite the constant threat of the infected and other, more desperate survivors.', '../img/products/TLOU2/TLOU2.png,../img/products/TLOU2/TLOU201.jpg,../img/products/TLOU2/TLOU202.jpg,../img/products/TLOU2/TLOU203.jpg,../img/products/TLOU2/TLOU204.jpg'),
('Mario Kart 8 Deluxe', 100, 'SWG1235', 'Racing Game', 'Nintendo Switch', 59.99, 'Battle new enemies on a host of fun tracks with Mario Kart 8 Deluxe for the Nintendo Switch. Three new vehicles and a smart steering feature make this game perfect for both beginners or seasoned pros. In Mario Kart 8 Deluxe you can hold up to two items at a time to attack your enemies.', '../img/products/mariokart8/mariokart8.jpg,../img/products/mariokart8/mariokartgameplay.jpg,../img/products/mariokart8/mariokartgameplay1.jpg,../img/products/mariokart8/mariokartgameplay2.jpg,../img/products/mariokart8/mariokartgameplay3.jpg'),
('Halo Infinite', 100, 'V9CX7265', 'FPS', 'Xbox One', 59.99, 'The Master Chief returns in Halo Infinite – the next chapter of the legendary franchise beginning holiday 2020! Developed by 343 Industries for the entire Xbox family of devices, including Project Scarlett and Windows PCs, Halo Infinite continues the Halo 5: Guardians storyline and takes the franchise in ambitious and unexpected directions, powered by the all-new Slipspace Engine.', '../img/products/HaloInfinite/Halo.jpg,../img/products/HaloInfinite/halo01.jpg,../img/products/HaloInfinite/halo02.jpg,../img/products/HaloInfinite/halo03.jpg,../img/products/HaloInfinite/halo04.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productdb`
--
ALTER TABLE `productdb`
  ADD PRIMARY KEY (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
