const moods = {
    1: ["Awful", "Struggling, very distressed"],
    2: ["Low", "Tired, low spirits"],
    3: ["Okay", "Neutral, getting by"],
    4: ["Good", "Steady, mostly okay"],
    5: ["Great", "Excited, energised"]
};

const slider = document.getElementById("mood_before");
slider.addEventListener("input", function() {
    document.getElementById("mood_before_title").textContent = moods[slider.value][0];
    document.getElementById("mood_before_description").textContent = moods[slider.value][1];
});

const sliderAfter = document.getElementById("mood_after");
sliderAfter.addEventListener("input", function() {
    document.getElementById("mood_after_title").textContent = moods[sliderAfter.value][0];
    document.getElementById("mood_after_description").textContent = moods[sliderAfter.value][1];
});