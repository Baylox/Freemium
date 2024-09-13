
# Freemium

This project is a simple application developed in Symfony with the aim of getting familiar with the framework. It handles the creation of a client account using their email address. All project documentation is written in English.




## Roadmap

**Roadmap:**

1. **Implement a Shopping Cart System**  
   Develop a shopping cart feature that allows users to add, modify, and remove items. Ensure that the cart persists across sessions for logged-in users, enabling them to retrieve their selections when they return to the site. Add validation to ensure that products with insufficient stock cannot be added to the cart.

2. **Admin Product Management**  
   Create a management panel for administrators where they can add, update, and delete product listings. This should include detailed input validation for product details like price, stock quantity, and description. Additionally, allow administrators to upload product images with proper size and format validation.

3. **User Checkout Process**  
   Implement a streamlined checkout process where users can purchase the contents of their shopping cart. This process should include:
   - The ability for users to review and confirm their order details.
   - Integration with a secure payment gateway to handle transactions.
   - Sending email notifications to users to confirm their orders.
   - Enabling users to view their order history, track their shipments, and download invoices from their account.

4. **Security and User Data Protection**  
   Implement strong security measures to ensure that sensitive user data, such as payment information, is encrypted and securely stored. Only authorized administrators should have access to manage products, while user data must be handled in compliance with applicable privacy laws.

5. **Future Enhancements**  
   Plan to integrate advanced features such as discount codes, product reviews, and a recommendation engine tailored to users’ purchasing behavior.

## Prerequisites

Before running the project locally, make sure you have:

- PHP >= 7.4 installed
- Symfony CLI installed
- Composer installed
- Node.js and npm installed

## Run Locally

Clone the project

```bash
  https://github.com/Baylox/Freemium.git
```

Install dependencies

```bash
  npm install
  composer install
```

Start the server

```bash
  npm run start
```


## Authors

- [@baylox](https://www.github.com/baylox)



![Symfony](https://img.shields.io/badge/symfony-6.4-purple) 
![PHP](https://img.shields.io/badge/php-8.2.12-blue)



