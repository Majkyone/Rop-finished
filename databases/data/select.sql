SELECT * FROM orders
JOIN products ON products.id_product = orders.id_product
JOIN customers ON customers.id_customer = orders.id_customer GROUP by customers.name;
/*
SELECT products.title, customers.name, orders.amount  FROM orders
JOIN products ON products.id_product = orders.id_product
JOIN customers ON customers.id_customer = orders.id_customer order by customers.id_customer;*/