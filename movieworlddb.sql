-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 04 Νοε 2021 στις 19:39:43
-- Έκδοση διακομιστή: 10.4.21-MariaDB
-- Έκδοση PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `movieworlddb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE `movies` (
  `id` int(20) NOT NULL,
  `title` varchar(70) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `user` varchar(25) NOT NULL,
  `publicationdate` date NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `user`, `publicationdate`, `likes`, `dislikes`) VALUES
(10, 'Frida Kahlo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias minima, est praesentium saepe ea molestiae pariatur, quidem temporibus autem et quam quas sequi magni consectetur at modi optio perspiciatis?', 'xenia2', '2021-11-04', 0, 0),
(11, 'Fight club', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias minima, est praesentium saepe ea molestiae pariatur, quidem temporibus autem et quam quas sequi magni consectetur at modi optio perspiciatis?', 'xenia2', '2021-11-04', 0, 0),
(12, 'Titanic', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias minima, est praesentium saepe ea molestiae pariatur, quidem temporibus autem et quam quas sequi magni consectetur at modi optio perspiciatis?', 'xenia2', '2021-11-04', 0, 0),
(13, 'Squid game', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo alias minima, est praesentium saepe ea molestiae pariatur, quidem temporibus autem et quam quas sequi magni consectetur at modi optio perspiciatis?', 'xenia2', '2021-11-04', 0, 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'xenia', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85'),
(2, 'xenia2', '6308d8f6a7ccc9f77e41be5331a52c71c0bb28ecbd4669b960d60dd505dfde9ddd7a30cd26bb308010b3819699daba7caeb791bf6a4153605fe56d1fd3d5df41'),
(3, 'xenia5', '72aafc86edd0b97a6bd6e28f72c7a0c5c822933d369940d016ef034aa755dbba0edb0a40b7bdb69ccbe83f971017c480301cd037288c2a7351bea43e5692d2a3'),
(4, 'sekka', '3b9c3989dc2d1498feb565b3e583dc0fdb79c5692b071a8428e078ae8f47a872791992eafa4f11c925167996dc9df73f05830afb4a5790ec4669fea75846e37a'),
(5, 'sekka1', '3d60a68a4efc358b065636a0db7d4eecb2ab1a2947640387852a9bd92c853ca113cf4117bb56e124f222707ea8c529c0286fc42dac8b1449a4a3abc2c230bef1'),
(6, 'xeniaxe', '9a5b2856495f2e08e7ef0995d07097b74c4cbeef3b7a76f68b018b16c1bb62b022736015e8c2c28103fafa81a901577bfc00b01d1e041d29c04986e9b229cd31'),
(7, 'vaggg', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
