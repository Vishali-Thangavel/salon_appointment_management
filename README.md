# 💇 Salon Appointment Management System
HTML5 · CSS3 · JavaScript · PHP (PDO) · MySQL — runs on XAMPP.

## Setup
1. **Install XAMPP** (https://www.apachefriends.org).
2. Open XAMPP Control Panel → **Start Apache** and **Start MySQL**.
3. Extract this ZIP and copy the folder `salon-appointment-management` into `C:\xampp\htdocs\` (Mac/Linux: `/opt/lampp/htdocs/`).
4. Open **http://localhost/phpmyadmin** → *Import* → choose `database/salon_management.sql` → *Go*. (This creates the `salon_management` database with sample services and stylists.)
5. Open the folder in **VS Code** (File → Open Folder) to view or edit the code.
6. Visit **http://localhost/salon-appointment-management/setup.php** ONCE to create the demo accounts. Then open **http://localhost/salon-appointment-management/**.

## Test accounts
| Role | Email | Password |
|---|---|---|
| Admin (`/admin/login.php`) | admin@salon.com | admin123 |
| Customer | customer@salon.com | customer123 |

## Using the site
- **Register:** Register → fill form (10-digit phone, password 6+ chars) → Login.
- **Book:** Book Now → choose service, stylist, date, time → Confirm. An Appointment ID is shown.
- **My Appointments:** dashboard with upcoming booking; cancel only *Pending* ones.
- **Admin → Services / Stylists:** Add, Edit, Delete from the lists.
- **Admin → Appointments:** Confirm, Complete or Cancel. **Customers:** view registered users.

## Images
`images/` contains generated artwork with the required filenames. For real photos, download royalty-free images (unsplash.com, pexels.com) and save them over the same filenames (keep `.jpg`). No code change is needed.

## Common errors
| Problem | Fix |
|---|---|
| `Connection refused` / `Unknown database` | Start MySQL; import the SQL file (step 4). |
| Access denied for user 'root' | Edit `config/database.php` and set your MySQL password. |
| Port 80 busy / Apache won't start | Close Skype/IIS, or change Apache port in XAMPP config. |
| 404 Not Found | Folder name/location must be `htdocs/salon-appointment-management`. |
| Login fails | Run `setup.php` once (it creates the hashed passwords). |
| Blank page | Make sure you open via `http://localhost/...`, not by double-clicking the file. |
