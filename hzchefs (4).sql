-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 May 2024, 12:40:11
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hzchefs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `prep_time` int(11) NOT NULL,
  `cook_time` int(11) NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `serving_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_name`, `category`, `prep_time`, `cook_time`, `ingredients`, `instructions`, `image`, `difficulty`, `serving_size`) VALUES
(1, 'Lazanya', 'Breakfast', 30, 60, '500g makarna, 500g kıyma, 2 su bardağı rendelenmiş kaşar peyniri, 2 su bardağı domates sosu, 1 adet soğan, tuz, karabiber', 'Makarna kaynatılır, kıyma kavrulur, kat kat malzemeler dizilir, fırında pişirilir.', 'lazanya.jpg', 'Orta', 6),
(2, 'hnc', 'Breakfast', 4, 6, 'thg', 'g', 'library-books-icon-set-flat-style-vector-22845362.jpg', 'Easy', 65),
(3, 'Scrambled Eggs', 'Breakfast', 10, 10, 'Eggs, Salt, Pepper', '1. Beat the eggs in a bowl. 2. Heat a pan and add the beaten eggs. 3. Scramble until cooked.', 'scrambled_eggs.jpg', 'Easy', 2),
(4, 'Pancakes', 'Breakfast', 15, 15, 'Flour, Milk, Eggs, Baking Powder, Butter', '1. Mix flour, milk, eggs, and baking powder in a bowl. 2. Heat a pan and pour the mixture. 3. Cook until golden brown on both sides.', 'pancakes.jpg', 'Medium', 4),
(5, 'Omelette', 'Breakfast', 12, 10, 'Eggs, Cheese, Tomato, Onion, Salt, Pepper', '1. Beat the eggs in a bowl. 2. Add cheese, tomato, onion, salt, and pepper. 3. Cook in a pan until set.', 'omelette.jpg', 'Easy', 1),
(6, 'French Toast', 'Breakfast', 10, 10, 'Bread, Eggs, Milk, Cinnamon, Vanilla Extract', '1. Mix eggs, milk, cinnamon, and vanilla extract in a bowl. 2. Dip bread slices in the mixture. 3. Cook in a pan until golden brown on both sides.', 'french_toast.jpg', 'Easy', 2),
(7, 'Fruit Salad', 'Breakfast', 10, 0, 'Assorted Fruits (Apple, Banana, Orange, Grape, etc.)', '1. Cut the fruits into bite-sized pieces. 2. Mix them together in a bowl. 3. Serve chilled.', 'fruit_salad.jpg', 'Easy', 2),
(8, 'Tomato Soup', 'Soup', 10, 20, 'Tomatoes, Onion, Garlic, Vegetable Broth, Salt, Pepper', '1. Saute onion and garlic in a pot. 2. Add chopped tomatoes and vegetable broth. 3. Simmer until tomatoes are soft. 4. Blend until smooth.', 'tomato_soup.jpg', 'Easy', 4),
(9, 'Chicken Noodle Soup', 'Soup', 15, 25, 'Chicken Breast, Carrot, Celery, Onion, Garlic, Egg Noodles, Chicken Broth', '1. Cook chicken breast in a pot. 2. Add chopped vegetables and chicken broth. 3. Simmer until vegetables are tender. 4. Add egg noodles and cook until tender.', 'chicken_noodle_soup.jpg', 'Medium', 4),
(10, 'Lentil Soup', 'Soup', 15, 30, 'Lentils, Onion, Carrot, Celery, Garlic, Tomato Paste, Vegetable Broth, Cumin, Paprika', '1. Saute onion, carrot, celery, and garlic in a pot. 2. Add lentils, tomato paste, vegetable broth, and spices. 3. Simmer until lentils are tender.', 'lentil_soup.jpg', 'Easy', 4),
(11, 'Minestrone Soup', 'Soup', 20, 35, 'Tomato, Carrot, Celery, Onion, Garlic, Kidney Beans, Cannellini Beans, Pasta, Vegetable Broth', '1. Saute onion, carrot, celery, and garlic in a pot. 2. Add chopped tomatoes, beans, pasta, and vegetable broth. 3. Simmer until vegetables are tender and pasta is cooked.', 'minestrone_soup.jpg', 'Medium', 4),
(12, 'Butternut Squash Soup', 'Soup', 15, 25, 'Butternut Squash, Onion, Carrot, Garlic, Vegetable Broth, Coconut Milk, Curry Powder', '1. Roast butternut squash, onion, carrot, and garlic. 2. Blend roasted vegetables with vegetable broth, coconut milk, and curry powder. 3. Simmer until flavors meld.', 'butternut_squash_soup.jpg', 'Easy', 4),
(13, 'Spaghetti Bolognese', 'Main Course', 20, 30, 'Spaghetti, Ground Beef, Onion, Garlic, Tomato Sauce, Red Wine, Salt, Pepper, Parmesan Cheese', '1. Cook spaghetti according to package instructions. 2. Brown ground beef in a pan. 3. Add onion and garlic, then tomato sauce and red wine. 4. Simmer until flavors meld. 5. Serve over cooked spaghetti with grated Parmesan cheese.', 'spaghetti_bolognese.jpg', 'Medium', 4),
(14, 'Grilled Chicken Breast', 'Main Course', 10, 20, 'Chicken Breast, Olive Oil, Lemon Juice, Garlic, Salt, Pepper', '1. Marinate chicken breast in olive oil, lemon juice, garlic, salt, and pepper. 2. Grill until cooked through. 3. Serve hot.', 'grilled_chicken_breast.jpg', 'Easy', 1),
(15, 'Beef Stew', 'Main Course', 20, 40, 'Beef Stew Meat, Onion, Carrot, Potato, Garlic, Tomato Paste, Beef Broth, Red Wine, Bay Leaf, Thyme', '1. Brown beef stew meat in a pot. 2. Add chopped vegetables, garlic, tomato paste, beef broth, red wine, and herbs. 3. Simmer until beef is tender and flavors meld.', 'beef_stew.jpg', 'Medium', 4),
(16, 'Vegetable Stir-Fry', 'Main Course', 15, 20, 'Assorted Vegetables (Broccoli, Bell Pepper, Carrot, Mushroom, etc.), Tofu (optional), Soy Sauce, Garlic, Ginger, Sesame Oil', '1. Stir-fry vegetables and tofu in sesame oil. 2. Add garlic, ginger, and soy sauce. 3. Cook until vegetables are tender. 4. Serve hot with rice or noodles.', 'vegetable_stir_fry.jpg', 'Easy', 4),
(17, 'Salmon with Lemon Butter Sauce', 'Main Course', 15, 20, 'Salmon Fillet, Butter, Lemon Juice, Garlic, Dill, Salt, Pepper', '1. Season salmon fillet with salt, pepper, and dill. 2. Cook salmon in butter and garlic until golden brown. 3. Add lemon juice and cook until sauce thickens. 4. Serve hot.', 'salmon_lemon_butter.jpg', 'Medium', 2),
(18, 'Chocolate Cake', 'Dessert', 20, 35, 'Flour, Sugar, Cocoa Powder, Baking Powder, Baking Soda, Salt, Eggs, Milk, Vegetable Oil, Vanilla Extract, Boiling Water', '1. Mix dry ingredients in a bowl. 2. Add eggs, milk, oil, and vanilla extract. 3. Mix until smooth. 4. Stir in boiling water. 5. Pour batter into a greased baking pan. 6. Bake until a toothpick inserted into the center comes out clean.', 'chocolate_cake.jpg', 'Medium', 8),
(19, 'Apple Pie', 'Dessert', 20, 45, 'Apples, Sugar, Flour, Cinnamon, Lemon Juice, Butter, Pie Crust', '1. Peel and slice apples. 2. Mix with sugar, flour, cinnamon, and lemon juice. 3. Pour into a pie crust. 4. Dot with butter. 5. Cover with another pie crust. 6. Bake until crust is golden brown and filling is bubbly.', 'apple_pie.jpg', 'Medium', 8),
(20, 'Vanilla Ice Cream', 'Dessert', 10, 0, 'Milk, Cream, Sugar, Egg Yolks, Vanilla Extract', '1. Heat milk, cream, and sugar until hot. 2. Temper egg yolks with hot milk mixture. 3. Cook custard until thickened. 4. Stir in vanilla extract. 5. Chill custard. 6. Churn in an ice cream maker until frozen.', 'vanilla_ice_cream.jpg', 'Medium', 4),
(21, 'Fruit Tart', 'Dessert', 30, 30, 'Pie Crust, Pastry Cream, Assorted Fruits (Strawberry, Kiwi, Blueberry, etc.)', '1. Bake pie crust until golden brown. 2. Fill with pastry cream. 3. Arrange sliced fruits on top. 4. Chill before serving.', 'fruit_tart.jpg', 'Medium', 6),
(22, 'Cheesecake', 'Dessert', 30, 60, 'Graham Cracker Crumbs, Sugar, Butter, Cream Cheese, Sour Cream, Eggs, Vanilla Extract', '1. Mix graham cracker crumbs, sugar, and melted butter. 2. Press into a springform pan. 3. Beat cream cheese until smooth. 4. Add sour cream, sugar, eggs, and vanilla extract. 5. Pour into crust. 6. Bake until set. 7. Chill before serving.', 'cheesecake.jpg', 'Medium', 8),
(23, 'deneme', 'Breakfast', 5, 5, '5', '5', 'images/mainc.jpg', 'Medium', 5),
(24, 'hnc', 'Soup', 5, 7, 'u', 'u', 'images/desktop-wallpaper-yellow-lemon-yellow (1).jpg', 'Medium', 5),
(25, 'hnc', 'Soup', 5, 7, 'u', 'u', 'images/desktop-wallpaper-yellow-lemon-yellow (1).jpg', 'Medium', 5),
(26, 'b', 'Soup', 5, 5, '5', '5', 'images/desktop-wallpaper-yellow-lemon-yellow.jpg', 'Easy', 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `surname`, `tel`) VALUES
(1, 'admin', '1', 'admin@example.com', 'admin', 'admin', '435646'),
(2, 'admin', '1', 'admin@example.com', 'admin', 'admin', '435646'),
(3, 'admi', '123', 'udemy2icin@gmail.com', 'xvc', 'g', '4564'),
(4, 'admiasa', '12345', 'qwwqqwqdkjdcfkjscdjksdkcs@gmail.com', NULL, NULL, NULL),
(5, 'adminregtwertg', '12345dfsg', 'pdfgi@gmail.com', NULL, NULL, NULL),
(6, 'ozkyhatice', 'Strong123.', 'haticeozkaya@example.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_favorites`
--

CREATE TABLE `user_favorites` (
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user_favorites`
--

INSERT INTO `user_favorites` (`user_id`, `recipe_id`) VALUES
(1, 2),
(1, 3),
(1, 6),
(1, 13),
(1, 15),
(1, 17),
(1, 19),
(1, 26),
(3, 1),
(3, 2),
(3, 3),
(3, 5),
(3, 7),
(3, 23),
(6, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD PRIMARY KEY (`user_id`,`recipe_id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `user_favorites`
--
ALTER TABLE `user_favorites`
  ADD CONSTRAINT `user_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_favorites_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
