# **Advanced Real-Time Sales Analytics System**

Welcome to the **Real-Time Sales Analytics System**, a cutting-edge platform designed to empower businesses with real-time insights and AI-powered recommendations to boost revenue. This system offers seamless management and analysis of sales data, featuring powerful APIs, real-time reporting, AI integration, and external weather-based adjustments for dynamic pricing.

## Key Features
- **Real-Time Order Management**: Capture, track, and manage orders instantly.
- **Comprehensive Sales Insights**: Visualize total revenue, top-selling products, and instant changes in sales.
- **AI-Powered Product Recommendations**: Leverage AI to generate strategic product promotions based on sales data.
- **Weather-Driven Dynamic Pricing**: Adjust promotions and pricing based on real-time weather data.
- **WebSocket Integration**: Get real-time updates and notifications directly to your front-end.

## Design Patterns Utilized
- **Service Repository Design Pattern**: To ensure maintainable, clean, and modular code.
- **Form Requests**: For secure and validated input handling.
- **API Resources**: To structure and standardize API responses effectively.

## Prerequisites

Ensure you have the following tools installed before getting started:

- **PHP** >= 8.2
- **Composer** (for managing PHP dependencies)
- **Laravel** >= 10 (backend framework)
- **MySQL** (database management system)

## Setup Instructions

1. **Clone the Repository:**

    ```bash
    git clone https://github.com/AhmedHassan199/sales-analytics.git
    cd sales-analytics
    ```

2. **Install Dependencies:**

    ```bash
    composer install
    ```

    This installs the necessary PHP packages listed in the `composer.json`.

3. **Configure Your Environment:**

    - Duplicate `.env.example` and rename it to `.env`.
    - Set up your database configuration in the `.env` file, updating the `DB_*` values to match your MySQL settings.

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

    This generates the app key for encrypted sessions and data security.

5. **Run Migrations and Seeders:**

    ```bash
    php artisan migrate --seed
    ```

    This will create the database tables and populate them with initial data, including the default admin user.

6. **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    Your server will start running on `http://127.0.0.1:8000`.

---

## **API Endpoints**

### **Orders**
- **POST /orders**: Create a new order with the following data:
  - `product_id` (integer)
  - `quantity` (integer)
  - `price` (decimal)
  - `date` (datetime)

### **Analytics**
- **GET /analytics**: Retrieve live sales data and insights:
  - `total_revenue`: Total revenue from all orders.
  - `top_products`: Top-selling products (by quantity or revenue).
  - `revenue_changes_last_minute`: Sales fluctuations within the last minute.
  - `order_count_last_minute`: Number of orders in the last minute.

### **Recommendations**
- **GET /recommendations**: Get AI-powered suggestions on which products to promote based on recent sales data.

### **Real-Time Reporting**
- **WebSocket Integration**: Subscribe to real-time updates for:
  - New orders
  - Updated analytics

---

## **Entity-Relationship Diagram (ERD)**

### **Users**
- `id` (Primary Key)
- `name`
- `email`
- `password`
- `role` (Enum: 'admin', 'author', 'client')
- `created_at`
- `updated_at`

### **Orders**
- `id` (Primary Key)
- `user_id` (Foreign Key referencing `users.id`)
- `product_id` (Foreign Key referencing `products.id`)
- `quantity` (Integer)
- `price` (Decimal)
- `date` (Datetime)
- `created_at`
- `updated_at`

### **Products**
- `id` (Primary Key)
- `name` (String, required)
- `category_id` (Foreign Key referencing `categories.id`)
- `price` (Decimal, required)
- `created_at`
- `updated_at`

---

## **External API Integrations**

1. **OpenWeather API Key** (For Weather Integration)
    - Ensure you have a valid OpenWeather API key to enable dynamic product recommendations based on current weather.

2. **ChatGPT API Key** (For AI Recommendations)
    - AI-assisted product promotion suggestions are powered by **OpenAI's ChatGPT**. You will need an API key for access.

---

## **AI-Assisted Code Generation**

Parts of this project were generated or assisted by AI (via **OpenAI's ChatGPT**), which helped generate API structure and code for recommendations. However, all database logic, API integrations, and real-time reporting were implemented manually to ensure control over the core functionality.

---

