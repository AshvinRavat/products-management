User 
- login

Product
- id
- name (string)
- price (int),
- image (string)


Order
- id,
- user_id
- total

Relationship
- Order Item
- User

Order Item 
- hasmany
  
  Product

  - belongs to

User
- belongsTo


order_item
- id
- order_id
- product_id,
- price, 
- quantity


