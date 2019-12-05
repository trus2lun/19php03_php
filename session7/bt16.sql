-- BT1:
SELECT
    productName,
    listPrice,
    productCode,
    description
FROM
    products
INNER JOIN categories ON products.categoryID = categories.categoryID
WHERE
    categoryName = 'Guitars' AND listPrice >= 500  

-- BT2:
SELECT * FROM products 
WHERE listPrice > 300 AND dateAdded LIKE '2014-07-__%'
ORDER BY listPrice

-- BT3:
SELECT *
FROM products
INNER JOIN categories
ON categories.categoryID = products.categoryID
WHERE productName LIKE '%o%' AND categoryName = 'Basses'
ORDER BY productName DESC

-- BT4:
SELECT *
FROM products
INNER JOIN orderitems
ON products.productID = orderitems.productID
INNER JOIN orders
ON orderitems.orderID = orders.orderID
INNER JOIN customers
ON orders.customerID = customers.customerID
WHERE emailAddress LIKE '%@gmail.com'

-- BT5:
SELECT *
FROM products
WHERE listPrice > 300 AND dateAdded LIKE '2014%'
ORDER BY listPrice DESC
LIMIT 4

-- BT6:
SELECT *
FROM products
INNER JOIN orderitems
ON products.productID = orderitems.productID
INNER JOIN orders
ON orderitems.orderID = orders.orderID
INNER JOIN customers
ON orders.customerID = customers.customerID
INNER JOIN addresses
ON customers.customerID = addresses.customerID
WHERE productName = 'Yamaha FG700S'