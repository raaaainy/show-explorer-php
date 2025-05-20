# show-explorer-php

This is a simple PHP app that fetches data from the [TVmaze API](https://www.tvmaze.com/api) and displays a list of episodes using Bootstrap cards. Each episode card includes:

- Episode image
- Episode title
- Description/summary
- Season and episode number

## Features

- Uses PHP to make an API request to TVmaze
- Loads episode data from the API and displays it dynamically
- Clean and responsive UI with Bootstrap 5
- Allows specifying a show by adding `?show=ID` at the end of the URL
- Defaults to show ID 1 if no ID is provided

## How to Run

1. Clone this repository:

   ```bash
   git clone https://github.com/yourusername/show-explorer-php.git
2. Change into the project directory:

   ```bash
   cd show-explorer-php
3. Run a local PHP server (you need PHP installed):

   ```bash
   php -S localhost:8000
4. Open your browser and visit:

   ```bash
   http://localhost:8000
5. (Optional) To view a specific show, add the show ID as a query parameter, for example:

   ```bash
   http://localhost:8000/?show=82

## Technologies Used

- PHP
- Bootstrap 5
- TVmaze API
