
# Загрузка Rss фида в БД

Консольная команда php artisan rss:parse. 




## API Reference

#### Постраничный вывод полученных новостей

```http
  GET /api/posts
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `fields` | `string` | Сипсок выбираемых полей в строку через запятую "title, descriprion, author, image, published_at" |
| `sort` | `string` | Порядок сортировки результатов по дате публикации, "asc" или "desc", по умолчанию "asc" |
| `page` | `integer` | Номер страницы, на странице вывдится 20 новостей |



