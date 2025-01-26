# Advanced Real-Time Sales Analytics System

This system, named "real_time_sales_analytics_system", allows you to manage and analyze sales data in real-time. It provides APIs for managing orders, analytics, and integrating external services. The system also includes real-time reporting and AI integration for dynamic product recommendations based on sales data. Additionally, it integrates with a weather API to adjust recommendations based on seasonality.

The system features:
- Real-time order management and reporting.
- Sales insights (total revenue, top products, and real-time order count).
- AI-powered recommendations for product promotions.
- Weather-based dynamic pricing and promotion adjustments.
- WebSocket integration for real-time updates.

## Desgin Pattern 
  - Service Repository Design Pattern.
  - form request for validation
  - resources to handle responce

## Prerequisites

Before you begin, make sure you have the following installed:

- **PHP** >= 8.2
- **Composer** (for managing PHP dependencies)
- **Laravel** >= 10 (for the backend framework)
- **MySQL** (for database management)
## Setup Instructions

1. **Clone the Repository:**

    ```bash
    https://github.com/AhmedHassan199/sales-analytics.git
    cd sales-analytics
    ```

2. **Install Dependencies:**

    ```bash
    composer install
    ```

    This will install the required PHP dependencies listed in `composer.json`
    

3. **Configure Environment:**

    - Duplicate the `.env.example` file and rename it to `.env`.
    - Configure your database settings in the `.env` file.
    - Make sure you set the appropriate `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` values for your MySQL setup.

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

    This will generate the application key for Laravel to encrypt data and sessions.

5. **Run Migrations and Seeders:**

    ```bash
    php artisan migrate
    ```

    This will create the necessary database tables and seed initial data for the application (including the admin user and necessary roles).

6. **Start the Development Server:**

    ```bash
    php artisan serve
    ```


    ## API Endpoints

### Orders
- `POST /orders`: Add a new order with the following fields:
  - `product_id` (integer)
  - `quantity` (integer)
  - `price` (decimal)
  - `date` (datetime)

### Analytics
- `GET /analytics`: Retrieve real-time sales analytics, including:
  - `total_revenue`: Total revenue from all orders.
  - `top_products`: Top-selling products by quantity or revenue.
  - `revenue_changes_last_minute`: Revenue change in the last 1 minute.
  - `order_count_last_minute`: Number of orders placed in the last 1 minute.

### Recommendations
- `GET /recommendations`: Retrieve product promotion suggestions based on recent sales data.
  - Uses AI to recommend products for promotion to increase revenue.

### Real-Time Reporting
- **WebSocket Support**: Clients can subscribe to real-time updates on:
  - New orders
  - Updated analytics

## Entity-Relationship Diagram (ERD)

### Users
- `id` (Primary Key)
- `name`
- `email`
- `password`
- `role` (Enum: 'admin', 'author', 'client')
- `created_at`
- `updated_at`

### Orders
- `id` (Primary Key)
- `user_id` (Foreign Key referencing `users.id`)
- `product_id` (Foreign Key referencing `products.id`)
- `quantity` (Integer)
- `price` (Decimal)
- `date` (Datetime)
- `created_at`
- `updated_at`

### Products
- `id` (Primary Key)
- `name` (String, required)
- `category_id` (Foreign Key referencing `categories.id`)
- `price` (Decimal, required)
- `created_at`
- `updated_at`

### 1. **OpenWeather API Key (Weather Integration)**
### 2. **Caht API Key **

In this project, parts of the code were generated or assisted by AI (using **OpenAI's ChatGPT**), while others were written manually.





