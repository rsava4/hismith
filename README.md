
# Загрузка Rss фида в БД

Консольная команда php artisan rss:parse. 




## API Reference

#### Постраничный вывод полученных новостей

```http
  GET /api/items
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `fields` | `string` | Сипсок выбираемых полей в троку через запятую "title, descriprion, author, image, published_at" |
| `sort` | `string` | Порядок сортировки результатов по дате публикации, "asc" или "desc", по умолчанию "asc" |
| `page` | `integer` | Номер страницы, на странице вывдится 20 новостей |



