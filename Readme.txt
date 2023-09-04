HTML Element Counter Project README

Project Description:
This project allows you to count the occurrences of a specific HTML element on a web page provided by a URL. It also provides statistics on the URLs and elements counted.

Project Files:
- index.html: The main HTML file for the project.
- count_elements.php: The PHP script for counting HTML elements and storing data in a MySQL database.
- statistics.php: The PHP script for displaying statistics.
- header.html: The header HTML file for statistics.php.
- footer.html: The footer HTML file for statistics.php.
- styles.css: The CSS file for styling the HTML pages.
- README.txt: This file, providing project setup instructions.

Project Setup:
1. Web Server and Database:
   - Set up a web server with PHP support (e.g., XAMPP, WAMP, or your preferred local server).
   - Create a MySQL database for this project.

2. Database Configuration:
   - Open the `count_elements.php` file.
   - Update the database connection parameters (host, username, password, and database name) in the script.

3. SQL Database Setup:
   - Run the SQL queries in `create_tables.sql` to create the necessary database tables.

4. File Placement:
   - Place all project files (HTML, PHP, CSS) in your web server's root directory.

5. Access the Project:
   - Open a web browser and navigate to the project's URL (e.g., http://localhost/index.html).

Usage Instructions:
1. Visit the project URL in your web browser.  " For example you can visit this website { https://www.timesjobs.com/ } ".

2. Enter a URL of a web page you want to analyze and the HTML element name you want to count.  " For example you can input this HTML element { img } ".

3. Click the "Count Elements" button to fetch and count the elements on the provided URL.

4. The response will be displayed  up, showing the URL, timestamp, response time, and element count.

5. Click the "Reload Page" button to start a new analysis.

Project Structure:
- The project uses HTML, PHP, CSS, and MySQL.
- AJAX is used for asynchronous communication between the HTML form and `count_elements.php`.

Additional Notes:
- Error handling and input validation are implemented in the PHP script.
- Caching of responses is implemented to improve performance.
- Statistics on URLs and elements are displayed in the `statistics.php` page.

Software Used for Testing:
- Web Server: [Insert Name of Web Server]
- Database: [Insert Name of Database]
- Web Browsers: [List of Web Browsers Tested]

Time Spent on Project:
- Planning: [7 Hours]
- Development: [48Hours]
- Testing: [1Hours]
- Deployment: [2Hours 45minutes]

Project Author: Emmanuel Okpanum
Contact Information: Ebusokpams@gmail.com

Enjoy using the HTML Element Counter project! 
Thank you!.
