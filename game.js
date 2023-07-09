// Array of equations and answers
var equations = [];
var answer = 0;
var equationString;
var result = "";
// Function to generate a new equation
function generateEquation() {
  var difficulty = document.getElementById("difficulty").value;
  var requestedDigits = 0;

  switch (difficulty) {
    case "Easy":
      requestedDigits = 3;
      break;
    case "Medium":
      requestedDigits = 4;
      break;
    case "Hard":
      requestedDigits = 5;
      break;
    case "Expert":
      requestedDigits = 6;
      break;
    default:
      requestedDigits = 4;
  }

  // Pull a number from the possibilities JSON file
  fetch("data.json")
    .then((response) => response.json())
    .then((data) => {
      const digitCount = requestedDigits; // Specify the desired number of digits

      // Filter numbers based on the digit count
      const numbers = data[digitCount.toString()];

      // Select a random number from the filtered array
      const randomIndex = Math.floor(Math.random() * numbers.length);
      const randomNumber = numbers[randomIndex];

      // Perform actions with the randomly selected number
      const number = Math.floor(randomNumber / 10);
      answer = randomNumber % 10;

      // Create the equation string
      equationString = number + " = " + answer;

      // Split the number into individual digits
      var numberArray = number.toString().split("");

      // Generate the equation HTML
      var equationHTML = "";
      for (var i = 0; i < numberArray.length; i++) {
        if (i !== numberArray.length - 1) {
          // Exclude the last select option
          equationHTML +=
            " " +
            numberArray[i] +
            " <select class='mySelect' id='symbol" +
            i +
            "' required><option value='' disabled selected hidden></option><option value='+'>+</option><option value='-'>-</option><option value='*'>*</option><option value='/'>/</option></select>";
        } else {
          equationHTML += " " + numberArray[i];
        }
      }
      equationHTML += " = " + answer;

      // Set the equation and show the game container
      document.getElementById("equation").innerHTML = equationHTML;
      document.getElementById("gameContainer").style.display = "block";

      // Store the equation and answer in the array
      equations.push({ equation: equationString, answer: answer });
    })
    .catch((error) => {
      console.log("Error fetching JSON:", error);
    });
}

// Function to check the user's submitted equation
function checkEquation() {
  var symbols = document.getElementsByTagName("select");
  var userEquationString = "";
  var numberArray = [];

  // Retrieve the numbers from the equation
  var equationHTML = document.getElementById("equation").innerHTML;
  var equationParts = equationHTML.split(" ");
  for (var i = 0; i < equationParts.length; i++) {
    if (!isNaN(parseInt(equationParts[i]))) {
      numberArray.push(parseInt(equationParts[i]));
    }
  }
  // Build the equation string from the user-selected symbols
  for (var i = 0; i < symbols.length - 1; i++) {
    userEquationString += numberArray[i] + symbols[i + 1].value;
  }
  userEquationString += numberArray[i];
  console.log("Equation String: " + userEquationString);
  // Evaluate the equation
  var result = eval(userEquationString);
  console.log("Result: " + result);
  console.log("Answer: " + answer);
  // Check if the user's answer matches the target answer
  if (result === answer) {
    document.getElementById("result").innerHTML =
      "<h3 style='color: green'><b>Correct!</b></h3>";
  } else {
    document.getElementById("result").innerHTML =
      "<h3 style='color: red'><b>Try again.</b></h3>";
  }

  // Show the result
  document.getElementById("result").style.display = "block";
}

// Event listeners for the buttons
document.getElementById("startButton").addEventListener("click", function () {
  generateEquation();
  document.getElementById("result").style.display = "none";
});

document.getElementById("submitButton").addEventListener("click", function () {
  checkEquation();
});

document
  .getElementById("newEquationButton")
  .addEventListener("click", function () {
    document.getElementById("result").style.display = "none";
    generateEquation();
  });

function validateForm() {
  event.preventDefault(); // Prevent default form submission
  var selectElement = document.querySelector(".mySelect");
  var selectValue = selectElement.value;
  if (selectValue === "") {
    alert("Please select an option");
    return false; // Prevent form submission
  } else {
  }
  // Form is valid, allow submission
  return true;
}
