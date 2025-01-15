<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px;
            border-bottom: 2px solid #007E00;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            color: #007E00;
        }

        .header p {
            font-size: 18px;
            margin: 5px 0;
            color: #555;
        }

        .section {
            margin: 20px 0;
        }

        .section h2 {
            color: #007E00;
            font-size: 20px;
            border-left: 5px solid #007E00;
            padding-left: 10px;
            margin-bottom: 10px;
        }

        .info {
            display: flex;
            justify-content: space-between;
        }

        .info .left,
        .info .right {
            width: 48%;
        }

        .info ul {
            list-style: none;
            padding: 0;
        }

        .info ul li {
            margin-bottom: 8px;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skills span {
            background: #007E00;
            color: #fff;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>John Doe</h1>
            <p>Software Engineer | johndoe@example.com | +123-456-7890</p>
        </div>

        <div class="section">
            <h2>Profile</h2>
            <p>I am a passionate software engineer with 5+ years of experience in developing scalable web applications
                and innovative software solutions. Seeking to leverage my expertise in full-stack development to
                contribute to a forward-thinking organization.</p>
        </div>

        <div class="section">
            <h2>Experience</h2>
            <div class="info">
                <div class="left">
                    <strong>Software Engineer</strong><br>
                    <em>ABC Tech Solutions</em> | Jan 2020 - Present
                </div>
                <div class="right">
                    <ul>
                        <li>Developed a web application that increased user engagement by 25%.</li>
                        <li>Collaborated with cross-functional teams to design and launch new features.</li>
                        <li>Optimized backend performance, reducing API response time by 40%.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Education</h2>
            <div class="info">
                <div class="left">
                    <strong>Bachelor of Computer Science</strong><br>
                    <em>University of Tech</em> | 2015 - 2019
                </div>
                <div class="right">
                    <ul>
                        <li>GPA: 3.8/4.0</li>
                        <li>Thesis: "Optimizing Web Performance for Scalable Applications"</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Skills</h2>
            <div class="skills">
                <span>JavaScript</span>
                <span>React.js</span>
                <span>Node.js</span>
                <span>Python</span>
                <span>SQL</span>
                <span>Git</span>
                <span>Docker</span>
            </div>
        </div>

        <div class="section">
            <h2>Contact</h2>
            <ul>
                <li>Email: johndoe@example.com</li>
                <li>Phone: +123-456-7890</li>
                <li>LinkedIn: linkedin.com/in/johndoe</li>
                <li>GitHub: github.com/johndoe</li>
            </ul>
        </div>
    </div>
</body>

</html>
