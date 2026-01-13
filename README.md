# Product Management System - LAUGFS Assessment

Complete product management system with Laravel backend API and Flutter mobile application.

## Candidate Information
- **Name:** Umesha
- **Position:** Associate Software Engineer
- **Submission Date:** January 13, 2026

## Project Structure
```
laugfs-assessment/
├── product-api/        # Laravel Backend API
└── product_app/        # Flutter Mobile Application
```

## Technologies Used

**Backend:** Laravel 11, PHP 8.0+, MySQL  
**Frontend:** Flutter, Dart, Material Design

## Features

### Backend API
- RESTful API endpoints for product management
- Database migrations for products and categories
- Input validation and error handling
- MySQL database integration

### Mobile Application
- Product creation form with validation
- Category dropdown selection
- Price input with number validation
- Active/Inactive status toggle
- Real-time API integration
- Success/Error notifications with custom color scheme (#249E94, #EEEEEE)

---

## Setup Instructions

### Prerequisites
- PHP 8.0 or higher
- Composer
- MySQL
- Flutter SDK
- Android Studio

### Backend Setup (Laravel)

1. Navigate to backend folder:
```bash
cd product-api
```

2. Install dependencies:
```bash
composer install
```

3. Create and configure `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=product_db
DB_USERNAME=root
DB_PASSWORD=
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Create database:
```sql
CREATE DATABASE product_db;
```

6. Run migrations:
```bash
php artisan migrate
```

7. Seed sample categories:
```bash
php artisan db:seed --class=ProductCategorySeeder
```

8. Start server:
```bash
php artisan serve
```

API will be available at: `http://localhost:8000`

### Frontend Setup (Flutter)

1. Navigate to frontend folder:
```bash
cd product_app
```

2. Install dependencies:
```bash
flutter pub get
```

3. Update API URL in `lib/main.dart` (line 43):
   - For Android Emulator: `http://10.0.2.2:8000/api`
   - For Physical Device: `http://YOUR_COMPUTER_IP:8000/api`

4. Run the application:
```bash
flutter run
```

---

## API Documentation

### Endpoints

**Get Categories**
```
GET /api/categories
```

Response:
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Electronics",
      "active": true
    }
  ]
}
```

**Create Product**
```
POST /api/products
Content-Type: application/json
```

Request:
```json
{
  "name": "Samsung Galaxy S24",
  "category_id": 1,
  "price": 89999,
  "active": true
}
```

Success Response (201):
```json
{
  "success": true,
  "message": "Product created successfully",
  "data": {
    "id": 1,
    "name": "Samsung Galaxy S24",
    "category_id": 1,
    "price": 89999,
    "active": true
  }
}
```

Error Response (422):
```json
{
  "success": false,
  "errors": {
    "name": ["The name field is required."]
  }
}
```

### Validation Rules

- **name**: required, string, max 255 characters
- **category_id**: required, must exist in product_categories table
- **price**: required, numeric, minimum 0
- **active**: required, boolean

---

## Database Schema

### product_categories
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | varchar(255) | Category name |
| active | boolean | Active status |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

### products
| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| name | varchar(255) | Product name |
| category_id | bigint | Foreign key to categories |
| price | decimal(10,2) | Product price |
| active | boolean | Active status |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Update timestamp |

---

## Mobile App Features

### Form Inputs
1. **Product Name** - Text input with required validation
2. **Category** - Dropdown populated from API
3. **Price** - Numeric input with validation
4. **Active Status** - Toggle switch (ON/OFF)

### User Experience
- Loading indicators during API calls
- Success notifications (teal #249E94)
- Error notifications (red)
- Automatic form clearing after successful submission
- Input validation with error messages
- Clean, modern Material Design UI

### Color Scheme
- Primary: #249E94 (Teal)
- Background: #EEEEEE (Light Gray)
- Success: Teal
- Error: Red

---

## Testing

### Test Backend API

Using cURL:
```bash
curl -X POST http://localhost:8000/api/products \
  -H "Content-Type: application/json" \
  -d '{"name":"Test Product","category_id":1,"price":1000,"active":true}'
```

Using Postman:
1. Create POST request to `http://localhost:8000/api/products`
2. Set header: `Content-Type: application/json`
3. Add JSON body with product data
4. Send request

### Test Mobile App

1. Ensure Laravel server is running: `php artisan serve`
2. Run Flutter app: `flutter run`
3. Fill in all form fields
4. Click "Add Product" button
5. Verify success message appears
6. Check database for new product entry

---

## Project Files

### Backend (product-api)
- `app/Http/Controllers/ProductController.php` - API controller
- `app/Models/Product.php` - Product model
- `app/Models/ProductCategory.php` - Category model
- `database/migrations/` - Database migrations
- `database/seeders/ProductCategorySeeder.php` - Sample data seeder
- `routes/api.php` - API routes

### Frontend (product_app)
- `lib/main.dart` - Complete application (305 lines including UI, validation, API integration)
- `pubspec.yaml` - Dependencies (Flutter SDK, http package)

---

## Sample Data

The ProductCategorySeeder creates these categories:
1. Electronics
2. Clothing
3. Food & Beverages
4. Books
5. Furniture

---

## Troubleshooting

**Backend Issues:**

- **"Unknown database 'product_db'"**: Create the database first using MySQL/phpMyAdmin
- **"No application encryption key"**: Run `php artisan key:generate`
- **Routes not found**: Run `php artisan route:clear` and `php artisan config:clear`

**Frontend Issues:**

- **"Error loading categories"**: Ensure Laravel API is running and accessible
- **Network error on emulator**: Use `10.0.2.2` instead of `localhost`
- **Network error on physical device**: Update API URL to computer's IP address and ensure same WiFi network

---

## Dependencies

### Backend
```json
{
  "php": "^8.0",
  "laravel/framework": "^11.0"
}
```

### Frontend
```yaml
dependencies:
  flutter:
    sdk: flutter
  http: ^1.2.0
```

---

## Notes

- Mobile app requires active internet connection
- Laravel backend must be running before using mobile app
- First Flutter build takes 5-10 minutes, subsequent builds 30-60 seconds
- For production, update API URLs and add authentication
- Code follows Laravel and Flutter best practices
- Input validation implemented on both frontend and backend

---

## Building for Release

**Android APK:**
```bash
cd product_app
flutter build apk --release
```

Output: `build/app/outputs/flutter-apk/app-release.apk`

**Android App Bundle:**
```bash
flutter build appbundle --release
```

Output: `build/app/outputs/bundle/release/app-release.aab`

---

## Assessment Requirements Checklist

- ✅ Database migrations for product_categories and products tables
- ✅ Laravel API endpoint to save products with validation
- ✅ Flutter mobile form with all required fields
- ✅ Category dropdown populated from API
- ✅ Price and active status inputs
- ✅ Form submits data to Laravel API
- ✅ Proper error handling and user feedback
- ✅ Clean, functional UI with custom color scheme
- ✅ Complete source code in repository

---

## Contact

For any questions regarding this submission, please contact through the provided assessment channels.
