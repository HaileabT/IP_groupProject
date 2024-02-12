const inputs = document.querySelectorAll("input, select, textarea");

const validators = [
  {
    errorMessage: "Problem with your name input",
    validateLogic(names) {
      if (names.trim().length < 2) {
        this.errorMessage = "Name too short!";
        return false;
      }
      if (!/'^.[A-Za-z]$'/.test(names)) {
        this.errorMessage = "No special characters or numbers please!";
        return false;
      }
      return true;
    },
  },
  {
    errorMessage: "Invalid Email",
    validateLogic(email) {
      if (/'^.[A-Za-z0-9]+@[A-Za-z0-9]\.[]'/)
    },
  },
];

inputs.forEach((input) => {
  input.addEventListener("blur", () => {
    validateInput(input.value, validation);
  });
});

function validateInput(data, validationLogic) {
  return validationLogic(data);
}
