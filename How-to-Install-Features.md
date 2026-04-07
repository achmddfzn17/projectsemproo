# How to Install Gamification and Digital ID Features

To get the Gamification (Point system & Badges) and Digital ID features working on your local/production environment, follow these steps carefully.

## Requirements
- **PHP >= 8.2**
- **Composer**
- **ext-gd** or **ext-imagick** enabled in your PHP installation.

## Step-by-Step Guide

### 1. Enable GD Extension in PHP (Windows / XAMPP)
The QR Code generation library relies on the `mbstring` and `gd` or `imagick` extensions. If you encounter an error stating `ext-gd is missing` during installation:
1. Open XAMPP Control Panel.
2. Click **Config** on the Apache module and select **PHP (php.ini)**.
3. Search for `;extension=gd` (or `extension=php_gd2.dll` on older PHP versions).
4. Remove the semicolon (`;`) at the beginning to uncomment it:
   ```ini
   extension=gd
   ```
5. Save the file and **Restart Apache**.

### 2. Install the Required Library
Run the following command in the root directory of your project to install the `simple-qrcode` package:

```bash
composer require simplesoftwareio/simple-qrcode
```

*(Note: If you still have trouble with platform requirements in a testing environment, you can append `--ignore-platform-reqs`, though enabling GD correctly is heavily recommended.)*

### 3. Run the Automigrations
The new features include adding a `uuid` and `points` column to your `anggota` members table safely without losing data. To apply these database changes, execute:

```bash
php artisan migrate
```

### 4. How to Use
- **Digital ID Card**: Log in as a member (Anggota). Go to `/anggota/digital-id` to view your responsive glassmorphism ID Card containing your unique QR.
- **Admin Scanner Mode**: By sending a POST request to `/admin/scan-attendance` with the `uuid` from the QR, the admin system validates the member and adds 50 points to them.
- **Leaderboard**: Check the public `/leaderboard` page to see the top 10 most active members grouped by their badges. Badges are dynamic ('Elite Leader' for 300+ points, 'Active Member' for 100+ points, or 'Member').
