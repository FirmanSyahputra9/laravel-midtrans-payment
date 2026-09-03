# Laravel Midtrans Payment

A Laravel-based payment gateway integration using Midtrans Snap API with the Sandbox environment.

## Features

- Midtrans Snap payment integration
- Sandbox payment environment
- Dynamic payment amount
- Customer name and email input
- Automatic order ID generation
- Payment popup using Midtrans Snap
- Server-side validation
- CSRF protection
- Responsive payment interface
- No database required

## Tech Stack

- PHP 8.5+
- Laravel 13
- Midtrans Snap API
- Tailwind CSS
- JavaScript
- Vite

## Requirements

- PHP 8.5 or later
- Composer
- Node.js and NPM
- Laravel
- Midtrans Sandbox Account

## Installation

Clone the repository:

```bash
git clone https://github.com/your-username/laravel-midtrans-payment.git
cd laravel-midtrans-payment
```

Install PHP dependencies:

```bash
composer install
```

Copy the environment file:

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

Install frontend dependencies:

```bash
npm install
```

Build frontend assets:

```bash
npm run build
```

## Midtrans Configuration

Add your Midtrans Sandbox credentials to `.env`:

```env
MIDTRANS_SERVER_KEY=your-server-key
MIDTRANS_CLIENT_KEY=your-client-key
MIDTRANS_IS_PRODUCTION=false
MIDTRANS_IS_SANITIZED=true
MIDTRANS_IS_3DS=true
```

You can get your Sandbox credentials from the Midtrans Dashboard.

## Run the Application

Start the Laravel development server:

```bash
php artisan serve
```

Open the application:

```text
http://127.0.0.1:8000
```

## Payment Flow

1. Enter the customer name.
2. Enter the customer email.
3. Enter the payment amount.
4. Click the payment button.
5. Laravel creates a Midtrans Snap Token.
6. Midtrans Snap opens the payment popup.
7. Complete the payment using a Sandbox payment method.

## Sandbox Testing

This project uses the Midtrans Sandbox environment, so transactions do not use real money.

Example Sandbox card:

```text
Card Number     : 4811 1111 1111 1114
CVV             : 123
Expiration Date : now()->format('m/y')
OTP / 3DS       : 112233
```

The test credentials above are intended for Midtrans Sandbox testing only.

## Project Structure

```text
laravel-midtrans-payment/
├── app/
│   └── Http/
│       └── Controllers/
│           └── PaymentController.php
├── config/
│   └── midtrans.php
├── resources/
│   └── views/
│       └── welcome.blade.php
├── routes/
│   └── web.php
├── .env.example
├── composer.json
├── package.json
└── README.md
```

## Security

Never commit your `.env` file or expose your Midtrans Server Key.

Store sensitive credentials in environment variables:

```env
MIDTRANS_SERVER_KEY=your-server-key
MIDTRANS_CLIENT_KEY=your-client-key
```

Only `.env.example` should be committed to the repository.

## License

This project is available for learning and demonstration purposes.
