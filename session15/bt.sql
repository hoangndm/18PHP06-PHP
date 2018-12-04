SELECT * FROM `products` 
INNER JOIN categories 
ON products.categoryID = categories.categoryID 
WHERE products.listPrice > 500
AND categories.categoryName LIKE 'Guitars' 

SELECT * FROM `products` 
WHERE listPrice > 300 
AND dateAdded LIKE '2014-07-__%'

SELECT * FROM `products` 
INNER JOIN categories 
ON products.categoryID = categories.categoryID 
WHERE products.productName LIKE '%o%' 
AND categories.categoryName LIKE 'Basses'

SELECT * FROM products
INNER JOIN Orderitems ON Products.productID = Orderitems.productID
INNER JOIN Orders ON Orderitems.orderID = Orders.orderID
INNER JOIN Customers ON Orders.customerID = Customers.customerID
WHERE Customers.emailAddress LIKE '%@gmail.com%';

SELECT * FROM `products` 
WHERE listPrice > 300 
AND YEAR(dateAdded) = 2014

SELECT addresses.city
FROM addresses
INNER JOIN customers ON addresses.customerID = customers.customerID
INNER JOIN orders ON customers.customerID = orders.customerID
INNER JOIN orderitems ON orders.orderID = orderitems.orderID
INNER JOIN products ON orderitems.productID = products.productID
WHERE products.productName ='Yamaha FG700S'
GROUP BY addresses.city