# NathanFallet-Web

## Repository content

Here is my website, divided in two folders:
- www/ => The website with HTML/CSS/JS
- apps/ => Some APIs with PHP/MySQL

[Check out the website online!](https://www.nathanfallet.me/)

Want to support my projects? [Donate!](https://paypal.me/NathanFallet)

## MySQL database

```sql
CREATE TABLE `projects` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description_little` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `last_update` datetime NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `data` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL DEFAULT '',
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
```
