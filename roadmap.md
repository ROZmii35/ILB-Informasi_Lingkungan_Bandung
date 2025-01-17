# Environment Website

An environment-focused website built with Laravel to promote eco-tourism in the Bandung area and address garbage issues reported by users.

## Features

1. **Tourist Environment Section**
   - Showcase eco-friendly tourist destinations in Bandung.
   - Include images, descriptions, and locations with map integration.

2. **User Garbage Reporting**
   - Allow users to report garbage issues in Bandung.
   - Users can provide location details, descriptions, and upload images.

3. **CRUD Data Table for Garbage Information**
   - Admins can manage (Create, Read, Update, Delete) garbage reports.
   - Display reports in a sortable and filterable table with pagination.

4. **Authentication System**
   - Regular users can submit reports.
   - Admins have permissions to manage reports and website data.

5. **Interactive Map**
   - Visualize reported garbage locations using an interactive map.

6. **Analytics and Reports**
   - Provide insights on garbage hotspots and resolution statistics.

---

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-repo/environment-website.git
   cd environment-website
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Set Up Environment Variables**
   Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```
   Configure the following:
   - `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` for your database.
   - `MAP_API_KEY` for map integration (if using Google Maps).

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   ```bash
   php artisan migrate
   ```

6. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

7. **Create Admin User**
   ```bash
   php artisan tinker
   ```
   Then run:
   ```php
   \App\Models\User::create([
       'name' => 'Admin',
       'email' => 'admin@example.com',
       'password' => Hash::make('password123'),
       'is_admin' => true
   ]);
   ```

8. **Run the Application**
   ```bash
   php artisan serve
   ```

   Access the website at [http://localhost:8000](http://localhost:8000).

---

## Accessing the Website

### Public Access
1. Visit homepage: `http://localhost:8000`
2. View eco-tourism destinations: Click "Kunjungi halaman wisata" on homepage
3. Register/Login: Use links in top navigation

### Regular User Access
1. Login with your credentials
2. Submit garbage reports:
   - Click "Buat laporan" on homepage
   - Fill in location details
   - Upload images (optional)
   - Submit report

### Admin Access
1. Login with admin credentials:
   - Email: admin@example.com
   - Password: password123
2. Access admin panel: `http://localhost:8000/admin/dashboard`
3. Admin features:
   - View dashboard statistics
   - Manage garbage reports (CRUD)
   - View analytics and reports
   - Monitor user submissions

### Important URLs
- Homepage: `/`
- Tourist Environment: `/tourist-environment`
- Login: `/login`
- Register: `/register`
- Report Garbage: `/garbage-reporting`
- Admin Dashboard: `/admin/dashboard`
- Admin Reports: `/admin/reports`
- Admin Analytics: `/admin/analytics`

---

## Tech Stack

- **Backend:** Laravel
- **Frontend:** Blade Templates, Tailwind CSS, AdminLTE
- **Database:** MySQL
- **Maps Integration:** Leaflet.js or Google Maps API
- **Charts:** Chart.js or Laravel Charts
- **Authentication:** Laravel Built-in Auth

---

## Contributing

1. Fork the repository.
2. Create a new branch for your feature or bugfix.
3. Commit your changes and open a pull request.

---

## License

This project is licensed under the MIT License. See the LICENSE file for details.
