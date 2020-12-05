# Local Ortamda Projeyi Ayağa Kaldırma
* docker-compose up -d
* docker-compose exec app ln -s /var/www/storage/app /var/www/public/storage
* docker-compose exec app php artisan queue:work

# Örnek Kullanım (Curl)
``` 
curl --location --request POST 'http://localhost:8881/file-upload' \
--form 'file=@/Users/{user}/Desktop/test.png' \
--form 'from=user@sender.com' \
--form 'to=user@recipient.com'
```
