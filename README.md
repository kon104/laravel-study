
## Laravel-study

## Gitからcloneで再開する

```
$ git clone https://github.com/kon104/laravel-study.git
$ composer install
$ php artisan serve
```

## DB周りで最初にやったこと

- データベースとアカウント作成
```
guest $ sudo mysql -u root
```
```
CREATE DATABASE laravel;
CREATE USER laravel IDENTIFIED BY 'password';
GRANT ALL ON laravel.* TO 'laravel'@'%';
```

- マイグレーション機能でテーブル作成
```
$ # php artisan make:migration create_books_table --create=books
$ php artisan migrate
  Migrating: 2024_06_07_162936_create_books_table
```

- モデル(app/Models/Book.php)を作った上でシーディングで初期データ投入
```
$ # php artisan make:model Book
$ # php artisan make:seeder BooksTableSeeder
$ # vim database/seeders/BooksTableSeeder.php
$ # vim database/seeders/DatabaseSeeder.php
$ php artisan db:seed
```

## 参考資料

- https://qiita.com/sano1202/items/6021856b70e4f8d3dc3d


