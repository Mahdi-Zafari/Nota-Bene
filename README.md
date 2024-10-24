<p align="center">
  <img width="100" height="100" alt="Nota Bene logo" src="public/images/app_logo_circle.png">
</p>

<h1 align="center">Nota Bene</h1>
<h6 align="center">Task Management System</h6>

<p align="center">
  <a href="https://github.com/Mahdi-Zafari/Nota-Bene/releases">
    <img src="https://img.shields.io/github/v/release/Mahdi-Zafari/Nota-Bene?label=Version" alt="GitHub release">
  </a>
</p>

## Contents

- [Introduction](#nota-bene-introduction)  
- [Features](#features)  
- [Installation Guide](#installation-guide)  
  - [Prerequisites](#prerequisites)  
  - [Installation](#installation)  
- [Contributing](#contributing)  
- [License](#license)  

## Nota Bene Introduction
**Nota Bene** is a flexible and lightweight daily task management system designed to help users manage their daily activities efficiently. The project is built using **Laravel** and offers a simple yet powerful interface for managing tasks, organizing priorities, and keeping track of completed and in-progress tasks.

### Features

> [!IMPORTANT]
> 
> 1. **Task Management**
>    - Create, update, and delete tasks
>    - Categorize tasks by status (Pending, In Progress, Completed)
> 
> 2. **User Interface**
>    - Clean and customizable user interface
>    - Dark mode support
> 
> 3. **Task Deadlines**
>    - Set due dates for tasks
> 
> 4. **Tags**
>    - Add tags to tasks for easy filtering and management

## Installation Guide
To install and run **Nota Bene**, follow these steps:

### Prerequisites
Make sure your system meets the following requirements:
- **PHP:** Version 8.2 or higher
- **Laravel:** Version 11.x
- **Composer:** Latest version
- **Database:** MySQL or SQLite

### Installation

1. **Clone the Repository**  
   Clone this repository to your local machine:
   ```bash
   git clone https://github.com/Mahdi-Zafari/Nota-Bene.git
   ```

2. **Install Dependencies**  
   Navigate to the project directory and install dependencies:
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**  
   Create a `.env` file by copying the example file and configure your database settings:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run Migrations**  
   Set up the database by running the following:
   ```bash
   php artisan migrate
   ```

5. **Serve the Application**  
   Start the development server:
   ```bash
   php artisan serve
   ```

## License
This project is licensed under the **MIT License**. Please see the [LICENSE](./LICENSE) file for more details.
