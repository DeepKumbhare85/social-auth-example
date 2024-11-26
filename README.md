# Laravel Social Authentication Example with Google

This project demonstrates how to implement Google OAuth authentication in a Laravel application using Laravel Socialite. It provides a simple and secure way to allow users to log in to your application using their Google accounts.


## Prerequisites

Before you begin, ensure you have the following installed:
- PHP >= 8.1
- Composer
- MySQL or any other compatible database
- Node.js and npm (for frontend assets)
- Google Cloud Console account

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/social-auth-example.git
cd social-auth-example
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install and compile frontend dependencies:
```bash
npm install
npm run dev
```

4. Create a copy of the `.env` file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in the `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

7. Run database migrations:
```bash
php artisan migrate
```

## Google OAuth Configuration

1. Go to the [Google Cloud Console](https://console.cloud.google.com)
2. Create a new project or select an existing one
3. Enable the Google+ API
4. Go to Credentials → Create Credentials → OAuth Client ID
5. Configure the OAuth consent screen
6. Create OAuth 2.0 Client ID credentials
7. Add your application URLs to the authorized redirect URIs:
   - `http://localhost:8000/auth/google/callback` (for local development)
   - `https://yourdomain.com/auth/google/callback` (for production)

8. Add the following to your `.env` file:
```env
GOOGLE_CLIENT_ID=your_client_id_here
GOOGLE_CLIENT_SECRET=your_client_secret_here
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

## Running the Application

1. Start the Laravel development server:
```bash
php artisan serve
```

2. Visit `http://localhost:8000` in your browser

## Usage

1. Click on the "Login with Google" button
2. Select your Google account
3. Allow the requested permissions
4. You will be redirected back to the application and logged in

## Contributing

Feel free to submit issues and enhancement requests.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
