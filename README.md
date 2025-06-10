# Canada Trip Booking System

A Laravel-based trip booking platform for Canadian travel destinations with administrative dashboard.

## Overview

This application provides a comprehensive booking system for trips across Canada's four regions: West, East, North, and Central. The platform features both a public API for trip browsing and booking, as well as an administrative interface for managing trips and bookings.

## Features

### Public API

- Browse available trips across Canadian regions
- Create new bookings with email validation
- Token-based booking verification system

### Admin Dashboard

- View all trips with booking statistics
- Monitor booking counts by status (pending, confirmed, cancelled)
- Track revenue per trip
- Manage trip and booking records
- Update booking statuses
- Delete trips and bookings

## Architecture

The application follows clean architecture principles with proper separation of concerns:

- **Controllers**: Handle HTTP requests and responses
- **Services**: Contain business logic and data processing
- **Repositories**: Database interaction layer
- **Form Requests**: Input validation and sanitization
- **Resources**: API response formatting
- **Constants**: Centralized status codes and messages

## Database Structure

### Trips

- Title, region, start date, duration, pricing
- Soft deletes supported
- Relationship with bookings

### Bookings

- Customer information (name, email)
- Trip association and party size
- Status tracking (pending/confirmed/cancelled)
- Revenue calculation

## Authentication

Basic authentication system for administrative access. Admin users can access the dashboard to manage the entire system through a web interface.

## API Endpoints

- `GET /api/trips` - List all available trips
- `POST /api/bookings` - Create a new booking
- `GET /api/bookings` - List all bookings

## Technology Stack

- **Framework**: Laravel 11
- **Database**: MySQL/SQLite
- **Frontend**: Blade templates with Bootstrap 5
- **Authentication**: Laravel's built-in auth system

## Project Structure

The codebase maintains Laravel conventions while implementing clean architecture patterns for maintainability and testability.

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
