-- Insert FSAD Exam
INSERT INTO `exams` (`exam_title`, `duration_minutes`, `end_time`, `created_by`, `created_at`) 
VALUES ('FSAD', 60, '2026-03-26 23:59:59', 1, NOW());

-- Get the exam ID (this will be the last inserted exam)
-- Replace @exam_id with the actual exam_id from the exams table after insertion

-- Insert 50 FSAD and Computer Fundamentals Questions
INSERT INTO `questions` (`exam_id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES

-- Computer Fundamentals (25 questions)
(LAST_INSERT_ID(), 'What does CPU stand for?', 'Central Process Unit', 'Central Processing Unit', 'Central Processor Unit', 'Computer Personal Unit', 'B'),
(LAST_INSERT_ID(), 'Which of the following is not an operating system?', 'Windows', 'Linux', 'Apache', 'macOS', 'C'),
(LAST_INSERT_ID(), 'What is the smallest unit of data in a computer?', 'Byte', 'Bit', 'Kilobyte', 'Megabyte', 'B'),
(LAST_INSERT_ID(), 'What does RAM stand for?', 'Random Access Memory', 'Read Access Module', 'Rapid Allocation Memory', 'Read And Modify', 'A'),
(LAST_INSERT_ID(), 'Which device is used to store data permanently?', 'RAM', 'ROM', 'Cache', 'Register', 'B'),
(LAST_INSERT_ID(), 'What is the purpose of a compiler?', 'To interpret code line by line', 'To convert source code to machine code', 'To execute code', 'To debug code', 'B'),
(LAST_INSERT_ID(), 'Which data structure works on LIFO principle?', 'Queue', 'Stack', 'Array', 'Linked List', 'B'),
(LAST_INSERT_ID(), 'What does HTML stand for?', 'Hyper Text Markup Language', 'High Tech Modern Language', 'Home Tool Markup Language', 'Hyperlinks and Text Markup Language', 'A'),
(LAST_INSERT_ID(), 'What is the time complexity of binary search?', 'O(n)', 'O(log n)', 'O(n^2)', 'O(1)', 'B'),
(LAST_INSERT_ID(), 'Which sorting algorithm has the best average case complexity?', 'Bubble Sort', 'Quick Sort', 'Selection Sort', 'Insertion Sort', 'B'),
(LAST_INSERT_ID(), 'What is a database?', 'A collection of organized data', 'A type of software', 'A programming language', 'A web browser', 'A'),
(LAST_INSERT_ID(), 'Which SQL command is used to retrieve data?', 'UPDATE', 'SELECT', 'INSERT', 'DELETE', 'B'),
(LAST_INSERT_ID(), 'What does API stand for?', 'Application Programming Interface', 'Advanced Programming Integration', 'Application Process Interface', 'Automated Programming Interface', 'A'),
(LAST_INSERT_ID(), 'Which is not a programming paradigm?', 'Object-Oriented', 'Functional', 'Procedural', 'Theoretical', 'D'),
(LAST_INSERT_ID(), 'What is a variable?', 'A fixed value', 'A named storage location', 'A function name', 'A loop statement', 'B'),
(LAST_INSERT_ID(), 'Which data type can store true or false?', 'Integer', 'String', 'Boolean', 'Float', 'C'),
(LAST_INSERT_ID(), 'What does JSON stand for?', 'Java Script Object Notation', 'JavaScript Object Notation', 'Java Standard Object Notation', 'JavaScript Oriented Notation', 'B'),
(LAST_INSERT_ID(), 'Which is a valid HTML element?', '<body>', '<Body>', '<BODY>', 'All of the above', 'D'),
(LAST_INSERT_ID(), 'What is the purpose of CSS?', 'To add styling to web pages', 'To add functionality', 'To manage databases', 'To handle server requests', 'A'),
(LAST_INSERT_ID(), 'Which is not a web browser?', 'Chrome', 'Firefox', 'Safari', 'Windows', 'D'),
(LAST_INSERT_ID(), 'What does URL stand for?', 'Uniform Resource Locator', 'Universal Reference Link', 'Uniform Reference Locator', 'Universal Resource Link', 'A'),
(LAST_INSERT_ID(), 'Which protocol is used for secure web communication?', 'HTTP', 'HTTPS', 'FTP', 'SMTP', 'B'),
(LAST_INSERT_ID(), 'What is a server?', 'A personal computer', 'A machine that provides services to clients', 'A mobile device', 'A printer', 'B'),
(LAST_INSERT_ID(), 'Which is a version control system?', 'GitHub', 'Git', 'both', 'None of the above', 'C'),
(LAST_INSERT_ID(), 'What does IDE stand for?', 'Integrated Development Environment', 'Internal Data Exchange', 'Internet Development Engine', 'Integrated Device Emulator', 'A'),

-- FSAD Specific Questions (25 questions)
(LAST_INSERT_ID(), 'FSAD stands for?', 'Full Stack Application Development', 'Full Secure Application Development', 'Foundation Stack Advanced Development', 'Front Stack Application Deployment', 'A'),
(LAST_INSERT_ID(), 'What are the layers of Full Stack Development?', 'Frontend, Backend, Database', 'Frontend only', 'Backend only', 'Database only', 'A'),
(LAST_INSERT_ID(), 'Which technology is used for frontend development in FSAD?', 'HTML, CSS, JavaScript', 'PHP, MySQL, Apache', 'Java, Spring, Hibernate', 'Python, Django, PostgreSQL', 'A'),
(LAST_INSERT_ID(), 'PHP is primarily used for?', 'Frontend development', 'Backend development', 'Database management', 'UI design', 'B'),
(LAST_INSERT_ID(), 'Which database is commonly used in FSAD?', 'MongoDB', 'MySQL', 'Both MySQL and MongoDB', 'Only NoSQL databases', 'C'),
(LAST_INSERT_ID(), 'What is a REST API?', 'A type of database', 'An architectural style for APIs', 'A programming language', 'A web server', 'B'),
(LAST_INSERT_ID(), 'Which HTTP method is used to retrieve data?', 'POST', 'GET', 'PUT', 'DELETE', 'B'),
(LAST_INSERT_ID(), 'What is MVC pattern?', 'Model-View-Controller', 'Multi-Vertical Component', 'Memory-Verify-Cache', 'Module-Version-Core', 'A'),
(LAST_INSERT_ID(), 'Which technology is used to make web pages interactive?', 'HTML', 'CSS', 'JavaScript', 'PHP', 'C'),
(LAST_INSERT_ID(), 'What is AJAX used for?', 'Creating animations', 'Asynchronous data loading', 'Styling web pages', 'Database management', 'B'),
(LAST_INSERT_ID(), 'Which framework is used for responsive design?', 'Bootstrap', 'Django', 'Spring', 'Laravel', 'A'),
(LAST_INSERT_ID(), 'What is Git used for in FSAD?', 'Database management', 'Code version control', 'Web server management', 'API creation', 'B'),
(LAST_INSERT_ID(), 'Which is a backend framework for PHP?', 'Laravel', 'React', 'Vue.js', 'Angular', 'A'),
(LAST_INSERT_ID(), 'What does a middleware do in web applications?', 'Handles requests between client and server', 'Creates the UI', 'Manages databases', 'Compiles code', 'A'),
(LAST_INSERT_ID(), 'Which is NOT a frontend framework?', 'React', 'Vue.js', 'Angular', 'Django', 'D'),
(LAST_INSERT_ID(), 'What is the purpose of authentication in FSAD?', 'To verify user identity', 'To style web pages', 'To optimize database', 'To compress files', 'A'),
(LAST_INSERT_ID(), 'Which token-based authentication method is commonly used?', 'Session cookies', 'JWT (JSON Web Token)', 'Both', 'None of the above', 'C'),
(LAST_INSERT_ID(), 'What is a webhook?', 'A URL that receives data', 'A programming language', 'A database tool', 'A design pattern', 'A'),
(LAST_INSERT_ID(), 'Which tool is used for API testing?', 'Postman', 'Git', 'VS Code', 'FileZilla', 'A'),
(LAST_INSERT_ID(), 'What is Docker used for?', 'Containerizing applications', 'Styling web pages', 'Creating databases', 'Writing code', 'A'),
(LAST_INSERT_ID(), 'Which is a NoSQL database?', 'MySQL', 'PostgreSQL', 'MongoDB', 'MariaDB', 'C'),
(LAST_INSERT_ID(), 'What is Nginx?', 'A web server', 'A programming language', 'A database', 'A design tool', 'A'),
(LAST_INSERT_ID(), 'Which is used for package management in Node.js?', 'Maven', 'npm', 'Gradle', 'pip', 'B'),
(LAST_INSERT_ID(), 'What is the purpose of environment variables?', 'To store configuration values', 'To create loops', 'To define functions', 'To style elements', 'A'),
(LAST_INSERT_ID(), 'What is cloud deployment used for in FSAD?', 'To host applications on the internet', 'To compile code', 'To design UI', 'To test locally', 'A');
