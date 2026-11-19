<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
                <li><img src="assets/images/logo.png" id=logo alt="Thought Log logo" /> </li>
                <li><img src="assets/images/menu.png" id=menu alt="Menu button" /> </li>
            </ul>
        </nav>
</header>
<form method="post" action="dashboard.php">
<div class="container">
    <div class="form">


        <div class="form-body">
            <h4>Welcome to the Thought Log Dashboard!</h4>
            <p> Here you can manage your thoughts and ideas. Fill out this form to add new entries or view existing ones below.</p>
        </div>

        <div class="q1">    
            <label for="situation">What Happened?</label>
            <textarea id="situation" name="situation" placeholder="Describe the situation that triggered your thoughts..."></textarea>
        </div>

        <div class="q2">
            <label for="mood_before">How are you feeling right now?</label> 
            <h2 id="mood_before_title">Low</h2>
            <p id="mood_before_description">Tired, low spirits</p>
            <input type="range" id="mood_before" name="mood_before" min="1" max="5" step="1" value="2">

            <ul class="mood_labels">
                <li>Awful</li>
                <li>Low</li>
                <li>Okay</li>
                <li>Good</li>
                <li>Great</li>
            </ul>
        </div>

         <div class="q3">    
            <label for="thought">What went through your mind?</label>
            <textarea id="thought" name="thought" placeholder="Describe your response to the situation..."></textarea>
        </div>

        <div class="q4">    
            <label for="facts_for">What facts do you have that support the unhelpful thought?</label>
            <textarea id="facts_for" name="facts_for" placeholder="Describe the evidence for your unhelpful thought..."></textarea>
        </div>

        <div class="q5">    
            <label for="facts_against">What facts do you have that contradict the unhelpful thought?</label>
            <textarea id="facts_against" name="facts_against" placeholder="Describe the evidence against your unhelpful thought..."></textarea>
        </div>

        <div class="form-comment">
            <p>STOP! Take a breath...</p>
        </div>

        <div class="q6">    
            <label for="bigger_picture">What is a more balanced thought?</label>
            <textarea id="bigger_picture" name="bigger_picture" placeholder="Describe a more balanced perspective..."></textarea>
        </div>

        <div class="q7">    
            <label for="mood_after">How do you feel now?</label> 
            <h2 id="mood_after_title">Good</h2>
            <p id="mood_after_description">Energetic, positive</p>
            <input type="range" id="mood_after" name="mood_after" min="1" max="5" step="1" value="4">

            <ul class="mood_labels">
                <li>Awful</li>
                <li>Low</li>
                <li>Okay</li>
                <li>Good</li>
                <li>Great</li>
            </ul>
        </div>

            <div class="q8">    
                <label for="alternative_action">What is your plan to move forward?</label>
                <textarea id="alternative_action" name="alternative_action" placeholder="Describe your next steps..."></textarea>
            </div>

        <button type="submit" name="action" value="draft" class="btn">Add New Entry</button>
        <button type="submit" name="action" value="continue" class="btn">Continue ></button>
        
    </div>
</form>

   <script src="assets/script.js"> defer></script> 
</body>
</html>