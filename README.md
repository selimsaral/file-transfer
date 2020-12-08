# Framework
Lumen

# Local Ortamda Projeyi Ayağa Kaldırma
* composer install
* docker-compose up -d
* docker-compose exec app ln -s /var/www/storage/app /var/www/public/storage
* docker-compose exec app php artisan queue:work

# Kullanım
* Dosya Sunucuya Yüklendikten sonra yükleyen kişiye "Dosyanız Yüklendi" , Dosya Alıcısına ise "Size Dosya Gönderildi" Adında Mail Gönderilmektedir.
* Maillerin kontrolü mailtrap üzerinden üzerinden yapılabilir, Giden tüm mailler buraya düşmektedir.
* İzin Verilen Dosya Uzantıları: zip,rar,png,jpg,mp3,waw,flac

```
Mailtrap.io Bilgileri
Email: case@selimsaral.com
Şifre: case2020*
```

# Örnek Kullanım (Curl)
``` 
curl --location --request POST 'http://localhost:8881/file-upload' \
--form 'file=@/Users/{user}/Desktop/test.png' \
--form 'from=user@sender.com' \
--form 'to=user@recipient.com'
```
