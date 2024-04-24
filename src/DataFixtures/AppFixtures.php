<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Faker\Generator;
use App\Entity\Client;
use DateTimeImmutable;
use App\Entity\Product;
use App\Entity\Application;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $faker = Factory::create();

        $this->createProducts($faker, $manager);

        $this->createClients($faker, $manager);

        $manager->flush();
    }

    private function createProducts(Generator $faker, ObjectManager $manager): void {
        for ($i = 0; $i < 1500; $i++) {
            $product = (new Product())
                ->setBrand($faker->randomElement(['Samsung', 'Apple', 'Huawei', 'Xiaomi', 'Oppo', 'Vivo', 'Realme', 'OnePlus', 'Sony', 'Google', 'Asus', 'LG', 'Motorola', 'Nokia', 'HTC', 'Lenovo', 'ZTE', 'Meizu', 'Alcatel', 'BlackBerry', 'TCL', 'Coolpad', 'Infinix', 'Tecno', 'Umidigi', 'Wiko', 'Yezz', 'Zopo', 'Zuk', 'Zuum', 'Zync', 'Zyrex', 'ZTE', 'Zonda', 'Zopo']))
                ->setProcessor($faker->randomElement(['Snapdragon', 'Exynos', 'Kirin', 'Helio', 'MediaTek', 'Apple']))
                ->setMemory($faker->randomElement([1024, 2048, 3072, 4096, 6144, 8192, 12288, 16384]))
                ->setRom($faker->randomElement([8, 16, 32, 64, 128, 256, 512]))
                ->setBattery($faker->randomElement([1000, 2000, 3000, 4000, 5000]))
                ->setPrice($faker->numberBetween(10000, 200000))
                ->setCreatedAt(new DateTimeImmutable())
                ->setReleasedAt(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-2 years', '-1 day')));

            //set OS according to the brand
            if ($product->getBrand() === 'Apple') {
                $product->setOs('iOS');
            } else {
                $product->setOs($faker->randomElement(['Android', 'Windows Phone']));
            }

            //set model according to the brand
            if ($product->getBrand() === 'Samsung') {
                $product->setModel($faker->randomElement(['Galaxy S21', 'Galaxy S20', 'Galaxy S10', 'Galaxy S9', 'Galaxy S8', 'Galaxy S7', 'Galaxy S6', 'Galaxy S5', 'Galaxy S4', 'Galaxy S3', 'Galaxy S2', 'Galaxy S', 'Galaxy Note 20', 'Galaxy Note 10', 'Galaxy Note 9', 'Galaxy Note 8', 'Galaxy Note 7', 'Galaxy Note 5', 'Galaxy Note 4', 'Galaxy Note 3', 'Galaxy Note 2', 'Galaxy Note', 'Galaxy A71', 'Galaxy A51', 'Galaxy A41', 'Galaxy A31', 'Galaxy A21', 'Galaxy A11', 'Galaxy A01', 'Galaxy M31', 'Galaxy M21', 'Galaxy M11', 'Galaxy M01', 'Galaxy J7', 'Galaxy J5', 'Galaxy J3', 'Galaxy J2', 'Galaxy J1', 'Galaxy J', 'Galaxy Z Fold 2', 'Galaxy Z Flip', 'Galaxy Z', 'Galaxy Xcover Pro', 'Galaxy Xcover 4s', 'Galaxy Xcover 4', 'Galaxy Xcover 3', 'Galaxy Xcover 2', 'Galaxy Xcover', 'Galaxy Tab S7', 'Galaxy Tab S6', 'Galaxy Tab S5', 'Galaxy Tab S4', 'Galaxy Tab S3', 'Galaxy Tab S2', 'Galaxy Tab S', 'Galaxy Tab A7', 'Galaxy Tab A', 'Galaxy Tab Active 3', 'Galaxy Tab Active 2', 'Galaxy Tab Active', 'Galaxy Tab', 'Galaxy Watch 3', 'Galaxy Watch Active 2', 'Galaxy Watch Active', 'Galaxy Watch', 'Galaxy Buds Live', 'Galaxy Buds Plus', 'Galaxy Buds', 'Galaxy Fit 2', 'Galaxy Fit', 'Galaxy Gear S3', 'Galaxy Gear S2', 'Galaxy Gear S', 'Galaxy Gear']));
            } elseif ($product->getBrand() === 'Apple') {
                $product->setModel($faker->randomElement(['iPhone 12 Pro Max', 'iPhone 12 Pro', 'iPhone 12', 'iPhone 12 Mini', 'iPhone 11 Pro Max', 'iPhone 11 Pro', 'iPhone 11', 'iPhone SE', 'iPhone XS Max', 'iPhone XS', 'iPhone XR', 'iPhone X', 'iPhone 8 Plus', 'iPhone 8', 'iPhone 7 Plus', 'iPhone 7', 'iPhone 6S Plus', 'iPhone 6S', 'iPhone 6 Plus', 'iPhone 6', 'iPhone 5S', 'iPhone 5C', 'iPhone 5', 'iPhone 4S', 'iPhone 4', 'iPhone 3GS', 'iPhone 3G', 'iPhone']));
            } elseif ($product->getBrand() === 'Huawei') {
                $product->setModel($faker->randomElement(['P40 Pro', 'P40', 'P40 Lite', 'P30 Pro', 'P30', 'P30 Lite', 'P20 Pro', 'P20', 'P20 Lite', 'P10 Plus', 'P10', 'P10 Lite', 'Mate 40 Pro', 'Mate 40', 'Mate 40 Lite', 'Mate 30 Pro', 'Mate 30', 'Mate 30 Lite', 'Mate 20 Pro', 'Mate 20', 'Mate 20 Lite', 'Mate 10 Pro', 'Mate 10', 'Mate 10 Lite', 'Nova 7 Pro', 'Nova 7', 'Nova 7 Lite', 'Nova 6', 'Nova 5 Pro', 'Nova 5', 'Nova 5 Lite', 'Nova 4', 'Nova 3', 'Nova 2', 'Nova 1', 'Y9 Prime', 'Y9s', 'Y9', 'Y8s', 'Y8', 'Y7 Prime', 'Y7', 'Y6 Prime', 'Y6', 'Y5 Prime', 'Y5', 'Y3', 'Y2', 'Y1', 'Honor 30 Pro', 'Honor 30', 'Honor 30 Lite', 'Honor 20 Pro', 'Honor 20', 'Honor 20 Lite', 'Honor 10', 'Honor 9', 'Honor 8', 'Honor 7', 'Honor 6', 'Honor 5', 'Honor 4', 'Honor 3', 'Honor 2', 'Honor 1']));
            } elseif ($product->getBrand() === 'Xiaomi') {
                $product->setModel($faker->randomElement(['Mi 10 Pro', 'Mi 10', 'Mi 10 Lite', 'Mi 9 Pro', 'Mi 9', 'Mi 9 Lite', 'Mi 8 Pro', 'Mi 8', 'Mi 8 Lite', 'Mi 6', 'Mi 5', 'Mi 4', 'Mi 3', 'Mi 2', 'Mi 1', 'Redmi Note 9 Pro', 'Redmi Note 9', 'Redmi Note 9 Lite', 'Redmi Note 8 Pro', 'Redmi Note']));
            } elseif ($product->getBrand() === 'Oppo') {
                $product->setModel($faker->randomElement(['Find X2 Pro', 'Find X2', 'Find X2 Lite', 'Find X', 'Reno 4 Pro', 'Reno 4', 'Reno 4 Lite', 'Reno 3 Pro', 'Reno 3', 'Reno 3 Lite', 'Reno 2', 'Reno 1', 'A92', 'A91', 'A90', 'A9', 'A8', 'A7', 'A6', 'A5', 'A4', 'A3', 'A2', 'A1', 'F17', 'F15', 'F11', 'F9', 'F7', 'F5', 'F3', 'F1', 'K7', 'K5', 'K3', 'K1', 'N3', 'N1', 'R7', 'R5', 'R3', 'R1', 'S7', 'S5', 'S3', 'S1', 'U7', 'U5', 'U3', 'U1', 'V7', 'V5', 'V3', 'V1', 'X7', 'X5', 'X3', 'X1', 'Y7', 'Y5', 'Y3', 'Y1']));
            } elseif ($product->getBrand() === 'Vivo') {
                $product->setModel($faker->randomElement(['X50 Pro', 'X50', 'X50 Lite', 'X30 Pro', 'X30', 'X30 Lite', 'X20 Pro', 'X20', 'X20 Lite', 'X10 Pro', 'X10', 'X10 Lite', 'X9 Pro', 'X9', 'X9 Lite', 'X8 Pro', 'X8', 'X8 Lite', 'X7 Pro', 'X7', 'X7 Lite', 'X6 Pro', 'X6', 'X6 Lite', 'X5 Pro', 'X5', 'X5 Lite', 'X4 Pro', 'X4', 'X4 Lite', 'X3 Pro', 'X3', 'X3 Lite', 'X2 Pro', 'X2', 'X2 Lite', 'X1 Pro', 'X1', 'X1 Lite', 'Y50 Pro', 'Y']));
            } elseif ($product->getBrand() === 'Realme') {
                $product->setModel($faker->randomElement(['X50 Pro', 'X50', 'X50 Lite', 'X30 Pro', 'X30', 'X30 Lite', 'X20 Pro', 'X20', 'X20 Lite', 'X10 Pro', 'X10', 'X10 Lite', 'X9 Pro', 'X9', 'X9 Lite', 'X8 Pro', 'X8', 'X8 Lite', 'X7 Pro', 'X7', 'X7 Lite', 'X6 Pro', 'X6', 'X6 Lite', 'X5 Pro', 'X5', 'X5 Lite', 'X4 Pro', 'X4', 'X4 Lite', 'X3 Pro', 'X3', 'X3 Lite', 'X2 Pro', 'X2', 'X2 Lite', 'X1 Pro', 'X1', 'X1 Lite', 'Y50 Pro', 'Y']));
            } elseif ($product->getBrand() === 'OnePlus') {
                $product->setModel($faker->randomElement(['8T', '8 Pro', '8', '7T Pro', '7T', '7 Pro', '7', '6T', '6', '5T', '5', '3T', '3', '2', '1']));
            } elseif ($product->getBrand() === 'Sony') {
                $product->setModel($faker->randomElement(['Xperia 1 II', 'Xperia 1', 'Xperia 5 II', 'Xperia 5', 'Xperia 10 II', 'Xperia 10', 'Xperia 8', 'Xperia 5', 'Xperia 1', 'Xperia XZ3', 'Xperia XZ2', 'Xperia XZ1', 'Xperia XZ', 'Xperia XA2', 'Xperia XA1', 'Xperia XA', 'Xperia L4', 'Xperia L3', 'Xperia L2', 'Xperia L1', 'Xperia L', 'Xperia E5', 'Xperia E4', 'Xperia E3', 'Xperia E2', 'Xperia E1', 'Xperia E']));
            } elseif ($product->getBrand() === 'Google') {
                $product->setModel($faker->randomElement(['Pixel 5', 'Pixel 4a', 'Pixel 4', 'Pixel 3a', 'Pixel 3', 'Pixel 2', 'Pixel', 'Nexus 6P', 'Nexus 6', 'Nexus 5X', 'Nexus 5', 'Nexus 4', 'Nexus 3', 'Nexus 2', 'Nexus 1']));
            } elseif ($product->getBrand() === 'Asus') {
                $product->setModel($faker->randomElement(['Zenfone 7 Pro', 'Zenfone 7', 'Zenfone 6', 'Zenfone 5', 'Zenfone 4', 'Zenfone 3', 'Zenfone 2', 'Zenfone 1', 'ROG Phone 3', 'ROG Phone 2', 'ROG Phone']));
            } elseif ($product->getBrand() === 'LG') {
                $product->setModel($faker->randomElement(['Velvet', 'V60 ThinQ', 'V50 ThinQ', 'V40 ThinQ', 'V35 ThinQ', 'V30', 'V20', 'V10', 'G8 ThinQ', 'G7 ThinQ', 'G6', 'G5', 'G4', 'G3', 'G2', 'G1', 'Q8', 'Q7', 'Q6', 'Q5', 'Q4', 'Q3', 'Q2', 'Q1', 'K61', 'K51', 'K41', 'K31', 'K21', 'K11', 'K10', 'K9', 'K8', 'K7', 'K6', 'K5', 'K4', 'K3', 'K2', 'K1', 'W41', 'W31', 'W21', 'W11', 'W10', 'W9', 'W8', 'W7', 'W6', 'W5', 'W4', 'W3', 'W2', 'W1', 'X6', 'X5', 'X4', 'X3', 'X2', 'X1', 'F4', 'F3', 'F2', 'F1', 'U3', 'U2', 'U1', 'S3', 'S2', 'S1', 'R3', 'R2', 'R1', 'T3', 'T2', 'T1', 'Y3', 'Y2', 'Y1', 'Z3', 'Z2', 'Z1']));
            } elseif ($product->getBrand() === 'Motorola') {
                $product->setModel($faker->randomElement(['Edge Plus', 'Edge', 'One Fusion Plus', 'One Fusion', 'One Hyper', 'One Zoom', 'One Action']));
            } elseif ($product->getBrand() === 'Nokia') {
                $product->setModel($faker->randomElement(['9.3 PureView', '8.3 5G', '5.3', '3.4', '2.4', '1.3', '1.4', '1.3', '1.2', '1.1', '1.0', '8.1', '7.2', '6.2', '5.1', '4.2', '3.2', '2.2', '1.3', '1.2', '1.1', '1.0', '9 PureView', '8 Sirocco', '8', '7 Plus', '7', '6.1 Plus', '6', '5.1 Plus', '5', '3.1 Plus', '3', '2.1', '2', '1 Plus', '1', 'X71', 'X7', 'X6', 'X5', 'X4', 'X3', 'X2', 'X1', 'C3', 'C2', 'C1', 'A3', 'A2', 'A1', 'E3', 'E2', 'E1', 'G3', 'G2', 'G1', 'L3', 'L2', 'L1', 'M3', 'M2', 'M1', 'N3', 'N2', 'N1', 'P3', 'P2', 'P1', 'Q3', 'Q2', 'Q1', 'R3', 'R2', 'R1', 'S3', 'S2', 'S1', 'T3', 'T2', 'T1', 'U3', 'U2', 'U1', 'V3', 'V2', 'V1', 'W3', 'W2', 'W1', 'Y3', 'Y2', 'Y1', 'Z3', 'Z2', 'Z1']));
            } elseif ($product->getBrand() === 'HTC') {
                $product->setModel($faker->randomElement(['Desire 20 Pro', 'Desire 19+', 'Desire 12+', 'Desire 12', 'Desire 10 Pro', 'Desire 10', 'Desire 9', 'Desire']));
            } elseif ($product->getBrand() === 'Lenovo') {
                $product->setModel($faker->randomElement(['Legion Duel', 'K12 Pro', 'K12', 'K12 Note', 'K11', 'K10', 'K9', 'K8', 'K7', 'K6', 'K5', 'K4', 'K3', 'K2', 'K1', 'Z6 Pro', 'Z6', 'Z6 Lite', 'Z5 Pro', 'Z5', 'Z5 Lite', 'Z4 Pro', 'Z4', 'Z4 Lite', 'Z3 Pro', 'Z3', 'Z3 Lite', 'Z2 Pro', 'Z2', 'Z2 Lite', 'Z1 Pro', 'Z1', 'Z1 Lite', 'V7', 'V5', 'V3', 'V1', 'S7', 'S5', 'S3', 'S1', 'R7', 'R5', 'R3', 'R1', 'T7', 'T5', 'T3', 'T1', 'Y7', 'Y5', 'Y3', 'Y1', 'X7', 'X5', 'X3', 'X1', 'F7', 'F5', 'F3', 'F1', 'U7', 'U5', 'U3', 'U1']));
            } elseif ($product->getBrand() === 'ZTE') {
                $product->setModel($faker->randomElement(['Axon 20', 'Axon 11', 'Axon 10', 'Axon 9', 'Axon 8', 'Axon 7', 'Axon 6', 'Axon 5', 'Axon 4', 'Axon 3', 'Axon 2', 'Axon 1', 'Blade 20', 'Blade 10', 'Blade 9', 'Blade 8', 'Blade 7', 'Blade 6', 'Blade 5', 'Blade 4', 'Blade 3', 'Blade 2', 'Blade 1', 'Nubia Red Magic 5', 'Nubia Red Magic 4', 'Nubia Red Magic 3', 'Nubia Red Magic 2', 'Nubia Red Magic 1', 'Nubia']));
            } elseif ($product->getBrand() === 'Meizu') {
                $product->setModel($faker->randomElement(['17 Pro', '17', '16s Pro', '16s', '16T', '16Xs', '16X', '16', '15 Plus', '15', '15 Lite', 'M10', 'M9', 'M8', 'M7', 'M6', 'M5', 'M4', 'M3', 'M2', 'M1', 'Note 9', 'Note 8', 'Note 7', 'Note 6', 'Note 5', 'Note 4', 'Note 3', 'Note 2', 'Note 1', 'X8', 'X7', 'X6', 'X5', 'X4', 'X3', 'X2', 'X1', 'U10', 'U9', 'U8', 'U7', 'U6', 'U5', 'U4', 'U3', 'U2', 'U1', 'V10', 'V9', 'V8', 'V7', 'V6', 'V5', 'V4', 'V3', 'V2', 'V1', 'E10', 'E9', 'E8', 'E7', 'E6', 'E5', 'E4', 'E3', 'E2', 'E1', 'C10', 'C9', 'C8', 'C7', 'C6', 'C5', 'C4', 'C3', 'C2', 'C1', 'S10', 'S9', 'S8', 'S7', 'S6', 'S5', 'S4', 'S3', 'S2', 'S1', 'R10', 'R9', 'R8', 'R7', 'R6', 'R5', 'R4', 'R3', 'R2', 'R1', 'T10', 'T9', 'T8', 'T7', 'T6', 'T5', 'T4', 'T3', 'T2', 'T1', 'Y10', 'Y9', 'Y8', 'Y7', 'Y6', 'Y5', 'Y4', 'Y3', 'Y2', 'Y1', 'Z10', 'Z9']));
            } elseif ($product->getBrand() === 'Alcatel') {
                $product->setModel($faker->randomElement(['1S', '1V', '1B', '1X', '1C', '1E', '1T', '1U', '1Y', '1Z', '1A', '1D', '1F', '1G', '1H', '1I', '1J', '1K', '1L', '1M', '1N', '1O', '1P', '1Q', '1R', '1W', '1X', '1Y', '1Z', '1AA', '1BB', '1CC', '1DD', '1EE', '1FF', '1GG', '1HH', '1II', '1JJ', '1KK', '1LL', '1MM', '1NN', '1OO', '1PP', '1QQ', '1RR', '1SS', '1TT', '1UU', '1VV', '1WW', '1XX', '1YY', '1ZZ', '1AAA', '1BBB', '1CCC', '1DDD', '1EEE', '1FFF', '1GGG', '1HHH', '1III', '1JJJ', '1KKK', '1LLL', '1MMM', '1NNN', '1OOO', '1PPP', '1QQQ', '1RRR', '1SSS', '1TTT', '1UUU', '1VVV', '1WWW', '1XXX', '1YYY', '1ZZZ', '1AAAA', '1BBBB', '1CCCC', '1DDDD', '1EEEE', '1FFFF', '1GGGG', '1HHHH', '1IIII', '1JJJJ', '1KKKK', '1LLLL', '1MMMM', '1NNNN', '1OOOO', '1PPPP', '1QQQQ', '1RRRR', '1SSSS', '1TTTT', '1UUUU', '1VVVV', '1WWWW', '1XXXX', '1YYYY', '1ZZZZ', '1AAAAA', '1BBBBB', '1CCCCC', '1DDDDD', '1EEEEE', '1FFFFF']));
            } elseif ($product->getBrand() === 'BlackBerry') {
                $product->setModel($faker->randomElement(['KEY2', 'KEY2 LE', 'KEYone', 'Motion', 'DTEK60', 'DTEK50', 'Priv', 'Passport', 'Classic', 'Leap', 'Z30', 'Z10', 'Q10', 'Q5', 'Porsche Design P9983', 'Porsche Design P9982', 'Porsche Design P9981', 'Porsche Design P9980', 'Porsche Design P9977', 'Porsche Design P9976', 'Porsche Design P9975', 'Porsche Design P9974', 'Porsche Design P9973', 'Porsche Design P9972', 'Porsche Design P9971', 'Porsche Design P9970', 'Porsche Design P9969', 'Porsche Design P9968', 'Porsche Design P9967', 'Porsche Design P9966', 'Porsche Design P9965', 'Porsche Design P9964', 'Porsche Design P9963', 'Porsche Design P9962', 'Porsche Design P9961', 'Porsche Design P9960', 'Porsche Design P9959', 'Porsche Design P9958', 'Porsche Design P9957', 'Porsche Design P9956', 'Porsche Design P9955', 'Porsche Design P9954', 'Porsche Design P9953', 'Porsche Design P9952', 'Porsche Design P9951', 'Porsche Design P9950', 'Porsche Design P9949', 'Porsche Design P9948', 'Porsche Design P9947', 'Porsche Design P9946', 'Porsche Design P9945', 'Porsche Design P9944', 'Porsche Design P9943', 'Porsche Design P9942', 'Porsche Design P9941', 'Porsche Design P9940', 'Porsche Design P9939', 'Porsche Design P9938', 'Porsche Design P9937', 'Porsche Design P9936', 'Porsche Design P9935', 'Porsche Design P9934', 'Porsche Design P9933', 'Porsche Design P9932', 'Porsche Design P9931', 'Porsche Design P9930', 'Porsche Design P9929', 'Porsche Design P9928', 'Porsche Design P9927', 'Porsche']));
            } elseif ($product->getBrand() === 'TCL') {
                $product->setModel($faker->randomElement(['10 Pro', '10L', '10 SE', '10 5G', '10 Plus']));
            } elseif ($product->getBrand() === 'Coolpad') {
                $product->setModel($faker->randomElement(['Cool 10', 'Cool 9', 'Cool 8', 'Cool 7', 'Cool 6', 'Cool 5', 'Cool 4', 'Cool 3', 'Cool 2', 'Cool 1', 'Cool S', 'Cool R', 'Cool M', 'Cool L', 'Cool K', 'Cool J', 'Cool H', 'Cool G', 'Cool F', 'Cool E', 'Cool D', 'Cool C', 'Cool B', 'Cool A', 'Cool X', 'Cool W', 'Cool V', 'Cool U', 'Cool T', 'Cool S', 'Cool R', 'Cool Q', 'Cool P', 'Cool O', 'Cool N', 'Cool M', 'Cool L', 'Cool K', 'Cool J', 'Cool I', 'Cool H', 'Cool G', 'Cool F', 'Cool E', 'Cool D', 'Cool C', 'Cool B', 'Cool A', 'Cool Z', 'Cool Y', 'Cool X', 'Cool W', 'Cool V', 'Cool U', 'Cool T', 'Cool S', 'Cool R', 'Cool Q', 'Cool P', 'Cool O', 'Cool N', 'Cool M', 'Cool L', 'Cool K', 'Cool J', 'Cool I', 'Cool H', 'Cool G', 'Cool F', 'Cool E', 'Cool D', 'Cool C', 'Cool B', 'Cool A', 'Cool Z', 'Cool Y', 'Cool X', 'Cool W', 'Cool V', 'Cool U', 'Cool T', 'Cool S', 'Cool R', 'Cool Q', 'Cool P', 'Cool O', 'Cool N', 'Cool M', 'Cool L', 'Cool K', 'Cool J', 'Cool I', 'Cool H', 'Cool G', 'Cool F', 'Cool E', 'Cool D', 'Cool C', 'Cool B', 'Cool A', 'Cool Z', 'Cool Y', 'Cool X', 'Cool W', 'Cool V', 'Cool U', 'Cool T', 'Cool S', 'Cool R', 'Cool Q', 'Cool P', 'Cool O', 'Cool N', 'Cool M', 'Cool L', 'Cool K', 'Cool J', 'Cool I', 'Cool H', 'Cool']));
            } elseif ($product->getBrand() === 'Infinix') {
                $product->setModel($faker->randomElement(['Zero 8', 'Zero 7', 'Zero 6', 'Zero 5', 'Zero 4', 'Zero 3', 'Zero 2', 'Zero 1', 'Note 8', 'Note 7', 'Note 6', 'Note 5', 'Note 4', 'Note 3', 'Note 2', 'Note 1', 'Hot 10', 'Hot 9', 'Hot 8', 'Hot 7', 'Hot 6', 'Hot 5', 'Hot 4', 'Hot 3', 'Hot 2', 'Hot 1', 'S5 Pro', 'S5', 'S4', 'S3', 'S2', 'S1', 'Smart 5', 'Smart 4', 'Smart 3', 'Smart 2', 'Smart 1', 'Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14', 'Q15', 'Q16', 'Q17', 'Q18', 'Q19', 'Q20', 'Q21', 'Q22', 'Q23', 'Q24', 'Q25', 'Q26', 'Q27', 'Q28', 'Q29', 'Q30', 'Q31', 'Q32', 'Q33', 'Q34', 'Q35', 'Q36', 'Q37', 'Q38', 'Q39', 'Q40', 'Q41', 'Q42', 'Q43', 'Q44', 'Q45', 'Q46', 'Q47', 'Q48', 'Q49', 'Q50', 'Q51', 'Q52', 'Q53', 'Q54', 'Q55', 'Q56', 'Q57', 'Q58', 'Q59', 'Q60', 'Q61', 'Q62', 'Q63', 'Q64', 'Q65', 'Q66', 'Q67', 'Q68', 'Q69', 'Q70', 'Q71', 'Q72', 'Q73', 'Q74', 'Q75', 'Q76', 'Q77']));
            } elseif ($product->getBrand() === 'Tecno') {
                $product->setModel($faker->randomElement(['Phantom 10', 'Phantom 9', 'Phantom 8', 'Phantom 7', 'Phantom 6', 'Phantom 5', 'Phantom 4', 'Phantom 3', 'Phantom 2', 'Phantom 1', 'Camon 16', 'Camon 15', 'Camon 14', 'Camon 13', 'Camon 12', 'Camon 11', 'Camon 10', 'Camon 9', 'Camon 8', 'Camon 7', 'Camon 6', 'Camon 5', 'Camon 4', 'Camon 3', 'Camon 2', 'Camon 1', 'Spark 7', 'Spark 6', 'Spark 5', 'Spark 4', 'Spark 3', 'Spark 2', 'Spark 1', 'Pop 4', 'Pop 3', 'Pop 2', 'Pop 1', 'Pova', 'Pouvoir 4', 'Pouvoir 3', 'Pouvoir 2', 'Pouvoir 1', 'F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10', 'F11', 'F12', 'F13', 'F14', 'F15', 'F16', 'F17', 'F18', 'F19', 'F20', 'F21', 'F22', 'F23', 'F24', 'F25', 'F26', 'F27', 'F28', 'F29', 'F30', 'F31', 'F32', 'F33', 'F34', 'F35', 'F36', 'F37', 'F38', 'F39', 'F40', 'F41', 'F42', 'F43', 'F44', 'F45', 'F46', 'F47', 'F48', 'F49', 'F50', 'F51', 'F52', 'F53', 'F54', 'F55', 'F56', 'F57', 'F58', 'F59', 'F60', 'F61']));
            } else {
                $product->setModel($faker->word());
            }

            $manager->persist($product);
        }
    }

    private function createClients(Generator $faker, ObjectManager $manager): void {
        for ($i = 0; $i < 100; $i++) {
            $clientDateCreation = DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-2 years', '-1 day'));
            $client = (new Client())
                ->setName($faker->company())
                ->setCreatedAt($clientDateCreation)
                ->setExpiredAt(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('+1 day', '+2 years')))
                ->addApplication(
                    (new Application)
                        ->setCreatedAt(DateTimeImmutable::createFromMutable($faker->dateTimeBetween($clientDateCreation->format('c'), 'now')))
                        ->setName($faker->word())
                        ->setToken($faker->uuid())
                );


            for ($u = 0; $u < $faker->numberBetween(50, 500); $u++) {
                $client->addUser(
                    (new User)
                        ->setCreatedAt(DateTimeImmutable::createFromMutable($faker->dateTimeBetween($clientDateCreation->format('c'), 'now')))
                        ->setName($faker->name())
                );
            }

            $manager->persist($client);
        }
    }
}
