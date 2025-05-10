-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2025 at 04:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `image`) VALUES
(4, 'Airpodspro', 50.00, 'Audio Technology: Active Noise Cancellation, Adaptive Transparency, and Personalized Spatial Audio with dynamic head tracking.\r\nSensors: Dual beamforming microphones, inward-facing microphone, skin-detect sensor, motion-detecting accelerometer, and speech-detecting accelerometer.\r\nControls: Touch control for volume adjustment, press-and-hold to switch listening modes, and voice activation with \"Hey Siri.\"\r\nBattery Life: Up to 6 hours of listening time on a single charge, and up to 30 hours with the MagSafe Charging Case.\r\nWater & Dust Resistance: Rated IP54, meaning it\'s resistant to dust, sweat, and water.\r\nConnectivity: Bluetooth 5.3 wireless technology', 'uploads/airpodspro.jpg'),
(6, 'Galaxy', 400.00, '\r\nDisplay: 6.7-inch Super AMOLED, FHD+ resolution, 90Hz refresh rate.\r\nProcessor: Qualcomm Snapdragon 720G (8nm), Octa-core.\r\nRAM & Storage: \r\n   6GB or 8GB RAM.\r\n  128GB or 256GB internal storage (expandable via microSD).\r\nCameras:\r\n  Front: 32MP.\r\n  Rear Quad Camera Setup:\r\n     64MP (main, OIS).\r\n     8MP (telephoto, 3x optical zoom).\r\n     12MP (ultrawide).\r\n     5MP (macro).\r\nBattery: 5000mAh with 25W fast charging.\r\nOperating System: Android 11 (upgradable), One UI 4.1.\r\nWater & Dust Resistance:IP67 rating.\r\nColors Available: Black, White, Blue, Violet.\r\n', 'uploads/galaxy.jpg'),
(7, 'Camera', 500.00, 'Sensor Size: Determines image quality and low-light performance. Common types include:\r\nFull-Frame (36mm x 24mm): High-quality images, great for professionals.\r\nAPS-C (~24mm x 16mm):Balanced quality and affordability.\r\nMicro Four Thirds (17.3mm x 13mm): Compact and good for travel.\r\nMegapixels (MP): Defines resolution. More MP means more detail, but sensor size matters too.\r\nISO Range: Controls light sensitivity. Higher ISO allows better low-light shots but may introduce noise.\r\nShutter Speed: Determines motion capture. Faster speeds freeze action, while slower speeds create motion blur.\r\nAperture (f-stop): Controls light entry and depth of field. Lower f-numbers allow more light and blur backgrounds.\r\nAutofocus System: Ensures sharp images. Phase detection is fast, while contrast detection is precise.\r\nImage Stabilization: Reduces blur from camera shake. Optical stabilization is more effective than digital.\r\nVideo Resolution: Defines video quality. Options include Full HD (1080p), 4K, and even 8K.\r\nConnectivity: Enables file transfer via Wi-Fi, Bluetooth, or USB.', 'uploads/camera.jpg'),
(9, 'Headphone', 20.00, 'Driver Size: Determines sound quality and bass response. Larger drivers generally produce better sound.\r\nFrequency Response: The range of sound the headphones can reproduce, typically 20Hz – 20kHz.\r\nImpedance: Measured in ohms (Ω), affects power requirements. Lower impedance (16-32Ω) works well with phones, while higher impedance (50Ω+) requires an amplifier.\r\nSensitivity: Measured in decibels (dB), indicates how loud the headphones can get.\r\nNoise Cancellation: Active noise cancellation (ANC) reduces external noise, while passive isolation depends on earcup design.\r\nBluetooth Version: Determines wireless connectivity quality and range.\r\nBattery Life: Important for wireless headphones, varies from 10 to 40 hours depending on usage.\r\nMicrophone Quality: Essential for calls and gaming, varies by model.\r\nBuild Material: Impacts durability and comfort, with options like plastic, metal, and memory foam ear cushions.', 'uploads/Headphone.jpg'),
(10, 'Iphone', 1500.00, 'Display: Super Retina XDR OLED, 6.1-inch (iPhone 15) / 6.7-inch (iPhone 15 Plus).\r\nProcessor: Apple A16 Bionic chip.\r\nRAM & Storage: 128GB, 256GB, 512GB (no microSD support).\r\n Cameras:\r\n   Main: 48MP (f/1.6) with sensor-shift stabilization.\r\n   Ultra-wide: 12MP (f/2.4).\r\n   Front: 12MP TrueDepth camera.\r\nBattery Life: Up to 20 hours of video playback.\r\nOperating System: iOS 17.\r\nWater & Dust Resistance: IP68 (up to 6 meters for 30 minutes).\r\nConnectivity: USB-C, 5G, Wi-Fi 6.', 'uploads/iphone.jpg'),
(13, 'Microphone', 100.00, 'Frequency Response: Determines the range of sound the microphone can capture, typically **20Hz – 20kHz**.\r\nSensitivity: Measures how effectively the microphone converts sound into electrical signals. Higher sensitivity means better sound pickup.\r\nPolar Pattern: Defines how the microphone captures sound. Common types include:\r\nCardioid: Focuses on sound from the front, reducing background noise.\r\nOmnidirectional: Captures sound from all directions.\r\nBidirectional: Picks up sound from the front and back, useful for interviews.\r\nImpedance: Measured in ohms (Ω), affects signal quality. Lower impedance (<600Ω) is ideal for professional use.\r\nDistortion Level: Indicates how much the microphone alters the original sound. Lower distortion ensures clearer audio.\r\nConnectivity: Options include XLR, USB, and wireless connections.', 'uploads/microphone.jpg'),
(14, 'Selfiestick', 90.00, 'Connectivity: Wired (via 3.5mm jack) or wireless (Bluetooth).\r\nAdjustable Length: Typically extends from 19.5 cm to 100 cm.\r\nRotation: 360-degree rotation for flexible angles.\r\nCompatibility: Works with Android & iOS devices.\r\nTripod Feature: Some models include a tripod stand for stability.\r\nRemote Control: Bluetooth-enabled models often come with a wireless shutter button.\r\nMaterial: Lightweight aluminum or durable plastic for portability.\r\nBattery Life: Bluetooth models have rechargeable batteries lasting several hours.', 'uploads/selfiestick.jpg'),
(15, 'Smartwatch', 100.00, 'Display: AMOLED or LCD, with touch functionality.\r\nBattery Life: Varies from 1 to 14 days , depending on usage and features.\r\nOperating System: WatchOS (Apple), Wear OS (Google), or proprietary systems.\r\nHealth Tracking: Includes heart rate monitoring, sleep tracking, and SpO2 measurement.\r\nWater Resistance: Some models offer IP67 or IP68 ratings for water and dust protection.\r\nConnectivity: Supports Bluetooth, Wi-Fi, GPS, and NFC for payments.\r\nNotifications & Calls: Allows message alerts and call handling.\r\nFitness Features: Step counting, workout tracking, and sports modes.', 'uploads/smartwatch.jpg'),
(16, 'Wiredheadphone', 10.00, 'Driver Size: Determines sound quality and bass response. Larger drivers generally produce better sound.\r\nFrequency Response: The range of sound the headphones can reproduce, typically 20Hz – 20kHz.\r\nImpedance: Measured in ohms (Ω), affects power requirements. Lower impedance (16-32Ω) works well with phones, while higher impedance (50Ω+) requires an amplifier.\r\nSensitivity: Measured in decibels (dB), indicates how loud the headphones can get.\r\nNoise Isolation: Passive noise isolation depends on earcup design and materials.\r\nCable Type: Options include straight, coiled, or detachable cables.\r\nConnector: Usually 3.5mm, 6.3mm, or USB.\r\nBuild Material: Impacts durability and comfort, with options like plastic, metal, and memory foam ear cushions.', 'uploads/wiredheadphone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(4, 'Hiba', 'hiba11@store.com', '0123456', 'admin'),
(5, 'Zalika', 'zalika@gmail.com', '123456789', 'user'),
(6, 'Ahmad', 'ahmad@gmail.com', '000000', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
