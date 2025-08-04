<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Developer CV</title>
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2ecc71;
            --dark: #2c3e50;
            --light: #ecf0f1;
            --accent: #e74c3c;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .badge-cv {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .badge-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 25px;
            text-align: center;
            position: relative;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .badge-header h1 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .badge-header p {
            font-size: 1rem;
            opacity: 0.9;
        }

        .badge-content {
            padding: 25px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            color: var(--dark);
            font-size: 1.2rem;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid var(--light);
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .skill {
            background-color: var(--light);
            color: var(--dark);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .contact-info p {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .contact-info i {
            margin-right: 10px;
            color: var(--primary);
            width: 20px;
            text-align: center;
        }

        .projects .project {
            margin-bottom: 15px;
        }

        .projects .project h4 {
            color: var(--dark);
            margin-bottom: 5px;
        }

        .projects .project p {
            font-size: 0.9rem;
            color: #666;
        }

        .badge-footer {
            background-color: var(--dark);
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 0.8rem;
        }

        @media (max-width: 480px) {
            .badge-cv {
                max-width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="badge-cv">
        <div class="badge-header">
            <!-- Replace with your image -->
<img src="/assets/img/abd.jpeg" alt="Profile Picture" class="profile-img">  <!-- If public is the root -->
          <h1>Abd Alrhman Altair</h1>
            <p>Web Developer</p>
        </div>

        <div class="badge-content">
            <div class="section">
                <h3 class="section-title">About Me</h3>
                <p>Passionate web developer specializing in laravel,HTML, PHP, and JavaScript. I create responsive,
                    user-friendly websites with clean code and modern design principles.</p>
            </div>

            <div class="section">
                <h3 class="section-title">Skills</h3>
                <div class="skills">
                    <span class="skill">HTML5</span>
                    <span class="skill">CSS3</span>
                    <span class="skill">JavaScript</span>
                    <span class="skill">PHP</span>
                    <span class="skill">MySQL</span>
                    <span class="skill">jQuery</span>
                    <span class="skill">Bootstrap</span>
                    <span class="skill">Git</span>
                    <span class="skill">Laravel</span>

                    <span class="skill">Responsive Design</span>
                    <span class="skill">API Integration</span>
                </div>
            </div>

            <div class="section">
                <h3 class="section-title">Projects</h3>
                <div class="projects">
                    <div class="project">
                        <h4>E-commerce Website</h4>
                        <p>Built with PHP(laravel) and MySQL, featuring product management and payment integration.</p>
                    </div>
                    <div class="project">
                        <h4>Task Management App</h4>
                        <p>JavaScript application with local storage functionality.</p>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3 class="section-title">Contact</h3>
                <div class="contact-info">
                    <p><i class="fas fa-envelope"></i> abd.alrhman.it00@gmail.com</p>
                    <p><i class="fas fa-phone"></i> +963 956 674 210</p>
                    <p><i class="fas fa-globe"></i> flycart.com</p>
                    <p><i class="fab fa-github"></i> github.com/yourusername</p>
                </div>
            </div>
        </div>

        <div class="badge-footer">
            &copy; 2025 | HTML • PHP • JavaScript • Laravel Developer
        </div>
    </div>
</body>

</html>
