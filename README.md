# EliteShop - Premium E-commerce Platform [![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

**EliteShop** is a modern, responsive e-commerce platform designed for premium online shopping experiences. Built with PHP backend, MySQL database, and featuring a sleek Bootstrap 5 frontend with custom animations and glassmorphism design elements.

## ✨ Features
- **Modern UI/UX** with gradient backgrounds and smooth animations
- **Responsive design** that works on all devices
- **User authentication** with secure login/signup system
- **Shopping cart** functionality with product images
- **Product categories** with hover effects and animations
- **Professional contact form** integration
- **Secure payment processing** ready

## 🛠 Technologies
- **Backend**: [PHP](https://www.php.net/docs.php) - Server-side logic and database operations
- **Frontend**: [Bootstrap 5](https://getbootstrap.com) - Modern responsive framework
- **Database**: [MySQL](https://www.mysql.com) - Reliable data storage
- **Styling**: Custom CSS with animations and glassmorphism effects
- **Icons**: [Font Awesome 6](https://fontawesome.com) - Modern icon library
- **Forms**: [Formspree](https://formspree.io) - Contact form handling

## 🚀 Quick Setup Guide

### Prerequisites
- **XAMPP/MAMP** - Local development environment
- **Web browser** - Chrome, Firefox, Safari, or Edge

### Installation Steps
1. **Start your local server**
   - Launch **XAMPP** or **MAMP**
   - Start **Apache** and **MySQL** services

2. **Create database**
   - Open **phpMyAdmin** at `http://localhost/phpMyAdmin/`
   - Create a new database named **"ecommerce"**

3. **Import database structure**
   - Select the "ecommerce" database
   - Go to **Import** tab
   - Choose the **ecommerce.sql** file from the project folder
   - Click **Go** to import

4. **Deploy the application**
   - Copy the **Online-Store** folder to your htdocs directory
   - For XAMPP: `C:\xampp\htdocs\`
   - For MAMP: `/Applications/MAMP/htdocs/`

5. **Access the website**
   - Open your browser
   - Navigate to `http://localhost/Online-Store/`
   - Enjoy your premium shopping experience!

## 💡 Configuration Notes
- **Contact Form**: Replace `YOUR_FORM_ID` in `about.php` with your actual Formspree form ID
- **Database**: Default connection uses `localhost`, `root` user with `root` password
- **Currency**: All prices are displayed in USD ($)
- **Images**: Product images are stored in the `images/` directory

## 🔧 Before Using
1. **Set up Formspree**: Create account at [formspree.io](https://formspree.io) and replace `YOUR_FORM_ID` in `about.php`
2. **Database Setup**: Import the `ecommerce.sql` file to create tables with sample data
3. **Local Testing**: Ensure XAMPP/MAMP is running before accessing the site

## 🎨 Design Features
- **Professional color palette** with blue, green, and orange gradients
- **Smooth animations** and hover effects throughout
- **Glassmorphism elements** for modern visual appeal
- **Custom scrollbar** and loading animations
- **Mobile-first responsive design**


---
*Built with ❤️ for modern e-commerce experiences*