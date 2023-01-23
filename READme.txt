    На сайте реализованна авторизация, регистрация, изменения данных пользователя. Единственное, что нельзя сделать через сайт
это наделить ползователя правами админестратора. Для этого нужно непосредственно в базе данных установить значение поля access
равным 1.

    Также реализовано взаимодействие с таварами. Обычный пользователь может их добавлять себе в карзину или в понравившиеся.
Администратор же может также добавлять новые товары и удалять уже имеющиеся, а также изменят информацию о любом товаре.

    Поиск пока не был реализован.

    Ниже привидены SQL команды для создания таблиц в базе данных:

    CREATE TABLE `users` (`id` INT NOT NULL AUTO_INCREMENT , `login` VARCHAR(64) NOT NULL ,
     `password` VARCHAR(64) NOT NULL , `access` BOOLEAN NOT NULL DEFAULT FALSE , `name` VARCHAR(64) NULL ,
      PRIMARY KEY (`id`), UNIQUE `log` (`login`)) ENGINE = InnoDB;

    CREATE TABLE `products` (`id` INT NOT NULL AUTO_INCREMENT , `price` INT NOT NULL ,
     `NAME` VARCHAR(64) NOT NULL , `description` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`))
      ENGINE = InnoDB;

    CREATE TABLE `cart` (`user_id` INT NOT NULL , `product_id` INT NOT NULL ) ENGINE = InnoDB;

    CREATE TABLE `liked` (`user_id` INT NOT NULL , `product_id` INT NOT NULL ) ENGINE = InnoDB;