<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

<class="container">
    <div class="form">


        <div class="form-body">
            <h4>Welcome to the Thought Log Dashboard!</h4>
            <p> Here you can manage your thoughts and ideas. Fill out this form to add new entries or view existing ones below.</p>
        </div>

        <div class="q1">    
            <label for="question1">What Happened?</label>
            <input type="text" id="question1" name="question1" placeholder="Describe the trigger or situation that occurred.">
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
            <label for="question3">What went through your mind?</label>
            <input type="text" id="question3" name="question3" placeholder="Describe your response to the situation.">
        </div>

        <div class="q4">    
            <label for="question4">What facts do you have that support the unhelpful thought?</label>
            <input type="text" id="question4" name="question4" placeholder="Describe the evidence for your unhelpful thought.">
        </div>

        <div class="q5">    
            <label for="question5">What facts do you have that contradict the unhelpful thought?</label>
            <input type="text" id="question5" name="question5" placeholder="Describe the evidence against your unhelpful thought.">
        </div>

        <div class="form-comment">
            <p>STOP! Take a breath...</p>
        </div>

        <div class="q6">    
            <label for="question6">What is a more balanced thought?</label>
            <input type="text" id="question6" name="question6" placeholder="Describe a more balanced perspective.">
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

            <div class="q8">    
                <label for="question8">What is your plan to move forward?</label>
                <input type="text" id="question8" name="question8" placeholder="Describe your next steps.">
            </div>

        <a href="new_entry.php" class="btn">Add New Entry</a>
        <a href="view_entries.php" class="btn">Continue ></a>
    </div>
   <script src="assets/script.js"> defer</script> 
</body>
</html>