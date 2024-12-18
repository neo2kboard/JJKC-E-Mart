# JJKC-E-Mart
An e-commerce system for a mini mart, designed to facilitate online shopping for users and manage operations for admins.

The project JJKC E-Mart is an e-commerce system designed for a mini mart to facilitate online shopping for users and streamline operations for admins. Its primary purpose is to create a seamless and user-friendly platform that allows customers to browse, purchase products, and manage their accounts. At the same time, it provides a robust admin panel for product management, order processing, and user administration. This system incorporates features like secure user login, product catalog management, and secure checkout, aiming to enhance both user experience and system security.

System Functionality:

Login Functionality: Users can easily register and log into the system. Password security is ensured by using hashing algorithms to store user credentials securely. Upon logging in, users are redirected to their profile page, where they can manage orders, view account details, and log out. Admins have a different flow—they can log in but cannot register themselves; they must be added by another admin in the admin panel.

User Management: Registered users can update their personal details, including username, password, image, address, and contact number. They also have the option to view pending orders and delete their account if necessary. Admins can manage the users by viewing their details, editing, and deleting accounts as needed.

Product Management: The system’s product catalog is dynamic, with products displayed in a grid format on the landing page. Admins can manage products, adding new items, updating details such as the name, description, price, and images. Admins also have the ability to delete or edit existing products through a structured data table interface.

Cart and Checkout: Users can add products to their cart and adjust quantities. If not logged in, the system prompts them to log in before proceeding to checkout. Once logged in, users can select payment options, and after successful payment, the order status is updated to "paid." Users can view their order history and manage pending or completed orders from their profile page.

Order Management: Admins can view and manage orders placed by customers. They can track payment statuses, view order history, and manage individual products related to each order. Admins have access to an order list, where they can check the list of orders and modify if needed. This functionality ensures smooth processing of orders and allows admins to ensure timely fulfillment.

Advanced Features:
Sorting: The system allows users to sort products based on three criteria: alphabetical order (A-Z), newest first, and oldest first. Additionally, products are displayed randomly using the SQL RAND() function each time the page is refreshed or hovered over. This makes the product display dynamic and engaging. Sorting is handled directly by the SQL query via the ORDER BY clause, ensuring quick and efficient sorting.

Searching: The system includes a search function that lets users find products by name or keyword. The search algorithm is SQL-based and uses the LIKE operator to perform substring searches. This is a basic but effective method where products matching the search term in their keywords are returned. The performance can be enhanced with indexing or full-text search, depending on how the database is configured.

Hashing for Security: To protect user credentials, passwords are hashed before being stored in the database. This ensures that even if the database is compromised, the passwords are not easily readable. We use secure hashing algorithms such as bcrypt, which is essential for safeguarding sensitive user data and ensuring that login credentials remain protected.

Technical Details:
The system is built using Bootstrap and jQuery to provide a responsive and dynamic user interface. Bootstrap ensures that the layout is adaptable to various screen sizes, offering a mobile-friendly experience. jQuery is used for enhancing user interactions, such as sorting products, updating the cart, and refreshing the product display without reloading the page. These technologies contribute to creating an interactive, smooth, and user-friendly experience. 
The system also optimizes the management of products using a grid layout for displaying product cards. Admins can easily manage products, categories, brands, and orders using data tables. These tables offer search, sorting, and pagination features, which are essential for efficient admin operations. The combination of Bootstrap’s layout tools and jQuery’s interactive features allows for a modern and highly functional web application.


